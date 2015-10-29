<?php
$this->breadcrumbs=array(
	'Articles',
);

$this->menu=array(
	array(
		'label' => 'Article Navigations',
		'itemOptions' => array(
			'class' => 'nav-header'
		)
	),
	array(
		'label' => 'Create Article',
		'url' => array('create')
	),
	array(
		'label' => 'Manage Article',
		'url' => array('admin')
	),
);
?>

<h1>Articles</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
