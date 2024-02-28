<?php
namespace App\Repositories;

use App\Models\Category;

use App\Interfaces\CategoryInterface;
use Illuminate\Support\Facades\Validator;

class CategoryRepository implements CategoryInterface {
    public function all() {
        return Category::paginate()->all();
    }

    public function store( $request ) {
        $this->CategoryValidation( $request );

        $category = new Category();
        $category->name = request()->name;
        $category->save();
    }

    public function findById( $id ) {
        return Category::findOrFail( $id );

    }

    public function update( $id ) {
        $categories = $this->findById( $id );
        $categories->name = request()->name;
        $categories->update();
    }

    public function destroy( $id ) {
        $categories = $this->findById( $id );
        $categories->delete();
    }

    private function CategoryValidation( $request ) {
        Validator::make( $request->all(), [
            'name' => 'required|unique:categories|max:255',

        ] )->validate();
    }

}
