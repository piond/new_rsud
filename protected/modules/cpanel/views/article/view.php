<?php
$this->breadcrumbs=array(
	'Articles'=>array('index'),
	$model->title,
);

$this->title = '<h1>View Article <em>'.$model->title.'</em></h1>';

$this->menu=array(
	array('label'=>'List Article','url'=>array('index')),
	array('label'=>'Create Article','url'=>array('create')),
	array('label'=>'Update Article','url'=>array('update','id'=>$model->article_id)),
	array('label'=>'Delete Article','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->article_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Article','url'=>array('admin')),
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

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'article_id',
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

<?php
	$this->endWidget(); 
?>