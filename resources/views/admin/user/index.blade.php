@extends('layout.admin')

@section('title', 'Mic Ride - Data Users')

@section('container')
<div id="content" class="flex">
    <!-- ############ Main START-->
    <div>
        <div class="page-hero page-container" id="page-hero">
            <div class="padding d-flex">
                <div class="page-title">
                    <h2 class="text-md text-highlight">Data users</h2><small class="text-muted">All users</small>
                </div>
            </div>
        </div>
        <div class="page-content page-container" id="page-content">
            <div class="padding">
                <div id="invoice-list" data-plugin="invoice">
                    <div class="toolbar">
                        <div class="btn-group">
                            <button class="btn btn-sm btn-icon btn-white sort hide" data-sort="item-title"
                            data-toggle="tooltip" title="Sort"><i class="sorting"></i></button></div>
                            <form class="flex">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <a href="{{ route('admin.users.create') }}" class="avatar ajax w-32"
                                        title="Add Users">
                                        <i data-feather="plus"></i></a>
                                    </div>
                                    <input type="text" class="form-control form-control-theme form-control-sm search"
                                    placeholder="Search" required> <span class="input-group-append"><button
                                        class="btn btn-white no-border btn-sm" type="button"><span
                                        class="d-flex text-muted"><i
                                        data-feather="search"></i></span></button></span>
                                    </div>
                                </form>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-theme table-row v-middle">
                                    <thead>
                                        <tr>
                                            <th class="text-muted sort sortable" data-sort="id"
                                            style="width:40px;text-align:center">No.</th>
                                            <th class="text-muted sort sortable" data-sort="item-company">Images</th>
                                            <th class="text-muted sort sortable" data-sort="item-company">Users</th>
                                    <!-- <th class="text-muted sort sortable" data-sort="item-badge" style="width:60px">
                                    Status</th> -->
                                    <th class="text-muted" style="width:120px">Created</th>
                                    <th style="width:50px"></th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                <?php $i = 1; ?>
                                @foreach($users as $user)
                                <tr class="v-middle" data-id="2">
                                    <td style="min-width:30px;text-align:center"><small
                                        class="text-muted">{{ $i++ }}</small></td>
                                        <td>
                                            <div class="avatar-group"><a href="{{ route('admin.users.show', $user->id) }}"
                                                class="avatar ajax w-32" data-toggle="tooltip"
                                                title="{{ $user['name'] }}"><img src="{{ $user['image'] }}" alt="."></a>
                                            </div>
                                        </td>
                                        <td class="flex"><a href="{{ route('admin.users.show', $user->id) }}"
                                            class="item-company ajax h-1x">{{ $user['name'] }}</a>
                                            <div class="item-mail text-muted h-1x d-none d-sm-block">
                                            {{ $user['email'] }}</div>
                                        </td>
                                    <td><span class="item-badge badge text-uppercase bg-secondary">{{ $user->status['name'] }}</span>
                                   </td>
                                   <td class="no-wrap">
                                    <div class="item-date text-muted text-sm d-none d-md-block">
                                    {{ $user['created_at'] }}</div>
                                </td>
                                <td>
                                    <div class="item-action dropdown"><a href="#" data-toggle="dropdown"
                                        class="text-muted"><i data-feather="more-vertical"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right bg-black" role="menu">
                                            <a class="dropdown-item" href="{{ url('admin/cartlist') }}">See cart
                                            list </a>
                                            <a class="dropdown-item" href="{{ url('admin/shopping') }}">See shopping
                                            list </a>
                                            <a class="dropdown-item" href="{{ route('address.index') }}">See address
                                            list </a><a
                                            href="{{ route('admin.users.edit', $user->id) }}"
                                            class="dropdown-item edit">Edit</a>
                                            <div class="dropdown-divider"></div><a
                                            class="dropdown-item trash"
                                            data-toggle="modal" data-target="#exampleModal{{$user->id}}">Delete users</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="d-flex">
                    <ul class="pagination">
                       {{$users->links("vendor.pagination.bootstrap-4")}}
                   </ul><small class="text-muted py-2 mx-2">Total <span id="count">{{ $count }}</span> items</small>
               </div>
           </div>
       </div>
   </div>
</div><!-- ############ Main END-->
</div><!-- ############ Content END-->

<!-- modal destroy -->
@foreach($users as $user)
<div class="modal fade" id="exampleModal{{$user->id}}" tabindex="-1" role="dialog"
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
                <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}">
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
