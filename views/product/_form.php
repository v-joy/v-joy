<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'categoryId')->dropDownList(yii\helpers\ArrayHelper::map(\app\models\Category::getType('product', 'id, name' ),'id','name'),['class'=>"form-control"]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'chinesename')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'score')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'platform')->dropDownList(yii\helpers\ArrayHelper::map(\app\models\Param::params('支持平台', 'value, name' ),'value','name'),['class'=>"form-control"]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status')->dropDownList(['1'=>'上架','0'=>'下架']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
