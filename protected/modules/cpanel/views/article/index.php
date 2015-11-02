<?php
$this->breadcrumbs=array(
	'Articles',
);

$this->title = '<h1>Articles</h1>';

$this->menu=array(
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
		$this->widget(
			'booster.widgets.TbListView',
			array(
				'dataProvider'=>$dataProvider,
				'itemView'=>'_view',
			)
		);
	?>

<?php
	$this->endWidget(); 
?>
