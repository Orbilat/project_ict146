<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Ris;
use App\Sample;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

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
    public function samples(){
        $samples=Sample::all();
        return view('dynamic_pdf',['samples'=>$samples]);
    }
    // protected function form(Request $request)
    // {
    //     $ris=new Ris;
    //     $ris->nameOfPerson= $request->Name;
    //     $ris->risNumber= $request->risNumber;
    //     $ris->nameOfEntity= $request->nameOfEntity;
    //     $ris->address= $request->address;
        
    //     $saved = $ris->save();
    //     if(!$saved){
    //         abort(500, 'Unsuccessful!');
    //     }
    //     else{
    //         return view('secretary-file.ris');
    //     }  
    // }
    protected function ris(Request $request)
    {  
        // $ris=new Ris;
        // $ris->nameOfPerson= $request->Name;
        // $ris->risNumber= $request->risNumber;
        // $ris->nameOfEntity= $request->nameOfEntity;
        // $ris->address= $request->address;
        
        // $saved = $ris->save();
        // if(!$saved){
        //     abort(500, 'Unsuccessful!');
        // }
        // else{
        // return view('secretary-file.ris-form');
        // }

        return view('secretary-file.ris-form');
    }
}