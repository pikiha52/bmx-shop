@extends('layout.admin')

@section('title', 'Mic Ride - Welcome!')

@section('container')

<div id="content" class="flex">
    <!-- ############ Main START-->
    <div>
        <div class="page-hero page-container" id="page-hero">
            <div class="padding d-flex">
                <div class="page-title">
                    <h2 class="text-md text-highlight">Dashboard</h2><small class="text-muted">Welcome to dashboard,
                        <strong>{{ session('nama') }}</strong></small>
                    </div>
                </div>
            </div>
            <!-- ############ Content START-->
            <div class="page-content page-container" id="page-content">
                <div class="padding">
                    <div class="row row-sm sr">
                        <div class="col-md-12">
                            <div class="row row-sm">
                                <div class="col-lg-12">
                                    <div class="row row-sm">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row row-sm">
                                                        <div class="col-4"><small class="text-muted">Your
                                                        status</small>
                                                        @if($user->role == 1)
                                                        <div class="mt-2 font-weight-500"><span
                                                            class="text-info"></span>Admin</div> 
                                                        </div>
                                                        @endif
                                                        <div class="col-4"><small class="text-muted">Your
                                                        balance</small>
                                                        <div class="text-highlight mt-2 font-weight-500">$3,500
                                                        </div>
                                                    </div>
                                                    <div class="col-4"><small class="text-muted">Total order's</small>
                                                        <div class="mt-2 font-weight-500">15 Nov</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @endsection