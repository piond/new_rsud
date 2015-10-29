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
	\$model->{$nameColumn}=>array('view','id'=>\$model->{$this->tableSchema->primaryKey}),
	'Update',
);\n";
?>

$this->menu=array(
	array('label'=>'Kelola <?php echo $this->modelClass; ?>','url'=>array('admin'),'icon'=>'bars'),
);

?>

<?php 
echo "<?php\n"; 
 ?>
$this->judul = '<h2><span>Update</span> <?php echo $this->modelClass." <?php echo \$model->{$this->tableSchema->primaryKey}; ?>"; ?></h2>';
?>


<?php echo "<?php echo \$this->renderPartial('_form',array('model'=>\$model)); ?>"; ?>