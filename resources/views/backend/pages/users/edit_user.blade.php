
@extends('admin.admin_dashboard')

@section('admin')

<div class="page-content">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">

                    <h6 class="card-title">Edit User</h6>

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('update.user', $user->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input
                                type="text"
                                name="name"
                                id="name"
                                class="form-control"
                                value="{{ old('name', $user->name) }}"
                                required
                            >
                        </div>

                        <div class="form-group mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input
                                type="text"
                                name="username"
                                id="username"
                                class="form-control"
                                value="{{ old('username', $user->username) }}"
                                required
                            >
                        </div>

                        <div class="form-group mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input
                                type="email"
                                name="email"
                                id="email"
                                class="form-control"
                                value="{{ old('email', $user->email) }}"
                                required
                            >
                        </div>

                        <div class="form-group mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input
                                type="text"
                                name="phone"
                                id="phone"
                                class="form-control"
                                value="{{ old('phone', $user->phone) }}"
                            >
                        </div>

                        <div class="form-group mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input
                                type="text"
                                name="address"
                                id="address"
                                class="form-control"
                                value="{{ old('address', $user->address) }}"
                            >
                        </div>

                        <button type="submit" class="btn btn-primary">
                            Save Changes
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
