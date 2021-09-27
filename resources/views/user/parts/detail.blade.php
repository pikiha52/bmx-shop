@extends('layout.app')

@section('title', 'Mic Ride - Details Parts')

@section('container')


<section class="page-shop-sidebar left--sidebar bg--white section-padding--lg">
    <!-- Start main Content -->
    <div class="maincontent bg--white pt--80 pb--55">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-12">
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <div class="d-flex"><span class="w-40 avatar circle gd-success"></span>
                            <div class="mx-3"><strong>{{ $part->merk }},</strong> successfully added to cart.
                            <a href="{{ url('/cart') }}" type="button" class="btn btn-outline-success badge">View Cart</a></div>
                        </div><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                    @endif
                    <div class="wn__single__product">
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <div class="wn__fotorama__wrapper">
                                    <div class="fotorama wn__fotorama__action" data-nav="thumbs">
                                        <a href="1.jpg"><img src="{{ $part['image'] }}" alt=""></a>
                                        <a href="2.jpg"><img src="{{ $part['image2'] }}" alt=""></a>
                                        <a href="3.jpg"><img src="{{ $part['image3'] }}" alt=""></a>
                                        <a href="4.jpg"><img src="{{ $part['image4'] }}" alt=""></a>
                                        <a href="5.jpg"><img src="{{ $part['image5'] }}" alt=""></a>
                                        <a href="5.jpg"><img src="{{ $part['image6'] }}" alt=""></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <form action="{{ url('cart/addToCart') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="product__info__main">
                                        <h1>{{$part->merk}}</h1>
                                        <div class="product-info-stock-sku d-flex">
                                            <p>Availability:<span> In stock</span></p>
                                            <p>CODE:<span> {{$part->code}}</span></p>
                                        </div>
                                        <div class="price-box">
                                            <!-- <span id="total" value></span> -->
                                            <input class="form-control" type="number" id="total" name="total" readonly>
                                            <input type="hidden" name="hrga_satuan" id="harga"
                                                value="{{ $part->price }}">
                                        </div>
                                        <div class="box-tocart d-flex">
                                            <span>Qty</span>
                                            <input id="qty" class="input-text qty" onkeyup="hitung_harga()"
                                                name="qty_cart" min="1" max="{{ $part->qty }}" value="1" title="Qty"
                                                type="number">
                                            <input type="hidden" name="price" id="price" value="{{ $part->price }}">
                                            <input type="hidden" name="weight" id="weight" value="{{ $part->weight }}">
                                            <input type="hidden" name="parts_id" id="parts_id" value="{{ $part->id }}">
                                            <div class="addtocart__actions">
                                                <button class="tocart" type="submit" title="Add to Cart">Add to
                                                    Cart</button>
                                            </div>
                                        </div>
                                        <div class="product-addto-links clearfix">
                                            <a class="wishlist" href="#"></a>
                                            <a class="compare" href="#"></a>
                                            <a class="email" href="#"></a>
                                        </div>
                                    </div>
                            </div>
                            </form>
                        </div>
                    </div>
                    <div class="product__info__detailed">
                        <div class="pro_details_nav nav justify-content-start" role="tablist">
                            <a class="nav-item nav-link active" data-toggle="tab" href="#nav-details"
                                role="tab">Details</a>
                        </div>
                        <div class="tab__container">
                            <!-- Start Single Tab Content -->
                            <div class="pro__tab_label tab-pane fade show active" id="nav-details" role="tabpanel">
                                <div class="description__attribute">
                                    <p>
                                        {!! $part->details !!}
                                    </p>
                                    <p class="font-weight-bold">WEIGHT :</p>
                                    <p>{{ $part->weight }} Kg</p>
                                </div>
                            </div>
                            <!-- Start Single Tab Content -->
                            <div class="pro__tab_label tab-pane fade" id="nav-review" role="tabpanel">
                                <div class="review__attribute">
                                    <div class="review__ratings__type d-flex">
                                        <div class="review-ratings">
                                            <div class="rating-summary d-flex">
                                                <span>Weight</span>
                                            </div>
                                        </div>
                                        <div class="review-content">
                                            <p>{{  $part->weight }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Tab Content -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Related Products -->

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3>RELATED PRODUCTS</h3>
                <div class="tab__container">
                    <div class="shop-grid tab-pane fade show active" id="nav-grid" role="tabpanel">
                        <div class="row">
                            @foreach( $related as $related)
                            <!-- Start Single Product -->
                            <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                                <div class="product">
                                    <div class="product__thumb">
                                        <a class="first__img" href="{{ url('parts/' . $related->slug) }}"><img
                                                src="{{ $related['image'] }}" height="200" width="300"
                                                alt="product image"></a>
                                        <ul class="prize position__right__bottom d-flex">
                                            <li>Rp {{ number_format($related->price, 0. ) }}</li>
                                        </ul>
                                        <div class="action">
                                            <div class="actions_inner">
                                                <ul class="add_to_links">
                                                    <li><a class="cart" href="cart.html"></a></li>
                                                    <li><a class="wishlist" href="wishlist.html"></a></li>
                                                    <li><a class="compare" href="compare.html"></a></li>
                                                    <li><a data-toggle="modal" title="Quick View"
                                                            class="quickview modal-view detail-link"
                                                            href="#productmodal"></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product__content">
                                        <h4><a href="{{ url('parts/' . $part->slug) }}">{{ $related -> merk }}</a></h4>
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
    <!-- End -->
</section>


<script type="text/javascript">
    function hitung_harga() {
        var harga = document.getElementById("harga");
        var qty = document.getElementById("qty");
        var total = document.getElementById("total");
        // console.log(qty.value);
        if (qty.value < 1 || qty.value == '') {
            var count_qty = 1 * parseInt(harga);
            total.value = (parseInt(count_qty));
            console.log(parseInt(count_qty));
        } else {
            var count_qty = parseInt(qty.value) * parseInt(harga.value);
            total.value = count_qty;
            total.value = (parseInt(count_qty));
            console.log(parseInt(count_qty));
        }
    }

</script>


@endsection
