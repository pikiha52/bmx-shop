@extends('layout.admin')

@section('title', 'Mic Ride - Slides')

@section('container')
<div id="content" class="flex">
    <!-- ############ Main START-->
    <div>
        <div class="page-hero page-container" id="page-hero">
            <div class="padding d-flex">
                <div class="page-title">
                    <h2 class="text-md text-highlight">Add Users</h2>
                </div>
            </div>
        </div>
        <div class="page-content page-container" id="page-content">
            <div class="padding">
                <div id="invoice-list" data-plugin="invoice">
                    <div class="col-md-8">
                        <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
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
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                                    aria-describedby="imageHelp">
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="name" class="form-label">Number Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}"
                                    aria-describedby="imageHelp">
                                @error('phone')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group"><label>Select Status</label><select id="select2-single"
                                    data-plugin="select2" class="form-control" name="id_admin">
                                    <option value="">--Select--</option>
                                    @foreach ($status as $stat)
                                    <option value="{{ $stat->id }}">{{ $stat->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ old('email') }}" aria-describedby="imageHelp">
                                @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    value="{{ old('password') }}" aria-describedby="imageHelp"  required autocomplete="new-password">
                                @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password-confirm" class="form-label">Password Confirm</label>
                                <input type="password" class="form-control" id="password-confirm" name="password_confirmation"
                                    value="{{ old('password-confirm') }}" aria-describedby="imageHelp"  required autocomplete="new-password">
                                @error('password-confirmation')
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
