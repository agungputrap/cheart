<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Web Application',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.modules.rights.*',
        'application.modules.rights.components.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'lele',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		
		'rights'=>array(
                //'install'=>true,
			 	'superuserName'=>'Admin', // Name of the role with super user privileges. 
                'authenticatedName'=>'Authenticated',  // Name of the authenticated user role. 
	            'userIdColumn'=>'id', // Name of the user id column in the database. 
	            'userNameColumn'=>'username',  // Name of the user name column in the database. 
	            'enableBizRule'=>true,  // Whether to enable authorization item business rules. 
	            'enableBizRuleData'=>true,   // Whether to enable data for business rules. 
	            'displayDescription'=>true,  // Whether to use item description instead of name. 
	            'flashSuccessKey'=>'RightsSuccess', // Key to use for setting success flash messages. 
	            'flashErrorKey'=>'RightsError', // Key to use for setting error flash messages. 
	            'install'=>false,  // Whether to enable installer. 
                'debug'=>false,
        ),
	),

	// application components
	'components'=>array(

		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
			'class'=>'RWebUser',
		),
		'authManager'=>array(
                'class'=>'RDbAuthManager',
	            'connectionID'=>'db',
	            'itemTable'=>'authitem',
	            'itemChildTable'=>'authitemchild',
	            'assignmentTable'=>'authassignment',
	            'rightsTable'=>'rights',
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
			'errorAction'=>YII_DEBUG ? null : 'site/error',
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

	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);
