@extends('layout.admin')

@section('title', 'Mic Ride - Details blogs')

@section('container')
<div id="content" class="flex">
    <!-- ############ Main START-->
    <div>
        <div class="page-hero page-container" id="page-hero">
            <div class="padding d-flex">
                <div class="page-title">
                    <h2 class="text-md text-highlight">Detail Blogs</h2>
                </div>
            </div>
        </div>
        <div class="page-content page-container" id="page-content">
            <div class="padding">
                <div id="invoice-list" data-plugin="invoice">
                    <div class="container">
                        <a href="/" aria-label="Bootstrap">
                            <h1 class="f2">{{ $blog->judul }}</h1>
                        </a>
                    </div>
                    <div class="post">
                        <img src="{{ $blog->image }}" alt="blog images">
                        <p>{!! $blog->isi !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection