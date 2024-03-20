@extends('admin.layouts.master')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
            <form action="{{ url('admin/subcategories/' . $subcategories->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="d-flex justify-content-center">
                    <div class="row">
                        <div class="">
                            <div class="">
                                <label for="nameInput" class="form-label">Name</label>
                            </div>
                            <div class="">
                                <input name="name" type="text" value="{{ $subcategories->name }}"
                                    class="form-control" id="nameInput" placeholder="Enter your name">
                            </div>
                        </div>
                        <div class="">
                            <div class="">
                                <label for="nameInput" class="form-label">Category ID</label>
                            </div>
                            <div class="">
                                <select name="category_id" id="" class="form-control">
                                    @foreach ($categories as $category)
                                        {{-- <option value="{{ $category->id }}">{{ $category->name }}</option> --}}
                                        <option {{ $category->id == $subcategories->category->id ? 'selected' : '' }}
                                            value="{{ $category->id }}">{{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-9">
                                <label for="imageInput" class="form-label">Image</label>
                            </div>
                            <div class="col-lg-12">
                                {{-- {{ dd($products->image) }} --}}
                                <input name="image" value="{{ $subcategories->image }}" type="file"
                                    accept="image/png, image/.jpeg, image/jpg" class="form-control" id="imageInput"
                                    placeholder="Enter your image">
                                <img src="{{ asset('images/' . $subcategories->image) }}"
                                    class="img-thumbnail shadow-sm rounded mt-3" style="height: 60px">
                            </div>
                        </div>
                        <div class="mt">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
