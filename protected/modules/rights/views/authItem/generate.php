<?php 
	$this->breadcrumbs = array(
		'Rights'=>Rights::getBaseUrl(),
		Rights::t('core', 'Generate items'),
	); 
	
	$this->title = '<h2>'.Rights::t('core', 'Generate items').'</h2>';
?>

<?php
	echo $this->renderPartial('/_menu',array(
		'list'=> array(),
	));
?>

<?php 
	$this->renderPartial('/_flash'); 
?>

<p class="alert alert-info">
	<?php 
		echo Rights::t('core', 'Please select which items you wish to generate.'); 
	?>
</p>

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

		

		
			<?php 
				echo CHtml::link(Rights::t('core', 'Select all'), '#', array(
				'onclick'=>"jQuery('.generate-item-table').find(':checkbox').attr('checked', 'checked'); return false;",
				'class'=>'selectAllLink')); 
			?>
			/
			<?php 
				echo CHtml::link(Rights::t('core', 'Select none'), '#', array(
				'onclick'=>"jQuery('.generate-item-table').find(':checkbox').removeAttr('checked'); return false;",
				'class'=>'selectNoneLink')); 
			?>

		

		<div class="form-action text-right">
			<br/>
			<?php echo CHtml::submitButton(Rights::t('core', 'Generate'),array('class'=>'btn btn-primary')); ?>
		</div>

	<?php $this->endWidget(); ?>
	
<?php $this->endWidget(); ?>