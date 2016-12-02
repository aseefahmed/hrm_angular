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
                                    <li><a href="#" ng-click="remove_buyer(0, 'index_page', 'selected')"><span class="glyphicon glyphicon-trash"></span> Delete Seleted</a></li>
                                    <li><a href="#" ng-click="remove_buyer(0, 'index_page', 'all')"><span class="glyphicon glyphicon-repeat"></span> Delete All</a></li>
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
                                            <th></th>
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
                                                <td><input class="select_row" type="checkbox"  value="## buyer.id ##"/></td>
                                                <td ng-cloak><img src="{{ asset('img/uploads/production/buyers') }}/## buyer.image ##" width="80px"/></td>
                                                <td ng-cloak>## buyer.buyer_name ##</td>
                                                <td ng-cloak>## buyer.created_at | filterDate ##</td>
                                                <td ng-cloak>## buyer.updated_at | filterDate ##</td>
                                                <td  ng-cloak align="center">
                                                    <a class="btn btn-primary" href="{{ url('production/buyer/show') }}/## buyer.id ##"><i class="glyphicon glyphicon-eye-open" class="view_buyer_btn"></i></a>&nbsp;
                                                    <a ng-if="buyer.user_id == {{ Auth::user()->id }}" class="btn btn-danger" ng-click="remove_buyer(buyer.id, buyer.buyer_name, 'single_delete')" buyer_name="## buyer.name ##" buyer_id="## buyer.id ##"><i class="glyphicon glyphicon-trash"></i></a>
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
                            <form method="post" enctype="multipart/form-data" name="myForm" novalidate>
                                <div class="formSep">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <code>Buyer</code><span style="color:red">*</span>
                                            <div class="row">
                                                &nbsp;&nbsp;
                                            </div>
                                            <input class="form-control" placeholder="Buyer" name="buyer_name" type="text" ng-model="buyer_name" ng-required="true" ng-maxlength="50">
                                            <span class="help-block " ng-show="myForm.buyer_name.$dirty && myForm.buyer_name.$invalid">This is a mendatory field (Maximum: 50 Characters).</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="formSep">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <code>Postal Address</code>
                                            <div class="row">
                                                &nbsp;&nbsp;
                                            </div>
                                            <input class="form-control" placeholder="Postal Address" name="postal_address" type="text" ng-model="postal_address" ng-maxlength="70"/>
                                            <span class="help-block " ng-show="myForm.postal_address.$dirty && myForm.postal_address.$invalid">This field not be more than 70 characters long.</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="formSep">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <code>Contact Person</code>
                                            <div class="row">
                                                &nbsp;&nbsp;
                                            </div>
                                            <input class="form-control" placeholder="Contact Person" type="text" name="contact_person" ng-model="contact_person" ng-maxlength="55"/>
                                            <span class="help-block " ng-show="myForm.contact_person.$dirty && myForm.contact_person.$invalid">It must not be more than 55 characters long.</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="formSep">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <code>Email Address</code>
                                            <div class="row">
                                                &nbsp;&nbsp;
                                            </div>
                                            <input class="form-control" placeholder="Email Address" name="email" type="text" ng-model="email_address" ng-pattern="/^[a-z]+[a-z0-9._]+@[a-z]+\.[a-z.]{2,5}$/"/>
                                            <span class="help-block " ng-show="myForm.email.$dirty && myForm.email.$invalid">Email address must be valid.</span>
                                        </div>
                                        <div class="col-sm-6">
                                            <code>Contact Number</code>
                                            <div class="row">
                                                &nbsp;&nbsp;
                                            </div>
                                            <input class="form-control" placeholder="Contact Number" type="text" name="contact_number" ng-model="contact_number" ng-maxlength="20"/>
                                            <span class="help-block " ng-show="myForm.contact_number.$dirty && myForm.contact_number.$invalid">It must not be more than 20 characters long.</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="formSep">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <code>Website</code>
                                            <div class="row">
                                                &nbsp;&nbsp;
                                            </div>
                                            <input class="form-control" placeholder="Website" type="text" ng-model="website"/>
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
                                    <button type="submit" ng-disabled="myForm.$invalid" name="commit" class="btn btn-success" ng-click="add_buyer()"><span class="glyphicon glyphicon-ok-sign"></span> Add Buyer </button>
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
                            <h3 class="modal-title">Remove Buyer</h3>
                        </div>
                        <div class="modal-body">
                            ## modal_msg ##
                            <div class="modal-footer">
                                <a class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove-sign"></span> Cancel</a>
                                <button type="submit" name="commit" class="btn btn-success" ng-click="remove_buyer_confirmed(buyer_id, 'index_page', status)" buyer_id=""><span class="glyphicon glyphicon-ok-sign"></span> Yes </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>,

            <div class="modal fade" id="removal-warning-modal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h3 class="modal-title">Remove Buyer</h3>
                        </div>
                        <div class="modal-body">
                            Please Select at least one buyer.
                            <div class="modal-footer">
                                <a class="btn btn-success" data-dismiss="modal"><span class="glyphicon glyphicon-ok-sign"></span> OK</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection