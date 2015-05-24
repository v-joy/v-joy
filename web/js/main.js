var shopModule = angular.module('shopModule', ["ngRoute", "ngResource", "ngAnimate"]);

// router to url
shopModule.config(function ($routeProvider) {
    $routeProvider
        //.when('/', {
        //    controller: 'mainCtrl',
        //    templateUrl: '/tpl/main',
        //    publicAccess: true
        //})
        .when('/list', {
            controller: 'listCtrl',
            templateUrl: '/web/tpl/productList/index.tpl'
        })
        .when('/detail', {
            controller: 'detailCtrl',
            templateUrl: '/web/tpl/productDetail/index.tpl'
        })
        .otherwise({
            redirectTo: '/'
        });
});