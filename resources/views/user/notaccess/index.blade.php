@extends('layout.app')
@section('title', 'Mic Ride')
@section('container')

<!-- Start Blog Area -->
<section class="page-shop-sidebar left--sidebar bg--white section-padding--lg">
    <div class="page-blog bg--white section-padding--lg blog-sidebar right-sidebar">
        <div class="container">
            <div class="text-center p-5 w-100">
                <h1 class="display-5 my-5">Sorry! You can't access this.</h1>
                <p class="my-5 text-muted h4"><i class="fa fa-exclamation-triangle"></i></p>
                <p>Back to previous <a href="{{ route('back') }}" class="b-b b-white">page</a></p>
            </div>
        </div>
    </div>
</section>

@endsection
