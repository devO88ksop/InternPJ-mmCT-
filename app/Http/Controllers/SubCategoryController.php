<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Interfaces\SubCategoryInterface;
use App\Models\SubCategory;

class SubCategoryController extends Controller
{ 
    private $subC;

    public function __construct(SubCategoryInterface $subcategoryInterface)
    {
        $this->subC=$subcategoryInterface;

    }
    public function index()
    {
        $subcategories = $this->subC->all();
        return view('admin.subcategories.index' ,compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       $categories = Category::all();
        return view('admin.subcategories.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->subC->store($request);
        return redirect('admin/subcategories');
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
        $subcategories = SubCategory::FindorFail($id);
        $categories = Category::all();
        return view('admin.subcategories.edit',compact('subcategories','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $id)
    {
        $this->subC->update($id);
        return redirect('admin/subcategories');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->subC->destroy($id);
        return redirect('admin/subcategories');
    }
}
