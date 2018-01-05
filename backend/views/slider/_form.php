<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\elfinder\InputFile;
use backend\models\Settings;
$settings = Settings::findOne(1);

/* @var $this yii\web\View */
/* @var $model backend\models\Slider */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="slider-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image')->widget(InputFile::className(), [
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
	if ($model->image) {
	    echo Html::img($settings->main_site_url.$model->image);
	}
	?>
    </div>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'show_button')->widget(\kartik\select2\Select2::className(), ['data' => [0 => 'Hide', 1 => 'Show']]) ?>

    <?= $form->field($model, 'button_text')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->widget(\kartik\select2\Select2::className(), ['data' => [0 => 'Disabled', 1 => 'Enabled']]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
