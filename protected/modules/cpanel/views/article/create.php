<?php
$this->breadcrumbs=array(
	'Articles'=>array('index'),
	'Create',
);

$this->menu=array(
	array(
		'label' => 'Article Navigations',
		'itemOptions' => array(
			// 'class' => 'nav-header'
		)
	),
	array(
		'label' => 'List Article',
		'url' => array(
			'index'
		)
	),
	array(
		'label' => 'Manage Article',
		'url' => array(
			'admin'
		)
	),
);
?>

<h1>Create Article</h1>

<?php
	echo $this->renderPartial(
		'_form',
		array(
			'model'=>$model
		)
	);
?>