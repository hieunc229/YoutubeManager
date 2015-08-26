<?php
namespace Application\Controller;
class Series extends _Main {
	
	public function __construct($controller,$action) {
		// Load core controller functions
		parent::__construct($controller, $action);
		
	}
	
	public function view($id) {
		// Load search page
		$view = new \Application\View();
		$movies = $this->db->GetMoviesBySeriesId($id);
		$view->set('Movies', $movies);
		$view->title('Series Page');
		$view->render('series\view');
	}

}