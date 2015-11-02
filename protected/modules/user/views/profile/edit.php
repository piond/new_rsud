<?php
	$this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Profile");
	$this->breadcrumbs=array(
		UserModule::t("Profile")=>array('profile'),
		UserModule::t("Edit"),
	);
?>

<h2>
	<?php
		echo UserModule::t('Edit profile');
	?>
</h2>

<?php
	echo $this->renderPartial('menu');
?>

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
	if(Yii::app()->user->hasFlash('profileMessage')):
?>
	<div class="alert alert-success" role="alert">
		<?php
			echo Yii::app()->user->getFlash('profileMessage');
		?>
	</div>
<?php
	endif;
?>

<?php
	$form=$this->beginWidget(
		'booster.widgets.TbActiveForm',
		array(
			'id'=>'profile-form',
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
		echo $form->errorSummary(array($model,$profile));
	?>
	
	<?php
		$profileFields=$profile->getFields();
		if ($profileFields) {
			foreach($profileFields as $field) {
				if ($field->widgetEdit($profile)) {
					echo '<div class="form-group">';
						echo '<label class="control-label col-md-3">';
							echo $form->labelEx($profile,$field->varname);
						echo '</label>';
						echo '<div class="col-md-9">';
							echo $field->widgetEdit($profile, array('class'=> 'form-control'));
						echo '</div>';
					echo '</div>';
				} elseif ($field->range) {
					echo $form->dropDownListGroup(
						$profile,
						$field->varname,
						array(
							'wrapperHtmlOptions' => array(
								// 'class' => 'col-sm-5',
							),
							'widgetOptions' => array(
								'data' => Profile::range($field->range),
								'htmlOptions' => array(
									// 'multiple' => true
								),
							)
						)
					);
				} elseif ($field->field_type=="TEXT") {
					echo $form->textAreaGroup(
						$profile,
						$field->varname,
						array(
							'wrapperHtmlOptions' => array(
								// 'class' => 'col-sm-5',
							),
							'widgetOptions' => array(
								'htmlOptions' => array('rows' => 5),
							)
						)
					);
				} else {
					echo $form->textFieldGroup(
						$profile,
						$field->varname,
						array(
							'widgetOptions' => array(
								'htmlOptions' => array(
									'size' => 60,
									'maxlength' => (($field->field_size)?$field->field_size:255)
								)
							)
						)
					);
				}
			}
		}
		echo $form->textFieldGroup(
			$model,
			'username',
			array(
				'widgetOptions' => array(
					'htmlOptions' => array(
						'size' => 60,
						'maxlength' => (($field->field_size)?$field->field_size:255)
					)
				)
			)
		);
		echo $form->error($model,'username');
		
		echo $form->textFieldGroup(
			$model,
			'email',
			array(
				'widgetOptions' => array(
					'htmlOptions' => array(
						'size' => 60,
						'maxlength' => (($field->field_size)?$field->field_size:255)
					)
				)
			)
		);
		echo $form->error($model,'email');
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