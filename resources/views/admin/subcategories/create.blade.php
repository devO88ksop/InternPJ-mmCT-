@extends('admin.layouts.master')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
            <form action="{{ url('admin/subcategories') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="d-flex justify-content-center">
                    <div class="row">
                        <div class="">
                            <div class="">
                                <label for="nameInput" class="form-label">Name</label>
                            </div>
                            <div class="">
                                <input name="name" type="text" class="form-control" id="nameInput"
                                    placeholder="Enter your name">
                            </div>
                        </div>
                        <div class="">
                            <div class="mt-2">
                                <label for="nameInput" class="form-label">Category ID</label>
                            </div>
                            <div class="">
                                <select name="category_id" id="category_id" class="form-control">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="col-lg-9 mt-2">
                                <label for="imageInput" class="form-label">Image</label>
                            </div>
                            <div class="col-9">
                                <input name="image" type="file" accept="image/png, image/.jpeg, image/jpg"
                                    class="form-control" id="imageInput" placeholder="Choose image">
                            </div>
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </div>
                  

                </div>
        </div>
        </form>
    </div>
</div>
</div>
