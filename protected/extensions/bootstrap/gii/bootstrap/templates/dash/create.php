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
	'$label'=>array('admin'),
	'Tambah baru',
);\n";
?>

$this->menu=array(
	array('label'=>'Kelola <?php echo $this->modelClass; ?>','url'=>array('admin'),'icon'=>'bars'),
);

?>
<?php
echo "<?php\n"; ?>
	$this->judul = '<h2><span>Tambah baru</span> <?php echo $this->modelClass; ?></h2>';
?>
<?php echo "<?php echo \$this->renderPartial('_form', array('model'=>\$model)); ?>"; ?>
