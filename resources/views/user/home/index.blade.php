@extends('layout/app')

@section('title', 'Mic Ride - Welcome, Build your bike now !')

@section('container')
<!-- Start Search Popup -->
<div class="brown--color box-search-content search_active block-bg close__top">
    <form id="search_mini_form" class="minisearch" action="#">
        <div class="field__search">
            <input type="text" placeholder="Search entire store here...">
            <div class="action">
                <a href="#"><i class="zmdi zmdi-search"></i></a>
            </div>
        </div>
    </form>
    <div class="close__wrap">
        <span>close</span>
    </div>
</div>
<!-- End Search Popup -->
<!-- Start Slider area -->
<div class="slider-area brown__nav slider--15 slide__activation slide__arrow01 owl-carousel owl-theme">
    <!-- Start Single Slide -->
    @foreach ($slides as $slide)
    <div class="slide animation__style10 bg-image--1 align__center--left">
        <img src="{{ $slide->image }}" class="bg-image--1 fullscreen" alt="">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="slider__content">
                        <div class="contentbox">
                            <h2>{!! $slide->details !!}</h2>
                            <a class="shopbtn" href="{{ url('parts') }}">shop now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <!-- End Single Slide -->
</div>
<!-- End Slider area -->
<section class="wn__product__area brown--color pt--80  pb--30">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section__title text-center">
							<h2 class="title__be--2">New <span class="color--theme">Products</span></h2>
						</div>
					</div>
				</div>
				<!-- Start Single Tab Content -->
				<div class="furniture--4 border--round arrows_style owl-carousel owl-theme mt--50">
					<!-- Start Single Product -->
                        @foreach ($parts as $part)
					<div class="product product__style--3">
						<div class="product__thumb mb">
							<a class="first__img" href="{{ url('parts', $part->id) }}"><img src="{{ $part->image }}" height="270px"
									alt="product image"></a>
							<a class="second__img animation1" href="{{ url('parts', $part->slug) }}"><img
									src="{{ $part->image }}" height="270px" alt="product image"></a>
							<div class="hot__box">
								<span class="hot-label">NEW</span>
							</div>
						</div>
						<div class="product__content content--center">
							<h4><a href="{{ url('parts', $part->id) }}">{{ $part->merk }}</a></h4>
							<ul class="prize d-flex">
								<li>Rp {{ number_format($part->price, 0. ) }}</li>
							</ul>
							@guest
							<div class="action">
							 <form action="{{ url('/login') }}" id="guest">
                              @csrf
								<div class="actions_inner">
									<ul class="add_to_links">
										<li><a class="cart" href="cart.html"><i class="bi bi-shopping-bag4"></i></a>
										</li>
										<li><a href="#" onclick="document.getElementById('guest').submit();" ><i class="bi bi-shopping-cart-full"></i>
										</a></li>
										<li><a data-toggle="modal" title="Quick View"
												class="quickview modal-view detail-link" href="#productmodal{{ $part->id }}"><i
													class="bi bi-search"></i></a></li>
									</ul>
								</div>
							</form>
							</div>
							<div class="action">
 							 <form action="{{ url('/addToCart') }}" method="POST" id="addcart" enctype="multipart/form-data">
                              @csrf
								<div class="actions_inner">
									<ul class="add_to_links">
										<li><a class="cart" href="cart.html"><i class="bi bi-shopping-bag4"></i></a>
										</li>
										 <input type="hidden" name="qty" id="qty" value="1">
										 <input type="hidden" name="image" id="image" value="{{ $part->image }}">
                                         <input type="hidden" name="price" id="price" value="{{ $part->price }}">
                                         <input type="hidden" name="weight" id="weight" value="{{ $part->weight }}">
                                         <input type="hidden" name="parts_id" id="parts_id" value="{{ $part->id }}">
                                         <input type="hidden" name="merk" id="merk" value="{{ $part->merk }}">
									<!-- 	<li><button class="wishlist" type="submit"><i
													class="bi bi-shopping-cart-full"></i>
										</button></li> -->
										<li><a href="#" onclick="document.getElementById('addcart').submit();" ><i
													class="bi bi-shopping-cart-full"></i>
										</a></li>
										<li><a data-toggle="modal" title="Quick View"
												class="quickview modal-view detail-link" href="#productmodal{{ $part->id }}"><i
													class="bi bi-search"></i></a></li>
									</ul>
								</div>
							</form>
							</div>
							@endguest
						</div>
					</div>
                        @endforeach
					<!-- Start Single Product -->
				</div>
				<!-- End Single Tab Content -->
			</div>
		</section>

<!-- End Shop Page -->


<!-- Start Recent Post Area -->


<!-- End Recent Post Area -->
@foreach ($parts as $part)
<?php
$details = substr($part->details, 0, 300 );
?>
<div id="quickview-wrapper">
			<!-- Modal -->
			<div class="modal fade" id="productmodal{{ $part->id }}" tabindex="-1" role="dialog">
				<div class="modal-dialog modal__container" role="document">
					<div class="modal-content">
						<div class="modal-header modal__header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
									aria-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body">
							<div class="modal-product">
								<!-- Start product images -->
								<div class="product-images">
									<div class="main-image images">
										<img alt="big images" src="{{ $part->image }}" height="519px">
									</div>
								</div>
								<!-- end product images -->
								<div class="product-info">
									<h1>{{ $part->merk }}</h1>
									<div class="price-box-3">
										<div class="s-price-box">
											<span class="new-price">Rp {{ number_format($part->price, 0. ) }}</span>
										</div>
									</div>
									<div class="quick-desc">
                                    {!!html_entity_decode($details)!!}...
									</div>
									<div class="social-sharing">
										<div class="widget widget_socialsharing_widget">
											<h3 class="widget-title-modal">Share this product</h3>
											<ul class="social__net social__net--2 d-flex justify-content-start">
												<li class="facebook"><a href="#" class="rss social-icon"><i
															class="zmdi zmdi-rss"></i></a></li>
												<li class="linkedin"><a href="#" class="linkedin social-icon"><i
															class="zmdi zmdi-linkedin"></i></a></li>
												<li class="pinterest"><a href="#" class="pinterest social-icon"><i
															class="zmdi zmdi-pinterest"></i></a></li>
												<li class="tumblr"><a href="#" class="tumblr social-icon"><i
															class="zmdi zmdi-tumblr"></i></a></li>
											</ul>
										</div>
									</div>
									<div class="addtocart-btn">
										<a href="#">Add to cart</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
@endforeach
@endsection
