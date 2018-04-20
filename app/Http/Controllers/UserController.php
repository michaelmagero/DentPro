<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;

class UserController extends Controller
{
    //
    public function allusers() {
        return view('admin.users.show');
    }

    public function create() {
        return view('admin.users.create');
    }

    public function create_user(Request $request) {
        $user = new User();
        $user->name = $request->get('name');
        $user->lastname = $request->get('lastname');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));
        $user->role = $request->get('role');

        $user->save();
        \Session::flash('flash_message','User Created Successfully.');
        return back();
    }
}
