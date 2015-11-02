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
		echo CHtml::beginForm('','post',array('class' => 'form-horizontal'));
	?>

		<div class="alert alert-info">
			<?php 
				echo UserModule::t('Fields with <span class="required">*</span> are required.'); 
			?>
		</div>

		<?php
			if(CHtml::errorSummary($model)){
		?>
				<div class="alert alert-danger">
					<?php echo CHtml::errorSummary($model); ?>
				</div>
		<?php
			}
		?>
		
		<div class="form-group">
			<label class="control-label col-sm-3">
				<?php 
					echo CHtml::activeLabelEx($model,'varname'); 
				?>
			</label>
			<div class="col-sm-9">
				<?php 
					echo (($model->id)?CHtml::activeTextField($model,'varname',array('size'=>60,'maxlength'=>50,'readonly'=>true, 'class'=>'form-control')):CHtml::activeTextField($model,'varname',array('size'=>60,'maxlength'=>50, 'class'=>'form-control'))); 
				?>
				<span class="help-block error">
					<?php 
						echo CHtml::error($model,'varname'); 
					?>
				</span>
				<span class="help-block">
					<?php 
						echo UserModule::t("Allowed lowercase letters and digits."); 
					?>
				</span>
			</div>
		</div>

		<div class="form-group">
			<label class="control-label col-sm-3">
				<?php 
					echo CHtml::activeLabelEx($model,'title');
				?>
			</label>
			<div class="col-sm-9">
				<?php 
					echo CHtml::activeTextField($model,'title',array('size'=>60,'maxlength'=>255, 'class'=>'form-control')); 
				?>
				<span class="help-block error">
					<?php 
						echo CHtml::error($model,'title'); 
					?>
				</span>
				<span class="help-block">
					<?php 
						echo UserModule::t('Field name on the language of "sourceLanguage".'); 
					?>
				</span>
			</div>
		</div>

		<div class="form-group">
			<label class="control-label col-sm-3">
				<?php 
					echo CHtml::activeLabelEx($model,'field_type'); 
				?>
			</label>
			<div class="col-sm-9">
				<?php 
					echo (($model->id)?CHtml::activeTextField($model,'field_type',array('size'=>60,'maxlength'=>50,'readonly'=>true,'id'=>'field_type', 'class'=>'form-control')):CHtml::activeDropDownList($model,'field_type',ProfileField::itemAlias('field_type'),array('id'=>'field_type', 'class'=>'form-control'))); 
				?>
				<span class="help-block error">
					<?php 
						echo CHtml::error($model,'field_type'); 
					?>
				</span>
				<span class="help-block">
					<?php 
						echo UserModule::t('Field type column in the database.'); 
					?>
				</span>
			</div>
		</div>

		<div class="form-group">
			<label class="control-label col-sm-3">
				<?php 
					echo CHtml::activeLabelEx($model,'field_size'); 
				?>
			</label>
			<div class="col-sm-9">
				<?php 
					echo (($model->id)?CHtml::activeTextField($model,'field_size',array('readonly'=>true, 'class'=>'form-control')):CHtml::activeTextField($model,'field_size',array('class'=>'form-control'))); 
				?>
				<span class="help-block error">
					<?php 
						echo CHtml::error($model,'field_size'); 
					?>
				</span>
				<span class="help-block">
					<?php 
						echo UserModule::t('Field size column in the database.'); 
					?>
				</span>
			</div>
		</div>

		<div class="form-group">
			<label class="control-label col-sm-3">
				<?php 
					echo CHtml::activeLabelEx($model,'field_size_min'); 
				?>
			</label>
			<div class="col-sm-9">
				<?php 
					echo CHtml::activeTextField($model,'field_size_min', array('class'=>'form-control')); 
				?>
				<span class="help-block error">
					<?php 
						echo CHtml::error($model,'field_size_min'); 
					?>
				</span>
				<span class="help-block">
					<?php 
						echo UserModule::t('The minimum value of the field (form validator).'); 
					?>
				</span>
			</div>
		</div>

		<div class="form-group">
			<label class="control-label col-sm-3">
				<?php 
					echo CHtml::activeLabelEx($model,'required'); 
				?>
			</label>
			<div class="col-sm-9">
				<?php 
					echo CHtml::activeDropDownList($model,'required',ProfileField::itemAlias('required'),array('class'=>'form-control')); 
				?>
				<span class="help-block error">
					<?php 
						echo CHtml::error($model,'required'); 
					?>
				</span>
				<span class="help-block">
					<?php 
						echo UserModule::t('Required field (form validator).'); 
					?>
				</span>
			</div>
		</div>

		<div class="form-group">
			<label class="control-label col-sm-3">
				<?php 
					echo CHtml::activeLabelEx($model,'match'); 
				?>
			</label>
			<div class="col-sm-9">
				<?php 
					echo CHtml::activeTextField($model,'match',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); 
				?>
				<span class="help-block error">
					<?php 
						echo CHtml::error($model,'match'); 
					?>
				</span>
				<span class="help-block">
					<?php 
						echo UserModule::t("Regular expression (example: '/^[A-Za-z0-9\s,]+$/u')."); 
					?>
				</span>
			</div>
		</div>

		<div class="form-group">
			<label class="control-label col-sm-3">
				<?php 
					echo CHtml::activeLabelEx($model,'range'); 
				?>
			</label>
			<div class="col-sm-9">
				<?php 
					echo CHtml::activeTextField($model,'range',array('size'=>60,'maxlength'=>5000,'class'=>'form-control')); 
				?>
				<span class="help-block error">
					<?php 
						echo CHtml::error($model,'range'); 
					?>
				</span>
				<span class="help-block">
					<?php 
						echo UserModule::t('Predefined values (example: 1;2;3;4;5 or 1==One;2==Two;3==Three;4==Four;5==Five).'); 
					?>
				</span>
			</div>
		</div>

		<div class="form-group">
			<label class="control-label col-sm-3">
				<?php 
					echo CHtml::activeLabelEx($model,'error_message'); 
				?>
			</label>
			<div class="col-sm-9">
				<?php 
					echo CHtml::activeTextField($model,'error_message',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); 
				?>
				<span class="help-block error">
					<?php 
						echo CHtml::error($model,'error_message'); 
					?>
				</span>
				<span class="help-block">
					<?php 
						echo UserModule::t('Error message when you validate the form.'); 
					?>
				</span>
			</div>
		</div>

		<div class="form-group">
			<label class="control-label col-sm-3">
				<?php 
					echo CHtml::activeLabelEx($model,'other_validator'); 
				?>
			</label>
			<div class="col-sm-9">
				<?php 
					echo CHtml::activeTextField($model,'other_validator',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); 
				?>
				<span class="help-block error">
					<?php 
						echo CHtml::error($model,'other_validator'); 
					?>
				</span>
				<span class="help-block">
					<?php
						echo UserModule::t('JSON string (example: {example}).',array('{example}'=>CJavaScript::jsonEncode(array('file'=>array('types'=>'jpg, gif, png'))))); 
					?>
				</span>
			</div>
		</div>

		<div class="form-group">
			<label class="control-label col-sm-3">
				<?php 
					echo CHtml::activeLabelEx($model,'default'); 
				?>
			</label>
			<div class="col-sm-9">
				<?php 
					echo (($model->id)?CHtml::activeTextField($model,'default',array('size'=>60,'maxlength'=>255,'readonly'=>true,'class'=>'form-control')):CHtml::activeTextField($model,'default',array('size'=>60,'maxlength'=>255,'class'=>'form-control'))); 
				?>
				<span class="help-block error">
					<?php 
						echo CHtml::error($model,'default'); 
					?>
				</span>
				<span class="help-block">
					<?php 
						echo UserModule::t('The value of the default field (database).'); 
					?>
				</span>
			</div>
		</div>

		<div class="form-group">
			<label class="control-label col-sm-3">
				<?php 
					echo CHtml::activeLabelEx($model,'widget'); 
				?>
			</label>
			<div class="col-sm-9">
				<?php 
					list($widgetsList) = ProfileFieldController::getWidgets($model->field_type);
					echo CHtml::activeDropDownList($model,'widget',$widgetsList,array('id'=>'widgetlist','class'=>'form-control'));
					//echo CHtml::activeTextField($model,'widget',array('size'=>60,'maxlength'=>255)); 
				?>
				<span class="help-block error">
					<?php 
						echo CHtml::error($model,'widget'); 
					?>
				</span>
				<span class="help-block">
					<?php 
						echo UserModule::t('Widget name.');
					?>
				</span>
			</div>
		</div>

		<div class="form-group">
			<label class="control-label col-sm-3">
				<?php 
					echo CHtml::activeLabelEx($model,'widgetparams'); 
				?>
			</label>
			<div class="col-sm-9">
				<?php 
					echo CHtml::activeTextField($model,'widgetparams',array('size'=>60,'maxlength'=>5000,'id'=>'widgetparams','class'=>'form-control')); 
				?>
				<span class="help-block error">
					<?php 
						echo CHtml::error($model,'widgetparams'); 
					?>
				</span>
				<span class="help-block">
					<?php 
						echo UserModule::t('JSON string (example: {example}).',array('{example}'=>CJavaScript::jsonEncode(array('param1'=>array('val1','val2'),'param2'=>array('k1'=>'v1','k2'=>'v2'))))); 
					?>
				</span>
			</div>
		</div>

		<div class="form-group">
			<label class="control-label col-sm-3">
				<?php 
					echo CHtml::activeLabelEx($model,'position'); 
				?>
			</label>
			<div class="col-sm-9">
				<?php 
					echo CHtml::activeTextField($model,'position',array('class'=>'form-control')); 
				?>
				<span class="help-block error">
					<?php 
						echo CHtml::error($model,'position'); 
					?>
				</span>
				<span class="help-block">
					<?php 
						echo UserModule::t('Display order of fields.'); 
					?>
				</span>
			</div>
		</div>

		<div class="form-group">
			<label class="control-label col-sm-3">
				<?php 
					echo CHtml::activeLabelEx($model,'visible'); 
				?>
			</label>
			<div class="col-sm-9">
				<?php 
					echo CHtml::activeDropDownList($model,'visible',ProfileField::itemAlias('visible'),array('class'=>'form-control')); 
				?>
				<span class="help-block error">
					<?php 
						echo CHtml::error($model,'visible'); 
					?>
				</span>
			</div>
		</div>
		
		<div class="form-actions text-right">
		<?php
			$this->widget('booster.widgets.TbButton', array(
				'buttonType'=>'submit',
				'context'=>'primary',
				'label'=>$model->isNewRecord ? UserModule::t('Create') : UserModule::t('Save'),
			));
		?>
		</div>

	<?php echo CHtml::endForm(); ?>

<?php $this->endWidget(); ?>

<div id="dialog-form" title="<?php echo UserModule::t('Widget parameters'); ?>">
	<form>
	<fieldset>
		<label for="name" class="control-label">Name</label>
		<input type="text" name="name" id="name" class="text ui-widget-content ui-corner-all form-control" />
		<label for="value" class="control-label">Value</label>
		<input type="text" name="value" id="value" value="" class="text ui-widget-content ui-corner-all form-control" />
	</fieldset>
	</form>
</div>
