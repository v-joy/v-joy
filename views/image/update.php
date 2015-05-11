<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Image */

$this->title = '修改图片: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => '图片', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = "修改";
?>
<div class="image-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
