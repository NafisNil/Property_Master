<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class SchoolRoleController extends Controller
{
    function index()
    {
        $user = auth()->user();

        $roles = Role::where('school_id', $user->school_id)
            ->get();

        return view('role.index', compact('roles'));
    }

    function create()
    {
        return view('role.create');
    }

    function store()
    {
        $user = auth()->user();

        request()->validate([
            'name' => 'required',
        ]);

        Role::create([
                'name' => request()->input('name') . '#' . $user->school_id,
                'school_id' => $user->school_id,
                'guard_name' => 'web',
                'status' => request()->input('status')
            ]
        );

        toastr()->success('Role Added');

        return redirect()->route("roles.index");

    }

    function edit($id)
    {


        $role = Role::findOrFail($id);

        return view('role.edit', compact('role'));
    }

    function update(Request $request, $id)
    {
        $user = auth()->user();

        $role = Role::findOrFail($id);

        $data = $request->only([
            'name', 'status'
        ]);

        $data['name'] = $data['name'] . '#' . $user->school_id;

        $role->update($data);

        return redirect()->route('roles.index');

    }

    function show($id)
    {

        $role = Role::findOrFail($id);
        $permissions = $role->getAllPermissions()
            ->pluck('name')
            ->toArray();

        return view("role.show", compact('role', 'permissions'));
    }

    function update_permissions(Request $request, $id)
    {

        $role = Role::findOrFail($id);

        $permissions = $request->input('permissions');

        $this->__createNonExistingPermissions($permissions);

        //sync permissions

        $role->syncPermissions($request->input('permissions'));

        return redirect()->route('roles.index');


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

    function getUpdateUserRole()
    {

        $user = auth()->user();

        $roles = Role::where('school_id', $user->school_id)
            ->get()->map(function ($item) {
                $item->name = strtok($item->name, '#');
                return $item;
            });

        $users = User::get()->pluck('full_name', 'id');

        return view('role.update-user-role.create', compact('roles', 'users'));

    }

    function postUpdateUserRole(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'roles' => 'required',
        ]);

        $inputUser = User::find($request->input('user_id'));

        $roles = $request->input('roles');

        $inputUser->assignRole($roles);

        toastr()->success('User Role Updated');

        return redirect()->back();

    }

    function getUserRoles($id)
    {

        $user = User::findOrFail($id);

        $roles = $user->roles;

        return response()->json(['status' => 'success', 'roles' => $roles]);
    }

}
