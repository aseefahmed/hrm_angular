@extends('layouts/dashboard/main')
@section('page_title', 'Buyers')

@section('content')
    <div class="row col-sm-12">
        <h3 class="heading">@yield('page_title')</h3>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="row">
                <div class="col-sm-4">
                    <a class="btn btn-success" data-toggle="modal" data-backdrop="static" href="#add-buyer-modal"><i class="fa fa-plus"></i> Add Buyer</a>
                </div>
            </div>
                <div class="row">
                    <div class="col-sm-10 text-right">
                        &nbsp;
                    </div>
                </div>
                <div class="w-box" id="w_sort01">
                    <div class="w-box-header">
                        <div class="pull-left">
                            <div class="btn-group">
                                <a class="btn dropdown-toggle btn-primary btn-xs" data-toggle="dropdown" href="#">
                                <i class="glyphicon glyphicon-cog"></i> Action <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Edit</a></li>
                                    <li><a href="#">Delete</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="pull-right">
                        Buyers List
                        </div>
                    </div>
                    <div class="w-box-content cnt_a">
                        <div id="main-content">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-responsive table-bordered table-striped" id="dataTable1">
                                        <thead>
                                        <tr>
                                            <th class="table_checkbox"><input name="select_rows" class="select_rows" data-tableid="dt_gal" type="checkbox"/></th>
                                            <th>Image</th>
                                            <th>Buyer Name</th>
                                            <th>Create At</th>
                                            <th>Last Updated</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($buyers as $buyer)
                                            <tr>
                                                <td><input name="row_sel" class="select_row" type="checkbox"/></td>
                                                <td width="10%"><img src="{{ asset('img/uploads/production/buyers/'.$buyer->image) }}" width="80px"/></td>
                                                <td>{{ $buyer->buyer_name }}</td>
                                                <td>{{ date_format(date_create($buyer->create_at), 'jS M, Y') }}</td>
                                                <td>{{ date_format(date_create($buyer->updated_at), 'jS M, Y') }}</td>
                                                <td width="20%" align="center">
                                                    <a class="btn btn-primary"><i class="glyphicon glyphicon-eye-open"></i></a>&nbsp;
                                                    <a class="btn btn-warning"><i class="glyphicon glyphicon-edit"></i></a>&nbsp;
                                                    <a class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                                <label>Buyer Name </label>
                                                <input class="form-control" placeholder="Buyer Name" type="text" name="buyer_name" id="buyer_name" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="formSep">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <label>Image </label>
                                                <input id="buyer_image" name="buyer_image" type="file" class="file file-upload" data-preview-file-type="text" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <a class="btn btn-danger" data-dismiss="modal">Cancel</a>
                                        <button type="submit" name="commit" class="btn btn-success" id="add-buyer-btn" >Add Buyer </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
@endsection