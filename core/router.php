<?php
/*
* Router.php
* Handle url routing for web application
*/
namespace Application;
use Application;
class Router {
	
	public static function route($url) {
	    // Split the URL into parts
	    $url_array = explode('/',$url);
	    // The first part is controller name
    	if(is_dir(ROOT . DS . app_name . DS . 'application' . DS . 'areas' . DS . $url_array[0]))
    	{
    		if(file_exists(ROOT . DS . app_name . DS . 'application' . DS . 'areas' . DS . $url_array[0] . DS . 'controllers' . DS . strtolower($url_array[1]) . '.php'))
	    	{
	    		// naked controller
	    		$controllerStr = 'Area\\' . ucwords($url_array[0]) ."\Controller\\". ucwords($url_array[1]);
	    		$action = isset($url_array[2]) ? $url_array[2] : 'index' ;
	    		array_shift($url_array);
	    		array_shift($url_array);
	    		array_shift($url_array);
	    	} else {

		    	// if controller is empty, redirect to default controller
		    	throw new Application\MeException('Me404');
	    	}

    	} else {
 			if(file_exists(ROOT . DS . app_name . DS . 'application' . DS . 'controllers' . DS . strtolower($url_array[0]) . '.php'))
	    	{
	    		// naked controller
	    		$controllerStr = 'Application\Controller\\'. ucwords($url_array[0]);
	    		$action = isset($url_array[1]) ? $url_array[1] : 'index' ;
	    		array_shift($url_array);
	    		array_shift($url_array);
	    	} else {

		    	// if controller is empty, redirect to default controller
		    	throw new Application\MeException('Me404');
	    	}
	    }

        // The second part is the method name and if action is empty, redirect to index page
	    if(empty($action)) $action = 'index';

        // The third part are the parameters
	    $query_string = $url_array;

	    $controller_name = $controllerStr;
	    $controller = ucwords($controllerStr);
	    

	    //$dispatch = new $controllerStr($controller_name,$action);
	    if ((int)method_exists($controller, $action)) {
	    	$dispatch = new $controllerStr($controller_name,$action);
	        call_user_func_array(array($dispatch,$action),$query_string);
	    } else {
	       throw new Application\MeException('Me404');
	    }
	}
	
}