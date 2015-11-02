<?php
$this->breadcrumbs=array(
	'Articles'=>array('index'),
	'Manage',
);

$this->title = '<h1>Manage Articles</h1>';

$this->menu=array(
	array(
		'label' => 'List Article',
		'url' => array('index')
	),
	array(
		'label' => 'Create Article',
		'url' => array('create')
	),
);

Yii::app()->clientScript->registerScript(
	'search', 
	"$('.search-button').click(function(){
		$('.search-form').toggle();
		return false;
	});
	$('.search-form form').submit(function(){
		$.fn.yiiGridView.update('article-grid', {
			data: $(this).serialize()
		});
		return false;
	});"
);
?>

<p class="alert alert-info">
	You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
		&lt;&gt;</b>
	or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

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

	<div class="form-group text-right">
		<?php
			echo CHtml::link(
				'Advanced Search',
				'#',
				array(
					'class'=>'search-button btn btn-default'
				)
			);
		?>
	</div>

	<div class="search-form" style="display:none">
		<?php 
			$this->renderPartial('_search',array(
				'model'=>$model,
			)); 
		?>
	</div><!-- search-form -->

	<?php
		$this->widget(
			'booster.widgets.TbGridView',
			array(
				'id'=>'article-grid',
				'dataProvider'=>$model->search(),
				'filter'=>$model,
				'columns'=>array(
					'article_id',
					'title',
					'content',
					'createdAt',
					'modifiedAt',
					'published',
					/*
					'author_id',
					'views',
					'category_id',
					*/
					array(
						'class'=>'booster.widgets.TbButtonColumn',
					),
				),
			)
		);
	?>

<?php
	$this->endWidget(); 
?>
