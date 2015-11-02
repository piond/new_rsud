<?php 
	$this->breadcrumbs = array(
		'Rights'=>Rights::getBaseUrl(),
		Rights::t('core', 'Roles'),
	); 
	
	$this->title = '<h2>'.Rights::t('core', 'Roles').'</h2>';
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
			echo Rights::t('core', 'A role is group of permissions to perform a variety of tasks and operations, for example the authenticated user.'); 
		?><br />
		<?php 
			echo Rights::t('core', 'Roles exist at the top of the authorization hierarchy and can therefore inherit from other roles, tasks and/or operations.'); 
		?>
	</p>

	<p>
		<?php 
			echo CHtml::link(Rights::t('core', 'Create a new role'), array('authItem/create', 'type'=>CAuthItem::TYPE_ROLE), array(
				'class'=>'add-role-link',
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
			'emptyText'=>Rights::t('core', 'No roles found.'),
			'htmlOptions'=>array('class'=>'grid-view role-table'),
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
					'value'=>'$data->getDeleteRoleLink()',
				),
			)
		)); 
	?>

	<p class="info">
		<?php 
			echo Rights::t('core', 'Values within square brackets tell how many children each item has.'); 
		?>
	</p>

<?php $this->endWidget(); ?>