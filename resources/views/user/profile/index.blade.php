@extends('layout.app')

@section('title', 'Mic Ride - Details Parts')

@section('container')
<link rel="stylesheet" href="{{ url('assets/css/site.min.css')}}">

<section class="wn__checkout__area section-padding--lg bg__white">
	<div class="container">
		<div class="row">
			<div class="container bootstrap snippet">
				<div class="row">
					<div class="col-sm-10 mb-4">
						<h3 class="font-weight-bold">Your Profile</h3>
					</div>
				</div>

				<style>
					body {
						background: rgb(244, 244, 244);
					}

					.emp-profile {
						padding: 3%;
						margin-top: 3%;
						margin-bottom: 3%;
						border-radius: 0.5rem;
						background: #fff;
					}

					.profile-img {
						text-align: center;
					}

					.profile-img img {
						width: 70%;
						height: 100%;
					}

					.profile-img .file {
						position: relative;
						overflow: hidden;
						margin-top: -20%;
						width: 70%;
						border: none;
						border-radius: 0;
						font-size: 15px;
						background: #212529b8;
					}

					.profile-img .file input {
						position: absolute;
						opacity: 0;
						right: 0;
						top: 0;
					}

					.profile-head h5 {
						color: #333;
					}


					.profile-edit-btn {
						border: none;
						border-radius: 1.5rem;
						width: 70%;
						padding: 2%;
						font-weight: 600;
						color: #6c757d;
						cursor: pointer;
					}



					.profile-head .nav-tabs {
						margin-bottom: 5%;
					}

					.profile-head .nav-tabs .nav-link {
						font-weight: 600;
						border: none;
					}

					.profile-head .nav-tabs .nav-link.active {
						border: none;
						border-bottom: 2px solid #0062cc;
					}

					.profile-work {
						padding: 14%;
						margin-top: -15%;
					}

					.profile-work ul {
						list-style: none;
					}

					.profile-tab label {
						font-weight: 600;
					}
				</style>
				<!-- ============================================================== -->
				<!-- wrapper  -->
				<!-- ============================================================== -->
				<div class="container emp-profile">
					<form method="#">
						<div class="row">
							<div class="col-md-3">
								<div class="profile-img">
									<img src="{{ $user->image }}" alt="" />
									<div class="file btn btn-lg btn-primary">
										Change Photo
										<input type="file" name="image" />
									</div>
								</div>
							</div>
							<div class="col-md-9">
								<div class="profile-head">
									<h5>
										{{ $user->name }}
									</h5>
									<ul class="nav nav-tabs" id="myTab" role="tablist">
										<li class="nav-item">
											<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" id="orders-tab" data-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="false">Your Orders</a>
										</li>
									</ul>
								</div>
								<div class="col-md-4">
								</div>
								<div class="col-md-12">
									<div class="tab-content profile-tab" id="myTabContent">
										<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
											<div class="row">
												<div class="col-md-6">
													<label>Name : </label>
												</div>
												<div class="col-md-6">
													<p><input type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}"></p>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<label>Email : </label>
												</div>
												<div class="col-md-6">
													<p><input type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}"></p>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<label>Phone : </label>
												</div>
												<div class="col-md-6">
													<p><input type="number" class="form-control" name="phone" value="{{ old('phone', $user->phone) }}"></p>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<label>Password : </label>
												</div>
												<div class="col-md-6">
													<p><input type="password" class="form-control" name="password" value="{{ old('password', $user->password) }}"></p>
													<div class="col-md-12">
														<input type="submit" class="profile-edit-btn" name="btnAddMore" value="Save" />
													</div>
												</div>
											</div>
										</div>
										<div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
											<table id="table" class="table table-theme v-middle" data-plugin="bootstrapTable" data-toolbar="#toolbar" data-search="true" data-search-align="left" data-show-export="true" data-show-columns="true" data-detail-view="false" data-mobile-responsive="true" data-pagination="true" data-page-list="[10, 25, 50, 100, ALL]">
												<thead>
													<tr>
														<th data-sortable="true" data-field="id">No</th>
														<th data-sortable="true" data-field="owner">Image</th>
														<th data-sortable="true" data-field="project">Brand & Merk</th>
														<th data-field="task"><span class="d-none d-sm-block">Status</span></th>
														<th data-field="finish"><span class="d-none d-sm-block">Date</span></th>
														<th></th>
													</tr>
												</thead>
												<tbody>
													<?php $i = 1; ?>
													@foreach($orders as $order)
													<tr class="" data-id="20">
														<td style="min-width:30px;text-align:center"><small class="text-muted">{{ $i++ }}</small></td>
														<td>
															<div class="avatar-group"><a href="#" class="avatar ajax w-32" data-toggle="tooltip" title="#"><img src="{{ $order->image }}" alt="."></a></div>
														</td>
														<td class="flex"><a href="#" class="item-title text-color">{{ $order->name }}</a>
															<div class="item-except text-muted text-sm h-1x">{{ $order->merk }}</div>
														</td>
														<td>
															@if($order->payment_status == 1)
															<span class="item-amount d-none d-sm-block text-sm"><span class="item-badge badge text-uppercase bg-secondary">PENDING</span></span>
															@elseif($order->payment_status == 2)
															<span class="item-amount d-none d-sm-block text-sm"><span class="item-badge badge text-uppercase bg-success">ALREADY PAID</span></span>
															@elseif($order->payment_status == 3)
															<span class="item-amount d-none d-sm-block text-sm"><span class="item-badge badge text-uppercase bg-warning">EXPIRED</span></span>
															@elseif($order->payment_status == 4)
															<span class="item-amount d-none d-sm-block text-sm"><span class="item-badge badge text-uppercase bg-danger">CANCELLED</span></span>
															@endif
														</td>
														<td><span class="item-amount d-none d-sm-block text-sm [object Object]">{{ date('Y-m-d', strtotime($order->created_at)) }}</span></td>
														<td><span class="item-amount d-none d-sm-block text-sm [object Object]"><a href="{{ url('order/detail/'. $order->id) }}" class="btn btn-info badge" style="color: white;">Detail Orders</a></span></td>
													</tr>
													@endforeach
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
</section>

@endsection