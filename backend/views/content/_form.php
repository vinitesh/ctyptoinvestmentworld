<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use kartik\select2\Select2;
use mihaildev\elfinder\ElFinder;

/* @var $this yii\web\View */
/* @var $model backend\models\ContentBlocks */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="content-blocks-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'show_title')->widget(Select2::className(), ['data' => [1 => 'Show', 2 => 'Hide']]) ?>

    <?= $form->field($model, 'position')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text')->widget(CKEditor::className(), ['editorOptions' => ElFinder::ckeditorOptions(['elfinder'])]); ?>

    <?= $form->field($model, 'status')->widget(\kartik\select2\Select2::className(), ['data' => [0 => 'Disabled', 1 => 'Enabled']]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
