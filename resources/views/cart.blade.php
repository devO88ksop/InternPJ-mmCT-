@extends('layouts')
@section('content')
    <section class="h-100 gradient-custom">
        <div class="container py-5">
            <div class="row d-flex justify-content-center my-4">
                <div class="col-md-8">
                    <div class="card mb-4">
                        <div class="card-header py-3">
                            @if (session()->has('cart'))
                                <h5 class="mb-0 f">Cart - {{ count(session('cart')) }} items</h5>
                            @else
                                <h5>There is no Add to Cart Item.</h5>
                            @endif
                        </div>

                        <div class="card-body">
                            <!-- Single item -->
                            @php $total = 0 @endphp
                            @if (session('cart'))
                                @foreach (session('cart') as $id => $details)
                                    @php $total += $details['price'] * $details['quantity'] @endphp
                                    <div class="row">


                                        <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                                            <!-- Image -->
                                            <div class="bg-image hover-overlay hover-zoom ripple rounded"
                                                data-mdb-ripple-color="light">
                                                {{-- {{dd($details['image'])}} --}}
                                                <img src="{{ asset('images/' . $details['image']) }}" class="w-100"
                                                    alt="Blue Jeans Jacket" />
                                                <a href="#!">
                                                    <div class="mask" style="background-color: rgba(92, 154, 72, 0.39)">
                                                    </div>
                                                </a>
                                            </div>
                                            <!-- Image -->
                                        </div>

                                        <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                                            <!-- Data -->
                                            <p><strong> {{ $details['name'] }} </strong></p>
                                            <p> asda </p>
                                            {{-- <p>Size: M</p> --}}
                                            {{-- <a href="">

                                                
                                            </a> --}}
                                            <form action="{{ route('remove.from.cart') }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="id" value="{{ $id }}">
                                                <button type="submit" class="btn btn-warning btn-sm me-1 mb-2"
                                                    data-mdb-toggle="tooltip" title="Remove item">
                                                    <i class="fa-regular fa-trash-can"></i> Remove
                                                </button>

                                            </form>
                                            {{-- <a href="#">
                                                <button type="button" class="btn btn-danger btn-sm mb-2"
                                                    data-mdb-toggle="tooltip" title="Move to the wish list">
                                                    <i class="fas fa-heart"></i>
                                                </button>
                                            </a> --}}
                                            <!-- Data -->
                                        </div>

                                        <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                                            <!-- Quantity -->
                                            <div class="d-flex mb-4" style="max-width: 300px">



                                                <form action="{{ url('/ui/minusupdate-cart') }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input type="hidden" name="id" value="{{ $id }}">
                                                    <input type="hidden" name="quantity"
                                                        value="{{ $details['quantity'] }}">
                                                    <button class="btn btn-danger mt-1">
                                                        <i class="fa-solid fa-minus"></i>
                                                    </button>
                                                </form>
                                                <div class="form-outline">
                                                    <input id="quantity" min="0" name="quantity"
                                                        value="{{ $details['quantity'] }}" type="number"
                                                        class="form-control quantity " />
                                                    <label class="form-label" for="quantity">Quantity</label>
                                                </div>

                                                <form action="{{ url('/ui/update-cart') }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input type="hidden" name="id" value="{{ $id }}">
                                                    <input type="hidden" name="quantity"
                                                        value="{{ $details['quantity'] }}">
                                                    <button class="btn btn-primary mt-1">
                                                        <i class="fa-solid fa-plus"></i>
                                                    </button>
                                                </form>
                                            </div>

                                            <p class="text-start text-md-center">
                                                <strong>${{ (int) $details['price'] * $details['quantity'] }} </strong>
                                            </p>

                                        </div>

                                    </div>
                                    <hr class="my-4" />
                                @endforeach
                            @endif
                            <!-- Single item -->
                        </div>

                    </div>

                    <div class="card mb-4 mb-lg-0">
                        <div class="card-body">
                            <p><strong>We accept</strong></p>
                            <img class="me-2" width="45px"
                                src="https://mdbcdn.b-cdn.net/wp-content/plugins/woocommerce-gateway-stripe/assets/images/visa.svg"
                                alt="Visa" />
                            <img class="me-2" width="45px"
                                src="https://mdbcdn.b-cdn.net/wp-content/plugins/woocommerce-gateway-stripe/assets/images/amex.svg"
                                alt="American Express" />
                            <img class="me-2" width="45px"
                                src="https://mdbcdn.b-cdn.net/wp-content/plugins/woocommerce-gateway-stripe/assets/images/mastercard.svg"
                                alt="Mastercard" />
                            <img class="me-2" width="45px"
                                src="https://mdbcdn.b-cdn.net/wp-content/plugins/woocommerce/includes/gateways/paypal/assets/images/paypal.webp"
                                alt="PayPal acceptance mark" />
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-header py-3">
                            <h5 class="mb-0">Summary</h5>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                    Products
                                    @if (session()->has('cart'))
                                        <span> {{ count(session('cart')) }} </span>
                                    @else
                                        <span> 0 </span>
                                    @endif

                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                    Shipping
                                    <span>Visa CARD</span>
                                </li>
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                    <div>
                                        <strong>Total amount</strong>
                                        <strong>
                                            <p class="mb-0">(including VAT)</p>
                                        </strong>
                                    </div>
                                    <span><strong>$ {{ $total }}</strong></span>
                                </li>
                            </ul>

                            <form action="{{ route('checkout.from.cart') }}" method="POST">
                                @csrf
                                <div class="card mb-4 bg-warning">
                                    <div class="card-body">
                                        <p><strong>Expected shipping delivery</strong></p>
                                        <input type="text" class="form-control" placeholder="Enter shipping Address..."
                                            name="shipping_address">
                                        <p class="mt-3"><strong>Shipping Phone Number</strong></p>
                                        <input type="text" class="form-control"
                                            placeholder="Enter shipping Phone Number..." name="shipping_phone">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block">
                                    Go to checkout
                                </button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


