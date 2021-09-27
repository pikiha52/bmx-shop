@extends('layout.admin')

@section('title', 'Mic Ride - Slide')

@section('container')
<div id="content" class="flex">
    <!-- ############ Main START-->
    <div>
        <div class="page-hero page-container" id="page-hero">
            <div class="padding d-flex">
                <div class="page-title">
                    <h2 class="text-md text-highlight">Slide</h2>
                </div>
            </div>
        </div>
        <div class="page-content page-container" id="page-content">
            <div class="padding">
                <div class="page-content page-container" id="page-content">
                    <div class="padding">
                        <div class="mb-5">
                            <div class="toolbar">
                                <div class="btn-group"><a href="{{ url('admin/slide/create') }}"
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
                                            <th class="text-muted">Images Slide</th>
                                            <th class="text-muted"><span class="d-none d-sm-block">Details</span></th>
                                            <th class="text-muted"><span class="d-none d-sm-block">Created</span></th>
                                            <th style="width:50px"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($slides as $no => $slide)
                                        <tr class="v-middle" data-id="15">
                                            <td>{{ ++$no }}</td>
                                            <td>
                                                <div class="avatar-group"><a href="#" class="avatar ajax w-32"
                                                        data-toggle="tooltip" title="Eu"><img src="{{ $slide->image }}"
                                                            alt="."></a></div>
                                            </td>
                                            <td><span class="item-amount d-none d-sm-block text-sm [object Object]"> {!!
                                                    $slide->details !!}</span>
                                            </td>
                                            <td><span class="item-amount d-none d-sm-block text-sm [object Object]">
                                                    {{ $slide->created_at }}</span>
                                            </td>
                                            <td>
                                                <div class="item-action dropdown"><a href="#" data-toggle="dropdown"
                                                        class="text-muted"><i data-feather="more-vertical"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-right bg-black" role="menu">
                                                        <a href="{{ url('admin/slide/edit', $slide->id) }}"
                                                            class="dropdown-item edit">Edit</a>
                                                        <div class="dropdown-divider"></div><button
                                                        data-toggle="modal" data-target="#exampleModal{{$slide->id}}"
                                                         class="dropdown-item trash">Delete</button>
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
                            <div class="d-flex">
                                <ul class="pagination">
                                    <li class="page-item disabled"><a class="page-link" href="#"
                                            aria-label="Previous"><span aria-hidden="true">&laquo;</span> <span
                                                class="sr-only">Previous</span></a></li>
                                    <li class="page-item active"><a class="page-link" href="#">1 <span
                                                class="sr-only">(current)</span></a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                                    <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span
                                                aria-hidden="true">&raquo;</span> <span class="sr-only">Next</span></a>
                                    </li>
                                </ul><small class="text-muted py-2 mx-2">Total <span id="count">15</span> items</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- modal destroy -->
@foreach($slides as $slide)
<div class="modal fade" id="exampleModal{{$slide->id}}" tabindex="-1" role="dialog"
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
                <form method="POST" action="{{ url('admin/slide/destroy', $slide->id) }}">
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
