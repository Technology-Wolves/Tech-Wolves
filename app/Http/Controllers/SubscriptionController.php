<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SubscriptionController extends Controller
{
    public function store(){

//        dump(\request()->all());

        $validatedAttributes = request()->validate([
           'email' => ['required', 'string', 'email', 'max:50', 'unique:subscriptions']
        ]);

        if(Subscription::create($validatedAttributes)){
            Session::flash('success-message', 'Subscriptions added!');
            Session::flash('alert-class', 'alert-success');
            return redirect('/');
        }else{
            Session::flash('error-message', 'Your email is already in the list!');
            Session::flash('alert-class', 'alert-danger');
            return redirect('/');
        }
    }
    public function viewSubscribers(){
        return view('layouts.admin.viewSubscribers');
    }
}
