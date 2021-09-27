@extends('layout.admin')

@section('title', 'Mic Ride - Welcome!')

@section('container')

<div id="content" class="flex">
    <!-- ############ Main START-->
    <div>
        <div class="page-hero page-container" id="page-hero">
            <div class="padding d-flex">
                <div class="page-title">
                    <h2 class="text-md text-highlight">Dashboard</h2><small class="text-muted">Welcome aboard,
                        <strong>{{ session('name') }}</strong></small>
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
                                                        @foreach ($user as $usr)
                                                        <div class="mt-2 font-weight-500"><span
                                                            class="text-info"></span>{{ $usr->name }}</div> 
                                                            @endforeach
                                                        </div>
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
                            <div class="col-md-12">
                              <div class="card">
                                <div class="p-3-4">
                                    <div class="d-flex">
                                        <div>
                                            <div>New orders</div><small class="text-muted">
                                                <!-- txt --> </small>
                                            </div><span class="flex"></span>
                                            <div><a href="{{ route('admin.part.index') }}"
                                                class="btn btn-sm btn-white">More</a></div>
                                            </div>
                                        </div>
                                        <table class="table table-theme v-middle m-0">
                                           <thead>
                                            <tr>
                                                <th class="text-muted sort sortable" data-sort="id"
                                                style="width:40px;text-align:center">No.</th>
                                                <th class="text-muted sort sortable" data-sort="item-company">Images
                                                </th>
                                                <th class="text-muted sort sortable" data-sort="item-company">Isi</th>
                                                <th class="text-muted" style="width:120px">Created</th>
                                                <th style="width:50px"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1 ?>
                                            @foreach ($parts as $part)
                                            <tr class="" data-id="17">
                                                <td style="min-width:30px;text-align:center">{{ $i++ }}</td>
                                                <td>
                                                    <div class="avatar-group"><a href="#" class="avatar ajax w-32"
                                                        data-toggle="tooltip" title="Adipiscing"><img
                                                        src="{{ $part->image }}" alt="."></a></div>
                                                    </td>
                                                    <td class="flex"><a href="page.invoice.detail.html"
                                                        class="item-company ajax h-1x">{{ $part->brand }}</a>
                                                        <div class="item-mail text-muted h-1x d-none d-sm-block">
                                                            {{ $part->merk }}</div>
                                                        </td>
                                                        <td><span class="item-amount d-none d-sm-block text-sm">Rp
                                                            {{ number_format($part->price, 0. ) }}</span></td>
                                                            <td>
                                                                <div class="item-action dropdown"><a href="#" data-toggle="dropdown"
                                                                    class="text-muted"><i data-feather="more-vertical"></i></a>
                                                                    <div class="dropdown-menu dropdown-menu-right bg-black"
                                                                    role="menu"><a href="{{ route('admin.part.edit', $part->id) }}" class="dropdown-item edit">Edit</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="row row-sm">
                                    <div class="col-12">
                                        <div class="card pb-3">
                                            <div class="p-3-4">
                                                <div class="d-flex">
                                                    <div>
                                                        <div>New Blogs</div>
                                                    </div><span class="flex"></span>
                                                    <div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="list list-row">
                                                @foreach ($blogs as $blog)
                                                <div class="list-item" data-id="16">
                                                    <div class="avatar-group"><a
                                                        href="{{ route('admin.blog.show', $blog->slug) }}"
                                                        class="avatar ajax w-32" data-toggle="tooltip"
                                                        title="{{ $blog->judul }}"><img src="{{ $blog->image }}"
                                                        alt="."></a></div>
                                                        <div class="flex"><a href="{{ route('admin.blog.show', $blog->slug) }}"
                                                            class="item-title text-color h-1x">{{ $blog->judul }}</a>
                                                            <div class="item-except text-muted text-sm h-1x">
                                                                <!-- details -->
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <div class="item-action dropdown"><a href="#" data-toggle="dropdown"
                                                                class="text-muted"><i data-feather="more-vertical"></i></a>
                                                                <div class="dropdown-menu dropdown-menu-right bg-black" role="menu">
                                                                    <a class="dropdown-item"
                                                                    href="{{ route('admin.blog.show', $blog->slug) }}">See
                                                                    detail
                                                                </a><a href="{{ route('admin.blog.edit', $blog->id) }}" class="dropdown-item edit">Edit</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="card">
                                    <div class="p-3-4">
                                        <div class="d-flex">
                                            <div>
                                                <div>New Products</div><small class="text-muted">
                                                    <!-- txt --> </small>
                                                </div><span class="flex"></span>
                                                <div><a href="{{ route('admin.part.index') }}" class="btn btn-sm btn-white">More</a>
                                                </div>
                                            </div>
                                        </div>
                                        <table class="table table-theme v-middle m-0">
                                            <tbody>
                                                <?php $i = 1 ?>
                                                @foreach ($parts as $part)
                                                <tr class="" data-id="17">
                                                    <td style="min-width:30px;text-align:center">{{ $i++ }}</td>
                                                    <td>
                                                        <div class="avatar-group"><a href="#" class="avatar ajax w-32"
                                                            data-toggle="tooltip" title="Adipiscing"><img
                                                            src="{{ $part->image }}" alt="."></a></div>
                                                        </td>
                                                        <td class="flex"><a href="page.invoice.detail.html"
                                                            class="item-company ajax h-1x">{{ $part->name }}</a>
                                                            <div class="item-mail text-muted h-1x d-none d-sm-block">
                                                                {{ $part->merk }}</div>
                                                            </td>
                                                            <td><span class="item-amount d-none d-sm-block text-sm">Rp
                                                                {{ number_format($part->price, 0. ) }}</span></td>
                                                                <td>
                                                                    <div class="item-action dropdown"><a href="#" data-toggle="dropdown"
                                                                        class="text-muted"><i data-feather="more-vertical"></i></a>
                                                                        <div class="dropdown-menu dropdown-menu-right bg-black" role="menu"><a
                                                                            href="{{ route('admin.part.edit', $part->id) }}" class="dropdown-item edit">Edit</a>
                                                                            <div class="dropdown-divider"></div><a href=""
                                                                            class="dropdown-item trash">Delete item</a>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="col-md-5 d-flex">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @endsection