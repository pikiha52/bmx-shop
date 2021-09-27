@extends('layout.app')

@section('title', 'Mic Ride - News')

@section('container')

  <!-- Start Blog Area -->
  <section class="page-shop-sidebar left--sidebar bg--white section-padding--lg">
  <div class="page-blog bg--white section-padding--lg blog-sidebar right-sidebar">
        	<div class="container">
        		<div class="row">
        			<div class="col-lg-12">
        				<div class="blog-page">
        					<div class="page__header">
        						<h2>NEWS</h2>
        					</div>
        					<!-- Start Single Post -->
                            @foreach( $blogs as $blog)
							<?php
							$isi = substr($blog->isi, 0, 298 );
							?>
        					<article class="blog__post d-flex flex-wrap">
        						<div class="thumb">
        							<a href="{{ url('news/' . $blog->slug) }}">
        								<img src="{{ $blog['image'] }}" alt="blog images">
        							</a>
        						</div>
        						<div class="content">
        							<h4><a href="{{ url('news/' . $blog->slug) }}">{{ $blog->judul }}</a></h4>
        							<ul class="post__meta">
        								<li>Posts by : <a href="#">Admin</a></li>
        								<li class="post_separator">/</li>
        								<li>{{ $blog->created_at }}</li>
        							</ul>
        							<p>{!!html_entity_decode($isi)!!}....</p>
        							<div class="blog__btn">
        								<a class="shopbtn" href="{{ url('news/' . $blog->slug) }}">read more</a>
        							</div>
                                </div>
        					</article>
							@endforeach
        					<!-- End Single Post -->
        				</div>
        				<ul class="wn__pagination">
        					<li class="active"><a href="#">1</a></li>
        					<li><a href="#">2</a></li>
        					<li><a href="#">3</a></li>
        					<li><a href="#">4</a></li>
        					<li><a href="#"><i class="zmdi zmdi-chevron-right"></i></a></li>
        				</ul>
        			</div>
        		</div>
        	</div>
        </div>
		<!-- End Blog Area -->
  </section>

@endsection