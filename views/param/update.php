<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Param */

$this->title = '修改参数：' . $model->name;
$this->params['breadcrumbs'][] = ['label' => "参数", 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = "更新";
?>
<div class="param-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
