@extends('layout.admin')

@section('title', 'Mic Ride - Brands')

@section('container')
<div id="content" class="flex">
    <!-- ############ Main START-->
    <div>
        <div class="page-hero page-container" id="page-hero">
            <div class="padding d-flex">
                <div class="page-title">
                    <h2 class="text-md text-highlight">Brands</h2>
                </div>
            </div>
        </div>
        <div class="page-content page-container" id="page-content">
            <div class="padding">
                <div class="page-content page-container" id="page-content">
                    <div class="padding">
                        <div class="mb-5">
                            <div class="toolbar">
                                <div class="btn-group"><a href="{{ url('admin/brand/create') }}" class="btn btn-sm btn-icon btn-white" data-toggle="tooltip" title="Add brands" id="btn-trash"><i data-feather="plus" class="text-muted"></i></a></button></div>
                                <form class="flex">
                                    <div class="input-group"><input type="text" class="form-control form-control-theme form-control-sm search" placeholder="Search" required> <span class="input-group-append"><button class="btn btn-white no-border btn-sm" type="button"><span class="d-flex text-muted"><i data-feather="search"></i></span></button></span></div>
                                </form>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-theme table-row v-middle">
                                    <thead>
                                        <tr>
                                            <th class="text-muted">No</th>
                                            <th class="text-muted">Images Brands</th>
                                            <th class="text-muted"><span class="d-none d-sm-block">Name</span></th>
                                            <th class="text-muted"><span class="d-none d-sm-block">Created</span></th>
                                            <th style="width:50px"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($brand as $no => $bra)
                                        <tr class="v-middle" data-id="15">
                                            <td>{{ ++$no }}</td>
                                            <td>
                                                <div class="avatar-group"><a href="#" class="avatar ajax w-32" data-toggle="tooltip" title="Eu"><img src="{{ $bra->image }}" alt="."></a></div>
                                            </td>
                                            <td><span class="item-amount d-none d-sm-block text-sm [object Object]">
                                                    {{ $bra->name }}</span>
                                            </td>
                                            <td><span class="item-amount d-none d-sm-block text-sm [object Object]">
                                                    {{ $bra->created_at }}</span>
                                            </td>
                                            <td>
                                                <div class="item-action dropdown"><a href="#" data-toggle="dropdown" class="text-muted"><i data-feather="more-vertical"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-right bg-black" role="menu">
                                                        <a href="{{ url('admin/brand/edit', $bra->id) }}" class="dropdown-item edit">Edit</a>
                                                        <div class="dropdown-divider"></div>
                                                        <button data-toggle="modal" data-target="#exampleModal{{$bra->id}}" class="dropdown-item trash">Delete category</button>
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
@foreach($brand as $bra)
<div class="modal fade" id="exampleModal{{$bra->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <form method="POST" action="{{ url('admin/brand/destroy', $bra->id) }}">
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