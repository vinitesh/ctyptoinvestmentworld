<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Menu;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model backend\models\Menu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="menu-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'meta_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'meta_desc')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'meta_keywords')->textarea(['rows' => 6]) ?>
    
    <?= $form->field($model, 'order_number')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'visible_type')->widget(Select2::className(), ['data' => [Menu::SHOW_FOR_ALL => 'Show for all', Menu::SHOW_FOR_GUESTS => 'Show for guests only', Menu::SHOW_FOR_REGISTERED => 'Show for registered only']]) ?>

    <?= $form->field($model, 'status')->widget(Select2::className(), ['data' => [1 => 'Enabled', 0 => 'Disabled']]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
