@extends('layout.app')

@section('title', 'Mic Ride - News')

@section('container')

<!-- Start Faq Area -->
<br>
<br>
<br><br>
<section class="wn__faq__area bg--white pt--80 pb--60">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div id="accordion" class="wn_accordion" role="tablist">
                        @foreach ($blogs as $blog)
							<div class="card">
								<div class="acc-header" role="tab" id="headingOne">
									<h5>
										<a data-toggle="collapse" href="#collapseOne" role="button" aria-expanded="true"
											aria-controls="collapseOne">{{ $blog->judul }}</a>
									</h5>
								</div>
								<div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne"
									data-parent="#accordion">
									<div class="card-body">Donec mattis finibus elit ut tristique. Nullam tempus nunc
										eget arcu vulputate, eu porttitor tellus commodo. Aliquam erat volutpat. Aliquam
										consectetur lorem eu viverra lobortis. Morbi gravida, nisi id fringilla
										ultricies, elit lorem eleifend lorem</div>
								</div>
							</div>
                        @endforeach
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Faq Area -->

@endsection