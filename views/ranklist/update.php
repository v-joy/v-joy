<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Ranklist */

$this->title = '更新排行榜: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => '排行榜', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ranklist-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'items' => $items,
    ]) ?>

</div>
