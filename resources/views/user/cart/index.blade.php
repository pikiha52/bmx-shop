@extends('layout.app')

@section('title', 'Mic Ride - Your Carts')

@section('container')

<link rel="stylesheet" href="{{ url('assets/css/site.min.css')}}">

<!-- cart-main-area start -->
<div class="cart-main-area section-padding--lg bg--white">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 ol-lg-12">
                <form action="{{ url('checkOuts') }}" method="POST" id="addcart" enctype="multipart/form-data">
                    @csrf
                    <div class="table-responsive">
                        <table class="table table-theme table-row v-middle">
                            <br>
                            <tbody>
                                @forelse ($carts as $cart)
                                @if ($message = Session::get('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <div class="d-flex"><span class="w-40 avatar circle gd-success"></span>
                                        <div class="mx-3"><strong>{{ $message }},</strong> carts has been updated.</div>
                                    </div><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>
                                @endif
                                <tr class="v-middle" data-id="15">
                                    <td>
                                        <input type="hidden" name="users_id[]" value="{{ $cart->user_id }}">
                                        <input type="hidden" name="carts_id[]" value="{{ $cart->id }}">
                                    </td>
                                    <td>
                                        <div class="avatar-group"><a href="{{ url('parts/' . $cart->slug) }}" class="avatar ajax w-32" data-toggle="tooltip" title="{{ $cart->merk }}"><img src="{{ $cart->image }}" alt="."></a>
                                        </div>
                                    </td>
                                    <td class="flex"><a href="{{ url('parts/' . $cart->slug) }}" class="item-title text-color">{{ $cart->merk }}</a>
                                        <input type="hidden" name="parts_id[]" value="{{ $cart->parts_id }}">
                                    </td>
                                    <td><span class="product-quantity">Rp {{ number_format($cart->price, 0. ) }}</span>
                                        <input type="hidden" name="price" id="price" value="{{ $cart->price }}">
                                    </td>
                                    <td class="product-quantity">
                                        <div class="box-tocart d-flex col-4">
                                            <input class="input-text qty" id="qty" name="qty[]" min="1" value="{{ $cart->qty_cart }}" max="5" title="Qty" type="number" onchange="calculateFunc()">
                                        </div>
                                    </td>
                                    <td><span class="item-amount d-none d-sm-block text-sm" id="total_harga">Rp
                                            {{ number_format($cart->price, 0. ) }}</span>
                                    </td>
                                    <td class="flex"><a href="#" class="item-title text-color"><a href="{{ url('/delete', $cart->id) }}"><span style="color: red;">X</span></a></a>
                                    </td>
                                </tr>
                                @empty
                                <div class="page-content page-container" id="page-content">
                                    <div class="padding">
                                        <div class="text-center">
                                            <div class="block d-inline-flex">
                                                <div class="p-4 p-sm-5"><sup class="text-sm" style="top: -0.5em"></sup><span class="h1"><i class="fa fa-shopping-cart"></i></span>
                                                    <div class="text-muted">Empty Cart</div>
                                                    <div class="py-4"><a href="{{ url('parts') }}" class="btn btn-sm btn-rounded btn-info">Shop</a>
                                                    </div><small class="text-muted">select items to add cart</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="p-5 text-center">Everything you need to make a bike is right here.
                                        </div>
                                    </div>
                                </div>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="text-center p-5">
                                                <h2 class="text-highlight">maybe this is what you are looking for</h2>
                                            </div>
                                            <div class="tab__container">
                                                <div class="shop-grid tab-pane fade show active" id="nav-grid" role="tabpanel">
                                                    <div class="row">
                                                        @foreach( $related as $related)
                                                        <!-- Start Single Product -->
                                                        <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                                                            <div class="product">
                                                                <div class="product__thumb">
                                                                    <a class="first__img" href="{{ url('parts/' . $related->slug) }}"><img src="{{ $related['image'] }}" height="200" width="300" alt="product image"></a>
                                                                    <ul class="prize position__right__bottom d-flex">
                                                                        <li>Rp {{ number_format($related->price, 0. ) }}
                                                                        </li>
                                                                    </ul>
                                                                    <div class="action">
                                                                        <div class="actions_inner">
                                                                            <ul class="add_to_links">
                                                                                <li><a class="cart" href="cart.html"></a></li>
                                                                                <li><a class="wishlist" href="wishlist.html"></a></li>
                                                                                <li><a class="compare" href="compare.html"></a></li>
                                                                                <li><a data-toggle="modal" title="Quick View" class="quickview modal-view detail-link" href="#productmodal"></a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="cartbox__btn">
                        <ul class="cart__btn__list d-flex flex-wrap flex-md-nowrap flex-lg-nowrap justify-content-between">
                            <li>
                                <!-- <a href="#">Coupon Code</a> -->
                            </li>
                            <li>
                                <!-- <a href="#">Apply Code</a> -->
                            </li>
                            <li>
                                <!-- <a href="#">Update Cart</a> -->
                            </li>
                            <li>
                                <button type="submit" class="btn btn-rounded btn-light">Check outs</button>
                            </li>
                        </ul>
                    </div>
            </div>
            </form>
        </div>
        <!-- <div class="row">
            <div class="col-lg-6 offset-lg-6">
                <div class="cartbox__total__area">
                    <div class="cartbox-total d-flex justify-content-between">
                        <ul class="cart__total__list">
                            <li>Sub Total</li>
                        </ul>
                        <ul class="cart__total__tk">
                            <li><input value="Rp {{ number_format($carts->sum('price', 0. )) }}" readonly type="text" id="total" /></li>
                        </ul>
                    </div>
                    <div class="cart__total__amount">
                        <span>Grand Total</span>
                        <span>Rp {{ number_format($carts->sum('price', 0. )) }}</span>
                    </div>
                </div>
            </div>
        </div> -->

    </div>
</div>

<script>
    function calculateFunc() {
        var qty = document.getElementById("qty").value;
        var price = document.getElementById("price").value;
        var calculate = Number(price) * Number(qty);
        var nf = new Intl.NumberFormat();
        nf.format(calculate); // "1,234,567,890"
        document.getElementById("total_harga").innerHTML = 'Rp' + ' ' + nf.format(calculate);;
        // $("#total_harga")
    }
</script>
<!-- cart-main-area end -->

@endsection