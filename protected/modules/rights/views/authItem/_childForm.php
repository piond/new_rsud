<div class="form">

<?php 
	$form=$this->beginWidget('CActiveForm'); ?>
	
		<div class="form-group">
			<?php echo $form->dropDownList($model, 'itemname', $itemnameSelectOptions, array('class' => 'form-control')); ?>
			<?php echo $form->error($model, 'itemname'); ?>
		</div>
		
		<div class="form-actions text-right">
			<?php
				$this->widget(
					'booster.widgets.TbButton', array(
						'buttonType'=>'submit',
						'context'=>'primary',
						'label'=>'Add',
					)
				);
			?>
		</div>
<?php
	$this->endWidget();
?>

</div>