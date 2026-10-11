<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class GlobalSearchController extends Controller
{
    public function index(Request $request)
    {
        $term = trim((string) $request->query('q', ''));
        $results = collect();

        // Evita ricerche vuote o troppo lunghe.
        if ($term === '' || mb_strlen($term) > 100) {
            return view('backend.pages.search.results', compact('term', 'results'));
        }

        // Configurazione delle tabelle e dei campi di ricerca.
        $entities = [
            [
                'table' => 'hotel',
                'type' => 'Hotel',
                'search' => [
                    'name', 'address', 'city', 'country',
                    'phone', 'email', 'stars', 'description',
                ],
                'title' => ['name'],
                'description' => [
                    'city', 'country', 'address', 'phone',
                    'email', 'stars',
                ],
                'url' => fn ($row) => route('info.hotel', $row->id),
            ],
            [
                'table' => 'room',
                'type' => 'Camera',
                'search' => [
                    'room_number', 'room_type', 'price_per_night',
                    'available', 'hotel_id',
                ],
                'title' => ['room_number', 'room_type'],
                'description' => [
                    'room_type', 'price_per_night',
                    'available', 'hotel_id',
                ],
                'url' => fn ($row) => route('edit.room', $row->id),
            ],
            [
                'table' => 'booking',
                'type' => 'Prenotazione',
                'search' => [
                    'check_in_date', 'check_out_date',
                    'guests_number', 'total_payment',
                    'confirmed', 'room_id', 'user_id',
                ],
                'title' => [],
                'description' => [
                    'check_in_date', 'check_out_date',
                    'guests_number', 'total_payment',
                    'confirmed', 'room_id', 'user_id',
                ],
                'url' => fn ($row) => route('info.booking', $row->id),
            ],
            [
                'table' => 'users',
                'type' => fn ($row) => match ($row->role ?? null) {
                    'admin' => 'Amministratore',
                    'agent' => 'Agente',
                    default => 'Utente',
                },
                'search' => [
                    'name', 'username', 'email', 'phone', 'address',
                ],
                'title' => ['name', 'username', 'email'],
                'description' => ['email', 'phone', 'address', 'role'],
                'url' => function ($row) {
                    return match ($row->role ?? null) {
                        'admin' => route('edit.admin', $row->id),
                        'user' => route('edit.user', $row->id),
                        default => null,
                    };
                },
            ],
            [
                'table' => 'property_types',
                'type' => 'Tipo struttura',
                'search' => ['type_name', 'type_icon'],
                'title' => ['type_name'],
                'description' => ['type_icon'],
                'url' => fn ($row) => route('edit.type', $row->id),
            ],
            [
                'table' => 'amenities',
                'type' => 'Servizio',
                'search' => ['amenitis_name'],
                'title' => ['amenitis_name'],
                'description' => [],
                'url' => fn ($row) => route('edit.amenitie', $row->id),
            ],
        ];

        foreach ($entities as $entity) {
            $table = $entity['table'];

            // Ignora le tabelle non presenti nel database.
            if (!Schema::hasTable($table)) {
                continue;
            }

            // Mantiene solo le colonne esistenti.
            $columns = array_values(array_filter(
                $entity['search'],
                fn ($column) => Schema::hasColumn($table, $column)
            ));

            $hasId = Schema::hasColumn($table, 'id');

            if (empty($columns) && !(ctype_digit($term) && $hasId)) {
                continue;
            }

            $query = DB::table($table);

            $query->where(function ($builder) use ($columns, $term, $hasId) {
                foreach ($columns as $column) {
                    $builder->orWhere($column, 'like', '%' . $term . '%');
                }

                // Cerca anche tramite ID esatto.
                if (ctype_digit($term) && $hasId) {
                    $builder->orWhere('id', (int) $term);
                }
            });

            if ($hasId) {
                $query->orderByDesc('id');
            }

            foreach ($query->limit(8)->get() as $row) {
                $title = null;

                foreach ($entity['title'] as $field) {
                    if (
                        isset($row->{$field}) &&
                        trim((string) $row->{$field}) !== ''
                    ) {
                        $title = $row->{$field};
                        break;
                    }
                }

                if ($table === 'booking') {
                    $title = 'Prenotazione #' . $row->id;
                }

                $description = [];

                $labels = [
                    'city' => 'Città',
                    'country' => 'Paese',
                    'address' => 'Indirizzo',
                    'phone' => 'Telefono',
                    'email' => 'Email',
                    'stars' => 'Stelle',
                    'room_type' => 'Tipo camera',
                    'price_per_night' => 'Prezzo/notte',
                    'available' => 'Disponibile',
                    'hotel_id' => 'ID hotel',
                    'check_in_date' => 'Check-in',
                    'check_out_date' => 'Check-out',
                    'guests_number' => 'Ospiti',
                    'total_payment' => 'Totale',
                    'confirmed' => 'Confermata',
                    'room_id' => 'ID camera',
                    'user_id' => 'ID utente',
                    'role' => 'Ruolo',
                    'type_icon' => 'Icona',
                ];

                foreach ($entity['description'] as $field) {
                    if (
                        isset($row->{$field}) &&
                        trim((string) $row->{$field}) !== ''
                    ) {
                        $value = $row->{$field};

                        if (in_array($field, ['available', 'confirmed'], true)) {
                            $value = (bool) $value ? 'Sì' : 'No';
                        }

                        $label = $labels[$field] ?? null;

                        $description[] = $label
                            ? $label . ': ' . $value
                            : $value;
                    }
                }

                $type = is_callable($entity['type'])
                    ? ($entity['type'])($row)
                    : $entity['type'];

                $results->push([
                    'type' => $type,
                    'title' => $title ?? 'Record #' . ($row->id ?? ''),
                    'description' => implode(' · ', $description),
                    'url' => ($entity['url'])($row),
                ]);
            }
        }

        return view('backend.pages.search.results', compact('term', 'results'));
    }
}