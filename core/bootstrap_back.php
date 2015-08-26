<?php
	// Load configuration and helper functions
	
	require_once(ROOT . DS . app_name . DS .'config' . DS . 'config.php');
	require_once(ROOT . DS . app_name . DS .'core' . DS . 'functions.php');
	require_once(ROOT . DS . app_name . DS .'core' . DS . 'meexception.php');
	require_once(ROOT . DS . app_name . DS .'application' . DS . 'areas' . DS . 'register.php');
	set_exception_handler('Application\MeException::handler');

	// Autoload classes
	spl_autoload_register(function($className) {
		$urls = explode('\\', $className);
		if(isset($urls[1]))
		{
			if(array_search($urls[1], REGISTED_AREA) != null) {
				$urls[2] = isset($urls[2]) ? $urls[2] : 'home';
				if(file_exists((ROOT . DS . 'application' . DS . 'areas' . DS . $urls[1] . DS . strtolower($urls[2]) . '.php'))
			}
		} 

		if(!isset($urls[1])) {
			if (file_exists(ROOT . DS . 'application' . DS . 'controllers' . DS . strtolower($urls[0]) . '.php')) {
				require_once(ROOT . DS . 'application' . DS . 'controllers' . DS . strtolower($urls[0]) . '.php');
			} elseif (file_exists(ROOT . DS . app_name . DS .'core' . DS . strtolower($urls[0]) . '.php')) {
				require_once(ROOT . DS . app_name . DS .'core' . DS . strtolower($urls[0]) . '.php');
			} else {
				echo ROOT . DS . 'application' . DS . 'core' . DS . strtolower($urls[0]) . '.php';
				echo 'class1';
			}

		} else {
			if(isset($urls[2]))
			{
				if(is_dir(ROOT . DS . app_name . DS . 'application' . DS . 'controllers' . DS . $urls[2])) {	
					if (file_exists(ROOT . DS . app_name . DS . 'application' . DS . 'controllers' . DS . strtolower($urls[2]) . DS . strtolower($urls[3]) . '.php'))
					{
						require_once(ROOT . DS . app_name . DS . 'application' . DS . 'controllers' . DS . strtolower($urls[2]) . DS . strtolower($urls[3]) . '.php');
					} elseif (file_exists(ROOT . DS . app_name . DS .'core' . DS . strtolower($urls[0]) . '.php')) {
						require_once(ROOT . DS . app_name . DS .'core' . DS . strtolower($urls[0]) . '.php');
					} else echo 'class01';
				}  elseif($urls[1] === 'Controller') {
				if(!isset($urls[2])){
					require_once(ROOT . DS . app_name . DS .'core' . DS . strtolower($urls[1]) . '.php');
				} elseif (file_exists(ROOT . DS . app_name . DS . 'application' . DS . 'controllers' . DS . strtolower($urls[2]) . '.php')) {
					require_once(ROOT . DS . app_name . DS . 'application' . DS . 'controllers' . DS . strtolower($urls[2]) . '.php');
				} elseif (count($urls) == 3) {
					if (file_exists(ROOT . DS . app_name . DS . 'application' . DS . 'controllers' . DS . strtolower($urls[2]) . DS . '.php'))
					require_once(ROOT . DS . app_name . DS .'controllers' . DS . strtolower($urls[1]) . '.php');
					echo 'class2';
				}
					
			} elseif ($urls[1] == 'Model') {
				
			} elseif ($urls[1] == 'View') {
				require_once(ROOT . DS . app_name . DS .'core' . DS . strtolower($urls[2]) . '.php');
			} 
		}elseif (file_exists(ROOT . DS . app_name . DS .'core' . DS . strtolower($urls[1]) . '.php')) {				
				require_once(ROOT . DS . app_name . DS .'core' . DS . strtolower($urls[1]) . '.php');
			} else {
				echo 'class3';
				
			}
			
		}
	
	});


	// Route the request
	Application\Router::route($url);