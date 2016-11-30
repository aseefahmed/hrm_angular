angular.module('myApp').controller('BuyerController', function($scope, $http) {
    $scope.num_of_items_arr = [{id: 5, value: 5},{id: 10, value: 10},{id: 20, value: 20},{id: 50, value: 50},{id: 100, value: 100}];
    $http.get('/production/fetchBuyersList').then(function (response) {
        $scope.num_of_items = 10;
        $scope.buyers = response.data;
        $scope.reverse = false;
    });
    $scope.sortKey = 'buyer_name';
    $scope.sort = function (header) {
        $scope.sortKey = header;
        $scope.reverse = !$scope.reverse;
    };
    $scope.remove_buyer = function(id, name){
        $('#remove-buyer-modal').modal('toggle');
        $scope.buyer_name = name;
        $scope.buyer_id = id;
    };
    $scope.remove_buyer_confirmed = function(id, page){
        $scope.buyer_name = null;
        $http.delete('/production/buyer/'+id).then(function(response){
            console.log(response)
            if(id == 'all')
            {
                $('#removeall-buyer-modal').modal('toggle');
            }
            else
            {
                $('#remove-buyer-modal').modal('toggle');
            }
            $('.top-right').notify({
                type: 'success',
                message: { html: '<span class="glyphicon glyphicon-info-sign"></span> <strong>You have successfully deleted the information.</strong>' },
                closable: false,
                fadeOut: { enabled: true, delay: 2000 }
            }).show();
            if(page == 'show_page')
            {
                window.location.href = '/production/buyers';
            }
            else
            {
                $http.get('/production/fetchBuyersList').then(function (response) {
                    $scope.num_of_items = 10;
                    $scope.buyers = response.data;
                    $scope.reverse = false;
                })
            }
        }, function(error_response){
            $('#remove-buyer-modal').modal('toggle');
            $('.top-right').notify({
                type: 'danger',
                message: { html: '<span class="glyphicon glyphicon-info-sign"></span> <strong>Operation was unsuccessful. </strong>' },
                closable: false,
                fadeOut: { enabled: true, delay: 2000 }
            }).show();
        })
    };

    $scope.delete_all = function(action){
        if(action == 'all')
        {
            $scope.modal_msg = "Do you really want to delete all buyers";
        }
        else if(action == 'selected')
        {
            var arr = [];
            $('.select_row:checked').each(function() {
                arr.push(parseInt(this.value, 10));
            });
            console.log(arr)
            $scope.selected_items = arr;
            $scope.modal_msg = "Do you really want to delete selected buyers";
        }
        $('#removeall-buyer-modal').modal('toggle');
    };
    $scope.init = function(id){
        $http.get('/production/buyer/fetchBuyerDetails/'+id).then(function(response){
            $scope.buyer = response.data;
        })
    };
    $scope.add_buyer = function(){
        var data = $.param({
            buyer_name: $scope.buyer_name,
            buyer_image: $scope.buyer_image
        });
        var config = {
            headers : {
                'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
            }
        };
        $http.post('/production/buyers/add', data, config).success(function (result, status) {
            $('#add-buyer-modal').modal('toggle');
            $('.top-right').notify({
                type: 'success',
                message: { html: '<span class="glyphicon glyphicon-info-sign"></span> <strong>You have successfully add a buyer.</strong>' },
                closable: false,
                fadeOut: { enabled: true, delay: 2000 }
            }).show();
            $scope.buyer_name = null;
            $http.get('/production/fetchBuyersList').then(function (response) {
                $scope.num_of_items = 10;
                $scope.buyers = response.data;
                $scope.reverse = false;
            })
        }).error(function (result, status) {
            $('#add-buyer-modal').modal('toggle');
            $('.top-right').notify({
                type: 'danger',
                message: { html: '<span class="glyphicon glyphicon-info-sign"></span> <strong>The operation was unsuccessful.</strong>' },
                closable: false,
                fadeOut: { enabled: true, delay: 2000 }
            }).show();
            $scope.buyer_name = null;
        });
    };

})

