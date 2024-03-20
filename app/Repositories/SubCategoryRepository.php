<?php

namespace App\Repositories;


use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Facades\File;
use App\Interfaces\SubCategoryInterface;



class SubCategoryRepository implements SubCategoryInterface
{
    public function all() {
        return SubCategory::paginate( 10 );
    }

    public function store( $request ) {
        // dd( request()->all() );

        $validated = $request->validate( [
            'name' => 'required|unique:categories|max:255',
            'category_id' => 'required '
        ] );

        $subCategory = new SubCategory();

        $imageName = time() . '.' . $request->image->extension();

        $subCategory->name = request()->name;
        $subCategory->category_id = request()->category_id;

        $request->image->move( public_path( 'images' ), $imageName );
        $subCategory->image = $imageName;

        $subCategory->save();
    }

    public function findById( $id ) {
        return SubCategory::findOrFail( $id );
    }

    public function update( $id ) {
        $subCategory = $this->findById( $id );

        $subCategory->name = request()->name;
        $subCategory->category_id = request()->category_id;

        if ( request()->hasFile( 'image' ) ) {

            $newImageName = time() . '.' . request()->image->extension();

            if ( File::exists( public_path( "images/$subCategory->image" ) ) ) {
                File::delete( public_path( "images/$subCategory->image" ) );
            }

            request()->image->move( public_path( 'images' ), $newImageName );
            $subCategory->image = $newImageName;

        } else {
            // $subCategory->image = $subCategory->image;
        }

        $subCategory->update();
    }

    public function destroy( $id ) {
        $subCategory = $this->findById( $id );
        $subCategory->delete();
    }

}

