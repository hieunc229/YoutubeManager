<?php
namespace Area\Admincp\Controller;
class Series extends \Area\Admincp\Controller\AdminArea {
	
	public function __construct($controller,$action) {
		// Load core controller functions
		parent::__construct($controller, $action);
		
	}
	
	public function index() {
		$view = new \Application\View();
		$view->set('series', $this->db->GetSeries());
		$view->title('Home Page');
		$view->render('area\admincp\series\index');
	}

		public function edit($id) {
		$view = new \Application\View();
		$view->set('series',$this->db->GetSeriesById($id));
		$view->set('categories', $this->db->GetCategories());
		$view->title('Edit Series Page');
		$view->render('area\admincp\series\edit');
	}

	public function actionEdit() {
		$id = $this->getValue($_POST['id']);
		$cat_id = $this->getValue($_POST['cat_id']);
		$name = $this->getValue($_POST['name']);

		try {
			$do = $this->db->DoEditSeries($id, $name, $cat_id);
		} catch (\Exception $ex) {
			\Application\HTMLHelper::AddError($ex->getMessage());
			$this->redirect('/admincp/series/edit/'.$id);

		}

		$this->redirect('/admincp/series');	
	}

	public function remove($id) {
		$view = new \Application\View();
		$view->set('series',$this->db->GetSeriesById($id));
		$view->title('Remove Series Page');
		$view->render('area\admincp\series\remove');
	}
	
	public function actionRemove(){
		$id = $this->getValue($_POST['id']);
		
		try {
			$do = $this->db->DoRemoveSeries($id);
		} catch (\Exception $ex) {
			\Application\HTMLHelper::AddError($ex->getMessage());
			$this->redirect('/admincp/series/remove/'.$id);
		}

		$this->redirect('/admincp/series');	
	}

	public function add() {
		$view = new \Application\View();
		$view->title('Add Series Page');
		$view->set('categories', $this->db->GetCategories());
		$view->render('area\admincp\series\add');
	}

	public function actionAdd() {
		$name = $this->getValue($_POST['name']);
		$cat_id  = $this->getValue($_POST['cat_id']);

		try {
			$do = $this->db->DoAddSeries($name, $cat_id);
		} catch (\Exception $ex) {
			\Application\HTMLHelper::AddError($ex->getMessage());
			$this->redirect('/admincp/series/add');
		}

		$this->redirect('/admincp/series');
	}

}
