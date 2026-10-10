<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolesSeeder extends Seeder
{
    public function run(): void
    {
        // Svuota la cache dei ruoli e dei permessi.
        app(PermissionRegistrar::class)->forgetCachedPermissions();

        // Crea i ruoli se non esistono già.
        foreach (['admin', 'agent', 'user'] as $name) {
            Role::firstOrCreate([
                'name' => $name,
                'guard_name' => 'web',
            ]);
        }

        // Associa ogni ruolo all'utente corrispondente.
        $users = [
            'admin@gmail.com' => 'admin',
            'agent@gmail.com' => 'agent',
            'user@gmail.com' => 'user',
        ];

        foreach ($users as $email => $roleName) {
            $user = User::where('email', $email)->first();

            if ($user) {
                $user->syncRoles([$roleName]);
            }
        }

        // Aggiorna la cache delle autorizzazioni.
        app(PermissionRegistrar::class)->forgetCachedPermissions();
    }
}