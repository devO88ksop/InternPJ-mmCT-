@extends('admin.layouts.master')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
            <form action="{{ url('admin/aboutus/' . $aboutus->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <div class="col-0">
                        <label for="nameInput" class="form-label">Description</label>
                    </div>
                    <div class="col-4">
                        <textarea type="text" name="description" class=" form-control" id="" placeholder="Enter Description"
                            style="width: 400px;
                            height: 350px;
                            padding: 15px;
                            font-family: "Courier
                            New", Courier, monospace; font-size: 16px; border: 3px solid #007bff; border-radius: 8px; background-color: #f4f4f4;
                            color: #333; resize: vertical;"> {{ $aboutus->description }} </textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-0">
                        <label for="nameInput" class="form-label">Image</label>
                    </div>
                    <div class="col-4">
                        <input type="file" name="file" class=" form-control" id=""
                            value="{{ $aboutus->image }}">
                        <img src="{{ asset('images/' . $aboutus->image) }}" class="img-thumbnail shadow-sm rounded mt-3"
                            style="height: 60px">
                    </div>
                </div>

                <div class="">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
