@extends('layout.admin')

@section('title', 'Mic Ride - Data blogs')

@section('container')
<div id="content" class="flex">
    <!-- ############ Main START-->
    <div>
        <div class="page-hero page-container" id="page-hero">
            <div class="padding d-flex">
                <div class="page-title">
                    <h2 class="text-md text-highlight">Blogs</h2>
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
                        <form class="{{ url('admin/blogs/index') }} flex" method="GET">
                        @csrf
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <a href="{{ url('admin/blogs/create') }}"  class="avatar ajax w-32" title="Add Blogs">
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
                                    <th class="text-muted sort sortable" data-sort="item-company">Isi</th>
                                    <th class="text-muted" style="width:120px">Created</th>
                                    <th style="width:50px"></th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                <?php $i = 1; ?>
                                @forelse ($blogs as $blog)
                                    <?php
                                    $link = substr($blog->isi, 0, 100 );
                                    ?>
                                <tr class="v-middle" data-id="2">
                                    <td style="min-width:30px;text-align:center"><small
                                            class="text-muted">{{ $i++ }}</small></td>
                                    <td>
                                        <div class="avatar-group"><a href="{{ url('admin/blogs/edit', $blog->id) }}" class="avatar ajax w-32"
                                                data-toggle="tooltip" title="{{ $blog->judul }}"><img
                                                    src="{{ $blog->image }}" alt="."></a></div>
                                    </td>
                                    <td class="flex"><a href="{{ url('admin/blogs/show', $blog->slug) }}" class="item-company ajax h-1x">{{ $blog->judul }}</a>
                                        <div class="item-mail text-muted h-1x d-none d-sm-block">
                                            {!!html_entity_decode($blog->isi)!!}...</div>
                                    </td>
                                    <td class="no-wrap">
                                        <div class="item-date text-muted text-sm d-none d-md-block">
                                            {{ $blog->created_at }}</div>
                                    </td>
                                   <td>
                                            <div class="item-action dropdown"><a href="#" data-toggle="dropdown"
                                                class="text-muted"><i data-feather="more-vertical"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right bg-black" role="menu">
                                                <a href="{{ url('admin/blogs/edit', $blog->id) }}"
                                                    class="dropdown-item edit">Edit</a>
                                                <div class="dropdown-divider"></div><a onclick="Delete(this.id)"
                                                            id="{{ $blog->id }}" class="dropdown-item trash">Delete</a>
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



@endsection
