<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;


class ContactController extends Controller
{
    public function store(Request $request)
    {
        // validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        // create a new contact and save it to the database
        $contact = new Contact();
        $contact->name = $validatedData['name'];
        $contact->email = $validatedData['email'];
        $contact->message = $validatedData['message'];
        $contact->save();

        // return a success message
        $data = [
            'message' => 'Send successfully!',
        ];

        return response()->json($data, 200);
    }
}
