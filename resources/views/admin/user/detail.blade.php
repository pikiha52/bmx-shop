@extends('layout.admin')

@section('title', 'Mic Ride - Detail Users')

@section('container')


<div id="content" class="flex">
    <!-- ############ Main START-->
    <div>
        <div class="page-hero page-container" id="page-hero">
            <div class="padding d-flex">
                <div class="page-title">
                    <h2 class="text-md text-highlight">Profile</h2><small class="text-muted">Your personal
                        information</small>
                </div>
            </div>
        </div>
        <div class="page-content page-container" id="page-content">
            <div class="padding sr">
                <div class="card">
                    <div class="card-header bg-dark bg-img p-0 no-border" data-stellar-background-ratio="0.1"
                        style="background-image:url(../assets/css/img/b3.jpg)" data-plugin="stellar">
                        <div class="bg-dark-overlay r-2x no-r-b">
                            <div class="d-md-flex">
                                <div class="p-4">
                                    <div class="d-flex"><a href="#"><span class="avatar w-64"><img
                                                    src="{{ $users['image'] }}" alt="."> <i class="on"></i></span></a>
                                        <div class="mx-3">
                                            <h5 class="mt-2">{{ $users['name'] }}</h5>
                                            <div class="text-fade text-sm"><span class="m-r">Senior Industrial
                                                    Designer</span> <small><i class="fa fa-map-marker mr-2"></i>London,
                                                    UK</small>
                                            </div>
                                        </div>
                                    </div>
                                </div><span class="flex"></span>
                                <div class="align-items-center d-flex p-4">
                                    <div class="toolbar">
                                        <a href=" https://wa.me/{{ $users['phone'] }}" class="btn btn-sm btn-icon bg-dark-overlay btn-rounded"><i
                                                data-feather="phone" width="12" height="12" class="text-fade"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-7 col-lg-8">
                        <div class="tab-content">
                            <div class="card">
                                <div class="px-2">
                                    <div class="py-3">
                                        <ul class="nav flex-column">
                                            <li class="nav-item"><a class="nav-link"><span>Califorlia</span></a>
                                            </li>
                                            <li class="nav-item"><a class="nav-link"><span>320-654-123</span></a>
                                            </li>
                                            <li class="nav-item"><a class="nav-link"><span>{{ $users['created_at'] }}</span></a></li>
                                            <li class="nav-item"><a class="nav-link"><span>{{ $users['email'] }}</span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- <div class="px-4 py-4">
                                    <div class="row mb-2">
                                        <div class="col-6"><small class="text-muted">Cell Phone</small>
                                            <div class="my-2">1243 0303 0333</div>
                                        </div>
                                        <div class="col-6"><small class="text-muted">Family Phone</small>
                                            <div class="my-2">+32(0) 3003 234 543</div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-6"><small class="text-muted">Reporter</small>
                                            <div class="my-2">Coch Jose</div>
                                        </div>
                                        <div class="col-6"><small class="text-muted">Manager</small>
                                            <div class="my-2">James Richo</div>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
