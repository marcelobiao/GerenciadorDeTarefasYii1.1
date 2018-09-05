<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Gerenciador De Tarefas',

	'sourceLanguage'=>'pt_br',
	'language'=>'pt_br',
	
	// preloading 'log' component
	'preload'=>array('log'),

	//Theme
	//'theme'=>'bootstrap',


	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	'modules'=>array(
		'gii' => array(
			'class' => 'system.gii.GiiModule',
			'password'=>'rootroot',
			'generatorPaths' => array(
				'ext.giix.generators', // giix generators
			),
		),
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		
		/*'bootstrap'=>array(
            'class'=>'bootstrap.components.Bootstrap',
		),*/
		'messages' => array (
			// Pending on core: http://code.google.com/p/yii/issues/detail?id=2624
			'extensionBasePaths' => array(
				'giix' => 'ext.giix.messages', // giix messages directory.
			),
		),
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=gerenciadorDeTarefas',
			'emulatePrepare' => true,
			'username' => 'marcelo',
			'password' => 'rootroot',
			'charset' => 'utf8',
		),
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
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);