var shopModule = angular.module('shopModule', ["ngRoute", "ngResource", "ngAnimate"]);

// router to url
shopModule.config(function ($routeProvider) {
    $routeProvider
        .when('/list/:category/:search', {
            controller: 'listCtrl',
            templateUrl: '/web/tpl/productList/index.tpl'
        })
        .when('/detail/:id', {
            controller: 'detailCtrl',
            templateUrl: '/web/tpl/productDetail/index.tpl'
        })
        .otherwise({
            redirectTo: '/list/all/all'
        });
});