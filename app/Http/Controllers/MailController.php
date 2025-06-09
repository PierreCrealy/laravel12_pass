<?php

namespace App\Http\Controllers;

use App\Mail\DefaultTemplate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{

    public function viewTemplate()
    {
        // Mail::to('pierrebournazel@gmail.com')->send(new DefaultTemplate(Auth::user(), '#'));

        return new DefaultTemplate(Auth::user(), '#');
    }

}
