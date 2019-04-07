<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Ris;
use App\Sample;
use Validator;
use App\Client;
use App\Parameter;  
use App\Transaction;
use App\Sample_Tests;
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

    
    protected function status(){
        
        $cli = Client::with('samples.parameters')->get();
        $isComplete = 'false';

        foreach($cli as $cl){
            foreach($cl->samples as $sample){
                foreach($sample->parameters as $parameter){
                    if($parameter->pivot->status == "In Progress"){
                        $isComplete = 'false';
                        break;
                    }
                    $isComplete = 'true';
                }
            }
            if($isComplete == 'true'){
                $ready = Client::findOrFail($cl->clientId);
                $ready->readyForPickUp = 'yes';
                $ready->save();
            }
        }
       
        $client = Client::where('readyForPickUp','yes')->paginate(15);

        return view('secretary-file.add-secretary', ['status'=>$client]);
    }

    protected function paid($clientId){

        $client = Client::findOrFail($clientId);
        if($client->paid == "no"){
            $client->paid = "yes";
            if($client->save()){
                $client = Client::where('readyForPickUp','yes')->paginate(15);

                return view('secretary-file.add-secretary', ['status'=>$client]);
            }
        }
        else{
            $client->paid = "no";
            if($client->save()){
                $client = Client::where('readyForPickUp','yes')->paginate(15);

                return view('secretary-file.add-secretary', ['status'=>$client]);
            }
        }

    }

    protected function send($clientId){

        $client = Client::findOrFail($clientId);
        $client->notify(new ReadyForPickUp($client));
        return view('secretary-file.add-secretary', ['status'=>$client]);

    }

    protected function addClient(Request $request)
    {
        // VALIDATION
        $validator = Validator::make($request->all(), [
            'nameOfPerson' => 'required|string|max:255|min:4',
            'nameOfEntity' => 'nullable|string|max:255',
            'address' => 'required|string|max:50',
            'contactNumber' => 'string|numeric',
            'faxNumber' => 'nullable|string|numeric',
            'emailAddress' => 'nullable|string|max:50|email',
            'discount'=> 'nullable|numeric|max:100|min:0',
         
        ]);
        // VALIDATION CHECKS
        if ($validator->fails()) {
            return redirect('secretary-file.create-secretary')
                        ->withErrors($validator)
                        ->withInput();
        }

        //ELOQUENT INSERT
        $client = new Client;
        $client->nameOfPerson = trim($request->nameOfPerson);
        $client->nameOfEntity = trim($request->nameOfEntity);
        $client->address =  trim($request->address);
        $client->contactNumber = trim($request->contactNumber);
        $client->faxNumber = trim($request->faxNumber);
        $client->emailAddress = trim($request->emailAddress);
        if($request->discount == NULL){
            $client->discount = 0;
        }
        else {
            $client->discount = trim($request->discount);
        }
        if($request->deposit == NULL){
            $client->deposit = 0;
        }
        else {
            $client->deposit = trim($request->deposit);
        }
        $client->reclaimSample = trim($request->reclaimSample);
        $client->followUp= trim($request->dueDate);
        $client->testResult = trim($request->testResult);
        $client->remarks =  trim($request->remarks);    
        $client->managedBy = Auth::user()->employeeName;

       
        $client->save();
        $client->managedDate = new DateTime();
        if (strlen((string)($client->clientId)) == 1) {
            $idOfClient = (string)("000".$client->clientId);
        } elseif (strlen((string)($client->clientId)) == 2) {
            $idOfClient = (string)("00".$client->clientId);
        } elseif (strlen((string)($client->clientId)) == 3) {
            $idOfClient = (string)("0".$client->clientId);
        } else {
            $idOfClient = (string)$client->clientId;
        }
        $client->risNumber = date("Y", strtotime($client->created_at)) . '-' . $idOfClient;
        $client->save();
        

        // INSERT TRANSACTION
        $transaction = new Transaction;
        $transaction->client = $client->clientId;
        $transaction->approvedBy = Auth::user()->employeeId;
        $transaction->managedBy = Auth::user()->employeeName;
        $transaction->managedDate = new DateTime();
        //SAVE TO DB && CHECK
        if($transaction->save()){
            $parameter = Parameter::all();
            $clientRis = $client->risNumber;
            Session::flash('flash_client_added', 'Client added successfully! Please add the samples of the new client.');
            return view('secretary-file.sample-secretary', ['risNumber' => $client->risNumber, 'parameters' => $parameter]);
        }
        else {
            App::abort(500, 'Error!');
        }
       
        
    }

    protected function  addSample(Request $request){


        // $sample = new Sample;
        // $sample->risNumber = trim($request->clientId);

        {
            // VALIDATION
            $validator = Validator::make($request->all(), [
                'clientId' => 'required',
                'clientsCode' => 'nullable|string|max:255',
                'sampleType' => 'required|string|max:255',
                'sampleCollection' => 'required|string|max:50',
                'samplePreservation' => 'nullable|string|max:50',
                'parameter' => 'required',
                'purposeOfAnalysis' => 'nullable|string|max:50',
                'sampleSource' => 'required|string|max:20',
                'dueDate' => 'required|string|max:50',
            ]);
            //VALIDATION CHECKS
            if ($validator->fails()) {
                return redirect('secretary/form')
                            ->withErrors($validator)
                            ->withInput();
            }
            $client = DB::table('clients')->where('risNumber', $request->clientId)->value('clientId');
            //ELOQUENT INSERT
            $sample = new Sample;
            $sample->risNumber = $client;
            $sample->clientsCode = trim($request->clientsCode);
            $sample->sampleType =  trim($request->sampleType);
            $sample->sampleCollection = $request->sampleCollection;
            $sample->samplePreservation = trim($request->samplePreservation);
            $sample->purposeOfAnalysis = trim($request->purposeOfAnalysis);
            $sample->sampleSource = $request->sampleSource;
            $sample->dueDate = $request->dueDate;
            $sample->managedBy = Auth::user()->employeeName;
            $sample->managedDate = new DateTime();
            $sample->save();
            //INSERT LAB CODE TO SAMPLES
            if (strlen((string)($sample->sampleId)) == 1) {
                $idOfSample = (string)("000".$sample->sampleId);
            } elseif (strlen((string)($sample->sampleId)) == 2) {
                $idOfSample = (string)("00".$sample->sampleId);
            } elseif (strlen((string)($sample->sampleId)) == 3) {
                $idOfSample = (string)("0".$sample->sampleId);
            } else {
                $idOfSample = (string)$sample->sampleId;
            }
            $sample->laboratoryCode = $request->clientId . $idOfSample;
            //INSERT SAMPLE TESTS IN LOOP
            foreach ($request->parameter as $parameter => $analysis) {
                $sampletests = new Sample_Tests;
                $sampletests->sampleCode = $sample->sampleId;
                $sampletests->parameters = DB::table('parameters')->where('analysis', $analysis)->value('parameterId');
                $sampletests->managedBy = Auth::user()->employeeName;
                $sampletests->managedDate = new DateTime();
                $sampletests->save();
            }
            //RETURN TO ADD SAMPLE PAGE TO ADD MORE SAMPLES
            if($sample->save()){
                $params = Parameter::all();
                Session::flash('flash_sample_added', 'Sample added successfully! You can add another sample.');
                return view('secretary-file.sample-secretary', ['risNumber' => $request->clientId, 'parameters' => $params]);
            }
            else {
                App::abort(500, 'Error!');
            }
            
        }
        
    }
    
}