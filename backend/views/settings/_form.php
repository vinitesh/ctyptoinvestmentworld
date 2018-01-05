<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\elfinder\InputFile;

/* @var $this yii\web\View */
/* @var $model backend\models\Settings */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="settings-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'procent')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'main_site_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'default_meta_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'default_meta_description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'default_meta_keywords')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'logo')->widget(InputFile::className(), [
		'language' => 'en',
		'controller' => 'elfinder',
		'filter' => 'image',
		'template' => '<div class="input-group">{input}<span class="input-group-btn btn-none">{button}</span></div>',
		'options' => ['class' => 'form-control'],
		'buttonOptions' => ['class' => 'btn btn-default'],
		'multiple' => false
	    ]) ?>
    <div class="prev-image">
	<?php 
	if ($model->logo) {
	    echo Html::img($model->main_site_url.$model->logo);
	}
	?>
    </div>
    
    <?= $form->field($model, 'logo_text')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'favicon')->widget(InputFile::className(), [
		'language' => 'en',
		'controller' => 'elfinder',
		'filter' => 'image',
		'template' => '<div class="input-group">{input}<span class="input-group-btn btn-none">{button}</span></div>',
		'options' => ['class' => 'form-control'],
		'buttonOptions' => ['class' => 'btn btn-default'],
		'multiple' => false
	    ]) ?>
    <div class="prev-image">
	<?php 
	if ($model->favicon) {
	    echo Html::img($model->main_site_url.$model->favicon);
	}
	?>
    </div>

    <?= $form->field($model, 'status')->widget(\kartik\select2\Select2::className(), ['data' => [0 => 'Disabled', 1 => 'Enabled']]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
