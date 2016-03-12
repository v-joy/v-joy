<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Ranklist */

$this->title = '创建排行榜';
$this->params['breadcrumbs'][] = ['label' => '排行榜', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ranklist-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'items' => $items,
    ]) ?>

</div>
