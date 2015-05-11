<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Image */

$this->title = '上传图片至: ' . $instance::tableName();
$this->params['breadcrumbs'][] = ['label' => '图片', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="image-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
