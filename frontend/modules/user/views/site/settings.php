<?php

use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;

$this->title = "Account settings - " . $model->fullName;
?>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
	    <div class="x_title">
		<h2>Account settings <small><?= $model->fullName ?></small></h2>
		<ul class="nav navbar-right panel_toolbox">
		    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
		    </li>		    
		</ul>
		<div class="clearfix"></div>
	    </div>
	    <div class="x_content">
		<br>
		<?php
		$form = ActiveForm::begin(['layout' => 'horizontal',
			    'fieldConfig' => [
				'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
				'horizontalCssClasses' => [
				    'label' => 'col-sm-2 marginright20',
				    'offset' => 'col-sm-offset-4',
				    'wrapper' => 'col-sm-8',
				    'error' => '',
				    'hint' => '',
				],
			    ],
			    'options' => ['class' => 'form-horizontal form-label-left']]);
		?>

		<?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'password_hash')->textInput(['maxlength' => true, 'value' => ''])->label('Password') ?>

		<?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

		<div class="form-group field-user-phone">
		    <div class="col-sm-2 marginright20"></div>
		    <div class="col-sm-8">
			<div class="form-group footer pull-right">
			    <?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
			</div>
		    </div>
		</div>		

		<?php ActiveForm::end(); ?>
	    </div>
	</div>
    </div>
</div>