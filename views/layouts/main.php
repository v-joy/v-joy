<!DOCTYPE html>
<html ng-app="shopModule">
<head>
    <meta charset="utf-8"/>
    <title>水果商店</title>
    <link rel="stylesheet/less" type="text/css" href="/web/less/all-style.less" />

    <!-- set options before less.js script -->
    <script>
        less = {
            env: "development",
            async: false,
            fileAsync: false,
            poll: 1000,
            functions: {},
            dumpLineNumbers: "comments",
            relativeUrls: false,
            rootpath: "/"
        };
    </script>
    <script src="/web/js/common/less.min.js" type="text/javascript"></script>
</head>
<body>
<div id="header">
    <div class="logo-wrap">
        <a class="logo" href="/web/">logo</a>
        <div class="f-right search-wrap">
            <input type="text" placeholder="请输入所查询商品名"/>
            <input type="submit" value="搜 索" />
        </div>
    </div>
    <div class="nav-wrap">
        <div class="nav">
            <ul>
                <li><a href="#">首页</a></li>
                <li><a href="#/list">商品列表</a></li>
            </ul>
            <div class="login-wrap">
                <a href="#">登录</a>
                <a href="#">注册</a>
            </div>
        </div>
    </div>
</div>
<div id="main" ng-view></div>
<div id="footer">
    <hr/>
    <div class="info-box clearfix">
        <div class="info-item f-left">
            <h3>商务合作</h3>
            <ul>
                <li><a href="#">提供商家信息</a></li>
                <li><a href="#">提供商家信息</a></li>
                <li><a href="#">提供商家信息</a></li>
            </ul>
        </div>
        <div class="info-item f-left">
            <h3>商务合作</h3>
            <ul>
                <li><a href="#">提供商家信息</a></li>
                <li><a href="#">提供商家信息</a></li>
                <li><a href="#">提供商家信息</a></li>
            </ul>
        </div>
        <div class="info-item f-left">
            <h3>商务合作</h3>
            <ul>
                <li><a href="#">提供商家信息</a></li>
                <li><a href="#">提供商家信息</a></li>
                <li><a href="#">提供商家信息</a></li>
            </ul>
        </div>
        <div class="info-item f-left">
            <h3>商务合作</h3>
            <ul>
                <li><a href="#">提供商家信息</a></li>
                <li><a href="#">提供商家信息</a></li>
                <li><a href="#">提供商家信息</a></li>
            </ul>
        </div>
    </div>
    <p>Copyright:©2015美团网团购 meituan.com 京ICP证070791号 京公网安备11010502025545号 电子公告服务规则s</p>
</div>
<script src="/web/js/common/angular.min.js"></script>
<script src="/web/js/common/angular-route.js"></script>
<script src="/web/js/common/angular-resource.js"></script>
<script src="/web/js/common/angular-animate.js"></script>
<script src="/web/js/main.js"></script>
<script src="/web/js/controller.js"></script>
</body>
</html>
