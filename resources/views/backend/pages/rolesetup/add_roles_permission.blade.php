@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<style>
    .form-check-label {
        text-transform: capitalize;
    }

    .permission-group {
        padding: 12px 0;
        border-bottom: 1px solid #e9ecef;
    }

    .permission-group:last-child {
        border-bottom: none;
    }
</style>

<div class="page-content">
    <div class="row profile-body">
        <div class="col-md-8 col-xl-8 middle-wrapper">
            <div class="row">
                <div class="card">
                    <div class="card-body">

                        <h6 class="card-title">Add Roles in Permission</h6>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form
                            id="myForm"
                            method="POST"
                            action="{{ route('role.permission.store') }}"
                            class="forms-sample"
                        >
                            @csrf

                            {{-- Selezione del ruolo --}}
                            <div class="form-group mb-3">
                                <label for="role_id" class="form-label">
                                    Roles Name
                                </label>

                                <select
                                    name="role_id"
                                    class="form-select"
                                    id="role_id"
                                    required
                                >
                                    <option value="" selected disabled>
                                        Select Role
                                    </option>

                                    @foreach (($roles ?? collect()) as $role)
                                        <option
                                            value="{{ $role->id }}"
                                            {{ old('role_id') == $role->id ? 'selected' : '' }}
                                        >
                                            {{ $role->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Seleziona tutti i permessi --}}
                            <div class="form-check mb-3">
                                <input
                                    type="checkbox"
                                    class="form-check-input"
                                    id="checkDefaultmain"
                                >

                                <label
                                    class="form-check-label"
                                    for="checkDefaultmain"
                                >
                                    Permission All
                                </label>
                            </div>

                            <hr>

                            {{-- Gruppi di permessi --}}
                            @foreach (($permission_groups ?? collect()) as $groupIndex => $group)

                                @php
                                    $permissions = \App\Models\User::getpermissionByGroupName(
                                        $group->group_name
                                    ) ?? collect();

                                    $groupCheckboxId = 'group-toggle-' . $groupIndex;
                                    $groupPermissionsId = 'permissions-group-' . $groupIndex;
                                @endphp

                                <div class="row permission-group">

                                    {{-- Selezione dell'intero gruppo --}}
                                    <div class="col-12 col-md-3">
                                        <div class="form-check mb-2">
                                            <input
                                                type="checkbox"
                                                class="form-check-input group-permission-toggle"
                                                id="{{ $groupCheckboxId }}"
                                                data-target="#{{ $groupPermissionsId }}"
                                            >

                                            <label
                                                class="form-check-label"
                                                for="{{ $groupCheckboxId }}"
                                            >
                                                {{ $group->group_name }}
                                            </label>
                                        </div>
                                    </div>

                                    {{-- Permessi appartenenti al gruppo --}}
                                    <div
                                        class="col-12 col-md-9"
                                        id="{{ $groupPermissionsId }}"
                                    >
                                        @foreach ($permissions as $permission)

                                            <div class="form-check mb-2">
                                                <input
                                                    type="checkbox"
                                                    class="form-check-input permission-checkbox"
                                                    id="permission-{{ $permission->id }}"
                                                    name="permission[]"
                                                    value="{{ $permission->id }}"
                                                >

                                                <label
                                                    class="form-check-label"
                                                    for="permission-{{ $permission->id }}"
                                                >
                                                    {{ $permission->name }}
                                                </label>
                                            </div>

                                        @endforeach
                                    </div>

                                </div>

                            @endforeach

                            <button
                                type="submit"
                                class="btn btn-primary me-2 mt-3"
                            >
                                Save Changes
                            </button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(function () {

        const $allPermissions = $('.permission-checkbox');
        const $selectAll = $('#checkDefaultmain');
        const $groupSelectors = $('.group-permission-toggle');

        // Aggiorna lo stato dei selettori di gruppo e del selettore globale.
        function updateSelectors() {

            $groupSelectors.each(function () {

                const $group = $($(this).data('target'));
                const $permissions = $group.find('.permission-checkbox');

                const total = $permissions.length;
                const selected = $permissions.filter(':checked').length;

                $(this).prop(
                    'checked',
                    total > 0 && selected === total
                );

                $(this).prop(
                    'indeterminate',
                    selected > 0 && selected < total
                );
            });

            const total = $allPermissions.length;
            const selected = $allPermissions.filter(':checked').length;

            $selectAll.prop(
                'checked',
                total > 0 && selected === total
            );

            $selectAll.prop(
                'indeterminate',
                selected > 0 && selected < total
            );
        }

        // Seleziona o deseleziona tutti i permessi.
        $selectAll.on('change', function () {

            $allPermissions.prop('checked', this.checked);

            updateSelectors();
        });

        // Seleziona o deseleziona tutti i permessi di un gruppo.
        $groupSelectors.on('change', function () {

            const $group = $($(this).data('target'));

            $group.find('.permission-checkbox')
                .prop('checked', this.checked);

            updateSelectors();
        });

        // Aggiorna i selettori quando cambia un singolo permesso.
        $allPermissions.on('change', updateSelectors);

        // Stato iniziale.
        updateSelectors();
    });
</script>

@endsection