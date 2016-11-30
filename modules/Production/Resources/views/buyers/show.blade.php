@extends('layouts/dashboard/main')
@section('page_title', 'Buyers')

@section('content')
    <div class="row col-sm-12">
        <h3 class="heading">{{ Route::currentRouteName() }}</h3>
    </div>
    <div class="row" ng-controller="BuyerController" ng-init="init({{$buyer_id}})" ng-cloak>
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
                                    <li><a href="/production/buyers" target="_top"><span class="glyphicon glyphicon-arrow-left"></span> Cancel</a></li>
                                    <li><a ng-if="buyer[0].user_id == {{ Auth::user()->id }}" class="th-pointer" ng-click="remove_buyer({{ $buyer_id  }}, buyer[0].buyer_name, 'single_delete')"><span class="glyphicon glyphicon-trash"></span> Delete</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="w-box-content cnt_a">
                        <div id="main-content">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-responsive table-bordered table-striped">
                                        <thead>
                                        <tr valign="middle">
                                            <th width='25%'>Buyer Name: </th>
                                            <td><span class="col-sm-10"><?php wordwrap("## buyer[0].buyer_name ##" , 16, '<br>') ?></span><a ng-click="edit_buyer({{ $buyer_id  }}, 'Buyer Name', 'buyer_name')" class="th-pointer col-sm-2 glyphicon glyphicon-pencil text-right"></a></td>
                                            <td rowspan="3" width="25%"><img src="{{ asset('img/uploads/production/buyers') }}/## buyer[0].image ##" width="100%" height="100%"></td>
                                        </tr>
                                        <tr>
                                            <th width='25%'>Created By: </th>
                                            <td><span class="col-sm-10">## buyer[0].user.first_name | uppercase ## ## buyer[0].user.last_name | uppercase ## </span></td>
                                        </tr>
                                        <tr>
                                            <th width='25%'>Created At: </th>
                                            <td><span class="col-sm-10">## buyer[0].created_at | filterDate ## </span></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th width='25%'>Updated At: </th>
                                            <td><span class="col-sm-10">## buyer[0].updated_at | filterDate ## </span></td>
                                        </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                @include('production::partials.orders_stats')
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
                                <button type="submit" name="commit" class="btn btn-success" ng-click="remove_buyer_confirmed(buyer_id, 'show_page', status)" buyer_id=""><span class="glyphicon glyphicon-ok-sign"></span> Yes </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

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

            <div class="modal fade" id="edit-buyer-modal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h3 class="modal-title">Edit Buyer</h3>
                        </div>
                        <div class="modal-body">
                            <form id="add-buyer-form" method="post" enctype="multipart/form-data">
                                <div class="formSep">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <code> ## editable_item ## </code> <span style="color:red">*</span>
                                            <div class="row">
                                                &nbsp;&nbsp;
                                            </div>
                                            <input class="form-control" placeholder="Buyer Name" type="text" ng-model="type"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove-sign"></span> Cancel</a>
                                    <button type="submit" name="commit" class="btn btn-success" ng-click="edit_buyer_confirmed({{ $buyer_id }})"><span class="glyphicon glyphicon-ok-sign"></span> Edit  </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection