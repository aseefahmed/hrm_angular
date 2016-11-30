<div class="sidebar_inner_scroll">
    <div class="sidebar_inner">
        <form action="http://gebo-admin-3.tzdthemes.com/search_page.html" class="input-group input-group-sm" method="post">
            <input autocomplete="off" name="query" class="search_query form-control input-sm" size="16" placeholder="Search..." type="text">
            <span class="input-group-btn"><button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button></span>
        </form>
        <div id="side_accordion" class="panel-group">
            @if(strpos(url()->current(), 'production') > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="#collapseOne" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
                            <i class="glyphicon glyphicon-folder-close"></i> Orders
                        </a>
                    </div>
                    <div class="accordion-body collapse" id="collapseOne">
                        <div class="panel-body">
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="javascript:void(0)">View Orders</a></li>
                                <li><a href="javascript:void(0)">Requisitions</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="#collapseTwo" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
                            <i class="glyphicon glyphicon-th"></i> Suppliers
                        </a>
                    </div>
                    <div class="accordion-body collapse" id="collapseTwo">
                        <div class="panel-body">
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="javascript:void(0)">View Suppliers</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="#collapseThree" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
                            <i class="glyphicon glyphicon-user"></i> Buyers
                        </a>
                    </div>
                    @if(Route::currentRouteName() == "Buyers" || Route::currentRouteName() == "Add Buyer" ||
                            Route::currentRouteName() == "Buyer Details" || Route::currentRouteName() == "Edit Buyer Details")
                        {{--*/$buyers_scollapse = 'in'/*--}}
                    @endif
                    <div class="accordion-body collapse {{$buyers_scollapse}}" id="collapseThree">
                        <div class="panel-body">
                            <ul class="nav nav-pills nav-stacked">
                                <li class="{{ (Route::currentRouteName() == "Buyers")? "bg bg-success":"" }}"><a href="/production/buyers">View Buyers</a></li>
                                <li class=""><a href="/production/buyers/add">Add Buyer</a></li>
                            </ul>

                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="#collapseFour" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
                            <i class="glyphicon glyphicon-cog"></i> Brands
                        </a>
                    </div>
                    <div class="accordion-body collapse" id="collapseFour">
                        <div class="panel-body">
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="/production/brands">View Brands</a></li>
                            </ul>

                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="#collapseFive" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
                            <i class="glyphicon glyphicon-leaf"></i> Styles
                        </a>
                    </div>
                    <div class="accordion-body collapse" id="collapseFive">
                        <div class="panel-body">
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="javascript:void(0)">View Styles</a></li>
                            </ul>

                        </div>
                    </div>
                </div>
            @endif

        </div>

        <div class="push"></div>
    </div>

    <div class="sidebar_info">
        <ul class="list-unstyled">
            <li>
                <span class="act act-warning">65</span>
                <strong>New comments</strong>
            </li>
            <li>
                <span class="act act-success">10</span>
                <strong>New articles</strong>
            </li>
            <li>
                <span class="act act-danger">85</span>
                <strong>New registrations</strong>
            </li>
        </ul>
    </div>
</div>