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
                                    <li><a ng-if="buyer[0].user_id == {{ Auth::user()->id }}" href="/production/buyer/edit/{{ $buyer_id }}" target="_top"><span class="glyphicon glyphicon-pencil"></span> Edit</a></li>
                                    <li><a ng-if="buyer[0].user_id == {{ Auth::user()->id }}" class="th-pointer" ng-click="remove_buyer({{ $buyer_id  }})"><span class="glyphicon glyphicon-trash"></span> Delete</a></li>
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
                                        <tr>
                                            <th width='25%'>Buyer Name: </th>
                                            <td>## buyer[0].buyer_name | uppercase ##</td>
                                            <td rowspan="3" width="25%"><img src="{{ asset('img/uploads/production/buyers') }}/## buyer[0].image ##" width="100%" height="100%"></td>
                                        </tr>
                                        <tr>
                                            <th width='25%'>Created By: </th>
                                            <td>## buyer[0].user.first_name | uppercase ## ## buyer[0].user.last_name | uppercase ##</td>
                                        </tr>
                                        <tr>
                                            <th width='25%'>Created At: </th>
                                            <td>## buyer[0].created_at | filterDate ##</td>
                                        </tr>
                                        <tr>
                                            <th width='25%'>Updated At: </th>
                                            <td>## buyer[0].updated_at | filterDate ##</td>
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
                            Do you really want to remove the buyer <code id="code_buyer_name">## buyer[0].buyer_name ##</code> ?
                            <div class="modal-footer">
                                <a class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove-sign"></span> Cancel</a>
                                <button type="submit" name="commit" class="btn btn-success" ng-click="remove_buyer_confirmed(buyer_id, 'show_page')" buyer_id=""><span class="glyphicon glyphicon-ok-sign"></span> Yes </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection