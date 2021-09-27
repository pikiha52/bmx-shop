@extends('layout.app')

@section('title', 'Mic Ride - News')

@section('container')

<!-- End Bradcaump area -->
<section class="page-shop-sidebar left--sidebar bg--white section-padding--lg">
    <div class="page-blog-details section-padding--lg bg--white">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-12">
                    <div class="blog-details content">
                        <article class="blog-post-details">
                            <div class="post-thumbnail">
                                <img src="{{ $blog->image }}" alt="blog images">
                            </div>
                            <div class="post_wrapper">
                                <div class="post_header">
                                    <h2>{{ $blog->judul }}</h2>
                                    <ul class="post_author">
                                        <li>Posts by : <a href="#">Admin</a></li>
                                        <li class="post-separator">/</li>
                                        <li>{{ $blog->created_at }}</li>
                                    </ul>
                                </div>
                                <div class="post_content">
                                    <p>{!! $blog->isi !!}</p>
                                </div>

                                <ul class="blog_meta">
                                    <li>Tags:<span>{{ $blog->tag }}</span></li>
                                </ul>
                                <ul class="social__net--4 d-flex justify-content-start">
                                    <li><a href="#"><i class="zmdi zmdi-rss"></i></a></li>
                                    <li><a href="#"><i class="zmdi zmdi-linkedin"></i></a></li>
                                    <li><a href="#"><i class="zmdi zmdi-vimeo"></i></a></li>
                                    <li><a href="#"><i class="zmdi zmdi-tumblr"></i></a></li>
                                    <li><a href="#"><i class="zmdi zmdi-google-plus"></i></a></li>
                                </ul>
                            </div>
                        </article>
                    </div>
                </div>
                        <div class="col-lg-3 col-12 md-mt-40 sm-mt-40">
                            <div class="wn__sidebar">
                                <!-- Start Single Widget -->
                                <aside class="widget search_widget">
                                    <h3 class="widget-title">Search</h3>
                                    <form action="{{ url('search') }}">
									@csrf
                                        <div class="form-input">
                                            <input type="text" placeholder="Search...">
                                            <button><i class="fa fa-search"></i></button>
                                        </div>
                                    </form>
                                </aside>
                                <!-- End Single Widget -->
                                <!-- Start Single Widget -->
                                <aside class="widget recent_widget">
                                    <h3 class="widget-title">Recent</h3>
                                    <div class="recent-posts">
                                        <ul>
										<li>
										@foreach ($blogs as $blog)
											<div class="post-wrapper d-flex">
												<div class="thumb">
													<a href="{{ url('news/'. $blog->slug) }}"><img src="{{ $blog->image }}"
															alt="blog images"></a>
												</div>
												<div class="content">
													<h4><a href="{{ url('news/'. $blog->slug) }}">{{ $blog->judul }}</a></h4>
													<p> {{ $blog->created_at }}</p>
												</div>
											</div>
											@endforeach
										</li>
                                        </ul>
                                    </div>
                                </aside>
                                <!-- End Single Widget -->
                            </div>
                        </div>
            </div>
        </div>
    </div>
</section>

@endsection
