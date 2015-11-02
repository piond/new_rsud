<?php
	$this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Restore");
	// $this->breadcrumbs=array(
		// UserModule::t("Login") => array('/user/login'),
		// UserModule::t("Restore"),
	// );
?>
<div class="container">
<div class="row">
	<div class="form-login">
	
<h1>
	<?php
		echo UserModule::t("Restore");
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
			if(Yii::app()->user->hasFlash('recoveryMessage')):
		?>
				<div class="success">
					<?php
						echo Yii::app()->user->getFlash('recoveryMessage');
					?>
				</div>
		<?php
			else:
		?>

			<?php
				$forms = $this->beginWidget(
					'booster.widgets.TbActiveForm',
					array(
						'id'=>'article-form',
						'enableAjaxValidation'=>false,
					)
				);
			?>

				<?php
					echo $forms->errorSummary($form);
				?>
				
				<?php
					echo $forms->textFieldGroup(
						$form,
						'login_or_email',
						array(
							'widgetOptions' => array(
								'htmlOptions' => array(
								)
							),
							'hint' => UserModule::t("Please enter your login or email addres.")
						)
					);
				?>
				
				<div class="form-action">
					<?php
						$this->widget(
							'booster.widgets.TbButton', array(
								'buttonType'=>'submit',
								'context'=>'primary',
								'label'=>'Restore',
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
			endif;
		?>
	<?php
		$this->endWidget();
	?>
	</div>
</div>
</div>