@extends('layout.admin')

@section('title', 'Mic Ride - Products')

@section('container')
<div id="content" class="flex">
    <!-- ############ Main START-->
    <div>
        <div class="page-hero page-container" id="page-hero">
            <div class="padding d-flex">
                <div class="page-title">
                    <h2 class="text-md text-highlight">Products</h2>
                </div>
            </div>
        </div>
        <div class="page-content page-container" id="page-content">
            <div class="padding">
                <div class="page-content page-container" id="page-content">
                    <div class="padding">
                        <div class="mb-5">
                            <div class="toolbar">
                                <div class="btn-group"><a href="{{ url('admin/product/create') }}"
                                        class="btn btn-sm btn-icon btn-white" data-toggle="tooltip" title="Trash"
                                        id="btn-trash"><i data-feather="plus" class="text-muted"></i></a></button></div>
                                <form class="flex">
                                    <div class="input-group"><input type="text"
                                            class="form-control form-control-theme form-control-sm search"
                                            placeholder="Search" required> <span class="input-group-append"><button
                                                class="btn btn-white no-border btn-sm" type="button"><span
                                                    class="d-flex text-muted"><i
                                                        data-feather="search"></i></span></button></span></div>
                                </form>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-theme table-row v-middle">
                                    <thead>
                                        <tr>
                                            <th class="text-muted">No</th>
                                            <th class="text-muted">Images Product</th>
                                            <th class="text-muted sortable" data-toggle-class="asc">Brand & Merk</th>
                                            <th class="text-muted"><span class="d-none d-sm-block">Price</span></th>
                                            <th class="text-muted"><span class="d-none d-sm-block">Quantity</span></th>
                                            <th class="text-muted"><span class="d-none d-sm-block">Weight</span></th>
                                            <th class="text-muted"><span class="d-none d-sm-block">Created</span></th>
                                            <th style="width:50px"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($parts as $no => $part)
                                        <tr class="v-middle" data-id="15">
                                            <td>{{ ++$no }}</td>
                                            <td>
                                                <div class="avatar-group"><a href="#" class="avatar ajax w-32"
                                                        data-toggle="tooltip" title="Eu"><img src="{{ $part->image }}"
                                                            alt="."></a><a href="#" class="avatar ajax w-32"
                                                        data-toggle="tooltip" title="Eu"><img src="{{ $part->image }}"
                                                            alt="."></a></div>
                                            </td>

                                            <td class="flex"><a href="#" class="item-title text-color">
                                                    {{ $part->name }}</a>
                                                <div class="item-except text-muted text-sm h-1x"> {{ $part->merk }}
                                                </div>
                                            </td>
                                            <td><span class="item-amount d-none d-sm-block text-sm">Rp
                                                    {{ number_format($part->price, 0. ) }}</span></td>
                                            <td><span class="item-amount d-none d-sm-block text-sm [object Object]">
                                                    {{ $part->qty }}</span>
                                            </td>
                                            <td><span class="item-amount d-none d-sm-block text-sm [object Object]">
                                                    {{ $part->weight }}</span>
                                            </td>
                                            <td><span class="item-amount d-none d-sm-block text-sm [object Object]">
                                                    {{ $part->created_at }}</span>
                                            </td>
                                            <td>
                                                <div class="item-action dropdown"><a href="#" data-toggle="dropdown"
                                                        class="text-muted"><i data-feather="more-vertical"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-right bg-black" role="menu">
                                                        <a href="{{ url('admin/product/edit', $part->id) }}"
                                                            class="dropdown-item edit">Edit</a>
                                                        <div class="dropdown-divider"></div><button
                                                            data-toggle="modal" data-target="#exampleModal{{$part->id}}"
                                                            class="dropdown-item trash">Delete parts</button>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                @empty
                                                <div class="alert alert-danger">
                                                    Data Belum Tersedia!
                                                </div>
                                            </td>

                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- modal destroy -->
@foreach($parts as $part)
<div class="modal fade" id="exampleModal{{$part->id}}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Deleted data, can not be restored
            </div>
            <div class="modal-footer">
                <form method="POST" action="{{ url('admin/product/destroy', $part->id) }}">
                    {{ csrf_field() }}
                    {{ method_field('delete') }}
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Yes</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
<!-- end -->

@endsection
