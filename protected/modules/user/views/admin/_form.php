<?php
	$box = $this->beginWidget(
		'booster.widgets.TbPanel',
		array(
			'title' => false,
			// 'headerIcon' => 'th-list',
			'padContent' => true,
			// 'htmlOptions' => array('class' => 'bootstrap-widget-table')
		)
	);
?>

<?php
	$form = $this->beginWidget(
		'booster.widgets.TbActiveForm',
		array(
			'id'=>'form-user',
			'type'=> 'horizontal',
			'enableAjaxValidation'=>true,
			'htmlOptions' => array(
				'enctype'=>'multipart/form-data'
			),
		)
	);
 ?>

	<div class="alert alert-info"><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></div>

	<?php 
		echo $form->errorSummary(array($model,$profile));
	?>

	<?php 
		echo $form->textFieldGroup($model , 'username'); 
	?>
	<?php 
		echo $form->passwordFieldGroup($model , 'password'); 
	?>
	<?php
		echo $form->textFieldGroup($model , 'email'); 
	?>
	<?php
		echo $form->dropDownListGroup(
			$model,
			'superuser', 
			array(
				'widgetOptions'=>array('data'=>User::itemAlias('AdminStatus'))
			)
		); 
	?>
	<?php
		echo $form->dropDownListGroup(
			$model,
			'status', 
			array(
				'widgetOptions'=>array('data'=>User::itemAlias('UserStatus'))
			)
		);
	?>

	<?php 
		$profileFields=$profile->getFields();
		if ($profileFields) {
			foreach($profileFields as $field) {
			?>
			
    		
				<?php 
				if ($field->widgetEdit($profile)) {
				?>
					<div class="form-group">
					<label class="col-md-3 control-label"><?php echo CHtml::activeLabelEx($profile,$field->varname); ?></label>		
					<div class="col-md-9">
						<?php echo $field->widgetEdit($profile, array('class'=> 'form-control')); ?>
				    </div>
				    </div>
				    
				<?php
				} elseif ($field->range) {
				?>
					<?php echo $form->dropDownListGroup($profile,$field->varname, array(
						'widgetOptions'=>array('data'=>Profile::range($field->range))
					)); ?>	
				     <?php //echo $form->dropDownListRow($profile,$field->varname,Profile::range($field->range)); ?>
				    
				<?php
				} elseif ($field->field_type=="TEXT") {
				?>
					
				      <?php echo $form->textAreaGroup($profile,$field->varname,array('rows'=>6, 'cols'=>50)); ?>
				    
				<?php
				} else {
				?>
					
				      <?php echo $form->textFieldGroup($profile,$field->varname,array('size'=>60,'maxlength'=>(($field->field_size)?$field->field_size:255))); ?>
				    
				<?php
				}
				?>
				<!--<span class="help-block"><?php //echo CHtml::error($profile,$field->varname); ?></span>-->
  			
			<?php
			}
		}
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

<?php $this->endWidget(); ?>

<?php $this->endWidget(); ?>