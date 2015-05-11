<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AuthItem */

$this->title = Yii::t('app', '更新: ', [
    'modelClass' => 'Auth Item',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => "权限/角色", 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->name]];
$this->params['breadcrumbs'][] = '更新';
?>
<div class="auth-item-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
