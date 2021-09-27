@extends('layout.admin')

@section('title', 'Mic Ride - Info')

@section('container')
<div id="content" class="flex">
    <!-- ############ Main START-->
    <div>
        <div class="page-hero page-container" id="page-hero">
            <div class="padding d-flex">
                <div class="page-title">
                    <h2 class="text-md text-highlight">Info</h2>
                </div>
            </div>
        </div>

        <div class="page-content page-container" id="page-content">
            <div class="padding">
                <div id="invoice-list" data-plugin="invoice">
                    <div class="col-md-8">
                        <form action="{{ route('admin.contact.update', $contact->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="link" class="form-label">Link Maps</label>
                                <input type="text" class="form-control" id="link" name="link" value="{{ old('link', $contact->link) }}"
                                    aria-describedby="imageHelp">
                                @error('link')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $contact->address) }}"
                                    aria-describedby="imageHelp">
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="number" class="form-control" id="phone" name="phone" value="{{ old('phone', $contact->phone) }}"
                                    aria-describedby="imageHelp">
                                @error('phone')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $contact->email) }}"
                                    aria-describedby="imageHelp">
                                @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Info Company</label>
                                <textarea class="form-control" name="info" rows="6"
                                    placeholder="Enter the Info" name="info">{{ old('info', $contact->info) }}</textarea>                                @error('info')
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