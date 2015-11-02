<?php 
	$this->breadcrumbs = array(
		'Rights'=>Rights::getBaseUrl(),
		Rights::t('core', 'Create :type', array(':type'=>Rights::getAuthItemTypeName($_GET['type']))),
	); 
	
	$this->title = '<h2>'.Rights::t('core', 'Create :type', array(':type'=>Rights::getAuthItemTypeName($_GET['type']),)).'</h2>';
?>

<?php
	echo $this->renderPartial('/_menu',array(
		'list'=> array(),
	));
?>

<?php 
	$this->renderPartial('/_flash'); 
?>

<?php 
	$this->renderPartial('_form', array('model'=>$formModel)); 
?>