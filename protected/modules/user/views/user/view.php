<?php
$this->breadcrumbs=array(
	UserModule::t('Users')=>array('index'),
	$model->username,
);
?>
<h1><?php echo UserModule::t('View User').' "'.$model->username.'"'; ?></h1>
<div class="row">
	<div class="col-md-12">
		<ul class="nav navbar-nav">
			<li><?php echo CHtml::link(UserModule::t('List User'),array('index')); ?></li>
		</ul><!-- actions -->
	</div>
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

// For all users
	$attributes = array(
			'username',
	);
	
	$profileFields=ProfileField::model()->forAll()->sort()->findAll();
	if ($profileFields) {
		foreach($profileFields as $field) {
			array_push($attributes,array(
					'label' => UserModule::t($field->title),
					'name' => $field->varname,
					'value' => $model->profile->getAttribute($field->varname),
				));
		}
	}
	array_push($attributes,
		array(
			'name' => 'createtime',
			'value' => date("d.m.Y H:i:s",$model->createtime),
		),
		array(
			'name' => 'lastvisit',
			'value' => (($model->lastvisit)?date("d.m.Y H:i:s",$model->lastvisit):UserModule::t('Not visited')),
		)
	);
			
	$this->widget('booster.widgets.TbDetailView', array(
		'data'=>$model,
		'attributes'=>$attributes,
	));

?>

<?php
	$this->endWidget(); 
?>