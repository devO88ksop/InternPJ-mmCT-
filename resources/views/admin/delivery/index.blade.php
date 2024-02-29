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

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($deliveries as $delivery)
                            <tr>
                                <td scope="row">{{ $delivery->Order->id }}</td>
                                <td>
                                    {{ $delivery->status }}
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
