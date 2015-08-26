<?php
namespace Application\Controller;
class Category extends _Main {
	
	public function __construct($controller,$action) {
		// Load core controller functions
		parent::__construct($controller, $action);
		
	}
	
	public function view($id) {
		// Load search page
		$view = new \Application\View();
		$series = $this->db->GetSeriesByCategoryId($id);
		$view->set('Series', $series);
		$view->title('Categories Page');
		$view->render('categories\view');
	}

}