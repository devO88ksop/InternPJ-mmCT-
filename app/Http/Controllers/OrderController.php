<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Delivery;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use App\Models\PurchaseOrder;

class OrderController extends Controller {
    /**
    * Display a listing of the resource.
    */

    public function index() {
        $orders = Order::where( 'status', 'like', 'Order' )->paginate( 4 );
        return view( 'admin.order.index', compact( 'orders' ) );
    }

    public function preOrder() {

        $orders = Order::where( 'status', 'like', 'PreOrder' )->paginate();
        // dd( $orders );
        return view( 'admin.order.preorder', compact( 'orders' ) );

    }

    public function updateStatus( $id ) {
        $order = Order::findOrfail( $id );
        // dd( $order->OrderDetails );

        $order->order_status = request()->order_status;

        $order->update();

        if ( $order->order_status == 'accept' ) {

            if ( $order->status == 'PreOrder' ) {

            } else {
                foreach ( $order->OrderDetails as $orderDetail ) {
                    $purchaseOrder = PurchaseOrder::where( 'product_id', $orderDetail->product_id )->first();
                    $purchaseOrder->current_quantity -= $orderDetail->quantity;
                    $purchaseOrder->update();

                }
                $delivery = new Delivery();
                $delivery->order_id = $order->id;
                $delivery->status = $order->order_status;
                $delivery->shipping_address = $order->shipping_address;
                $delivery->save();
            }

        }

        return redirect()->back();

    }

    public function updateDelivery( $id ) {
        // dd( request()->status );
        $delivery = Delivery::findOrfail( $id );
        $delivery->status = request()->status;
        $delivery->update();
        return redirect()->back();
    }
    /**
    * Show the form for creating a new resource.
    */

    public function create() {
        //
    }

    /**
    * Store a newly created resource in storage.
    */

    public function store( Request $request ) {
        //
    }

    /**
    * Display the specified resource.
    */

    public function show( string $id ) {
        //
    }

    /**
    * Show the form for editing the specified resource.
    */

    public function edit( string $id ) {
        //
    }

    /**
    * Update the specified resource in storage.
    */

    public function update( Request $request, string $id ) {
        //
    }

    /**
    * Remove the specified resource from storage.
    */

    public function destroy( string $id ) {
        //
    }

}
