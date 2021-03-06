<?php 
	$this->breadcrumbs = array(
		'Rights'=>Rights::getBaseUrl(),
		Rights::t('core', 'Tasks'),
	); 
	
	$this->title = '<h2>'.Rights::t('core', 'Tasks').'</h2>';
?>

<?php
	echo $this->renderPartial('/_menu',array(
		'list'=> array(),
	));
?>

<?php 
	$this->renderPartial('/_flash'); 
?>

<div class="alert alert-info">
	<p>
		<?php 
			echo Rights::t('core', 'A task is a permission to perform multiple operations, for example accessing a group of controller action.'); 
		?><br />
		<?php 
			echo Rights::t('core', 'Tasks exist below roles in the authorization hierarchy and can therefore only inherit from other tasks and/or operations.'); 
		?>
	</p>

	<p>
		<?php 
			echo CHtml::link(Rights::t('core', 'Create a new task'), array('authItem/create', 'type'=>CAuthItem::TYPE_TASK), array(
				'class'=>'add-task-link',
			)); 
		?>
	</p>
</div>

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
		$this->widget('booster.widgets.TbGridView', array(
			'dataProvider'=>$dataProvider,
			'template'=>'{items}',
			'emptyText'=>Rights::t('core', 'No tasks found.'),
			'htmlOptions'=>array('class'=>'grid-view task-table'),
			'columns'=>array(
				array(
					'name'=>'name',
					'header'=>Rights::t('core', 'Name'),
					'type'=>'raw',
					'htmlOptions'=>array('class'=>'name-column'),
					'value'=>'$data->getGridNameLink()',
				),
				array(
					'name'=>'description',
					'header'=>Rights::t('core', 'Description'),
					'type'=>'raw',
					'htmlOptions'=>array('class'=>'description-column'),
				),
				array(
					'name'=>'bizRule',
					'header'=>Rights::t('core', 'Business rule'),
					'type'=>'raw',
					'htmlOptions'=>array('class'=>'bizrule-column'),
					'visible'=>Rights::module()->enableBizRule===true,
				),
				array(
					'name'=>'data',
					'header'=>Rights::t('core', 'Data'),
					'type'=>'raw',
					'htmlOptions'=>array('class'=>'data-column'),
					'visible'=>Rights::module()->enableBizRuleData===true,
				),
				array(
					'header'=>'&nbsp;',
					'type'=>'raw',
					'htmlOptions'=>array('class'=>'actions-column'),
					'value'=>'$data->getDeleteTaskLink()',
				),
			)
		)); 
	?>

	<p class="info"><?php echo Rights::t('core', 'Values within square brackets tell how many children each item has.'); ?></p>

<?php $this->endWidget(); ?>