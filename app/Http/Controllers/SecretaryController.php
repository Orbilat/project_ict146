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
    public function inve()
    {
        return view('secretary-file.inventory-secretary');
    }
    public function stat()
    {
        return view('secretary-file.view-secretary');
    }
    public function add()
    {
        return view('secretary-file.add-secretary');
    }
    public function create()
    {
        return view ('secretary-file.create-secretary');
    }
}
