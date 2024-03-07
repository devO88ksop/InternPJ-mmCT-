@extends('admin.layouts.master')
@section('content')
    <div class="main-content overflow-hidden">

        <div class="page-content">
            <div class="container-fluid">

                <table class="table table-success table-striped align-middle table-nowrap mb-0">
                    <thead>
                        <!-- Buttons with Label -->
                        <div class="my-3">
                            <a href="{{ url('admin/PurchaseOrders/create') }}">
                                <button type="button" class="btn btn-primary btn-label waves-effect waves-light"><i
                                        class="ri-user-smile-line label-icon align-middle fs-16 me-2"></i> Add</button>
                            </a>
                        </div>
                        <div class="my-3">
                            <a href="{{ url('ui/product') }}">
                                <button type="button" class="btn btn-primary btn-label waves-effect waves-light"><i
                                        class="ri-user-smile-line label-icon align-middle fs-16 me-2"></i>UI List</button>
                            </a>
                        </div>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Date</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Product ID</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($purchaseOrders as $purchaseOrder)
                            <tr>
                                <td scope="row">{{ $purchaseOrder->id }}</td>
                                <td>{{ $purchaseOrder->date }}</td>
                                <td>{{ $purchaseOrder->quantity }}</td>
                                <td>{{ $purchaseOrder->product?->name }} </td>


                                <td>
                                    <div class="hstack gap-3 flex-wrap">
                                        <a href="{{ url('admin/PurchaseOrders/' . $purchaseOrder->id . '/edit') }}"
                                            href="javascript:void(0);" class="link-success fs-15"> <i
                                                class="ri-edit-2-line"></i>
                                        </a>
                                        <div class="remove">
                                            <form action="{{ url('admin/PurchaseOrders/' . $purchaseOrder->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button style="background-color: transparent; border:none;"
                                                    class="link-danger fs-15">
                                                    <i class="ri-delete-bin-line"></i>
                                                </button>

                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-2">
                    {{ $purchaseOrders->links() }}
                </div>

            </div>
        </div>
    </div>
@endsection
