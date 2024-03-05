<?php
namespace App\Repositories;

use App\Models\Ui\Slider;
use App\Interfaces\SliderInterface;

Class SliderRepository implements SliderInterface {
    public function all()
    {
        return Slider::paginate(4)->all();

    }

    public function store($request)
    {
        $imageName = time().'.'.$request->image->extension();  

        $slider = new Slider();
        
        $request->image->move(public_path('images'), $imageName);
        $slider->image = $imageName;
        $slider->save();
        
    }

    public function findById($id)
    {
        return Slider::findOrFail($id);

    }

    public function update($id){
        $slider = Slider::findOrFail($id);
        
    }

    
    
}
