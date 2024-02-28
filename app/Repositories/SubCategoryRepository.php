<?php

namespace App\Repositories;


use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Facades\File;
use App\Interfaces\SubCategoryInterface;



class SubCategoryRepository implements SubCategoryInterface
{
    public function all()
    {
        return SubCategory::paginate(10);
    }
    public function store($request)
    {
        // dd(request()->all());

        $validated = $request->validate([
            'name' => 'required|unique:categories|max:255',
            'category_id' => 'required '
        ]);

        $subcategories = new SubCategory();

        $imageName = time() . '.' . $request->image->extension();

        $subcategories->name = request()->name;
        $subcategories->category_id = request()->category_id;

        $request->image->move(public_path('images'), $imageName);
        $subcategories->image = $imageName;

        $subcategories->save();
    }
    public function findById($id)
    {

        return SubCategory::findOrFail($id);
    }

    public function update($id)
    {

        $subcategories = $this->findById($id);
        $subcategories->name = request()->name;
        $subcategories->category_id = request()->category_id;

        if (request()->hasFile('image')) {

            $imageName = time() . '.' . request()->image->extension();


            if (File::exists(public_path("images/$subcategories->image"))) {

                // File::delete()
                File::delete(public_path("images/$subcategories->image"));
            }

            request()->image->move(public_path('images'), $imageName);

            $subcategories->image = $imageName;
        } else 
        {
            $subcategories->image = $subcategories->image;
        }

        $subcategories->update();
    }
    public function destroy($id)
    {
        $subcategories = $this->findById($id);
        $subcategories->delete();
    }


}
