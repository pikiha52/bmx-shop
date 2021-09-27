@extends('layout.admin')

@section('title', 'Mic Ride - Product Category')

@section('container')
<div id="content" class="flex">
    <!-- ############ Main START-->
    <div>
        <div class="page-hero page-container" id="page-hero">
            <div class="padding d-flex">
                <div class="page-title">
                    <h2 class="text-md text-highlight">Product Category</h2>
                </div>
            </div>
        </div>
        <div class="page-content page-container" id="page-content">
            <div class="padding">
                <div id="invoice-list" data-plugin="invoice">
                    <div class="col-md-8">
                        <form action="{{ url('admin/product_categorie/store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                                <label for="image" class="form-label">Images</label>
                                <input type="file" class="form-control" name="image" id="image"
                                    aria-describedby="imageHelp">
                                <div id="imageHelp" class="form-text">Images format must be png , jpg , jpeg.
                                </div>
                                @error('image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <label for="nama_kategori" class="form-label">Name Category</label>
                                <input type="text" class="form-control" name="nama_kategori" id="nama_kategori"
                                    aria-describedby="nama_kategori" placeholder="Enter a name category">
                                    @error('nama_kategori')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
