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
                            {{-- <th scope="col">Id</th> --}}
                            <th scope="col">Order id</th>
                            <th scope="col">Delivery Status</th>
                            <th scope="col">shipping_address</th>
                            <th scope="col">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($deliveries as $delivery)
                            <tr>
                                <td scope="row">{{ $delivery->Order->id }}</td>
                                <td>
                                    @if ($delivery->status == 'On-going')
                                        <span class="badge bg-success">{{ $delivery->status }}
                                            <i class="fa-solid fa-truck-moving fa-shake fa-lg" style="color: #001405;"></i>
                                        </span>
                                    @elseif ($delivery->status == 'pending')
                                        <span class="badge bg-warning">{{ $delivery->status }}</span>
                                    @else
                                        <span class="badge bg-danger">{{ $delivery->status }}
                                            <i class="fa-solid fa-circle-xmark mx-1" style="color: #000000;"></i>
                                        </span>
                                    @endif


                                </td>
                                <td class="text-wrap p-2">
                                    @if ($delivery->Order->order_status == null)
                                        Any action <i class="fa-solid fa-circle-right fa-shake fa-2xl"
                                            style="color: #2eba08;"></i>
                                    @elseif($delivery->Order->order_status == 'accept')
                                        <div style="width: 6rem; color:#1d0dff">
                                            {{ $delivery->Order->shipping_address }}
                                            <br>
                                            {{ $delivery->Order->shipping_phone }}
                                        </div>
                                    @elseif($delivery->Order->order_status == 'reject')
                                        <h6 class="text-danger">Cancel Order</h6>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex">
                                        @if ($delivery->status == 'pending')
                                            <form action="{{ url("admin/order/$delivery->id/update/delivery") }}"
                                                method="POST">

                                                @csrf
                                                <input type="hidden" name="status" value="On-going">

                                                <h6>Confirm</h6>

                                                <button type="submit" class="btn btn-success btn-sm">
                                                    <i class="fa-solid fa-circle-check fa-xl mx-2"></i>
                                                </button>
                                            </form>
                                            <form action="{{ url("admin/order/$delivery->id/update/delivery") }}"
                                                method="POST">
                                                @csrf

                                                <h6 class="mx-3">Reject</h6>

                                                <input type="hidden" name="status" value="Reject">
                                                <button type="submit" class="btn btn-danger btn-sm mx-3">
                                                    <i class="fa-solid fa-circle-xmark fa-xl  mx-2"></i>
                                                </button>
                                            </form>
                                        @elseif($delivery->status == 'accept')
                                            {{-- <h6 class="mx-3">Accepted Order</h6> --}}
                                            <i class="fa-solid fa-truck fa-lg" style="color: #353be9;"></i>
                                        @elseif($delivery->Order->order_status == 'reject')
                                            {{-- <h6 class="mx-3">Rejected Order</h6> --}}
                                            <i class="fa-solid fa-circle-xmark fa-xl" style="color: #ff0000;"></i>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>

                </table>

            </div>
            <div class="mt-4">
                {{-- {{ $orders }} --}}
            </div>
        </div>
    </div>
@endsection
