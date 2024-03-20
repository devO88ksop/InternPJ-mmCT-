<?php

namespace App\Http\Controllers\UI;

use session;
use App\Models\Order;
use App\Models\AboutUs;
use App\Models\Product;
use App\Models\Ui\Slider;
use App\Models\SubCategory;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use App\Models\PurchaseOrder;

use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class ProductController extends Controller {
    public function index() {
        $products = Product::paginate( 4 );
        $sliders  = Slider::paginate( 4 );
        $aboutus  = AboutUs::paginate( 1 );
        return view( 'User.productUi', compact( 'products', 'sliders', 'aboutus' ) );
    }

    public function category() {
        $subcategories = SubCategory::all();
        return view( 'User.categoryUi', compact( 'subcategories' ) );
    }

    public function cart() {
        $purchaseOrders = PurchaseOrder::all();
        return view( 'cart', compact( 'purchaseOrders' ) );
    }

    public function addToCart( $id ) {
        $totalQuantity = 0;
        // dd( session( 'cart' ) );
        $product = Product::findOrFail( $id );
        // dd( $product->toArray() );
        $purchaseOrders = PurchaseOrder::where( 'product_id', $id )->get();
        foreach ( $purchaseOrders as $purchaseOrder ) {
            $totalQuantity += $purchaseOrder->quantity;
        }
        if ( $totalQuantity > 0 ) {
            $cart = session()->get( 'cart', [] );

            if ( isset( $cart[ $id ] ) ) {
                $cart[ $id ][ 'quantity' ]++;
            } else {
                $cart[ $id ] = [
                    'name' => $product->name,
                    'quantity' => 1,
                    'price' => $product->price,
                    'image' => $product->image
                ];
            }

            session()->put( 'cart', $cart );
            // dd( session( 'cart' ) );
            $page = request()->query( 'page', 1 );
            return redirect( '/ui/product?page='. $page. '#brandSection' );
        } else {
            return back()->with( [ 'soldOut' => 'Sorry, '. $product->name .' is out of stock' ] );
        }
    }

    public function update( Request $request ) {
        // dd( $request->item_id );
        if ( $request->id && $request->quantity ) {
            // return 'hello world';
            $cart = session()->get( 'cart' );
            // dd( $cart, request()->all() );
            $cart[ $request->id ][ 'quantity' ]++;
            session()->put( 'cart', $cart );
            session()->flash( 'success', 'Cart updated successfully' );
        }
        return redirect()->back();
    }

    public function minusUpdate( Request $request ) {
        // dd( $request->item_id );
        if ( $request->id && $request->quantity ) {
            // return 'hello world';
            $cart = session()->get( 'cart' );
            // dd( $cart, request()->all() );
            $cart[ $request->id ][ 'quantity' ]--;
            session()->put( 'cart', $cart );
            session()->flash( 'success', 'Cart updated successfully' );
        }
        return redirect()->back();
    }

    public function remove( Request $request ) {
        // dd( $request->toArray() );

        if ( $request->id ) {
            $cart = session()->get( 'cart' );
            if ( isset( $cart[ $request->id ] ) ) {
                unset( $cart[ $request->id ] );
                session()->put( 'cart', $cart );
            }
            session()->flash( 'success', 'Product removed successfully' );
        }
        return redirect()->back();
    }

    public function checkout( Request $request ) {

        $value = session()->get( 'cart' );
        // dd( isset( $value ) );

        $date = Carbon::now()->format( 'd-m-Y' );
        $order = new Order();
        $order->date = $date;
        $order->shipping_address = $request->shipping_address;
        $order->shipping_phone = $request->shipping_phone;
        $order->Voucher_no = rand( 1000, 10000 );
        $order->status = 'Order';
        // For status Cart buying

        // dd( $order->toArray(), $value );
        $order->save();

        if ( isset( $value ) ) {
            foreach ( $value as $id => $details ) {
                // dd( $details[ 'price' ] );

                $orderDetails = new OrderDetails();
                $orderDetails->order_id = $order->id;
                $orderDetails->product_id = $id;
                $orderDetails->name = $details[ 'name' ];
                $orderDetails->quantity = $details[ 'quantity' ];
                $orderDetails->image = $details[ 'image' ];
                $orderDetails->price = $details[ 'price' ];
                $orderDetails->total = $details[ 'price' ] * $details[ 'quantity' ];
                $orderDetails->save();
            }
            session()->forget( 'cart' );
            $page = request()->query( 'page', 1 );
            return redirect( '/ui/product?page='. $page. '#brandSection' );
        } else {
            return redirect( '/ui/cart' );
        }
    }
    // For buy Now

    public function buyNow( Request $request, $id ) {
        $totalQuantity = 0 ;
        $purchaseOrders = PurchaseOrder::where( 'product_id', $id )->get();
        foreach ( $purchaseOrders as $purchaseOrder ) {
            $totalQuantity += $purchaseOrder->quantity;
        }
        // dd( $totalQuantity );
        if ( $totalQuantity > 0 ) {
            // dd( 'hello' );

            $date = Carbon::now()->format( 'd-m-Y' );
            $product = Product::findOrFail( $id );
            // dd( $product->toArray() );
            $order = new Order();
            $order->date = $date;
            $order->Voucher_no = rand( 1000, 10000 );
            $order->shipping_address = $request->shipping_address;
            $order->shipping_phone = $request->shipping_phone;

            $order->status = 'Order' ;
            //For status Buy Now
            $order->save();
            // dd( $order->toArray() );
            // dd( $order->toArray() );
            $orderDetails = new OrderDetails();
            $orderDetails->order_id = $order->id;
            $orderDetails->product_id = $product->id;
            $orderDetails->name = $product->name;
            $orderDetails->quantity = 1;
            $orderDetails->image = $product->image;
            $orderDetails->price = $product->price;
            $orderDetails->total = $product->price * $product->quantity;
            $orderDetails->save();
            // dd( $orderDetails->toArray() );

            $page = request()->query( 'page', 1 );
            return redirect( '/ui/product?page='. $page. '#brandSection' );
        } else {
            return back()->with( [ 'soldOut' => 'Sorry, this product is out of stock' ] );

        }

    }

    public function preorder( Request $request, $id ) {
        $date = Carbon::now()->format( 'd-m-Y' );
        $product = Product::findOrFail( $id );
        // dd( $product->toArray() );
        $order = new Order();
        $order->date = $date;
        $order->Voucher_no = rand( 1000, 10000 );
        $order->shipping_address = $request->shipping_address;
        $order->shipping_phone = $request->shipping_phone;

        $order->status = 'PreOrder';
        //For status Buy Now
        $order->save();
        // dd( $order->toArray() );
        // dd( $order->toArray() );
        $orderDetails = new OrderDetails();
        $orderDetails->order_id = $order->id;
        $orderDetails->product_id = $product->id;
        $orderDetails->name = $product->name;
        $orderDetails->quantity = 1;
        $orderDetails->image = $product->image;
        $orderDetails->price = $product->price;
        $orderDetails->total = $product->price * $product->quantity;
        $orderDetails->save();
        // dd( $orderDetails->toArray() );
        $page = request()->query( 'page', 1 );
        return redirect( '/ui/product?page='. $page. '#brandSection' );
    }

    public function buynowcart( $id ) {
        $product = Product::where( 'id', $id )->first();
        //  dd( $product->toArray() );
        return view( 'buyNowCart', compact( 'product' ) );
    }

    public function preorderCart( $id ) {
        $product = Product::where( 'id', $id )->first();
        return view( 'preOrderCart', compact( 'product' ) );

    }

}
