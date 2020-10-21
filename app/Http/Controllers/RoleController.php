<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Roles;

class RoleController extends Controller
{
    public function viewRoles()
    {
        $roles = Roles::all();
        return view('role.role_view', compact('roles'));
    }

    public function addRole(Request $request)
    {
        $rule = array(
            "role_name" => "required",
            "role_description" => "required"
        );
 
        $this->validate($request, $rule);

        $role = new Roles;
        $role->role_name = $request->role_name;
        $role->role_description = $request->role_description;
        $role->save();

        return redirect('role/role_view');
    }

    public function updateRole($id, Request $request)
    {
        $rule = array(
            "role_name" => "required",
            "role_description" => "required"
        );
 
        $this->validate($request, $rule);
        $updateRole = Roles::find($id);
        $updateRole->role_name = $request->role_name;
        $updateRole->role_description = $request->role_description;
        $updateRole->save();

        return redirect('role/role_view');
    }

    public function deleteRole($id)
    {
        $deleteRole = Roles::find($id);
        $deleteRole->delete();
        return redirect('role/role_view');
    }
}
