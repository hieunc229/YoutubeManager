<?php
namespace Area\Admincp\Controller;
class Category extends \Area\Admincp\Controller\AdminArea {
	
	public function __construct($controller,$action) {
		// Load core controller functions
		parent::__construct($controller, $action);
		
	}
	
	public function index() {
		$view = new \Application\View();
		$view->set('categories',$this->db->GetCategories());
		$view->title('Category Page');
		$view->render('area\admincp\category\index');
	}

	public function edit($id) {
		$view = new \Application\View();
		$view->set('category',$this->db->GetCategoryById($id));
		$view->title('Edit Category Page');
		$view->render('area\admincp\category\edit');
	}

	public function actionEdit() {
		$id = $this->getValue($_POST['id']);
		$name = $this->getValue($_POST['name']);
		$des = $this->getValue($_POST['des']);

		try {
			$do = $this->db->DoEditCategory($id, $name, $des);
		} catch (\Exception $ex) {
			\Application\HTMLHelper::AddError($ex->getMessage());
			$this->redirect('/admincp/category/edit/'.$id);

		}

		$this->redirect('/admincp/category');	
	}

	public function remove($id) {
		$view = new \Application\View();
		$view->set('category',$this->db->GetCategoryById($id));
		$view->title('Remove Category Page');
		$view->render('area\admincp\category\remove');
	}
	
	public function actionRemove(){
		$id = $this->getValue($_POST['id']);
		
		try {
			$do = $this->db->DoRemoveCategory($id);
		} catch (\Exception $ex) {
			\Application\HTMLHelper::AddError($ex->getMessage());
			$this->redirect('/admincp/category/remove/'.$id);
		}

		$this->redirect('/admincp/category');	
	}

	public function add() {
		$view = new \Application\View();
		$view->title('Add Category Page');
		$view->render('area\admincp\category\add');
	}

	public function actionAdd() {
		$name = $this->getValue($_POST['name']);
		$des  = $this->getValue($_POST['des']);
		$img = $this->getValue($_POST['img']);

		try {
			$do = $this->db->DoAddCategory($name, $des, $img);
		} catch (\Exception $ex) {
			\Application\HTMLHelper::AddError($ex->getMessage());
			$this->redirect('/admincp/category/add');
		}

		$this->redirect('/admincp/category');
	}

	public function upload()
	{
		$view = new \Application\View();
		$view->render('area\admincp\category\upload', false);
	}
}
