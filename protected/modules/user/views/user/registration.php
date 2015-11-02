<?php
	$this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Registration");
	// $this->breadcrumbs=array(
		// UserModule::t("Registration"),
	// );
?>
<div class="container">
<div class="row">
	<div class="form-registration">
		<h1>
			<?php
				echo UserModule::t("Registration");
			?>
		</h1>

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
			if(Yii::app()->user->hasFlash('registration')):
		?>
				<div class="success">
					<?php
						echo Yii::app()->user->getFlash('registration');
					?>
				</div>
		<?php
			else:
		?>
				<?php
					$form=$this->beginWidget(
						'booster.widgets.TbActiveForm',
						array(
							'id'=>'article-form',
							'type' => 'horizontal',
							'enableAjaxValidation'=>false,
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
					
					<?php
						echo $form->passwordFieldGroup(
							$model,
							'password',
							array(
								'widgetOptions' => array(
									'htmlOptions' => array(
									)
								),
								'hint' => UserModule::t("Minimal password length 4 symbols.")
							)
						);
					?>
					
					<?php
						echo $form->passwordFieldGroup(
							$model,
							'verifyPassword',
							array(
								'widgetOptions' => array(
									'htmlOptions' => array(
									)
								),
								// 'hint' => UserModule::t("Minimal password length 4 symbols.")
							)
						);
					?>
					
					<?php
						echo $form->textFieldGroup(
							$model,
							'email',
							array(
								'widgetOptions' => array(
									'htmlOptions' => array(
									)
								),
								// 'hint' => UserModule::t("Minimal password length 4 symbols.")
							)
						);
					?>
					
					<?php 
						$profileFields=$profile->getFields();
						
						if ($profileFields) {
							foreach($profileFields as $field) {
					?>
							<div class="form-group">
								<?php
									echo $form->labelEx($profile,$field->varname,array('class'=>'col-sm-3 control-label'));
								?>
								<div class="col-sm-9">
								<?php 
									if ($field->widgetEdit($profile)) {
										echo $field->widgetEdit($profile, array('class'=>'form-control'));
									} elseif ($field->range) {
										echo $form->dropDownList($profile,$field->varname,Profile::range($field->range),array('class'=>'form-control'));
									} elseif ($field->field_type=="TEXT") {
										echo$form->textArea($profile,$field->varname,array('rows'=>6, 'cols'=>50, 'class'=>'form-control'));
									} else {
										echo $form->textField($profile,$field->varname,array('size'=>60,'maxlength'=>(($field->field_size)?$field->field_size:255),'class'=>'form-control'));
									}
								 ?>
								<?php
									echo $form->error($profile,$field->varname);
								?>
								</div>
							</div>	
					<?php
							}
						}
					?>

					<?php
						if (UserModule::doCaptcha('registration')):
					?>
							<div class="form-group">
								<?php
									echo $form->labelEx($model,'verifyCode',array('class'=>'control-label col-sm-3'));
								?>
								<div class="col-sm-9">
									<?php
										$this->widget('CCaptcha');
									?>
									<?php
										echo $form->textField($model,'verifyCode',array('class'=>'form-control'));
									?>
									<?php
										echo $form->error($model,'verifyCode');
									?>
									
									<div class="help-block">
										<?php 
											echo UserModule::t("Please enter the letters as they are shown in the image above.");
										?>
										<br/>
										<?php
											echo UserModule::t("Letters are not case-sensitive.");
										?>
									</div>
								</div>
							</div>
					<?php
						endif;
					?>
					
					<div class="form-actions text-right">
						<?php
							$this->widget(
								'booster.widgets.TbButton', array(
									'buttonType'=>'submit',
									'context'=>'primary',
									'label'=>'Register',
								)
							);
						?>
					</div>

				<?php
					$this->endWidget();
				?>
			<?php
				endif;
			?>
		<?php
			$this->endWidget();
		?>
	</div>
</div>
</div>