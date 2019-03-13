<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sample as Sample;
use App\Item as Item;
use App\Inventory as Inventory;
use App\InventoryList as InventoryList;
use DB;

class AnalystController extends Controller
{  
    /*
        sample to get the sessin id
        
        $session= session()->all();
        $session['id'];
    */
    public function notification(){
        //select * from sample where duedate <= 'currentday+4' ORDER BY duedate;
    	$sampledata = Sample::where('dueDate','<=',date("Y-m-d",strtotime("+4 day")))
    					->orderBy('dueDate')
    					->get();

        //print_r($sampledata);die();
    	return view('analyst.notification',[ 'sampledatas' => $sampledata ]);
    }

    public function inventory(){
    	$itemdata = Item::all();

    	return view('analyst.inventory', [ 'items' => $itemdata ]);
    }

    public function inventoryupdate(Request $request){
    	$input = $request->all();

    	//change empId to session id
    	$inventory = array('usedBy' => 1,'dateOfUse' => date("Y-m-d"));

    	$invresult = Inventory::create($inventory);

    	$input['itemid'] = explode(",",$input['itemid']);
     	$input['borrowqty'] = explode(",",$input['borrowqty']);

    	for($i=0; $i < sizeof($input['itemid']); $i++){
    		if($input['borrowqty'][$i] > 0){
    			$id = $input['itemid'][$i];
    			$item = Item::find($id);
    			$updateresult = Item::find($id)->update(array('quantity' => $item->quantity - $input['borrowqty'][$i]));
    			$invListResult = InventoryList::create(array('inventoryId' => $invresult->inventoryId , 'itemId' => $id, 'qty' => $input['borrowqty'][$i]));
    		}
    	}
		return redirect('/analyst/inventory');	
    }

    public function history(){

        // SELECT inventory_list.qty, inventory.inventoryId, inventory.dateofuse, item.itemType, item.containerType FROM inventory LEFT JOIN inventory_list ON inventory_list.inventoryId=inventory.inventoryId LEFT JOIN item ON item.itemId=inventory_list.itemId WHERE inventory.empId = 1 ORDER BY inventory_list.created_at
    	$history = DB::table('inventory_list')
    		->select('inventory_list.qty', 'inventories.inventoryId' , 'inventories.dateOfUse', 'items.itemType', 'items.containerType')
    		->leftJoin('inventories','inventory_list.inventoryId','=','inventories.inventoryId')
    		->leftJoin('items','items.itemId','=','inventory_list.itemId')
    		->where('inventories.usedBy','=',1) //change to session id
    		->orderBy('inventory_list.created_at')
    		->get();

    	return view('analyst.inventoryhistory', [ 'history' => $history ]);
    }

    public function samplePerStation($id){
    	$sampleperstation = DB::table('samples AS s')
    			->select('st.sampleCode', 's.risNumber', 'p.stationId', 'st.status','st.testId' )
    			->leftJoin('sample__tests AS st','st.sampleCode','=','s.sampleId')
    			->leftJoin('parameters AS p', 'p.parameterId', '=', 'st.parameters')
    			->leftJoin('stations AS sta', 'p.stationId', '=', 'sta.stationid')
    			->where('p.stationId','=', $id)
                ->where(function($query) {
                    $query->where('st.status','=', 'In Progress')
                    ->orwhere('st.status','=', 'Complete');
                })
                ->groupBy('st.sampleCode', 's.risNumber','p.stationId','st.status','st.testId' )
                ->orderBy('st.testId','desc')
                ->distinct()
    			->get();

    	return view('analyst.stationsamples', [ 'stationssample' => $sampleperstation ,'station' => $id]);
    }

    public function sampleDetails($stationid,$id){
    	$sampledetails = DB::table('samples AS s')
    			->select('st.sampleCode','p.method', 's.collectionTime', 'st.status', 'st.timecompleted' )
    			->leftJoin('sample__tests AS st','st.sampleCode','=','s.sampleId')
    			->leftJoin('parameters AS p', 'p.parameterId', '=', 'st.parameters')
    			->where('st.sampleCode','=', $id)
    			->where('p.stationId','=', $stationid)
    			->get();

    	return view('analyst.sampledetails', [ 'details' => $sampledetails ]);
    }

    public function receiveSample($id,Request $request){
        $input = $request->all();

        DB::table('sample__tests AS st')
            ->leftJoin('samples AS s','st.sampleCode','=','s.sampleId')
            ->leftJoin('parameters AS p', 'p.parameterId', '=', 'st.parameters')
            ->where('st.sampleCode','=', $input['scanid'])
            ->where('p.stationId','=', $id)
            ->where('st.status','=', 'New')
            ->update(array('st.status' => 'In Progress'));

        return redirect('/analyst/sample/station/'.$id);
    }

    public function completeSample($id,Request $request){
        $input = $request->all();

        DB::table('sample__tests AS st')
            ->leftJoin('samples AS s','st.sampleCode','=','s.sampleId')
            ->leftJoin('parameters AS p', 'p.parameterId', '=', 'st.parameters')
            ->where('st.sampleCode','=', $input['scanid'])
            ->where('p.stationId','=', $id)
            ->where('st.status','=', 'In Progress')
            ->update(array('st.status' => 'Complete', 'st.timecompleted' => now()));

        return redirect('/analyst/sample/station/'.$id);
    }
}
