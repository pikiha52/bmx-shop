@extends('layout.admin')

@section('title', 'Mic Ride - Data Users')

@section('container')   


<!-- ############ Content START-->
<div id="content" class="flex">
    <!-- ############ Main START-->
    <div>
        <div class="page-hero page-container" id="page-hero">
            <div class="padding d-flex">
                <div class="page-title">
                    <h2 class="text-md text-highlight">List Cart</h2><small class="text-muted"></small>
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
                        <th data-sortable="true" data-field="owner">Image</th>
                        <th data-sortable="true" data-field="project">Brand & Merk</th>
                        <th data-field="task"><span class="d-none d-sm-block">Qty</span></th>
                        <th data-field="finish"><span class="d-none d-sm-block">Total Price</span></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="" data-id="20">
                        <td style="min-width:30px;text-align:center"><small class="text-muted">20</small>
                        </td>
                        <td><a href="#"><span class="w-32 avatar gd-warning">G</span></a></td>
                        <td class="flex"><a href="#" class="item-title text-color">Netflix hackathon ios
                        app</a>
                        <div class="item-except text-muted text-sm h-1x">Netflix hackathon creates eye
                        tracking option for iOS app</div>
                    </td>
                    <td><span class="item-amount d-none d-sm-block text-sm">120</span></td>
                    <td><span class="item-amount d-none d-sm-block text-sm [object Object]">20</span>
                    </td>
                   <!--  <td>
                        <div class="item-action dropdown"><a href="#" data-toggle="dropdown"
                            class="text-muted"><i data-feather="more-vertical"></i></a>
                            <div class="dropdown-menu dropdown-menu-right bg-black" role="menu"><a
                                class="dropdown-item" href="#">See detail </a><a
                                class="dropdown-item download">Download </a><a
                                class="dropdown-item edit">Edit</a>
                                <div class="dropdown-divider"></div><a
                                class="dropdown-item trash">Delete item</a>
                            </div>
                        </div>
                    </td> -->
                </tr>
            </tbody>
        </table>
    </div>
</div>
</div><!-- ############ Main END-->
</div><!-- ############ Content END-->

@endsection