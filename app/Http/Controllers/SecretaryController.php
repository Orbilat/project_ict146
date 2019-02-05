<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SecretaryController extends Controller
{
    //
    public function index()
    {
        return view('secretary-file.secretary');
    }
    public function noti()
    {
        return view('secretary-file.notification-secretary');
    }
}
