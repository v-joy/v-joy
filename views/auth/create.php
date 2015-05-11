<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\AuthItem */

$this->title = '新建';
$this->params['breadcrumbs'][] = ['label' => "权限/角色", 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-item-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
