<!DOCTYPE html>
<html ng-app="shopModule">
<head>
    <meta charset="utf-8"/>
    <title><?php echo \Yii::$app->params['title']; ?></title>
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
        <a class="logo" href="">logo</a>
        <div class="f-right search-wrap">
            <input id="searchInput" type="text" placeholder="请输入所查询商品名"/>
            <input id="searchButton" type="submit" value="搜 索" />
        </div>
    </div>
    <div class="nav-wrap">
        <div class="nav">
            <ul id="header-nav">
                <li data-id="all" class="active"><a href="#/list/all/all">首页</a></li>
                <?php foreach ($this->params['p_cates'] as $cate) {
                    echo "<li data-id='".$cate["id"]."'><a href='#/list/".$cate["id"]."/all'>".$cate['name']."</a></li>";
                } ?>
            </ul>
<!--            <div class="login-wrap">-->
<!--                <a href="#/login">登录</a>-->
<!--                <a href="#/register">注册</a>-->
<!--            </div>-->
        </div>
    </div>
</div>
<?= $content ?>
<div id="footer">
    <hr/>
    <div class="info-box clearfix">
        <?php foreach ($this->params['a_cates'] as $cate) {?>
            <div class="info-item f-left">
                <h3><?= $cate['name'] ?></h3><ul>
                <?php foreach ($cate['articles'] as $arti){
                    echo '<li><a href="#/arti/'.$arti['id'].'">'.$arti['name'].'</a></li>';
                }?>
                </ul>
            </div>
        <?php } ?>
    </div>
    <p>Copyright:©2015  <?= \Yii::$app->params['title'] ?> v-joy.net 京ICP证xxxxxx号 京公网安备110105xxxxxx号 电子公告服务规则</p>
</div>
<script src="/web/js/common/angular.min.js"></script>
<script src="/web/js/common/angular-route.js"></script>
<script src="/web/js/common/angular-resource.js"></script>
<script src="/web/js/common/angular-animate.js"></script>
<script src="/web/js/main.js"></script>
<script src="/web/js/service.js"></script>
<script src="/web/js/controller.js"></script>
</body>
</html>
