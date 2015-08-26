<?php
namespace Area\Admincp\Controller;
class Home extends \Area\Admincp\Controller\AdminArea {
	
	public function __construct($controller,$action) {
		// Load core controller functions
		parent::__construct($controller, $action);
		
	}
	
	public function index() {
		$view = new \Application\View();
		$view->title('Home Page');
		$view->render('area\admincp\home\index');
	}

}
