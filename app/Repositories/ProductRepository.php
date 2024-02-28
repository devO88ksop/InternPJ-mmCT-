<?php

namespace App\Repositories;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Interfaces\ProductInterface;


class ProductRepository implements ProductInterface{

    public function all(){
        return Product::paginate(10);
    }
    public function store($request){

     
        $this->productValidationCheck($request);

        $imageName = time().'.'.$request->image->extension();  

        // dd($request->subcategory_id);  
        $product = new Product;
        $product->name = $request->name;
        $product->subcategory_id = $request->subcategory_id;
        $product->price = $request->price;
        $product->description = $request->description;
        // dd($product->subcategory_id);
        // Save the image to the public/images directory
        $request->image->move(public_path('images'), $imageName);
        $product->image = $imageName;
        // dd($product->toArray());
        // dd($request->all());
       
        $product->save();    
    }

    public function findById($id){
        return Product::findOrFail($id);

    } 
    public function update(Request $request,$id){

        $product = $this->findById($id);
        $product->name = $request->name;
        $product->subcategory_id = $request->subcategory_id;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->update();

    }
    public function destroy($id){
        $product = $this->findById($id);
        $product->delete();

    }
    // validation Check 
    
    private function productValidationCheck($request){
       return $request->validate([
            'name'=> 'required',
            'price' => 'required',
            'description' => 'required',
            'image' => 'mimes:jpg,jpeg,png',

       ]);

    }

}