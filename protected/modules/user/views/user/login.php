<?php
$this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Login");
// $this->breadcrumbs=array(
	// UserModule::t("Login"),
// );
?>
<div class="container">
<div class="row">
	<div class="form-login">
		<h1>
			<?php
				echo UserModule::t("Login"); 
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
			if(Yii::app()->user->hasFlash('loginMessage')):
		?>
				<div class="alert alert-success">
					<?php echo Yii::app()->user->getFlash('loginMessage'); ?>
				</div>
		<?php
			endif;
		?>

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
				<p>
					<?php
						echo UserModule::t("Please fill out the following form with your login credentials:");
					?>
				</p>
				<p>
					<em>
						<?php 
							echo UserModule::t('Fields with <span class="required">*</span> are required.');
						?>
					</em>
				</p>
			</div>
			
			<?php echo $form->errorSummary($model); ?>

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
						)
					)
				);
			?>
			
			<p class="hint">
			<?php echo CHtml::link(UserModule::t("Register"),Yii::app()->getModule('user')->registrationUrl); ?> | <?php echo CHtml::link(UserModule::t("Lost Password?"),Yii::app()->getModule('user')->recoveryUrl); ?>
			</p>
			
			<?php
				echo $form->checkboxGroup(
					$model,
					'rememberMe'
				);
			?>

			<div class="form-actions">
				<?php
					$this->widget(
						'booster.widgets.TbButton',
						array(
							'buttonType'=>'submit',
							'context'=>'primary',
							'label'=>'Login',
							'htmlOptions' => array(
								'class' => 'form-control'
							)
						)
					);
				?>
			</div>

		<?php
			$this->endWidget();
		?>

		<?php
			$this->endWidget(); 
		?>
	</div>
</div>
</div>