<?php
$this->breadcrumbs=array(
	UserModule::t('Profile Fields')=>array('admin'),
	UserModule::t($model->title),
);
?>
<h1><?php echo UserModule::t('View Profile Field #').$model->varname; ?></h1>

<?php echo $this->renderPartial('_menu', array(
		'list'=> array(
			CHtml::link(UserModule::t('Create Profile Field'),array('create')),
			CHtml::link(UserModule::t('Update Profile Field'),array('update','id'=>$model->id)),
			CHtml::linkButton(UserModule::t('Delete Profile Field'),array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure to delete this item?')),
		),
	));
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
		'attributes'=>array(
			'id',
			'varname',
			'title',
			'field_type',
			'field_size',
			'field_size_min',
			'required',
			'match',
			'range',
			'error_message',
			'other_validator',
			'widget',
			'widgetparams',
			'default',
			'position',
			'visible',
		),
	)); 
?>

<?php $this->endWidget(); ?>