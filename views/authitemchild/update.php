<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AuthItemChild */

$this->title = Yii::t('app', '更新: ', [
    'modelClass' => 'Auth Item Child',
]) . ' ' . $model->parent;
$this->params['breadcrumbs'][] = ['label' => '权限关系', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->parent, 'url' => ['view', 'parent' => $model->parent, 'child' => $model->child]];
$this->params['breadcrumbs'][] = '更新';
?>
<div class="auth-item-child-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
