<?php
$this->breadcrumbs=array(
	'Articles'=>array('index'),
	'Create',
);

$this->title = '<h1>Create Article</h1>';

$this->menu=array(
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

<?php
	echo $this->renderPartial(
		'_form',
		array(
			'model' => $model,
			'category_list' => $category_list
		)
	);
?>