{{-- @section('scripts')
    <script type="text/javascript">
        $(".update-cart").change(function(e) {
            e.preventDefault();
            console.log('Here');
            var ele = $(this);

            $.ajax({
                url: '{{ route('update.cart') }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("data-id"),
                    quantity: ele.parents("tr").find(".quantity").val()
                },
                success: function(response) {
                    console.log(response);
                    window.location.reload();
                }
            });
        });

        $(".remove-from-cart").click(function(e) {
            e.preventDefault();

            var ele = $(this);

            if (confirm("Are you sure want to remove?")) {
                $.ajax({
                    url: '{{ route('remove.from.cart') }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.parents("tr").attr("data-id")
                    },
                    success: function(response) {
                        window.location.reload();
                    }
                });
            }
        });
    </script>
@endsection --}}


{{-- <table id="cart" class="table table-hover table-condensed">
    <thead>
        <tr>
            <th style="width:50%">Product</th>
            <th style="width:10%">Price</th>
            <th style="width:8%">Quantity</th>
            <th style="width:22%" class="text-center">Subtotal</th>
            <th style="width:10%"></th>
        </tr>
    </thead>
    <tbody>
        @php $total = 0 @endphp
        @if (session('cart'))
            @foreach (session('cart') as $id => $details) --}}
{{-- {{ dd(gettype($details['price'])) }} --}}

{{-- @php $total += intval($details['price']) * intval($details['quantity']) @endphp
                <tr data-id="{{ $id }}">
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-3 hidden-xs">
                                <img src="{{ asset('images/' . $details['image']) }}"
                                    alt="{{ intval($details['name']) }}" class="img-fluid">
                            </div>
                            <div class="col-sm-9">
                                <h4 class="nomargin">{{ intval($details['name']) }}</h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">${{intval( $details['price'] )}}</td>
                    <td data-th="Quantity">
                        <input type="number" value="{{ intval($details['quantity']) }}"
                            class="form-control quantity update-cart" />
                    </td>
                    <td data-th="Subtotal" class="text-center">${{intval( $details['price']) *intval( $details['quantity'] )}}</td>
                    <td class="actions" data-th="">
                        <button class="btn btn-danger btn-sm remove-from-cart"><i class="fa fa-trash-o"></i></button>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
    <tfoot>
        <tr>
            <td colspan="5" class="text-right">
                <h3><strong>Total ${{ $total }}</strong></h3>
            </td>
        </tr>
        <tr>
            <td colspan="5" class="text-right">
                <a href="{{ url('ui/product') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i>
                    Continue
                    Shopping</a>
                <form action="{{ route('checkout.from.cart') }}" method="POST">
                    @csrf
                    <button class="btn btn-success" type="submit">Checkout</button>
                </form>
            </td>
        </tr>
    </tfoot> --}}
{{-- </table>  --}}
