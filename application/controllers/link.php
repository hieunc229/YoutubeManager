<?php
namespace Application\Controller;
class Link extends _Main {
	
	public function __construct($controller,$action) {
		// Load core controller functions
		parent::__construct($controller, $action);
		
	}
	
	public function view($id) {
		// Load search page
		$view = new \Application\View();
		$video = $this->db->GetVideoById($id);
		$view->set('video', $video);
		$view->title($video->name);
		$view->render('links\view');
	}

}