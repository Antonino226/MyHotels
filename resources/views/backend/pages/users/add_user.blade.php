@extends('admin.admin_dashboard')

@section('admin')
<div class="page-content">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">

                    <h6 class="card-title">Add User</h6>

                    {{-- Messaggio di completamento --}}
                    @if(session('message'))
                        <div class="alert alert-{{ session('alert-type') === 'error' ? 'danger' : session('alert-type', 'success') }} alert-dismissible fade show">
                            {{ session('message') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    {{-- Errori di validazione --}}
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('store.user') }}">
                        @csrf

                        {{-- Nome --}}
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input
                                type="text"
                                name="name"
                                id="name"
                                class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name') }}"
                                required
                            >
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Username --}}
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input
                                type="text"
                                name="username"
                                id="username"
                                class="form-control @error('username') is-invalid @enderror"
                                value="{{ old('username') }}"
                                required
                            >
                            @error('username')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Email --}}
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input
                                type="email"
                                name="email"
                                id="email"
                                class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email') }}"
                                required
                            >
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Telefono facoltativo --}}
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input
                                type="text"
                                name="phone"
                                id="phone"
                                class="form-control @error('phone') is-invalid @enderror"
                                value="{{ old('phone') }}"
                            >
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Indirizzo facoltativo --}}
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input
                                type="text"
                                name="address"
                                id="address"
                                class="form-control @error('address') is-invalid @enderror"
                                value="{{ old('address') }}"
                            >
                            @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Password --}}
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input
                                type="password"
                                name="password"
                                id="password"
                                class="form-control @error('password') is-invalid @enderror"
                                minlength="8"
                                required
                            >
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Conferma password --}}
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">
                                Confirm Password
                            </label>
                            <input
                                type="password"
                                name="password_confirmation"
                                id="password_confirmation"
                                class="form-control"
                                minlength="8"
                                required
                            >
                        </div>

                        <button type="submit" class="btn btn-primary">
                            <i class="link-icon" data-feather="user-plus"></i>
                            Save User
                        </button>

                        <a href="{{ route('all.user') }}" class="btn btn-secondary">
                            Cancel
                        </a>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection