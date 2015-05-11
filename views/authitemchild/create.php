<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\AuthItemChild */

$this->title = '新建';
$this->params['breadcrumbs'][] = ['label' => '权限关系', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-item-child-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
