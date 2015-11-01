<?php
$this->breadcrumbs=array(
	'Articles'=>array('index'),
	$model->title=>array('view','id'=>$model->article_id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Article','url'=>array('index')),
	array('label'=>'Create Article','url'=>array('create')),
	array('label'=>'View Article','url'=>array('view','id'=>$model->article_id)),
	array('label'=>'Manage Article','url'=>array('admin')),
	);
	?>

	<h1>Update Article <em><?php echo $model->title; ?></em></h1>

<?php
	echo $this->renderPartial(
		'_form',
		array(
			'model'=>$model
		)
	);
?>