<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = $model->chinesename;
$this->params['breadcrumbs'][] = ['label' => '产品', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            ['label'=>'类别','value'=>isset($model->category->name)?$model->category->name:"默认"],
            'name',
            'chinesename',
            'score',
            'description:ntext',
            'platform',
            ['label'=>'用户','value'=>isset($model->user->username)?$model->user->username:""],
            ['label'=>'创建时间','value'=>date(Yii::$app->params["date"],$model->createTime)],
            ['label'=>'状态','value'=>$model->status === 0?'未上线':'已上线'],
        ],
    ]) ?>

</div>
