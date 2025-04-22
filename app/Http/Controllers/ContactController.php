<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;

class ContactController extends Controller
{
    
    public function store(ContactRequest $request)
{
    Contact::create($request->validated());
echo 'OK'; exit;
    // return redirect('/')->with('success', 'Your message has been sent successfully!');
}

}

