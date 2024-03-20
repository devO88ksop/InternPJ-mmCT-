<?php
namespace App\Repositories;

use App\Models\AboutUs;
use App\Models\Ui\Slider;
use Illuminate\Http\Request;
use App\Interfaces\AboutUsInterface;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

Class AboutUsRepository implements AboutUsInterface {
    public function all() {
        return AboutUs::paginate( 4 );

    }

    public function store( $request ) {
        $imageName = time().'.'.$request->image->extension();

        $aboutus = new AboutUs();
        $aboutus->description = $request->description;

        $request->image->move( public_path( 'images' ), $imageName );
        $aboutus->image = $imageName;
        $aboutus->save();

    }

    public function findById( $id ) {
        return AboutUs::findOrFail( $id );

    }

    //     public function update( $id ) {
    //     // dd( request()->all() );

    //     $aboutus = AboutUs::findOrFail( $id );
    //     $aboutus->description = request()->description;

    //     if ( request()->hasFile( 'image' ) ) {

    //         $newImageName = time() . '.' . request()->image->extension();

    //         if ( File::exists( public_path( "images/$aboutus->image" ) ) )
    // {
    //             File::delete( public_path( "images/$aboutus->image" ) );
    //         }

    //         request()->image->move( public_path( 'images' ), $newImageName );
    //         $aboutus->image = $newImageName;
    //         } else {
    //             $aboutus->image = $aboutus->newImageName;
    //         }
    //         $aboutus->update();
    // }

    public function update( $id )
 {

        $aboutus = $this->findById( $id );

        $aboutus->description = request()->description;
        if ( request()->hasFile( 'file' ) ) {

            $imageName = time().'.'.request()->file->extension();

            $file_path = public_path( 'images/'. $aboutus->image );
            if ( File::exists( $file_path ) ) {
                File::delete( $file_path );

            }

            request()->file->move( public_path( 'images' ), $imageName );
            // dd( $aboutus->toArray() );

            $aboutus->image = $imageName;
        }
        // dd( Request()->toArray() );

        $aboutus->update();

    }

    public function destroy( $id )  
    {
        $aboutus = $this->findById( $id );
        $aboutus->delete();

    }

}

// if ( $request->hasFile( 'image' ) ) {
//     $newImageName = time() . '.' . $request->image->extension();

//     // Delete previous image if exists
//     if ( File::exists( public_path( "images/{$aboutus->image}" ) ) ) {
//         File::delete( public_path( "images/{$aboutus->image}" ) );
//     }

//     // Store new image
//     $request->image->move( public_path( 'images' ), $newImageName );
//     $aboutus->image = $newImageName;
// }
