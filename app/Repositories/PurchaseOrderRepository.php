<?php

namespace App\Repositories;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\PurchaseOrder;
use App\Interfaces\PurchaseOrderInterface;

class PurchaseOrderRepository implements PurchaseOrderInterface{

    public function all(){
    return PurchaseOrder::paginate(10);
    }
    public function store($request){

        
        $purchaseOrders = new PurchaseOrder();
        $purchaseOrders->date = $request->date;
        $purchaseOrders->quantity = $request->quantity;
        $purchaseOrders->product_id = $request->product_id;

        // dd($purchaseOrders->toArray());
        $purchaseOrders->save(); 
    }

    public function findById($id){
        return PurchaseOrder::findOrFail($id);

    } 
    public function update(Request $request,$id){

        $purchaseOrders = $this->findById($id);
        $purchaseOrders->date = $request->date;
        $purchaseOrders->quantity = $request->quantity;
        $purchaseOrders->product_id = $request->product_id;

        $purchaseOrders->update();

    }
    public function destroy($id){
        $purchaseOrders = $this->findById($id);
        $purchaseOrders->delete();

    }
    // // validation Check 
    
    // private function productValidationCheck($request){
    //    return $request->validate([
    //         'name'=> 'required',
    //         'price' => 'required',
    //         'description' => 'required',
    //         'image' => 'mimes:jpg,jpeg,png',

    //    ]);

    // }

}