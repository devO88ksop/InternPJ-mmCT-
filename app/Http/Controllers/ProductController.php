<?php

namespace App\Http\Controllers;


use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Interfaces\ProductInterface;

class ProductController extends Controller
{
    private $b; 
    public function __construct(ProductInterface $ProductInterface)
    {
        $this->b = $ProductInterface;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subategories= SubCategory::all();

        $products=$this->b->all();
        return view('admin.products.index', compact("products","subategories"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $subcategories= SubCategory::all();
        return view('admin.products.create', compact("subcategories"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->b->store($request);
        return redirect('admin/products');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $subcategories= SubCategory::all();

        $products=$this->b->findById($id);
        return view('admin.products.edit', compact("products" ,"subcategories"));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->b->update($request,$id);
        return redirect('admin/products');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->b->destroy($id);
        return redirect('admin/products');
    }
}
