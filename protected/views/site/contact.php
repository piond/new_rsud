<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Contact Us';
$this->breadcrumbs=array(
	'Contact',
);
?>

<h1>Contact Us</h1>

<?php if(Yii::app()->user->hasFlash('contact')): ?>

<div class="alert alert-success">
	<?php echo Yii::app()->user->getFlash('contact'); ?>
</div>

<?php else: ?>

<p>
If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
</p>

<div class="form">

<?php
	$form=$this->beginWidget(
		'booster.widgets.TbActiveForm',
		array(
			'id'=>'article-form',
			'type'=>'horizontal',
			'enableAjaxValidation'=>false,
		)
	);
?>

	<div class="alert alert-info">
		Fields with <span class="required">*</span> are required.
	</div>

	<?php
		echo $form->errorSummary($model);
	?>

	<div class="form-group">
		<label class="control-label col-sm-3">
			<?php echo $form->labelEx($model,'name'); ?>
		</label>
		<div class="col-sm-9">
			<?php echo $form->textField($model,'name',array('class'=>'form-control')); ?>
			<span class="help-inline">
				<?php echo $form->error($model,'name'); ?>
			</span>
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-sm-3">
			<?php echo $form->labelEx($model,'email'); ?>
		</label>
		<div class="col-sm-9">
			<?php echo $form->textField($model,'email',array('class'=>'form-control')); ?>
			<span class="help-inline">
				<?php echo $form->error($model,'email'); ?>
			</span>
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-sm-3">
			<?php echo $form->labelEx($model,'subject'); ?>
		</label>
		<div class="col-sm-9">
			<?php echo $form->textField($model,'subject',array('size'=>60,'maxlength'=>128,'class'=>'form-control')); ?>
			<span class="help-inline">
				<?php echo $form->error($model,'subject'); ?>
			</span>
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-sm-3">
			<?php echo $form->labelEx($model,'body'); ?>
		</label>
		<div class="col-sm-9">
			<?php echo $form->textArea($model,'body',array('rows'=>6, 'cols'=>50,'class'=>'form-control')); ?>
			<span class="help-inline">
				<?php echo $form->error($model,'body'); ?>
			</span>
		</div>
	</div>

	<?php if(CCaptcha::checkRequirements()): ?>
	<div class="form-group">
		<label class="control-label col-sm-3">
			<?php echo $form->labelEx($model,'verifyCode'); ?>
		</label>
		<div class="col-sm-9">
			<div>
			<?php $this->widget('CCaptcha'); ?>
			<?php echo $form->textField($model,'verifyCode',array('class'=>'form-control')); ?>
			</div>
			<span class="help-block">
				Please enter the letters as they are shown in the image above.
				<br/>Letters are not case-sensitive.
			</span>
			<span class="help-inline">
				<?php echo $form->error($model,'verifyCode'); ?>
			</span>
		</div>
	</div>
	<?php endif; ?>

	<div class="form-actions text-right">
	<?php
		$this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>'Submit',
		));
	?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php endif; ?>