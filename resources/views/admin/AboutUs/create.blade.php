@extends('admin.layouts.master')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
            <form action="{{ url('admin/aboutus') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')

                <div class="row mb-3">
                    <div class="col-0">
                        <label for="nameInput" class="form-label">Description</label>
                    </div>
                    <div class="col-4">
                        <textarea type="text" name="description" class=" form-control @error('description') is-invalid @enderror "
                            id="">  </textarea>
                        @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-0">
                        <label for="nameInput" class="form-label">Image</label>
                    </div>
                    <div class="col-4">
                        <input type="file" name="image" class=" form-control @error('image') is-invalid @enderror "
                            id="">
                        @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>
