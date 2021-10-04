<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactUsMail;

class ContactController extends Controller
{
    public function sendMessage(Request $request)
    {
        return view('contact_dynamic_mail')
                ->with('data', $request);
    }
}
