<?php
namespace Area\Admincp\Controller;
require_once(ROOT . DS . app_name . DS . 'core' . DS . 'controller.php');
require_once(ROOT . DS . app_name . DS . 'application' . DS . 'areas' . DS . 'admincp' . DS . 'core' . DS . 'manager.php');
session_start();
class AdminArea extends \Application\Controller {
	
	public function __construct($controller,$action) {
		// Load core controller functions
		parent::__construct($controller, $action);
		$this->db = new \Area\Admincp\Core\Manager();
		\Application\Role::allow('admin','/admincp/account/login');
		
	}

	// Get values from POST or GET
	protected function getValue($val) {
		$result = isset($val) ? $val : 0;
		return $result;
	}

}
