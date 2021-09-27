@extends('layout.admin')

@section('title', 'Mic Ride - Category Blogs')

@section('container')
<div id="content" class="flex">
    <!-- ############ Main START-->
    <div>
        <div class="page-hero page-container" id="page-hero">
            <div class="padding d-flex">
                <div class="page-title">
                    <h2 class="text-md text-highlight">Category Blogs</h2>
                </div>
            </div>
        </div>

        <div class="page-content page-container" id="page-content">
            <div class="padding">
                <div id="invoice-list" data-plugin="invoice">
                    <div class="toolbar">
                        <div class="btn-group">
                            <button class="btn btn-sm btn-icon btn-white sort hide" data-sort="item-title" data-toggle="tooltip" title="Sort"><i class="sorting"></i></button>
                        </div>
                        <form class="{{ url('admin/category-blogs/index') }} flex" method="GET">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <a href="{{ url('admin/category-blogs/create') }}" class="avatar ajax w-32" title="Add categorys">
                                        <i data-feather="plus"></i></a>
                                </div>
                                <input type="text" class="form-control form-control-theme form-control-sm search" placeholder="Search" required> <span class="input-group-append"><button class="btn btn-white no-border btn-sm" type="button"><span class="d-flex text-muted"><i data-feather="search"></i></span></button></span>
                            </div>
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-theme table-row v-middle">
                            <thead>
                                <tr>
                                    <th class="text-muted">No</th>
                                    <th class="text-muted">Images Category</th>
                                    <th class="text-muted"><span class="d-none d-sm-block">Name</span></th>
                                    <th class="text-muted"><span class="d-none d-sm-block">Created</span></th>
                                    <th style="width:50px"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($categories as $no => $category)
                                <tr class="v-middle" data-id="15">
                                    <td>{{ ++$no }}</td>
                                    <td>
                                        <div class="avatar-group"><a href="#" class="avatar ajax w-32" data-toggle="tooltip" title="Eu"><img src="{{ $category->image }}" alt="."></a></div>
                                    </td>
                                    <td><span class="item-amount d-none d-sm-block text-sm [object Object]"> {{ $category->name }}</span>
                                    </td>
                                    <td><span class="item-amount d-none d-sm-block text-sm [object Object]"> {{ $category->created_at }}</span>
                                    </td>
                                    <td>
                                        <div class="item-action dropdown"><a href="#" data-toggle="dropdown" class="text-muted"><i data-feather="more-vertical"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right bg-black" role="menu">
                                                <a href="{{ url('admin/category-blogs/edit', $category->id) }}" class="dropdown-item edit">Edit</a>
                                                <div class="dropdown-divider"></div><a onclick="Delete(this.id)" id="{{ $category->id }}" class="dropdown-item trash">Delete</a>
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
                            <li class="page-item disabled"><a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span> <span class="sr-only">Previous</span></a></li>
                            <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">4</a></li>
                            <li class="page-item"><a class="page-link" href="#">5</a></li>
                            <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">&raquo;</span> <span class="sr-only">Next</span></a>
                            </li>
                        </ul><small class="text-muted py-2 mx-2">Total <span id="count">15</span> items</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    //ajax delete
    function Delete(id) {
        var id = id;
        var token = $("meta[name='csrf-token']").attr("content");

        swal({
            title: "APAKAH KAMU YAKIN ?",
            text: "INGIN MENGHAPUS DATA INI!",
            icon: "warning",
            buttons: [
                'TIDAK',
                'YA'
            ],
            dangerMode: true,
        }).then(function(isConfirm) {
            if (isConfirm) {

                //ajax delete
                jQuery.ajax({
                    url: "{{ url("
                    admin/category/index ") }}/" + id,
                    data: {
                        "id": id,
                        "_token": token
                    },
                    type: 'DELETE',
                    success: function(response) {
                        if (response.status == "success") {
                            swal({
                                title: 'BERHASIL!',
                                text: 'DATA BERHASIL DIHAPUS!',
                                icon: 'success',
                                timer: 1000,
                                showConfirmButton: false,
                                showCancelButton: false,
                                buttons: false,
                            }).then(function() {
                                location.reload();
                            });
                        } else {
                            swal({
                                title: 'GAGAL!',
                                text: 'DATA GAGAL DIHAPUS!',
                                icon: 'error',
                                timer: 1000,
                                showConfirmButton: false,
                                showCancelButton: false,
                                buttons: false,
                            }).then(function() {
                                location.reload();
                            });
                        }
                    }
                });

            } else {
                return true;
            }
        })
    }
</script>
@endsection