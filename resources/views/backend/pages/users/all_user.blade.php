
@extends('admin.admin_dashboard')

@section('admin')

<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            @can('add.user')
                <a href="{{ route('add.user') }}" class="btn btn-inverse-info">
                    Add User
                </a>
            @endcan
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <h6 class="card-title">All User</h6>

                    {{-- Messaggio di conferma --}}
                    @if(session('message'))
                        <div class="alert alert-{{ session('alert-type') === 'error' ? 'danger' : 'success' }}">
                            {{ session('message') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="table-responsive" style="overflow-x: clip;">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($users as $key => $user)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->status ?? '-' }}</td>

                                        <td>
                                            <a href="{{ route('edit.user', $user->id) }}"
                                               class="btn btn-outline-warning"
                                               title="Edit User">
                                                <i data-feather="edit"></i>
                                            </a>

                                            <form action="{{ route('delete.user', $user->id) }}"
                                                  method="POST"
                                                  class="d-inline"
                                                  onsubmit="return confirm('Sei sicuro di voler eliminare questo utente?');">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                        class="btn btn-outline-danger"
                                                        title="Delete User">
                                                    <i data-feather="trash-2"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">
                                            Nessun utente trovato.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>

@endsection
