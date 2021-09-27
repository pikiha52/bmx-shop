@extends('layout.admin')

@section('title', 'Mic Ride - Info')

@section('container')
<div id="content" class="flex">
    <!-- ############ Main START-->
    <div>
        <div class="page-hero page-container" id="page-hero">
            <div class="padding d-flex">
                <div class="page-title">
                    <h2 class="text-md text-highlight">Info</h2>
                </div>
            </div>
        </div>
        <div class="page-content page-container" id="page-content">
            <div class="padding">
            <div class="page-content page-container" id="page-content">
                    <div class="padding">
                        <div class="mb-5">
                            <div class="toolbar">
                                <div class="btn-group"><a href="{{ route('admin.contact.create') }}" class="btn btn-sm btn-icon btn-white"
                                        data-toggle="tooltip" title="Trash" id="btn-trash"><i data-feather="plus"
                                            class="text-muted"></i></a></button></div>
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
                                            <th class="text-muted">Link Maps</th>
                                            <th class="text-muted"><span class="d-none d-sm-block">Address</span></th>
                                            <th class="text-muted"><span class="d-none d-sm-block">Phone</span></th>
                                            <th class="text-muted"><span class="d-none d-sm-block">Email</span></th>
                                            <th class="text-muted"><span class="d-none d-sm-block">Info Company</span></th>
                                            <th style="width:50px"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @forelse ($contacts as $no => $contact)
                                  	<?php
							        $link = substr($contact->link, 0, 50 );
                                    $info = substr($contact->info, 0, 50);
							        ?>
                                        <tr class="v-middle" data-id="15">
                                           <td>{{ ++$no }}</td>
                                            <td><span
                                                    class="item-amount d-none d-sm-block text-sm [object Object]"> {!!html_entity_decode($link)!!}...</span>
                                            </td>
                                            <td><span
                                                    class="item-amount d-none d-sm-block text-sm [object Object]"> {{ $contact->address }}</span>
                                            </td>
                                            <td><span
                                                    class="item-amount d-none d-sm-block text-sm [object Object]"> {{ $contact->phone }}</span>
                                            </td>
                                            <td><span
                                                    class="item-amount d-none d-sm-block text-sm [object Object]"> {{ $contact->email }}</span>
                                            </td>
                                            <td><span
                                                    class="item-amount d-none d-sm-block text-sm [object Object]"> {!!html_entity_decode($info)!!}...</span>
                                            </td>
                                            <td>
                                            <div class="item-action dropdown"><a href="#" data-toggle="dropdown"
                                                class="text-muted"><i data-feather="more-vertical"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right bg-black" role="menu">
                                                <a href="{{ route('admin.contact.edit', $contact->id) }}"
                                                    class="dropdown-item edit">Edit</a>
                                                <div class="dropdown-divider"></div><a
                                                    href="{{  route('admin.contact.destroy', $contact->id) }}"
                                                    class="dropdown-item trash">Delete category</a>
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
@endsection