<?php
/**
 * The following variables are available in this template:
 * - $this: the BootCrudCode object
 */
?>
<?php
echo "<?php\n";
$nameColumn=$this->guessNameColumn($this->tableSchema->columns);
$label=$this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'$label'=>array('admin'),
	\$model->{$nameColumn},
);\n";
?>

$this->menu=array(
	array('label'=>'Tambah baru','icon'=>'plus','url'=>array('create')),
	array('label'=>'Kelola <?php echo $this->modelClass; ?>','icon'=>'bars','url'=>array('admin')),
);


$this->actionmenu=array(
	array('icon'=>'edit','label'=>'Sunting <?php echo $this->modelClass; ?>','url'=>array('update','id'=>$model-><?php echo $this->tableSchema->primaryKey; ?>)),
	array('icon'=>'trash-o','label'=>'Hapus <?php echo $this->modelClass; ?>','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model-><?php echo $this->tableSchema->primaryKey; ?>),'confirm'=>'Apakah Anda yakin akan menghapus data ini?')),	
);

?>
<?php 
echo "<?php\n"; 
 ?>
$this->judul = '<h2><span>View</span> <?php echo $this->modelClass; ?></h2>';
?>

<?php echo "<?php"; ?> $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
<?php
foreach($this->tableSchema->columns as $column)
	echo "\t\t'".$column->name."',\n";
?>
	),
)); ?>
