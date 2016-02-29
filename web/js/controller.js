shopModule
    .controller('listCtrl', ["$scope", "$routeParams",'$http', function ($scope, $route,$http) {
        $http({url:"/ajax/products",params:{search:$route.search,category:$route.category},method:'get'}).success(function(data){
            $scope.items = data;
        });
    }])
    .controller('detailCtrl', ["$scope", "$routeParams",'productService', function ($scope, $routeParams,$service) {
        $service.find({id:$routeParams.id},function(data){
            //mark : need check code==200
            var createTime = new Date(data.data.createTime);
            data.data.createTime = createTime.getFullYear() + '-' + createTime.getMonth() + '-' + createTime.getDay();
            $scope.item = data.data;
        });
    }])
    .controller('loginCtrl', ["$scope", "$routeParams",'$http', function ($scope, $route,$http) {
        alert("现在不用登录也可以搜索商品了~~");
        return;
        $http({url:"/ajax/products",params:{search:$route.search,category:$route.category},method:'get'}).success(function(data){
            $scope.items = data;
        });
    }])
    .controller('registerCtrl', ["$scope", "$routeParams",'$http', function ($scope, $route,$http) {
        alert("内测阶段,注册服务暂时不对外公开~~");
        return ;
        $http({url:"/ajax/products",params:{search:$route.search,category:$route.category},method:'get'}).success(function(data){
            $scope.items = data;
        });
    }]);

