<?php
$this->menu=array(
	array(
		'label'=>UserModule::isAdmin() ? UserModule::t('Manage User') : UserModule::t('List User'),
		'url'=>UserModule::isAdmin() ? array('/user/admin') : array('/user'),
		// 'visible' => UserModule::isAdmin()
	),
	// array(
		// 'label'=>UserModule::t('List User'),
		// 'url'=>array('/user')
	// ),
	array(
		'label'=>UserModule::t('Profile'),
		'url'=>array('/user/profile')
	),
	array(
		'label'=>UserModule::t('Edit'),
		'url'=>array('edit')
	),
	array(
		'label'=>UserModule::t('Change password'),
		'url'=>array('changepassword')
	),
	array(
		'label'=>UserModule::t('Logout'),
		'url'=>array('/user/logout')
	),
);
?>