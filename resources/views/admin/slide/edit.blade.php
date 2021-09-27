@extends('layout.admin')

@section('title', 'Mic Ride - Slides')

@section('container')
<div id="content" class="flex">
    <!-- ############ Main START-->
    <div>
        <div class="page-hero page-container" id="page-hero">
            <div class="padding d-flex">
                <div class="page-title">
                    <h2 class="text-md text-highlight">Add Slide</h2>
                </div>
            </div>
        </div>
        <div class="page-content page-container" id="page-content">
            <div class="padding">
                <div id="invoice-list" data-plugin="invoice">
                    <div class="col-md-8">
                        <form action="{{ url('admin/slide/update', $slide->id) }}" method="POST" enctype="multipart/form-data">
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
                            <div class="form-group">
                                <label>Details</label>
                                <textarea class="form-control" name="details" rows="6" id="body"
                                    placeholder="Enter the Content" name="details">{!! $slide->details !!}</textarea>
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
