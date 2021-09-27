@extends('layout.admin')

@section('title', 'Mic Ride - Edit blogs')

@section('container')
<div id="content" class="flex">
    <!-- ############ Main START-->
    <div>
        <div class="page-hero page-container" id="page-hero">
            <div class="padding d-flex">
                <div class="page-title">
                    <h2 class="text-md text-highlight">Blogs</h2>
                </div>
            </div>
        </div>
        <div class="page-content page-container" id="page-content">
            <div class="padding">
                <div id="invoice-list" data-plugin="invoice">
                    <div class="col-md-8">
                        <form action="{{ url('admin/blogs/update', $blog->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
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
                            <div class="form-group"><label>Select Category</label><select id="select2-single"
                                    data-plugin="select2" class="form-control" name="category_id">
                                    <optgroup label="Category Blogs">
                                        @foreach ($categories as $category)
                                        @if($blog->category_id == $category->id)
                                        <option value="{{ $category->id }}" selected>{{ $category->name }}
                                        </option>
                                        @else
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endif
                                    </optgroup>
                                    @endforeach
                                </select>
                                @error('category')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="judul" class="form-label">Title</label>
                                <input type="text" class="form-control" id="judul" name="judul" aria-describedby="judul"
                                    placeholder="Enter a title" value="{{ old('judul',$blog->judul) }}">
                                @error('judul')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Contents Blogs</label>
                                <textarea class="form-control" name="isi" rows="6" id="body"
                                    placeholder="Enter the Content" name="isi">{{ old('isi',$blog->isi) }}</textarea>
                                @error('isi')
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
