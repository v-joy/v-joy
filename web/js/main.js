var shopModule = angular.module('shopModule', ["ngRoute", "ngResource", "ngAnimate"]);

// router to url
shopModule.config(function ($routeProvider) {
    $routeProvider
        .when('/list/:category/:search', {
            controller: 'listCtrl',
            templateUrl: '/web/tpl/product/list.tpl'
        })
        .when('/detail/:id', {
            controller: 'detailCtrl',
            templateUrl: '/web/tpl/product/detail.tpl'
        })
        .when('/login', {
            controller: 'loginCtrl',
        //    templateUrl: '/web/tpl/user/login.tpl'
        })
        .when('/register', {
            controller: 'registerCtrl',
        //    templateUrl: '/web/tpl/user/register.tpl'
        })
        .otherwise({
            redirectTo: '/list/all/all'
        });
});

window.document.getElementById('searchInput').onkeydown = function(event){
    if(event.keyCode === 13){
        searchProduct();
    }
}

window.document.getElementById('searchButton').onclick = searchProduct;

var headerNav = window.document.getElementById('header-nav').children;

function searchProduct(){
    var category = 'all';
    for (var i = 0; i < headerNav.length; i++) {
        if(headerNav[i].className == "active"){
            category = headerNav[i].getAttribute('data-id');
        }
    }
    window.location.hash = "#/list/"+category+"/" + window.document.getElementById('searchInput').value;
}

for (var i = 0; i < headerNav.length; i++) {
    headerNav[i].onclick = function () {
        clearActive();
        this.className = 'active';
    }
}
function clearActive() {
    for (var i = 0; i < headerNav.length; i++) {
        headerNav[i].className = '';
    }
}