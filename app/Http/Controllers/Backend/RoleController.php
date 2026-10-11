<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PermissionExport;
use App\Imports\PermissionImport;
use App\Models\User;
use DB;
class RoleController extends Controller
{
    public function AllPermission(){

        $permissions = Permission::all();
        return view('backend.pages.permission.all_permission',compact('permissions'));
    }

    public function AddPermission(){
        return view('backend.pages.permission.add_permission');
    }

    public function StorePermission(Request $request)
    {
        $permission = Permission::create([
            'name' => $request->name,
            'group_name' => $request->group_name,
        ]);

        $notification = array(
            'message' => 'Permission Create Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('all.permission')->with($notification);
    }

    public function EditPermission($id){

        $permission = Permission::findOrFail($id);
        return view('backend.pages.permission.edit_permission',compact('permission'));
    }

    public function UpdatePermission(Request $request)
    {
        $per_id = $request->id;

        Permission::findOrFail($per_id)->update([
            'name' => $request->name,
            'group_name' => $request->group_name,

        ]);

        $notification = array(
            'message' => 'Permission Update Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('all.permission')->with($notification);
    }

    public function DeletePermission($id)
    {
        Permission::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Permission Delete Successfully',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    public function ImportPermission(){
        return view('backend.pages.permission.import_permission');
    }

    public function Export(){
        return Excel::download(new PermissionExport, 'users.xlsx');
    }

    public function Import(Request $request){
        Excel::import(new PermissionImport, $request->file('import_file'));

        $notification = array(
            'message' => 'Permission Imported Successfully',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    public function AllRoles(){
        $roles = Role::all();
        return view('backend.pages.roles.all_roles',compact('roles'));
    }

    public function AddRoles(){
        return view('backend.pages.roles.add_roles');
    }

    public function StoreRoles(Request $request)
    {
        $role = Role::create([
            'name' => $request->name,
        ]);

        $notification = array(
            'message' => 'Role Create Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('all.roles')->with($notification);
    }

    public function EditRoles($id){

        $role = Role::findOrFail($id);
        return view('backend.pages.roles.edit_roles',compact('role'));
    }

    public function UpdateRoles(Request $request)
    {
        $role_id = $request->id;

        Role::findOrFail($role_id)->update([
            'name' => $request->name,
        ]);

        $notification = array(
            'message' => 'Role Update Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('all.roles')->with($notification);
    }

    public function DeleteRoles($id)
    {
        Role::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Role Delete Successfully',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    public function AddRolesPermission(){
        $roles = Role::all();
        $permissions = Permission::all();
        $permission_groups = User::getpermissionGroups();
        return view('backend.pages.rolesetup.add_roles_permission',
        compact('roles','permissions','permission_groups'));
    }

    public function RolePermissionStore(Request $request)
    {
        $request->validate([
            'role_id' => ['required', 'integer', 'exists:roles,id'],
            'permission' => ['sometimes', 'array'],
            'permission.*' => [
                'integer',
                'distinct',
                'exists:permissions,id',
            ],
        ]);

        $role = Role::findOrFail($request->input('role_id'));

        // Se nessuna checkbox è selezionata, usa un array vuoto.
        $permissionIds = $request->input('permission', []);

        $permissions = \Spatie\Permission\Models\Permission::whereIn(
            'id',
            $permissionIds
        )->get();

        // Sincronizza i permessi selezionati con quelli del ruolo.
        $role->syncPermissions($permissions);

        // Invalida la cache dei permessi.
        app(\Spatie\Permission\PermissionRegistrar::class)
            ->forgetCachedPermissions();

        return redirect()->back()->with([
            'message' => 'Permessi del ruolo aggiornati correttamente',
            'alert-type' => 'success',
        ]);
    }

    public function AllRolesPermission(){
        $roles = Role::all();
        return view('backend.pages.rolesetup.all_roles_permission',
        compact('roles'));
    }

    public function AdminEditRoles($id){
        $role = Role::findOrFail($id);
        $permissions = Permission::all();
        $permission_groups = User::getpermissionGroups();
        return view('backend.pages.rolesetup.edit_roles_permission',
        compact('role','permissions','permission_groups'));
    }

    public function AdminRolesUpdate(Request $request, $id){

        $role = Role::findOrFail($id);
        $permissions = $request->input('permission', []);

        $role->syncPermissions($permissions);

        app(\Spatie\Permission\PermissionRegistrar::class)
            ->forgetCachedPermissions();

        $notification = array(
            'message' => 'Role Permission Added Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('all.roles.permission')->with($notification);
    }

    public function AdminRolesDelete($id)
    {
        $role = Role::findOrFail($id);
        if(!is_null($role)){
            $role->delete();
        }

        $notification = array(
            'message' => 'Role Permission Delete Successfully',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }
}
