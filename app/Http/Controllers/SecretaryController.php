<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Ris;
use App\Sample;
use Validator;
use App\Client;
use Illuminate\Support\Facades\Auth;
use DateTime;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SecretaryController extends Controller
{
    //
    public function index()
    {
        return view('secretary-file.secretary');
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

    public function form()
    {
        $clients = DB::table('clients')->orderBy('clientId','DESC')->get();
        return view('secretary-file.secretary-form',['clients'=>$clients]);
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
    // protected function addClient(Request $request)
    // {
    //     // VALIDATION
    //     $validator = Validator::make($request->all(), [
    //         'nameOfPerson' => 'required|string|max:255|min:4',
    //         'nameOfEntity' => 'nullable|string|max:255',
    //         'address' => 'required|string|max:50',
    //         'contactNumber' => 'string|numeric',
    //         'faxNumber' => 'nullable|string|numeric',
    //         'emailAddress' => 'nullable|string|max:50|email',
    //         'dateOfSubmission' => 'required|string|max:20',
    //     ]);
    //     // VALIDATION CHECKS
    //     if ($validator->fails()) {
    //         return redirect('admin/clients')
    //                     ->withErrors($validator)
    //                     ->withInput();
    //     }

    //     //ELOQUENT INSERT
    //     $client = new Client;
    //     $client->nameOfPerson = trim($request->nameOfPerson);
    //     $client->nameOfEntity = trim($request->nameOfEntity);
    //     $client->address =  trim($request->address);
    //     $client->contactNumber = trim($request->contactNumber);
    //     $client->faxNumber = trim($request->faxNumber);
    //     $client->emailAddress = trim($request->emailAddress);
    //     $client->dateOfSubmission = $request->dateOfSubmission;
    //     $client->managedBy = Auth::user()->employeeName;
    //     $client->managedDate = new DateTime();
    //     $client->save();
    //     $client->risNumber = (int)date("Y", strtotime($client->created_at)) . $client->clientId;
    //     //SAVE TO DB && CHECK
    //     if($client->save()){
    //         Session::flash('flash_client_added', 'Client added successfully! Please add the samples of the new client.');
    //         return view('admin.add_sample');
    //     }
    //     else {
    //         App::abort(500, 'Error!');
    //     }
    //     $a=$clientId;
    //     $sample=new Sample;
    //     $sample->risNumber=$a;
    // }

    protected function addClient(Request $request)
    {
        // VALIDATION
        // $validator = Validator::make($request->all(), [
        //     'nameOfPerson' => 'required|string|max:255|min:4',
        //     'nameOfEntity' => 'nullable|string|max:255',
        //     'address' => 'required|string|max:50',
        //     'contactNumber' => 'string|numeric',
        //     'faxNumber' => 'nullable|string|numeric',
        //     'emailAddress' => 'nullable|string|max:50|email',
        //     'dateOfSubmission' => 'required|string|max:20',
        //     'clientCode'=>'string|max:50',
        //     'sampleMatrix'=>'string|max:50',
        //     // 'samplePreservation' => 'required|string|max:50',

            
        // ]);
        // // VALIDATION CHECKS
        // if ($validator->fails()) {
        //     return redirect('secretary/add')
        //                 ->withErrors($validator)
        //                 ->withInput();
        // }

        //ELOQUENT INSERT
        $client = new Client;
        $client->nameOfPerson = trim($request->nameOfPerson);
        $client->nameOfEntity = trim($request->nameOfEntity);
        $client->address =  trim($request->address);
        $client->contactNumber = trim($request->contactNumber);
        $client->faxNumber = trim($request->faxNumber);
        $client->emailAddress = trim($request->emailAddress);
        $client->discount = trim($request->discount);
        $client->deposit = trim($request->deposit);
        $client->reclaimSample = trim($request->reclaimSample);
        $client->testResult = trim($request->testResult);
        $client->remarks =  trim($request->remarks);
      
        
        $client->managedBy = Auth::user()->employeeName;
        
        
        $client->save();
        $client->managedDate = new DateTime();
        $client->risNumber = (int)date("Y", strtotime($client->created_at)) . $client->clientId;
        $client->save();
        if($client->save()){
                    Session::flash('flash_client_added', 'Client added successfully! Please add the samples of the new client.');
                    // return view('secretary-file.create-secretary', ['clientRis' => $clientRis]);
                    return view('secretary-file.sample-secretary',['risNumber' => $client->risNumber, 'clientId' => $client->clientId]);
                }
                else {
                    App::abort(500, 'Error!');
                }
        //SAVE TO DB && CHECK
      
        // $a=$client->risNumber;
        // $sample=new Sample;
        // $sample->risNumber=$a;
        // $sample->clientsCode = trim($request->clientsCode);
        // $sample->sampleMatrix = trim($request->sampleMatrix);
        // $sample->collectionTime = trim($request->collectionTime);
        // $sample->samplePreservation = trim($request->samplePreservation);
        // $sample->purposeOfAnalysis = trim($request->purposeOfAnalysis);
        // $sample->sampleSource = trim($request->sampleSource);
        // $sample->dueDate = trim($request->dueDate);
        // $sample->managedBy = Auth::user()->employeeName;
        // $sample->managedDate = new DateTime();
        
        // $sample->save();

        // return view('secretary-file.create-secretary');
        // if($sample->save()){
        //     Session::flash('flash_client_added', 'Client added successfully! Please add the samples of the new client.');
        //     return view('produit');
        // }
        // else {
        //     App::abort(500, 'Error!');
        // }
        
    }

    protected function  addSample(Request $request){


        $sample = new Sample;
        $sample->risNumber = $clientId;
        
    }
}