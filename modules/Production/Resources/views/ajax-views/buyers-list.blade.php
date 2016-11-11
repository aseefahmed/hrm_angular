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