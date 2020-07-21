<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    // Edit Profile
    protected function editProfile($userId){
        $user = User::find($userId);
        return view('layouts.seller.profile.viewProfile', compact('user'));
    }

    // Update Profile
    protected function updateUser(Request $request, $userId){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:50'],
            'telephone' => ['required', 'string', 'max:10'],
            'address' => ['required', 'string', 'max:50']
        ]);

        $user = User::find($userId);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->telephone = $request->telephone;
        $user->address = $request->address;

        $user->save();
        Session::flash('message', 'Profile Updated Successfully!');
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('viewProfile', $userId);
    }
}
