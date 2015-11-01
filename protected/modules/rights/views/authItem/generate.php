<?php $this->breadcrumbs = array(
	'Rights'=>Rights::getBaseUrl(),
	Rights::t('core', 'Generate items'),
); ?>

<div id="generator">

	<h2><?php echo Rights::t('core', 'Generate items'); ?></h2>

	<p><?php echo Rights::t('core', 'Please select which items you wish to generate.'); ?></p>

	<div class="form">

		<?php $form=$this->beginWidget('booster.widgets.TbActiveForm'); ?>

			

				<table class="table table-striped items generate-item-table" border="0" cellpadding="0" cellspacing="0">

					<tbody>

						<tr class="application-heading-row">
							<th colspan="3"><?php echo Rights::t('core', 'Application'); ?></th>
						</tr>

						<?php $this->renderPartial('_generateItems', array(
							'model'=>$model,
							'form'=>$form,
							'items'=>$items,
							'existingItems'=>$existingItems,
							'displayModuleHeadingRow'=>true,
							'basePathLength'=>strlen(Yii::app()->basePath),
						)); ?>

					</tbody>

				</table>

			

			
				<?php echo CHtml::link(Rights::t('core', 'Select all'), '#', array(
   					'onclick'=>"jQuery('.generate-item-table').find(':checkbox').attr('checked', 'checked'); return false;",
   					'class'=>'selectAllLink')); ?>
   				/
				<?php echo CHtml::link(Rights::t('core', 'Select none'), '#', array(
					'onclick'=>"jQuery('.generate-item-table').find(':checkbox').removeAttr('checked'); return false;",
					'class'=>'selectNoneLink')); ?>

			

   			<div class="clearfix" style="margin-bottom:20px;">
   				<br/>
				<?php echo CHtml::submitButton(Rights::t('core', 'Generate'),array('class'=>'btn btn-primary')); ?>

			</div>

		<?php $this->endWidget(); ?>

	</div>

</div>