@extends('layout/app')

@section('title', 'Mic Ride - All brands sold here ')

@section('container')
<!-- Main Container -->
<br>
<br>
<br>
<br>
<br>
<br>
<section class="main-container col1-layout bounceInUp animated">
    <div class="main container">
        <div class="container">
            <div class="row">
                    @foreach ($categorie as $bra)
            <div class="col-lg-2 mb-2">
                <div class="col-sm">
                <div class="item"><a href="{{ url('parts/bycategory', $bra->id) }}"><img src="{{ $bra->image }}" alt="images"></a> </div>
                <h6 class="product-name">{{ $bra->nama_kategori }}</h6>
                </div>
            </div>
                    @endforeach
          </div>
        </div>
    </div>
</section>
<!-- Main Container End -->
<br>
<br>
<br>
@endsection