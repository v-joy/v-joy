<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '排行榜';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ranklist-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Ranklist', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'name',
            'subname',
            [
                'attribute'=>'userId',
                'label' => '用户',
                'value' => function($model){
                    return $model->user->username;
                }
            ],
            'createTime:datetime',
            [
                'attribute'=>'status',
                'label' => '状态',
                'value' => function($model){
                    return $model->status === 0?'未上线':'已上线';
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
