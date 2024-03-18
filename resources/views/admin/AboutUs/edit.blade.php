@extends('admin.layouts.master')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
            <form action="{{ url('admin/products/' . $products->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <div class="col-0">
                        <label for="nameInput" class="form-label">Description</label>
                    </div>
                    <div class="col-4">
                        <input type="text" name="description" class=" form-control" id=""
                            placeholder="Enter Description">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-0">
                        <label for="nameInput" class="form-label">Image</label>
                    </div>
                    <div class="col-4">
                        <input type="file" name="file" class=" form-control" id="">
                    </div>
                </div>

                <div class="">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
