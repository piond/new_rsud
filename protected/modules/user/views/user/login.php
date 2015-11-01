<?php
$this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Login");
// $this->breadcrumbs=array(
	// UserModule::t("Login"),
// );
?>

<h1><?php echo UserModule::t("Login"); ?></h1>

<?php if(Yii::app()->user->hasFlash('loginMessage')): ?>

<div class="success">
	<?php echo Yii::app()->user->getFlash('loginMessage'); ?>
</div>

<?php endif; ?>

<p><?php echo UserModule::t("Please fill out the following form with your login credentials:"); ?></p>

<!--<div class="form">-->
<?php //echo CHtml::beginForm(); ?>
<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'article-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></p>
	
	<?php echo $form->errorSummary($model); ?>
	
	<div class="row">
		<div class="col-md-4">
			<?php
				echo $form->textFieldGroup(
					$model,
					'username',
					array(
						'widgetOptions' => array(
							'htmlOptions' => array(
							)
						)
					)
				);
			?>
		</div>
	</div>
	
	<!--<div class="row">-->
		<?php //echo CHtml::activeLabelEx($model,'username'); ?>
		<?php //echo CHtml::activeTextField($model,'username') ?>
	<!--</div>-->
	
	<div class="row">
		<div class="col-md-4">
			<?php
				echo $form->passwordFieldGroup(
					$model,
					'password',
					array(
						'widgetOptions' => array(
							'htmlOptions' => array(
							)
						)
					)
				);
			?>
		</div>
	</div>
	
	<!--<div class="row">-->
		<?php //echo CHtml::activeLabelEx($model,'password'); ?>
		<?php //echo CHtml::activePasswordField($model,'password') ?>
	<!--</div>-->
	
	<div class="row">
		<div class="col-md-4">
			<p class="hint">
			<?php echo CHtml::link(UserModule::t("Register"),Yii::app()->getModule('user')->registrationUrl); ?> | <?php echo CHtml::link(UserModule::t("Lost Password?"),Yii::app()->getModule('user')->recoveryUrl); ?>
			</p>
		</div>
	</div>
	
	<?php
		echo $form->checkboxGroup(
			$model,
			'rememberMe'
		);
	?>
	
	<!--<div class="row rememberMe">
		<div class="col-md-4">-->
			<?php //echo CHtml::activeCheckBox($model,'rememberMe'); ?>
			<?php //echo CHtml::activeLabelEx($model,'rememberMe'); ?>
	<!--	</div>
	</div>-->

	<div class="form-actions">
		<?php
			$this->widget(
				'booster.widgets.TbButton',
				array(
					'buttonType'=>'submit',
					'context'=>'primary',
					'label'=>'Login',
				)
			);
		?>
	</div>
	<!--<div class="row submit">
		<div class="col-md-4">-->
			<?php //echo CHtml::submitButton(UserModule::t("Login")); ?>
	<!--	</div>
	</div>-->

<?php $this->endWidget(); ?>
<?php //echo CHtml::endForm(); ?>
<!--</div>--><!-- form -->


<?php
$form = new CForm(array(
    'elements'=>array(
        'username'=>array(
            'type'=>'text',
            'maxlength'=>32,
        ),
        'password'=>array(
            'type'=>'password',
            'maxlength'=>32,
        ),
        'rememberMe'=>array(
            'type'=>'checkbox',
        )
    ),

    'buttons'=>array(
        'login'=>array(
            'type'=>'submit',
            'label'=>'Login',
        ),
    ),
), $model);
?>