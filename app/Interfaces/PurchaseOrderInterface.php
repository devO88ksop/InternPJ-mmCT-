<?php
namespace App\Interfaces;

use Illuminate\Http\Request;

interface PurchaseOrderInterface {
    public function all();
    public function store($request);    
    public function findById($id);
    public function update(Request $request,$id);
    public function destroy($id);

}

?>