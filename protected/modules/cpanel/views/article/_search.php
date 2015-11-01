<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldGroup($model,'article_id',array('widgetOptions'=>array('htmlOptions'=>array()))); ?>

		<?php echo $form->textFieldGroup($model,'title', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50)))); ?>

		<?php echo $form->textAreaGroup($model,'content', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50)))); ?>

		<?php echo $form->datePickerGroup($model,'createdAt',array('widgetOptions'=>array('options'=>array(),'htmlOptions'=>array()), 'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>', 'append'=>'Click on Month/Year to select a different Month/Year.')); ?>

		<?php echo $form->datePickerGroup($model,'modifiedAt',array('widgetOptions'=>array('options'=>array(),'htmlOptions'=>array()), 'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>', 'append'=>'Click on Month/Year to select a different Month/Year.')); ?>

		<?php echo $form->textFieldGroup($model,'published',array('widgetOptions'=>array('htmlOptions'=>array()))); ?>

		<?php echo $form->textFieldGroup($model,'author_id',array('widgetOptions'=>array('htmlOptions'=>array()))); ?>

		<?php echo $form->textFieldGroup($model,'views',array('widgetOptions'=>array('htmlOptions'=>array()))); ?>

		<?php echo $form->textFieldGroup($model,'category_id',array('widgetOptions'=>array('htmlOptions'=>array()))); ?>

	<div class="form-actions">
		<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType' => 'submit',
			'context'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
