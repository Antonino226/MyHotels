
@extends('admin.admin_dashboard')

@section('admin')

<div class="page-content">

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <h6 class="card-title">Global Search</h6>

                    <form method="GET"
                          action="{{ route('global.search') }}"
                          class="mb-4">

                        <div class="input-group">
                            <input
                                type="search"
                                name="q"
                                class="form-control"
                                value="{{ $term }}"
                                placeholder="Cerca in tutto il sistema..."
                                required
                            >

                            <button type="submit" class="btn btn-primary">
                                <i data-feather="search"></i>
                                Search
                            </button>
                        </div>
                    </form>

                    @if($results->isEmpty())
                        <div class="alert alert-warning">
                            Nessun risultato trovato
                            @if($term !== '')
                                per "{{ $term }}"
                            @endif.
                        </div>
                    @else
                        <p class="text-muted mb-3">
                            Risultati per "{{ $term }}":
                            {{ $results->count() }}
                        </p>

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Categoria</th>
                                        <th>Nome</th>
                                        <th>Dettagli</th>
                                        <th>Azioni</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($results as $result)
                                        <tr>
                                            <td>
                                                <span class="badge bg-info">
                                                    {{ $result['type'] }}
                                                </span>
                                            </td>

                                            <td>
                                                {{ $result['title'] }}
                                            </td>

                                            <td>
                                                {{ $result['description'] ?: '-' }}
                                            </td>

                                            <td>
                                                @if($result['url'])
                                                    <a
                                                        href="{{ $result['url'] }}"
                                                        class="btn btn-outline-primary btn-sm"
                                                    >
                                                        <i data-feather="external-link"></i>
                                                        Apri
                                                    </a>
                                                @else
                                                    <span class="text-muted">
                                                        Scheda non disponibile
                                                    </span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif

                    <a href="{{ route('admin.dashboard') }}"
                       class="btn btn-secondary mt-3">
                        Torna alla Dashboard
                    </a>

                </div>
            </div>
        </div>
    </div>

</div>

@endsection
