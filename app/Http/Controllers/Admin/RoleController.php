<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ReopeningInEducationTeam;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    function index()
    {
        $roles = Role::whereNull('school_id')
        ->get();

        return view('admin.role.index', compact('roles'));
    }

    function create()
    {
        return view('admin.role.create');
    }

    function store()
    {
        request()->validate([
            'name' => 'required',
        ]);

        Role::create([
                'name' => request()->input('name'),
                'guard_name' => 'web',
                'status' => request()->input('status')
            ]
        );

        toastr()->success('Role Added');

        return redirect()->route("admin.roles.index");

    }

    function edit($id)
    {
        $role = Role::findOrFail($id);

        return view('admin.role.edit', compact('role'));
    }

    function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);

        $data = $request->only([
            'name', 'status'
        ]);

        $role->update($data);

        return redirect()->route('admin.roles.index');

    }

    function show($id)
    {

        $role = Role::findOrFail($id);
        $permissions = $role->getAllPermissions()
            ->pluck('name')
            ->toArray();

        return view("admin.role.show", compact('role', 'permissions'));
    }

    function update_permissions(Request $request, $id)
    {

        $role = Role::findOrFail($id);

        $permissions = $request->input('permissions');

        $this->__createNonExistingPermissions($permissions);

        //sync permissions

        $role->syncPermissions($request->input('permissions'));

        return redirect()->route('admin.roles.index');


    }

    private function __createNonExistingPermissions(array $permissions)
    {
        $exisingPermissions = Permission::whereIn('name', $permissions)
            ->pluck('name')
            ->toArray();

        $nonExistingPermissions = array_diff($permissions, $exisingPermissions);

        if (!empty($nonExistingPermissions)) {
            foreach ($nonExistingPermissions as $new_permission) {
                Permission::create([
                    'name' => $new_permission,
                    'guard_name' => 'web'
                ]);
            }
        }
    }

}
