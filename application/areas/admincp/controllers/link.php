<?php
namespace Area\Admincp\Controller;
class Link extends \Area\Admincp\Controller\AdminArea {
	
	public function __construct($controller,$action) {
		// Load core controller functions
		parent::__construct($controller, $action);
		
	}
	
	public function index($id = 0) {
		$view = new \Application\View();
		if($id == 0) $links = $this->db->GetLinks(true);
		else $links = $this->db->GetMoviesBySeriesId($id);
		
		$view->set('links', $links);
		$view->title('Home Page');
		$view->render('area\admincp\link\index');
	}

	public function edit($id) {
		$view = new \Application\View();
		$view->set('link',$this->db->GetLinkById($id));
		$view->set('series', $this->db->GetSeries());
		$view->title('Edit Link Page');
		$view->render('area\admincp\link\edit');
	}

	public function actionEdit() {
		$id = $this->getValue($_POST['id']);
		$v = $this->getValue($_POST['li_v']);
		$name = $this->getValue($_POST['li_name']);
		$des = $this->getValue($_POST['li_des']);
		$ser_id = $this->getValue($_POST['ser_id']);

		try {
			$do = $this->db->DoEditLink($id, $v, $name, $des, $ser_id);
		} catch (\Exception $ex) {
			\Application\HTMLHelper::AddError($ex->getMessage());
			$this->redirect('/admincp/link/edit/'.$id);

		}

		$this->redirect('/admincp/link');	
	}

	public function remove($id) {
		$view = new \Application\View();
		$view->set('link',$this->db->GetLinkById($id));
		$view->title('Remove Link Page');
		$view->render('area\admincp\link\remove');
	}
	
	public function actionRemove(){
		$id = $this->getValue($_POST['id']);
		
		try {
			$do = $this->db->DoRemoveLink($id);
		} catch (\Exception $ex) {
			\Application\HTMLHelper::AddError($ex->getMessage());
			$this->redirect('/admincp/link/remove/'.$id);
		}

		$this->redirect('/admincp/link');	
	}

	public function add() {
		$view = new \Application\View();
		$view->title('Add Link Page');
		$view->set('series', $this->db->GetSeries());
		$view->render('area\admincp\link\add');
	}

	public function actionAdd() {
		$v = $this->getValue($_POST['li_v']);
		echo $_POST['li_name'];
		$name = $this->getValue($_POST['li_name']);
		$des = $this->getValue($_POST['li_des']);
		$ser_id = $this->getValue($_POST['ser_id']);
		try {
			$do = $this->db->DoAddLink($v, $name, $des, $ser_id);

		} catch (\Exception $ex) {
			\Application\HTMLHelper::AddError($ex->getMessage());
			$this->redirect('/admincp/link/add');
		}
		$this->redirect('/admincp/link');
	}

}
