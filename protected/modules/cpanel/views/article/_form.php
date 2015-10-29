<?php
	$form=$this->beginWidget(
		'booster.widgets.TbActiveForm',
		array(
			'id'=>'article-form',
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
	
	<div class="row">
		<div class="col-md-10">
			<?php
				echo $form->textFieldGroup(
					$model,
					'title',
					array(
						'widgetOptions' => array(
							'htmlOptions' => array(
							)
						)
					)
				);
			?>
		</div>

		<div class="col-md-2">
			<?php
				echo $form->switchGroup(
					$model,
					'published',
					array(
						'widgetOptions' => array(
							'options' => array(
								'size' => 'small',
								'onText' => 'Yes',
								'offText' => 'No',
								'onColor' => 'success',
								'offColor' => 'danger'
							),
							'events' => array(
								'switchChange' => 'js:function(event, state) {
										console.log(this);
										console.log(event);
										console.log(state);
									}'
							)
						)
					)
				);
			?>
		</div>
	</div>
	
	<?php //echo $form->textAreaGroup($model,'title', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50)))); ?>

	<?php
		echo $form->markdownEditorGroup(
			$model,
			'content',
			array(
				'widgetOptions' => array(
					'htmlOptions' => array(
						'style' => 'height:200px;'
					)
				)
			)
		);
	?>
	
	<?php //echo $form->textAreaGroup($model,'content', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50)))); ?>

	<?php
		// echo $form->hiddenField(
			// $model,
			// 'createdAt',
			// array(
				// 'value' => date('Y-m-d')
			// )
		// );
	?>
	
	<?php //echo $form->datePickerGroup($model,'createdAt',array('widgetOptions'=>array('options'=>array('format'=>'yyyy-mm-dd'),'htmlOptions'=>array()), 'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>', 'append'=>'Click on Month/Year to select a different Month/Year.')); ?>

	<?php
		// echo $form->hiddenField(
			// $model,
			// 'modifiedAt',
			// array(
				// 'value' => date('Y-m-d')
			// )
		// );
	?>
	
	<?php //echo $form->datePickerGroup($model,'modifiedAt',array('widgetOptions'=>array('options'=>array('format'=>'yyyy-mm-dd'),'htmlOptions'=>array()), 'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>', 'append'=>'Click on Month/Year to select a different Month/Year.')); ?>

	
	
	<?php //echo $form->textFieldGroup($model,'published',array('widgetOptions'=>array('htmlOptions'=>array()))); ?>

	<?php
		// echo $form->textFieldGroup(
			// $model,
			// 'author_id',
			// array(
				// 'widgetOptions' => array(
					// 'htmlOptions' => array(
					
					// )
				// )
			// )
		// );
	?>

	<?php
		// echo $form->textFieldGroup(
			// $model,
			// 'views',
			// array(
				// 'widgetOptions' => array(
					// 'htmlOptions' => array(
					
					// )
				// )
			// )
		// );
	?>
	
	<?php
		echo $form->dropDownListGroup(
			$model,
			'category_id',
			array(
				'wrapperHtmlOptions' => array(
					// 'class' => 'col-sm-5'
				),
				'widgetOptions' => array(
					'data' => $list
				)
			)
		);
	?>

	<?php
		// echo $form->textFieldGroup(
			// $model,
			// 'category_id',
			// array(
				// 'widgetOptions' => array(
					// 'htmlOptions' => array(
					
					// )
				// )
			// )
		// );
	?>

<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
