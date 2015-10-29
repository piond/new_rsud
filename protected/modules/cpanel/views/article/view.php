<?php
$this->breadcrumbs=array(
	'Articles'=>array('index'),
	$model->title,
);

$this->menu=array(
array('label'=>'List Article','url'=>array('index')),
array('label'=>'Create Article','url'=>array('create')),
array('label'=>'Update Article','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete Article','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Article','url'=>array('admin')),
);
?>

<h1>View Article <em><?php echo $model->title; ?></em></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'title',
		'content',
		'createdAt',
		'modifiedAt',
		'published',
		'author_id',
		'views',
		'category_id',
),
)); ?>
