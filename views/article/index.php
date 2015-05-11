<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '文章';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Article', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            //'content:ntext',
            [
                "attribute"=>"userId",
                'label' => '用户',
                'value' => function($model){
                    return $model->user->username;
                }
            ],
            //'createTime:datetime',
            [
                "attribute"=>"createTime",
                'value' => function($model){
                    return date(Yii::$app->params["date"],$model->createTime);
                }
            ],
            // 'categoryId',
            // 'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
