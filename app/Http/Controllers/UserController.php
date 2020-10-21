<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\User;
use Session;

class UserController extends Controller
{
    public function viewUsers()
    {
        $users = DB::table('users')
        ->join('roles', 'users.role_id', 'roles.id')
        ->select('roles.role_name', 'users.id', 'users.name', 'users.email', 'users.created_at','users.role_id')
        ->get();

        foreach($users as $u)
        {
            $newtime = strtotime($u->created_at);
	        $u->time = date('Y-m-d',$newtime);
        }

        return view('user.user_view', compact('users'));
    }

    public function addUser(Request $request)
    {
        $rule= array(
            "name" => "required",
            "email" => "required|max:255|unique:users"
        );

        $this->validate($request, $rule);

        $user = new User;
        $user->role_id = $request->role_id;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make('default123');
        $user->save();

        return redirect('/user/user_view');
    }

    public function updateUser($id, Request $request)
    {
        //dd($id);
        $rule= array(
            "name" => "required",
            "email" => "required"
        );

        $this->validate($request, $rule);

        $userUpdate = User::find($id);
        $userUpdate->role_id = $request->role_id;
        $userUpdate->name = $request->name;
        $userUpdate->email = $request->email;
        $userUpdate->save();

        return redirect('/user/user_view');
    }

    public function deleteUser($id)
    {
        //dd($id);
        $userDelete = User::find($id);
        $userDelete->delete();   
        return redirect('/user/user_view');
    }

    public function changePassword()
    {
        return view('user.change_password');
    }

    public function changePasswordStore(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
            
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
        Session::flash("message", "Password changed");
        return redirect('/user/change_password');
    }
}
