<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use http\Env\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255', 'min:6', 'regex:/(^([a-z A-Z]+)(\d+)?$)/u'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'telephone' => ['required', 'string', 'max:10'],
            'address' => ['required', 'string', 'max:50'],
            'gender' => ['required', 'string', 'max:10'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'regType' => ['required', 'string', 'max:10']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'telephone' => $data['telephone'],
            'address' => $data['address'],
            'gender' => $data['gender'],
            'password' => Hash::make($data['password']),
            'regType' => $data['regType']
        ]);

        //Save image
//        if (request()->hasFile('profileImage')){
//            $profileImage = request()->file('profileImage')->getClientOriginalName();
//            request()->file('profileImage')->storeAs('profileImage', '/' . $profileImage, '');
//            $user->update(['profileImage' => $profileImage]);
//        }

        if (request()->hasFile('profileImage')){
            $file = request()->file('profileImage');
            $extension = $file->getClientOriginalExtension();
            $profileImage = time(). '.' . $extension;
            $file->move('uploads/profileImage/', $profileImage);
            $user->update(['profileImage' => $profileImage]);
        }


        return $user;
    }
}
