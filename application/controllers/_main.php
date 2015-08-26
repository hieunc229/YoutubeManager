<?php
namespace Application\Controller;
require_once(ROOT . DS . app_name . DS . 'core' . DS . 'controller.php');
class _Main extends \Application\Controller {
	
	public function __construct($controller,$action) {
		// Load core controller functions
		parent::__construct($controller, $action);
		$this->db = new \Application\Facade();

		
	}
}