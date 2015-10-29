<?php
/**
 * The following variables are available in this template:
 * - $this: the BootCrudCode object
 */
?>
<?php
echo "<?php\n";
$label=$this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'$label',
);\n";
?>

$this->menu=array(
	array('label'=>'Create <?php echo $this->modelClass; ?>','url'=>array('create')),
	array('label'=>'Manage <?php echo $this->modelClass; ?>','url'=>array('admin')),
);
?>
<?php
echo "<?php\n"; ?>
	$this->judul = '<h2><span><?php echo $label; ?></</span></h2>';
?>


<?php echo "<?php"; ?> $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
