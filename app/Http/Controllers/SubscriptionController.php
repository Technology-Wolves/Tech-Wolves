<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SubscriptionController extends Controller
{
    protected function store(){

//        dump(\request()->all());

        $validatedAttributes = request()->validate([
           'email' => ['required', 'string', 'email', 'max:50', 'unique:subscriptions']
        ]);

        Subscription::create($validatedAttributes);
        Session::flash('message', 'Subscriptions added!');
        Session::flash('alert-class', 'alert-success');
        return redirect('/');
    }
}
