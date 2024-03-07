<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\SliderInterface;

class SliderController extends Controller {
    private $slider;

    public function __construct( SliderInterface $sliderInterface ) {
        $this->slider = $sliderInterface;

    }

    public function index() {
        $sliders = $this->slider->all();
        return view( 'admin.sliders.index', compact( 'sliders' ) );
    }

    /**
    * Show the form for creating a new resource.
    */

    public function create() {

        return view( 'admin.sliders.create' );
    }

    /**
    * Store a newly created resource in storage.
    */

    public function store( Request $request ) {
        $this->slider->store( $request );
        return redirect( 'admin/sliders' );
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
        $sliders = $this->slider->findById( $id );
        return view( 'admin.sliders.edit', compact( 'sliders' ) );

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
