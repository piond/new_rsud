<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'RSUD Temanggung',
	'theme'=>'classic',
	'language'=>'id',

	// preloading 'log' component
	'preload'=>array(
		'log',
		'booster'
	),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.modules.rights.*',
		'application.modules.rights.models.*',
		'application.modules.rights.components.*',
		'application.modules.user.*',
		'application.modules.user.models.*',
		'application.modules.user.components.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'yiipassword',
			'generatorPaths'=>array(
				'booster.gii', // boostrap generator
			),
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		
		'rights'=>array(
			'install'=>false,
			'layout'=>'webroot.themes.classic.views.layouts.column2',
			// 'userNameColumn'=>'username',
			// 'userClass'=>'Users',
			// 'superuserName'=>'Admin'
		),
		
        'user'=>array(
            'tableUsers'=>'tbl_users',
			'tableProfiles'=>'tbl_profiles',
			'tableProfileFields'=>'tbl_profiles_fields'
        ),
		'cpanel'
	),

	// application components
	'components'=>array(

		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
			'class'=>'RWebUser',
			'loginUrl'=>array('user/login'),
		),
		
		'authManager'=>array( 
			'class'=>'RDbAuthManager',
			'defaultRoles'=>array('Guest'),
			'assignmentTable'=>'authassignment',
			'itemTable'=>'authitem',
			'itemChildTable'=>'authitemchild',
			'rightsTable'=>'rights'
		),

		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),

		// database settings are configured in database.php
		'db'=>require(dirname(__FILE__).'/database.php'),

		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),

		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
		'booster'=>array(
			'class'=>'ext.booster.components.Booster',
			'responsiveCss'=>true,
			'fontAwesomeCss' => true
		)

	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);
