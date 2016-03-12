shopModule
    .controller('listCtrl', ["$scope", "$routeParams",'$http', function ($scope, $route,$http) {
        $http({url:"/web/ajax/products",params:{search:$route.search,category:$route.category},method:'get'}).success(function(data){
            console.log(data);
            $scope.items = data;
        });
    }])
    .controller('detailCtrl', ["$scope", "$routeParams",'productService', function ($scope, $routeParams,$service) {
        $service.find({id:$routeParams.id},function(data){
            if (data.code != 200) {
                error("加载数据失败，请刷新页面~");
                return false;
            };
            data.data.createTime = formatDate(data.data.createTime);
            $scope.item = data.data;
        });
    }])
    .controller('articleCtrl', ["$scope", "$routeParams",'$http', function ($scope, $route,$http) {
        $http({url:"/web/ajax/article",params:{id:$route.id},method:'get'}).success(function(data){
            if (data.code == 200) {
                data.data.createTime = formatDate(data.data.createTime);
                $scope.item = data.data;
            }else{
                error('加载数据失败，请刷新页面~');
            }
        });
    }])
    .controller('loginCtrl', ["$scope", "$routeParams",'$http', function ($scope, $route,$http) {
        alert("现在不用登录也可以搜索商品了~~");
        return;
        $http({url:"/web/ajax/products",params:{search:$route.search,category:$route.category},method:'get'}).success(function(data){
            $scope.items = data;
        });
    }])
    .controller('registerCtrl', ["$scope", "$routeParams",'$http', function ($scope, $route,$http) {
        alert("内测阶段,注册服务暂时不对外公开~~");
        return ;
        $http({url:"/web/ajax/products",params:{search:$route.search,category:$route.category},method:'get'}).success(function(data){
            $scope.items = data;
        });
    }]);

