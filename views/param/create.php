<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Param */

$this->title = "创建参数";
$this->params['breadcrumbs'][] = ['label' => "参数", 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="param-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
