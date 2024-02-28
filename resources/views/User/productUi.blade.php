@extends('layouts.masterL')
@section('content')
    <!-- brand section -->


    <section class="brand_section" id="brandSection">
        <div class="container">
            <div class="heading_container mt-4">
                <h2>
                    Featured Brands
                </h2>
            </div>


        </div>

        <div class="container">

            {{-- <h3 class="text-danger"> {{ session('soldOut') }}.</h3> --}}

            <div class="brand_container layout_padding2">
                {{-- {{ dd($products[2]->PurchaseOrders) }} --}}



                @foreach ($products as $product)
                    @php
                        $total = 0;
                    @endphp
                    @foreach ($product->PurchaseOrders as $purchaseOrder)
                        @php
                            $total += $purchaseOrder->quantity;
                        @endphp
                    @endforeach
                    <div class="box rounded">

                        <div class="new rounded">
                            <h5>
                                New
                            </h5>

                        </div>

                        <div class="img-box zoom">
                            <img src="{{ asset('images/' . $product->image) }}" style="background: transparent"
                                alt="">
                        </div>
                        <div class="detail-box">
                            <h6 class="price">
                                $ {{ $product->price }}
                            </h6>
                            <h6>
                                {{ $product->name }}
                            </h6>
                        </div>

                        @if ($total > 0)
                            {{-- <form action="{{ url('/ui/buy-now/' . $product->id) }}" method="POST">
                                @csrf

                                <button type="submit" class="btn brand-btn btn-block text-center" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal" data-bs-whatever="@fat" role="button">
                                    Buy Now!

                                </button>
                                
                            </form> --}}

                            <p class="btn-holder">
                                <a href="{{ url("/ui/buynowcart/$product->id") }}"
                                    class="btn brand-btn btn-block text-center" role="button">
                                    BuyNow
                                </a>
                            </p>

                            {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Launch demo modal
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            ...
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}

                            <p class="btn-holder">
                                <a href="{{ url('/ui/add-to-cart/' . $product->id) }}"
                                    class="btn brand-btn btn-block text-center" role="button">Add to cart</a>
                            </p>
                        @else
                            <p class="btn-holder">
                            <p class="btn-holder text-danger"> This Item is Out of Stock! </p>

                        

                            <p class="btn-holder" data-toggle="modal">
                                <a href="{{ url("/ui/preorderCart/$product->id") }}" type="submit"
                                    class="btn brand-btn btn-block text-center" role="button">
                                    Pre-Order !
                                </a>
                            </p>
                     
                            </p>
                        @endif

                        {{-- {{ route('add.to.cart', $product->id) }} --}}
                    </div>
                @endforeach
                <div class="pagination justify-content-space-between mt-2">
                    {{ $products->fragment('brandSection')->links() }}
                </div>

            </div>
            <div class="">
                <a href="{{ route('cart') }}" class="brand-btn">
                    {{-- <button type="button" class="btn brand-btn" data-toggle="dropdown"> --}}
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span
                        class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                    {{-- </button> --}}
                </a>
            </div>
        </div>
    </section>
    <!-- end brand section -->
@endsection
