<?php
namespace App\Repositories;

use App\Interfaces\AboutUsInterface;
use App\Models\AboutUs;
use App\Models\Ui\Slider;


Class AboutUsRepository implements AboutUsInterface {
    public function all() {
        return AboutUs::paginate( 4);

    }

    public function store( $request ) {
        $imageName = time().'.'.$request->image->extension();

        $aboutus = new AboutUs();
        $aboutus->description = $request->description;

        $request->image->move( public_path( 'images' ), $imageName );
        $aboutus->image = $imageName;
        $aboutus->save();

    }

    // public function findById( $id ) {
    //     return Slider::findOrFail( $id );

    // }

    // public function update( $id ) {
    //     $slider = $this->findById( $id );
    //     $slider->update();

    // }

    // public function destroy( $id )  
    // {
    //     $slider = $this->findById( $id );
    //     $slider->delete();

    // }

}

