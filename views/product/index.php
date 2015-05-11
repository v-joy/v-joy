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
                'label' => '类别id',
                'value' => function($model){
                    return $model->category->name;
                }
            ],
            'name',
            'price',
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
            // 'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
