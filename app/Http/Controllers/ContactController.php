<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ContactController extends Controller
{
    public function create()
    {
        // Show a view to create a new resource
        return view('contacts');
    }
    public function store(){
        //dump(request()->all());
        $validatedAttributes = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:50'],
            'subject' => ['required', 'string', 'max:150'],
            'message' => ['required', 'string', 'max:1000']
        ]);

        Contact::create($validatedAttributes);
        Session::flash('success-message', 'Contact submitted!');
        Session::flash('alert-class', 'alert-success');
        return redirect('/contacts');

    }
    public function getAllContacts(){
        $contacts = Contact::paginate(5);
        return view('layouts.admin.viewContacts', [
            'contacts'=>$contacts
        ]);
    }
}
