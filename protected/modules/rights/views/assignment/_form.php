<div class="row">

<?php $form=$this->beginWidget('CActiveForm'); ?>
	
	<div class="form-group col-md-6">
		<?php echo $form->dropDownList($model, 'itemname', $itemnameSelectOptions, array('class'=>'form-control')); ?>
		<?php echo $form->error($model, 'itemname'); ?>
	</div>
	
	<div class="form-group col-md-6">
		<?php echo CHtml::submitButton(Rights::t('core', 'Assign'),array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div>