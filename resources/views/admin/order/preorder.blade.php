@extends('admin.layouts.master')
@section('content')
    <div class="main-content overflow-hidden">

        <div class="page-content">
            <div class="container-fluid">

                <table class="table table-success table-striped align-middle table-nowrap mb-0">
                    <thead>
                        <!-- Buttons with Label -->

                        <div class="my-3">
                            <a href="{{ url('ui/product') }}">
                                <button type="button" class="btn btn-primary btn-label waves-effect waves-light"><i
                                        class="ri-user-smile-line label-icon align-middle fs-16 me-2"></i>UI List</button>
                            </a>
                        </div>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Date</th>
                            <th scope="col"> Voucher Number</th>
                            <th scope="col"> Product Name</th>
                            <th scope="col"> Images</th>
                            <th scope="col"> Status</th>
                            <th scope="col">Shipping Address</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td scope="row">{{ $order->id }}</td>
                                <td>{{ $order->date }}</td>

                                <td>
                                    {{ $order->Voucher_no }}
                                </td>
                                <td>
                                    @foreach ($order->OrderDetails as $orderDetail)
                                        {{ $orderDetail->product?->name }} <br>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($order->OrderDetails as $orderDetail)
                                        <img src="{{ asset('images/' . $orderDetail->product?->image) }}" alt=""
                                            style="width: 50px;height: 50px" class="round shadow-sm">
                                    @endforeach
                                </td>
                                <td>
                                    {{ $order->status }}
                                </td>
                                <td class="text-wrap p-2">
                                    @if ($order->order_status == null)
                                        Any action <i class="fa-solid fa-circle-right fa-shake fa-2xl"
                                            style="color: #2eba08;"></i>
                                    @elseif($order->order_status == 'accept')
                                        <div style="width: 6rem; color:#1d0dff">
                                            {{ $order->shipping_address }}
                                        </div>
                                    @elseif($order->order_status == 'reject')
                                        <h6 class="text-danger">Cancel Order</h6>
                                    @endif

                                </td>
                                <td>
                                    <div class="d-flex">
                                        @if ($order->order_status == null)
                                            <form action="{{ url("admin/order/$order->id/update/status") }}" method="POST">
                                                @csrf

                                                <input type="hidden" name="order_status" value="accept">
                                                <h6>Accept</h6>

                                                <button type="submit" class="btn btn-success btn-sm ">
                                                    <i class="fa-solid fa-circle-check fa-xl mx-2"></i>
                                                </button>
                                            </form>
                                            <form action="{{ url("admin/order/$order->id/update/status") }}" method="POST">
                                                @csrf

                                                <h6 class="mx-3">Reject</h6>
                                                <input type="hidden" name="order_status" value="reject">

                                                <button type="submit" class="btn btn-danger btn-sm mx-3">
                                                    <i class="fa-solid fa-circle-xmark fa-xl  mx-2"></i>
                                                </button>
                                            </form>
                                        @elseif($order->order_status == 'accept')
                                            <h6 class="mx-3">Accepted Order</h6>
                                            <i class="fa-solid fa-circle-check fa-xl" style="color: #00d123;"></i>
                                        @elseif($order->order_status == 'reject')
                                            <h6 class="mx-3">Rejected Order</h6>
                                            <i class="fa-solid fa-circle-xmark fa-xl" style="color: #ff0000;"></i>
                                        @endif
                                    </div>
                                </td>
                        @endforeach

                    </tbody>

                </table>

            </div>
            <div class="mt-4">
                {{ $orders }}
            </div>
        </div>
    </div>
@endsection
