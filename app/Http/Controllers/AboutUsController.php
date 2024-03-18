<?php

namespace App\Http\Controllers;

use App\Interfaces\AboutUsInterface;
use Illuminate\Http\Request;

class AboutUsController extends Controller {
    private $aboutus;

    public function __construct( AboutUsInterface $aboutUsInterface ) {
        $this->aboutus = $aboutUsInterface;

    }
    /**
    * Display a listing of the resource.
    */

    public function index() {
        $aboutus = $this->aboutus->all();
        return view( 'admin.AboutUs.index', compact( 'aboutus' ) );
    }

    /**
    * Show the form for creating a new resource.
    */

    public function create() {
        return view( 'admin.AboutUs.create' );
    }

    /**
    * Store a newly created resource in storage.
    */

    public function store( Request $request ) {

        $this->aboutus->store( $request );
        // dd( $request->all() );
        return redirect( 'admin/aboutus' );
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
