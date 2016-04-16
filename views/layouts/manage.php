<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
    <div class="wrap">
        <?php
            NavBar::begin([
                'brandLabel' => Yii::$app->params["companyName"],
                'brandUrl' => "#",//Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                    //['label' => '主页', 'url' => ['/site/index']],
                    Yii::$app->user->can("ranklist/index")?
                        ['label' => '排行榜', 'url' => ['/ranklist/index']]:"",
                    /* 
                    Yii::$app->user->can("rankitem/index")?
                        ['label' => '排行榜数据', 'url' => ['/rankitem/index']]:"",
                    */
                    Yii::$app->user->can("product/index")?
                        ['label' => '产品', 'url' => ['/product/index']]:"",
                    Yii::$app->user->can("article/index")?
                        ['label' => '文章', 'url' => ['/article/index']]:"",
                    Yii::$app->user->can("category/index")?
                        ['label' => '类别', 'url' => ['/category/index']]:"",
                    Yii::$app->user->can("user/index")?
                        ['label' => '参数', 'url' => ['/param/index']]:"",
                    Yii::$app->user->can("user/index")?
                        ['label' => '图片', 'url' => ['/image/index']]:"",
                    Yii::$app->user->can("user/index")?
                        ['label' => '权限', 'url' => ['/auth/index?type=2']]:"",
                    Yii::$app->user->can("user/index")?
                        ['label' => '权限关系', 'url' => ['/authitemchild/index']]:"",
                    Yii::$app->user->can("user/index")?
                        ['label' => '角色', 'url' => ['/auth/index?type=1']]:"",
                    Yii::$app->user->can("user/index")?
                        ['label' => '授权', 'url' => ['/authassignment/index']]:"",
                    Yii::$app->user->can("user/index")?
                        ['label' => '用户', 'url' => ['/user/index']]:"",
                    ['label' => '|'],
                    /*['label' => '我的产品',
                        'url' => ['/product/index?userid='.Yii::$app->user->identity->id]
                    ],*/
                    ['label' => '我的资料',
                        'url' => ['/user/view/'.Yii::$app->user->identity->id]
                    ],
                    ['label' => '退出('.Yii::$app->user->identity->username.')',
                        'url' => ['/site/logout'],
                        'linkOptions' => ['data-method' => 'post']
                    ],
                ],
            ]);
            NavBar::end();
        ?>

        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; <?php echo Yii::$app->params["companyName"]; ?> <?= date('Y') ?></p>
            <p class="pull-right">mark this moment</p>
        </div>
    </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
