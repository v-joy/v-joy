<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Ranklist */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => '排行榜', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ranklist-view">

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
            'name',
            'subname',
            ['label'=>'用户','value'=>$model->user->username],
            ['label'=>'创建时间','value'=>date(Yii::$app->params["date"],$model->createTime)],
            'status',
            ['label'=>'状态','value'=>$model->status === 0?'未上线':'已上线'],
        ],
    ]) ?>

</div>
