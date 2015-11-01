<?php
	$this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Change Password");
	$this->breadcrumbs=array(
		UserModule::t("Profile") => array('/user/profile'),
		UserModule::t("Change Password"),
	);
?>

<h2>
	<?php 
		echo UserModule::t("Change password");
	?>
</h2>

<?php
	echo $this->renderPartial('menu');
?>

<?php
	$form=$this->beginWidget(
		'booster.widgets.TbActiveForm',
		array(
			'id'=>'changepassword-form',
			'type'=> 'horizontal',
			'enableAjaxValidation'=>true,
			'htmlOptions' => array(
				'enctype'=>'multipart/form-data'
			),
		)
	);
?>

	<div class="alert alert-info">
		<?php
			echo UserModule::t('Fields with <span class="required">*</span> are required.');
		?>
	</div>
	
	<?php
		if(CHtml::errorSummary($model)){
			echo '<div class="alert alert-danger">';
				echo CHtml::errorSummary($model);
			echo '</div>';
		}
	?>
	
	<?php
		echo $form->passwordFieldGroup(
			$model,
			'password',
			array(
				'wrapperHtmlOptions' => array(
					// 'class' => ''
				),
				'hint' => UserModule::t("Minimal password length 4 symbols."),
				'widgetOptions' => array(
					'htmlOptions' => array(
						// 'size' => 60,
						// 'maxlength' => (($field->field_size)?$field->field_size:255)
					)
				)
			)
		);
	?>
	<?php
		// echo $form->error($model,'password');
	?>
	<?php
		echo $form->passwordFieldGroup(
			$model,
			'verifyPassword',
			array(
				'wrapperHtmlOptions' => array(
					// 'class' => ''
				),
				// 'hint' => UserModule::t("Minimal password length 4 symbols."),
				'widgetOptions' => array(
					'htmlOptions' => array(
						// 'size' => 60,
						// 'maxlength' => (($field->field_size)?$field->field_size:255)
					)
				)
			)
		);
	?>
	<?php
		// echo $form->error($model,'verifyPassword');
	?>	
	
	<div class="form-actions text-right">
	<?php
		$this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>'Save',
		));
	?>
	</div>

<?php
	$this->endWidget();
?>