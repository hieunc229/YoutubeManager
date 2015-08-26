<?php
	// Load configuration and helper functions
	
	require_once(ROOT . DS . app_name . DS .'config' . DS . 'config.php');
	require_once(ROOT . DS . app_name . DS .'core' . DS . 'functions.php');
	require_once(ROOT . DS . app_name . DS .'core' . DS . 'meexception.php');
	set_exception_handler('Application\MeException::handler');

	// Autoload classes
	spl_autoload_register(function($className) {

		// Print class name if in Debug mode
		if(DEBUG) {echo $className . '<br/>';}

		$c_levels =explode('\\', $className);
		$fileLoc = false;

		if(count($c_levels) == 4 && $c_levels[0] == 'Area') {
			$fileLoc = ROOT . DS . app_name . DS . 'application' . DS . 'areas' . DS . strtolower($c_levels[1]) . DS . strtolower($c_levels[2]) . 's' . DS . strtolower($c_levels[3]) . '.php';
		} elseif (count($c_levels) == 3 && $c_levels[0] == 'Application') {
			$fileLoc = ROOT . DS . app_name . DS . 'application' . DS . strtolower($c_levels[1]) . 's' . DS . strtolower($c_levels[2]) . '.php';
		} else if (file_exists(ROOT . DS . app_name . DS .'core' . DS . strtolower($c_levels[1]). '.php')) {
			$fileLoc = ROOT . DS . app_name . DS .'core' . DS . strtolower($c_levels[1]). '.php';
		}

		// Include file if exist or throw error
		if ($fileLoc != false) {
			require_once($fileLoc);
		} else {
			throw new \Application\MeException("Me4C4");			
		}

	});


	// Route the request
	\Application\Router::route($url);