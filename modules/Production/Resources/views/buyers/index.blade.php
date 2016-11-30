@extends('layouts/dashboard/main')
@section('page_title', 'Buyers')

@section('content')
    <div class="row col-sm-12">
        <h3 class="heading">@yield('page_title')</h3>
    </div>
    <div class="row" ng-controller="BuyerController" ng-cloak>
        <div class="col-sm-12 col-md-12">
            <div class="col-sm-8">
                <div class="w-box" id="w_sort01">
                    <div class="w-box-header">
                        <div class="pull-left">
                            <div class="btn-group">
                                <a class="btn dropdown-toggle btn-primary btn-xs" data-toggle="dropdown" href="#">
                                    <i class="glyphicon glyphicon-cog"></i> Action <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a data-toggle="modal" data-backdrop="static" href="#add-buyer-modal"><span class="glyphicon glyphicon-plus-sign"></span> Add</a></li>
                                    <li><a href="#" id="update-buyer-btn"><span class="glyphicon glyphicon-pencil"></span> Edit</a></li>
                                    <li><a href="#" id="update-buyer-btn"><span class="glyphicon glyphicon-trash"></span> Delete</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="w-box-content cnt_a">
                        <div id="main-content">
                            <div class="row">
                                <div class="col-sm-4 text-left">
                                    <input type="text" class="form-control" placeholder="Search" ng-model="search_filter">
                                </div>
                                <div class="col-sm-8 text-right">
                                    Show : <select style="width: 25%;" ng-model="num_of_items" name="num_of_items" ng-options="num.id as num.value for num in num_of_items_arr ">
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="col-sm-12 text-center">
                                        <dir-pagination-controls
                                                direction-links="true" auto-hide="false"
                                                boundary-links="true" >
                                        </dir-pagination-controls>
                                    </div>
                                    <table class="table table-responsive table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th class="table_checkSqlite (Xerial) - hrm.dbbox"><input name="select_rows" class="select_rows" data-tableid="dt_gal" type="checkbox"/></th>
                                            <th>Image</th>
                                            <th class="th-pointer" ng-click="sort('buyer_name')">Buyer Name <span class="glyphicon glyphicon-sort-icon"  ng-show="sortKey=='buyer_name'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span></th>
                                            <th class="th-pointer" ng-click="sort('created_at')">Created At <span class="glyphicon glyphicon-sort-icon"  ng-show="sortKey=='created_at'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span></th>
                                            <th class="th-pointer" ng-click="sort('updated_at')">Updated At <span class="glyphicon glyphicon-sort-icon"  ng-show="sortKey=='updated_at'" ng-class="{'glyphicon-chevron-up':reverse,'glyphicon-chevron-down':!reverse}"></span></th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr ng-if="buyers.length == 0 || filtered.length == 0">
                                            <td colspan="6">No data found.</td>
                                        </tr>
                                            <tr dir-paginate="buyer in filtered = (buyers| orderBy : sortKey : reverse | filter : search_filter  | itemsPerPage : num_of_items) " ng-cloak>
                                                <td><input name="row_sel" class="select_row" type="checkbox"/></td>
                                                <td ng-cloak><img src="{{ asset('img/uploads/production/buyers') }}/<< buyer.image >>" width="80px"/></td>
                                                <td ng-cloak><< buyer.buyer_name >></td>
                                                <td ng-cloak><< buyer.created_at | filterDate >></td>
                                                <td ng-cloak><< buyer.updated_at | filterDate >></td>
                                                <td  ng-cloak align="center">
                                                    <a class="btn btn-primary" href="{{ url('production/buyer/show') }}/<< buyer.id >>"><i class="glyphicon glyphicon-eye-open" class="view_buyer_btn"></i></a>&nbsp;
                                                    <a class="btn btn-warning" href="{{ url('production/buyer/edit') }}/<< buyer.id >>"><i class="glyphicon glyphicon-edit" id="edit_buyer_btn"></i></a>&nbsp;
                                                    <a class="btn btn-danger" ng-click="remove_buyer(buyer.id, buyer.buyer_name)" buyer_name="<< buyer.name >>" buyer_id="<< buyer.id >>"><i class="glyphicon glyphicon-trash"></i></a>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                    <div class="col-sm-12 text-center">
                                        <dir-pagination-controls
                                                direction-links="true" auto-hide="false"
                                                boundary-links="true" >
                                        </dir-pagination-controls>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                @include('production::partials.orders_stats')
            </div>

            <div class="modal fade" id="add-buyer-modal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h3 class="modal-title">Add Buyer</h3>
                        </div>
                        <div class="modal-body">
                            <form id="add-buyer-form" method="post" enctype="multipart/form-data">
                                <div class="formSep">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <code>Buyer Name</code> <span style="color:red">*</span>
                                            <div class="row">
                                                &nbsp;&nbsp;
                                            </div>
                                            <input class="form-control" placeholder="Buyer Name" type="text" ng-model="buyer_name"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="formSep">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <code>Image</code>
                                            <input ng-model="buyer_image" type="file" class="file file-upload" data-preview-file-type="text" />
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove-sign"></span> Cancel</a>
                                    <button type="submit" name="commit" class="btn btn-success" ng-click="add_buyer()"><span class="glyphicon glyphicon-ok-sign"></span> Add Buyer </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="remove-buyer-modal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h3 class="modal-title">Add Buyer</h3>
                        </div>
                        <div class="modal-body">
                            Do you really want to remove the buyer <code id="code_buyer_name"><< buyer_name >></code> ?
                            <div class="modal-footer">
                                <a class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove-sign"></span> Cancel</a>
                                <button type="submit" name="commit" class="btn btn-success" ng-click="remove_buyer_confirmed(buyer_id, 'index_page')" buyer_id=""><span class="glyphicon glyphicon-ok-sign"></span> Yes </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection