@extends('layout.app')

@section('title', 'Mic Ride - Details Parts')

@section('container')

<section class="wn__checkout__area section-padding--lg bg__white">
	<div class="container">
		<form action="{{ route('address.update', $address->id) }}" method="POST" enctype="multipart/form-data">
			@csrf
			@method('PUT')
			<div class="account__form">
				<div class="input__box">
					<label>Name <span></span></label>
					<input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
					value="{{ old('name', $address->name) }}">
					@error('name')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>
				<div class="input__box">
					<label>Phone <span>*</span></label>
					<input type="number" class="form-control @error('phone') is-invalid @enderror" name="phone"
					value="{{ old('phone', $address->phone) }}" value="">
					@error('phone')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>
				<div class="input__box"><label>Province</label>
					<div><select id="select2-single"
						data-plugin="select2" class="form-control" name="provinsi">
						<option value="">Select Province</option>
						<option value="DKI Jakarta">DKI Jakarta</option>
						<option value="Jawa Barat">Jawa Barat</option>
						<option value="Jawa Timur">Jawa Timur</option>
					</select></div>
				</div>
				<div class="input__box"><label>City</label>
					<div><select id="select2-single"
						data-plugin="select2" class="form-control" name="kota">
						<option value="">Select City</option>
						<option value="Jakarta Timur">Jakarta Timur</option>
						<option value="Jakarta Barat">Jakarta Barat</option>
						<option value="Jakarta Selatan">Jakarta Selatan</option>
						<option value="Jakarta Utara">Jakarta Utara</option>
						<option value="Depok">Depok</option>
						<option value="Bogor">Bogor</option>
						<option value="Bandung">Bandung</option>
						<option value="Purwakarta">Purwakarta</option>
						<option value="Malang">Malang</option>
						<option value="Magelang">Magelang</option>
					</select></div>
				</div>
				<div class="input__box"><label>Postal zip Code</label>
					<input id="event-desc" type="text" class="form-control" name="zip" value="{{ $address->zip }}">
				</div>
				<div class="input__box">
					<label>Address<span></span></label>
					<textarea id="event-desc" name="detail" class="form-control" rows="6">{{ $address->detail }}</textarea>
				</div>

				<div class="input__box">
					<label>Details Address <small>(optionals)</small></label>
					<input id="event-desc" type="text" class="form-control" name="rincian" value="{{ $address->rincian }}">
				</div>
				<div class="form__btn">
					<button type="submit">Updated</button>
				</div>
			</div>
		</form>
	</div>
</section>

@endsection