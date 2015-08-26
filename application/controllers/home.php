<?php
namespace Application\Controller;
class Home extends _Main {
	
	public function __construct($controller,$action) {
		// Load core controller functions
		parent::__construct($controller, $action);
		
	}
	
	public function index() {
		$view = new \Application\View();
		$view->set('Categories', $this->db->GetCategories());
		$view->title('Home Page');
		$view->render('home\index');
	}

}