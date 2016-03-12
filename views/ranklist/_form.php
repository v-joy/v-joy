<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Ranklist;
use app\models\Rankitem;

/* @var $this yii\web\View */
/* @var $model app\models\Ranklist */
/* @var $modelItem app\models\Ranklist */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $this->registerJs("
    $('.delete-button').click(function() {
        var item = $(this).closest('.rank-item');
        var updateType = item.find('.update-type');
        if (updateType.val() === " . json_encode(Rankitem::UPDATE_TYPE_UPDATE) . ") {
            //marking the row for deletion
            updateType.val(" . json_encode(Rankitem::UPDATE_TYPE_DELETE) . ");
            item.hide();
        } else {
            //if the row is a new row, delete the row
            item.remove();
        }
 
    });
");
?>

<div class="ranklist-form">

    <?php $form = ActiveForm::begin([
        'enableClientValidation' => false
    ]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'subname')->textInput(['maxlength' => true]) ?>


    <?php 
if(is_array($items)){
foreach ($items as $i => $modelItem) : ?>
        <div class="row rank-item rank-item-<?= $i ?>">
            <div class="col-md-4">
                <?= Html::activeHiddenInput($modelItem, "[$i]id") ?>
                <?= Html::activeHiddenInput($modelItem, "[$i]updateType", ['class' => 'update-type']) ?>
                <?= $form->field($modelItem, "[$i]productId") ?>
            </div>
            <div class="col-md-5">
                <?= $form->field($modelItem, "[$i]reason") ?>
            </div>
            <div class="col-md-3">
                <?= Html::button('x', ['class' => 'delete-button btn btn-danger', 'data-target' => "rank-item-$i"]) ?>
            </div>
        </div>
    <?php endforeach;} ?>

    <?= $form->field($model, 'status')->dropDownList(['1'=>'上架','0'=>'下架']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::submitButton('Add row', ['name' => 'addRow', 'value' => 'true', 'class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
