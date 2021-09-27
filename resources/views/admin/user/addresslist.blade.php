@extends('layout.admin')

@section('title', 'Mic Ride - Addres List')

@section('container')   


<!-- ############ Content START-->
<div id="content" class="flex">
    <!-- ############ Main START-->
    <div>
        <div class="page-hero page-container" id="page-hero">
            <div class="padding d-flex">
                <div class="page-title">
                    <h2 class="text-md text-highlight">Addres List</h2><small class="text-muted"></small>
                </div>
                <div class="flex"></div>
            </div>
        </div>
        <div class="page-content page-container" id="page-content">
            <div class="padding">
                <div id="toolbar"></div>
                <table id="table" class="table table-theme v-middle" data-plugin="bootstrapTable"
                data-toolbar="#toolbar" data-search="true" data-search-align="left" data-show-export="true"
                data-show-columns="true" data-detail-view="false" data-mobile-responsive="true"
                data-pagination="true" data-page-list="[10, 25, 50, 100, ALL]">
                <thead>
                    <tr>
                        <th data-sortable="true" data-field="id">No</th>
                        <th data-sortable="true" data-field="owner">Name</th>
                        <th data-sortable="true" data-field="project">Phone</th>
                        <th data-sortable="true" data-field="project">Province</th>
                        <th data-sortable="true" data-field="project">City</th>
                        <th data-sortable="true" data-field="project">Address</th>
                        <th data-sortable="true" data-field="project">Details</th>                    
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    @forelse ($address as $addres)
                    <tr class="" data-id="20">
                        <td style="min-width:30px;text-align:center"><small
                            class="text-muted">{{ $i++ }}</small></td>
                            <td class="flex">{{ $addres->name }}</td>
                            <td class="flex">{{ $addres->phone }}</td>
                            <td class="flex">{{ $addres->provinsi }}</td>
                            <td class="flex">{{ $addres->kota }}</td>
                            <td class="flex">{{ $addres->detail }}</td>
                            <td class="flex">{{ $addres->rincian }}</td>
                            <td>
                                <div class="item-action dropdown"><a href="#" data-toggle="dropdown"
                                    class="text-muted"><i data-feather="more-vertical"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right bg-black" role="menu"><a href="{{ route('address.edit', $addres->id) }}" 
                                        class="dropdown-item edit">Edit</a>
                                        <div class="dropdown-divider"></div><a data-toggle="modal"
                                        data-target="#editModal{{ $addres->id }}" data-toggle-class="up"
                                        data-toggle-class-target=".animate"
                                        class="dropdown-item trash">Delete item</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <div class="d-flex"><span class="w-40 avatar circle gd-success"></span>
                                <div class="mx-3"><strong>Address,</strong>is still empty</div>
                            </div><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                            </div>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- ############ Main END-->
    </div><!-- ############ Content END-->

                                    <!-- modal edit -->
                                    @foreach ($address as $address)
                                <div id="editModal{{ $addres->id }}" class="modal fade" data-backdrop="true">
                                    <div class="modal-dialog">
                                        <div class="col-12">
                                            <div class="modal-content box-shadow mb-4">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit Address</h5><button class="close"
                                                    data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body p-4">
                                                    <form action="{{ route('address.update', $address->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="form-group row"><label
                                                            class="col-sm-3 col-form-label">Name</label>
                                                            <div class="col-sm-9"><input id="name" name="name" type="text"
                                                                class="form-control" value="{{ $address->name }}">
                                                                <input id="user_id" name="user_id" type="hidden"
                                                                class="form-control" value="{{ $address->user_id }}"></div>
                                                            </div>
                                                            <div class="form-group row"><label
                                                                class="col-sm-3 col-form-label">Number Phone</label>
                                                                <div class="col-sm-9"><input id="phone" name="phone" type="number"
                                                                    class="form-control" value="{{ $address->phone }}"></div>
                                                                </div>
                                                                <div class="form-group row"><label
                                                                    class="col-sm-3 col-form-label">Province</label>
                                                                    <div class="col-sm-9"><select id="select2-single"
                                                                        data-plugin="select2" class="form-control" name="provinsi">
                                                                        <option value="{{ $address->provinsi }}">{{ $address->provinsi }}</option>
                                                                        <option value="">Select Province</option>
                                                                        <option value="DKI Jakarta">DKI Jakarta</option>
                                                                        <option value="Jawa Barat">Jawa Barat</option>
                                                                        <option value="Jawa Timur">Jawa Timur</option>
                                                                    </select></div>
                                                                </div>
                                                                <div class="form-group row"><label
                                                                    class="col-sm-3 col-form-label">City</label>
                                                                    <div class="col-sm-9"><select id="select2-single"
                                                                        data-plugin="select2" class="form-control" name="kota">
                                                                        <option value="{{ $address->kota }}">{{ $address->kota }}</option>
                                                                        <option value="">Select City</option>
                                                                        <option value="Jakarta Timur">Jakarta Timur</option>
                                                                        <option value="Jakarta Barat">Jakarta Barat</option>
                                                                        <option value="Jakarta Selatan">Jakarta Selatan</option>
                                                                        <option value="Jakarta Utara">Jakarta Utara</option>
                                                                        <option value="Depok">Depok</option>
                                                                        <option value="Bogor">Bogor</option>
                                                                        <option value="Bandung">Bandung</option>
                                                                        <option value="Purwakarta">Purwakarta</option>
                                                                        <option value="Malang">Malang</option>
                                                                        <option value="Magelang">Magelang</option>
                                                                    </select></div>
                                                                </div>
                                                                <div class="form-group row"><label
                                                                    class="col-sm-3 col-form-label">Postal zip Code</label>
                                                                    <div class="col-sm-9"><select id="select2-single"
                                                                        data-plugin="select2" class="form-control" name="zip">
                                                                        <option value="{{ $address->zip }}">{{ $address->zip }}</option>
                                                                        <option value="">Select Postal zip</option>
                                                                        <option value="12131">12131</option>
                                                                    </select></div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-3 col-form-label">Address</label>
                                                                    <div class="col-sm-9">
                                                                        <textarea id="event-desc" name="detail" class="form-control" rows="6">{{ $address->detail }}</textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row"><label
                                                                    class="col-sm-3 col-form-label">Address additional</label>
                                                                    <div class="col-sm-9"><input id="rincian" name="rincian" type="text"
                                                                        class="form-control" value="{{ $address->rincian }}"><small class="text-fade">optionals</small></div>
                                                                    </div>
                                                                    <div class="form-group row"><label class="col-sm-3"></label>
                                                                        <div class="col-sm-9"><button type="submit" id="btn-save"
                                                                            class="btn gd-primary text-white btn-rounded">Save</button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                            <!-- /modal edit -->

    @endsection