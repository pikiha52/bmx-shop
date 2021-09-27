@extends('layout.admin')

@section('title', 'Mic Ride - Data blogs')

@section('container')
<div id="content" class="flex">
    <!-- ############ Main START-->
    <div>
        <div class="page-hero page-container" id="page-hero">
            <div class="padding d-flex">
                <div class="page-title">
                    <h2 class="text-md text-highlight">Add Products</h2>
                </div>
            </div>
        </div>
        <div class="page-content page-container" id="page-content">
            <div class="padding">
                <div id="invoice-list" data-plugin="invoice">
                    <div class="col-md-8">
                        <form action="{{ url('admin/product/store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group"><label>Select Brand</label><select id="select2-single"
                                data-plugin="select2" class="form-control" name="brand_id">
                                <option value="">--Select--</option>
                                @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endforeach
                            </select></div>
                            <div class="form-group">
                                <label for="merk" class="form-label">Merk</label>
                                <input type="text" class="form-control" id="merk" name="merk"
                                aria-describedby="imageHelp">
                                @error('merk')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div> 
                            <div class="form-group"><label>Select Category</label><select id="select2-single"
                                data-plugin="select2" class="form-control" name="category">
                                <option value="">--Select--</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->nama_kategori }}</option>
                                @endforeach
                            </select></div>
                            <div class="form-group">
                                <label for="image" class="form-label">Images</label>
                                <input type="file" class="form-control" id="image" name="image"
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
                                <label for="price" class="form-label">Price</label>
                                <div class="input-group-append">
                                    <span class="input-group-text">Rp</span>
                                    <input type="text" class="form-control" id="price" name="price"
                                    aria-describedby="imageHelp">
                                    @error('price')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="qty" class="form-label">Quantity</label>
                                <div class="input-group-append">
                                    <input type="number" min="0"  class="form-control" id="qty" name="qty"
                                    aria-describedby="imageHelp">
                                    @error('qty')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="weight" class="form-label">Weight</label>
                                <div class="input-group-append">
                                    <span class="input-group-text">Kg</span>
                                    <input type="text" class="form-control" id="weight" name="weight"
                                    aria-describedby="imageHelp">
                                    @error('weight')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Details Parts</label>
                                <textarea class="form-control" name="details" rows="6" id="body"
                                placeholder="Enter the Content" name="details">{{ old('details') }}</textarea>
                                @error('details')
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
<script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    CKEDITOR.replace('body', {
        filebrowserUploadUrl: "{{route('ckeditor.store', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });

</script>
@endsection
