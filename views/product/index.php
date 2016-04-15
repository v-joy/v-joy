<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '产品';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            [
                "attribute"=>"categoryId",
                'label' => '类别',
                'value' => function($model){
                    $category = $model->category;
                    return isset($category->name)?$category->name:"默认";
                }
            ],
            'name',
            'chinesename',
            'score',
            [
                "attribute"=>"userId",
                'label' => '用户',
                'value' => function($model){
                    return $model->user->username;
                }
            ],
            //'description:ntext',
            // 'userId',
            // 'createTime:datetime',
            [
                'attribute'=>'status',
                'label' => '状态',
                'value' => function($model){
                    return $model->status === 0?'未上线':'已上线';
                }
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'header' => '操作',
                'template' => '{view} {update} {delete} {pic}',
                'buttons' => [
                    'pic' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-list"></span>', $url, [
                            'title' => Yii::t('app', '图片管理'),
                        ]);
                    }
                ],
                'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action === 'pic') {
                        return ['/image/upload', "type"=>"product",'id' => $model->id];
                    } 
                }
            ],
        ],
    ]); ?>

</div>
