<?php

namespace Application;
class Application {
	
	function __construct() {
		$this->set_reporting();
		$this->remove_magic_quotes();
		$this->unregister_globals();
	}
	
	private function set_reporting() {
		if (DEVELOPMENT_ENVIRONMENT == true) {
	    error_reporting(E_ALL);
	    ini_set('display_errors','On');
		} else {
		    error_reporting(E_ALL);
		    ini_set('display_errors','Off');
		    ini_set('log_errors', 'On');
		    ini_set('error_log', ROOT.DS.'tmp'.DS.'logs'.DS.'error.log');
		}
	}
	
	private function strip_slashes_deep($value) {
    	$value = is_array($value) ? array_map(array($this,'strip_slashes_deep'), $value) : stripslashes($value);
    	return $value;
	}
	
	private function remove_magic_quotes() {
		if ( get_magic_quotes_gpc() ) {
		    $_GET    = $this->strip_slashes_deep($_GET);
		    $_POST   = $this->strip_slashes_deep($_POST);
		    $_COOKIE = $this->strip_slashes_deep($_COOKIE);
		}
	}
	
	private function unregister_globals() {
	    if (ini_get('register_globals')) {
	        $array = array('_SESSION', '_POST', '_GET', '_COOKIE', '_REQUEST', '_SERVER', '_ENV', '_FILES');
	        foreach ($array as $value) {
	            foreach ($GLOBALS[$value] as $key => $var) {
	                if ($var === $GLOBALS[$key]) {
	                    unset($GLOBALS[$key]);
	                }
	            }
	        }
	    }
	}
}