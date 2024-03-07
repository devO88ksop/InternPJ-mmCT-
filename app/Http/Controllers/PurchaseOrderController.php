<?php

namespace App\Http\Controllers;

use App\Interfaces\PurchaseOrderInterface;
use App\Models\Product;
use Illuminate\Http\Request;

class PurchaseOrderController extends Controller
{
    private $pur; 
    public function __construct(PurchaseOrderInterface $purchaseOrderInterface)
    {
        $this->pur = $purchaseOrderInterface;
    }
    public function index()
    {
        $products = Product::all();
        $purchaseOrders = $this->pur->all();
        return view('admin.purchaseOrders.index',compact('purchaseOrders','products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();
        $purchaseOrders = $this->pur->all();
        return view('admin.purchaseOrders.create',compact('purchaseOrders','products'));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->pur->store($request);
        return redirect('admin/PurchaseOrders');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $products = Product::all();
        $purchaseOrders = $this->pur->findById($id);
        return view('admin.purchaseOrders.edit',compact('purchaseOrders','products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->pur->update($request, $id);
        return redirect('admin/PurchaseOrders');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->pur->destroy($id);
        return redirect('admin/PurchaseOrders');
    }
}
