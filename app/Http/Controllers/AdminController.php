<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Index Page (/)
    public function adminIndex()
    {
        return view('admin.index');
    }

    // Adding Client (/)
    // FROM routes/web.php -> Route::post
    protected function addClient(Request $request)
    {
            
    }
}
