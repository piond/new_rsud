<?php
	$this->breadcrumbs=array(
		UserModule::t('Users') => array('admin'),
		$model->username,
	);
?>
<h1>
	<?php
		echo UserModule::t('View User').' <em>'.$model->username.'</em>';
	?>
</h1>

<?php
	echo $this->renderPartial(
		'_menu', 
		array(
			'list'=> array(
				CHtml::link(UserModule::t('Create User'),array('create')),
				CHtml::link(UserModule::t('Update User'),array('update','id'=>$model->id)),
				CHtml::linkButton(UserModule::t('Delete User'),array('submit'=>array('delete','id'=>$model->id),'confirm'=>UserModule::t('Are you sure to delete this item?'))),
			),
		)
	); 
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
		$this->widget('booster.widgets.TbDetailView', array(
			'data'=>$model,
			'attributes'=>$attributes,
		));
	?>

<?php
	$this->endWidget(); 
?>