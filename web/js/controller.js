shopModule
    .controller('listCtrl', function ($scope, $routeParams) {
        console.log('i am list page');
        //1. load data from server
        //$routeParams.category  $routeParams.search
        //2. pass data to page
        $scope.items = [
            {id: 1, name: "名称1", desc:"测试", price: 199.00},
            {id: 2, name: "名称2", desc:"测试", price: 139.00},
            {id: 3, name: "名称3", desc:"测试", price: 84.20}
        ];
    })
    .controller('detailCtrl', function ($scope, $routeParams) {
        console.log('i am detail page' + $routeParams.id);
    });
