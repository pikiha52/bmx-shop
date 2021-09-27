@extends('layout.admin')

@section('title', 'Mic Ride - Category Products')

@section('container')
<div id="content" class="flex">
    <!-- ############ Main START-->
    <div>
        <div class="page-hero page-container" id="page-hero">
            <div class="padding d-flex">
                <div class="page-title">
                    <h2 class="text-md text-highlight">Category Products</h2>
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
                        <form class="flex" method="GET">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <a href="{{ url('admin/product_categorie/create') }}" class="avatar ajax w-32"
                                        title="Add categorys">
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
                                    <th class="text-muted sort sortable" data-sort="item-company">Name Category</th>
                                    <th class="text-muted" style="width:120px">Created</th>
                                    <th style="width:50px"></th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                <?php $i = 1; ?>
                                @forelse ($categories as $category)
                                <tr class="v-middle" data-id="2">
                                    <td style="min-width:30px;text-align:center"><small
                                            class="text-muted">{{ $i++ }}</small></td>
                                    <td>
                                        <div class="avatar-group"><a href="" class="avatar ajax w-32"
                                                data-toggle="tooltip" title="{{ $category['nama_kategorie'] }}"><img
                                                    src="{{ $category['image'] }}" alt="."></a>
                                        </div>
                                    </td>
                                    <td class="no-wrap">
                                        <div class="item-date text-muted text-sm d-none d-md-block">
                                            {{ $category['nama_kategori'] }}</div>
                                    </td>
                                    <td class="no-wrap">
                                        <div class="item-date text-muted text-sm d-none d-md-block">
                                            {{ $category['created_at'] }}</div>
                                    </td>
                                    <td>
                                        <div class="item-action dropdown"><a href="#" data-toggle="dropdown"
                                                class="text-muted"><i data-feather="more-vertical"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right bg-black" role="menu">
                                                <a href="{{ url('admin/product_categorie/edit', $category->id) }}"
                                                    class="dropdown-item edit">Edit</a>
                                                <div class="dropdown-divider"></div><button
                                                    data-toggle="modal" data-target="#exampleModal{{$category->id}}"
                                                    class="dropdown-item trash">Delete category</button>
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

<!-- modal destroy -->
@foreach($categories as $category)
<div class="modal fade" id="exampleModal{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
      <form method="POST" action="{{ url('admin/product_categorie/destroy', $category->id) }}">
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
