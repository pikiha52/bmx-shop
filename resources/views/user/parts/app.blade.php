@extends('layout/app')

@section('title', 'Mic Ride - Parts')

@section('container')

<!-- Start Shop Page -->
<br>
<br>
<br>
<section class="page-shop-sidebar left--sidebar bg--white section-padding--lg">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="row">
					<div class="col-lg-12">
						<div class="shop__list__wrapper d-flex flex-wrap flex-md-nowrap justify-content-between">
							<div class="shop__list nav justify-content-center" role="tablist">
								<a class="nav-item nav-link active" data-toggle="tab" href="#nav-grid" role="tab"><i class="fa fa-th"></i></a>
								<a class="nav-item nav-link" data-toggle="tab" href="#nav-list" role="tab"><i class="fa fa-list"></i></a>
							</div>
							<p>Showing 1–12 of 40 results</p>
							<div class="orderby__wrapper">
							</div>
						</div>
					</div>
				</div>
				<div class="tab__container">
					<div class="shop-grid tab-pane fade show active" id="nav-grid" role="tabpanel">
						<div class="row">
							@foreach( $parts as $part)
							<!-- Start Single Product -->
							<div class="product product__style--3 col-lg-4 col-md-4 col-sm-6 col-12">
								<div class="product__thumb">
									<a class="first__img" href="{{ url('parts/' . $part->slug) }}"><img src="{{ $part->image }}" alt="product image" height="300px"></a>
									<a class="second__img animation1" href="{{ url('parts/' . $part->slug) }}"><img src="{{ $part->image }}" height="300px" alt="product image"></a>
								</div>
								<div class="product__content content--center">
									<h4><a href="{{ url('parts/' . $part->slug) }}">{{ $part->merk }}</a></h4>
									<ul class="prize d-flex">
										<li>Rp {{ number_format($part->price, 0. ) }}</li>
										<li class="old_prize"></li>
									</ul>
									<div class="action">
										<div class="actions_inner">
											<ul class="add_to_links">
												<li><a class="cart" href="{{ url('cart/addCart/'. $part->id) }}"><i class="bi bi-shopping-cart-full"></i></a></li>
												<li><a data-toggle="modal" title="Quick View" class="quickview modal-view detail-link" href="#productmodal{{ $part->id }}"><i class="bi bi-search"></i></a>
												</li>
											</ul>
										</div>
									</div>
									<div class="product__hover--content">
										<ul class="rating d-flex">
											<li class="on"><i class="fa fa-star-o"></i></li>
											<li class="on"><i class="fa fa-star-o"></i></li>
											<li class="on"><i class="fa fa-star-o"></i></li>
											<li><i class="fa fa-star-o"></i></li>
											<li><i class="fa fa-star-o"></i></li>
										</ul>
									</div>
								</div>
							</div>
							<!-- End Single Product -->
							@endforeach
						</div>
						<ul class="wn__pagination">
							<li class="active"><a href="#">1</a></li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">4</a></li>
							<li><a href="#"><i class="zmdi zmdi-chevron-right"></i></a></li>
						</ul>
					</div>
					<div class="shop-grid tab-pane fade" id="nav-list" role="tabpanel">
						<div class="list__view__wrapper">
							@foreach ($parts as $part)
							<?php
							$details = substr($part->details, 0, 300);
							?>

							<!-- Start Single Product -->
							<div class="list__view mb-4">
								<div class="thumb">
									<a class="first__img" href="{{ url('parts/' . $part->id) }}"><img src="{{ $part->image }}" alt="product images" height="300px"></a>
									<a class="second__img animation1" href="{{ url('parts/' . $part->id) }}"><img src="{{ $part->image }}" height="300px" alt="product images"></a>
								</div>
								<div class="content">
									<h2><a href="{{ url('parts/' . $part->id) }}">{{ $part->merk }}</a></h2>
									<ul class="prize__box">
										<li>Rp {{ number_format($part->price, 0. ) }}</li>
									</ul>
									<p>{!!html_entity_decode($details)!!}...</p>
								</div>
							</div>
							<!-- End Single Product -->
							@endforeach
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!--Modal-->
@foreach ($parts as $part)
<?php
$details = substr($part->details, 0, 300);
?>
<div id="quickview-wrapper">
	<!-- Modal -->
	<div class="modal fade" id="productmodal{{ $part->id }}" tabindex="-1" role="dialog">
		<div class="modal-dialog modal__container" role="document">
			<div class="modal-content">
				<div class="modal-header modal__header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
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
										<li class="facebook"><a href="#" class="rss social-icon"><i class="zmdi zmdi-rss"></i></a></li>
										<li class="linkedin"><a href="#" class="linkedin social-icon"><i class="zmdi zmdi-linkedin"></i></a></li>
										<li class="pinterest"><a href="#" class="pinterest social-icon"><i class="zmdi zmdi-pinterest"></i></a></li>
										<li class="tumblr"><a href="#" class="tumblr social-icon"><i class="zmdi zmdi-tumblr"></i></a></li>
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