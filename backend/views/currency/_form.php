<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\elfinder\InputFile;

$settings = backend\models\Settings::findOne(1);
/* @var $this yii\web\View */
/* @var $model backend\models\Currency */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="currency-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'letter')->textInput(['maxlength' => true]) ?>

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
	    echo Html::img($settings->main_site_url.$model->logo);
	}
	?>
    </div>

    <?= $form->field($model, 'short_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rate')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'order_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->widget(\kartik\select2\Select2::className(), ['data' => [1 => 'Enabled', 0 => 'Disabled']]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
