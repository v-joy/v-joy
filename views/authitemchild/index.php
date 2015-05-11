<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '权限关系';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-item-child-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', '新建'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'parent',
            'child',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
