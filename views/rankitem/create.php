<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Rankitem */

$this->title = 'Create Rankitem';
$this->params['breadcrumbs'][] = ['label' => 'Rankitems', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rankitem-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
