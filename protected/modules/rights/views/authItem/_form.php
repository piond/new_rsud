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
		if( $model->scenario==='update' ):
	?>
			<h3>
				<?php
					echo Rights::getAuthItemTypeName($model->type); 
				?>
			</h3>
	<?php
		endif;
	?>
		
	<?php 
		$form=$this->beginWidget('CActiveForm'); 
	?>

		<div class="form-group">
			<?php 
				echo $form->labelEx($model, 'name', array('class'=>'control-label col-sm-3')); 
			?>
			<div class="col-sm-9">
				<?php
					echo $form->textField($model, 'name', array('maxlength'=>255, 'class'=>'form-control')); 
				?>
				<?php 
					echo $form->error($model, 'name'); 
				?>
				<p class="help-block">
					<?php 
						echo Rights::t('core', 'Do not change the name unless you know what you are doing.'); 
					?>
				</p>
			</div>
		</div>

		<div class="form-group">
			<?php 
				echo $form->labelEx($model, 'description', array('class'=>'control-label col-sm-3')); 
			?>
			<div class="col-sm-9">
				<?php 
					echo $form->textField($model, 'description', array('maxlength'=>255, 'class'=>'form-control')); 
				?>
				<?php 
					echo $form->error($model, 'description'); 
				?>
				</p>
				<p class="help-block">
					<?php 
						echo Rights::t('core', 'A descriptive name for this item.'); 
					?>
				</p>
			</div>
		</div>

		<?php 
			if( Rights::module()->enableBizRule===true ):
		?>
				<div class="form-group">
					<?php 
						echo $form->labelEx($model, 'bizRule', array('class'=>'control-label col-sm-3')); 
					?>
					<div class="col-sm-9">
						<?php 
							echo $form->textField($model, 'bizRule', array('maxlength'=>255, 'class'=>'form-control')); 
						?>
						<?php 
							echo $form->error($model, 'bizRule'); 
						?>
						<p class="help-block">
							<?php 
								echo Rights::t('core', 'Code that will be executed when performing access checking.'); 
							?>
						</p>
					</div>
				</div>
		<?php
			endif;
		?>

		<?php 
			if( Rights::module()->enableBizRule===true && Rights::module()->enableBizRuleData ): 
		?>
				<div class="form-group">
					<?php 
						echo $form->labelEx($model, 'data', array('class'=>'control-label col-sm-3')); 
					?>
					<div class="col-sm-9">
						<?php 
							echo $form->textField($model, 'data', array('maxlength'=>255, 'class'=>'form-control')); 
						?>
						<?php 
							echo $form->error($model, 'data'); 
						?>
						<p class="help-block">
							<?php 
								echo Rights::t('core', 'Additional data available when executing the business rule.'); 
							?>
						</p>
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
						'label'=>Rights::t('core', 'Save'),
					)
				);
			?>
			|
			<?php
				echo CHtml::link(Rights::t('core', 'Cancel'), Yii::app()->user->rightsReturnUrl); 
			?>
		</div>

	<?php $this->endWidget(); ?>

<?php $this->endWidget(); ?>