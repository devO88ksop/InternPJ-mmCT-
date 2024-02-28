@extends('admin.layouts.master')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
            <form action="{{ url('admin/PurchaseOrders') }}" method="POST">
                @csrf
                
                <div class="row mb-3">
                    <div class="col-0">
                        <label for="nameInput" class="form-label">Date</label>
                    </div>
                    <div class="col-4">
                        <input name="date" type="date" class="form-control  @error('date') is-invalid @enderror "
                            id="nameInput" placeholder="Enter Date....">

                        @error('date')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-0">
                        <label for="nameInput"class="form-label"></label>
                    </div>

                    <div class="row mb-3">
                        <div class="col-0">
                            <label for="nameInput" class="form-label">Quantity</label>
                        </div>
                        <div class="col-4">
                            <input name="quantity" type="text"
                                class="form-control @error('quantity') is-invalid @enderror " id="nameInput"
                                placeholder="Enter your quantity">
                            @error('quantity')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-4">
                        <select name="product_id" class="form-control" id="">
                            @foreach ($products as $product)
                                <option value="{{ $product->id }} ">{{ $product->name }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>
