<?php
namespace App\Interfaces;

interface SubCategoryInterface{
 public function all();
 public function store($request);
 public function findById($id);
 public function update($id);
 public function destroy($id);

}