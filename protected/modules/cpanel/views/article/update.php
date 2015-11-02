<?php
$this->breadcrumbs=array(
	'Articles'=>array('index'),
	$model->title=>array('view','id'=>$model->article_id),
	'Update',
);

$this->title = '<h1>Update Article <em>'.$model->title.'</em></h1>';

$this->menu=array(
	array('label'=>'List Article','url'=>array('index')),
	array('label'=>'Create Article','url'=>array('create')),
	array('label'=>'View Article','url'=>array('view','id'=>$model->article_id)),
	array('label'=>'Manage Article','url'=>array('admin')),
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