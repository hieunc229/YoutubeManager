<?php
namespace Area\Admincp\Controller;

class Account extends \Area\Admincp\Controller\AdminArea {
	
	public function __construct($controller,$action) {

		// Disable role
		\Application\Role::disable();
		
		// Load core controller functions
		parent::__construct($controller, $action);
		
	}

	public function login() {
		if(isset($_SESSION['u_role'])) {
			$this->redirect('/admincp/home');
		}
		$view = new \Application\View();
		$view->title('Login Page');
		$view->render('area\admincp\account\login');
	}

	public function validate() {
		if(!isset($_POST['username']) && !isset($_POST['password']))
		{
			\Application\HTMLHelper::AddError('Missing username and password!');
			$view = new \Application\View();
			$view->title('Login Page');
			$view->render('area\admincp\account\login');
		}

		$user = $this->getValue($_POST['username']);
		$pass = $this->getValue($_POST['password']);
		$remember = $this->getValue($_POST['remember']);

		$login = $this->db->LoginValidate($user, $pass);
		if($login) {

			$_SESSION['isLogin'] = true;
			$_SESSION['u_role'] = 'admin';
			$_SESSION['username'] = $_POST['username'];

			\Application\Role::enable();
			\Application\Role::set('admin');
			$this->redirect('/admincp/home');
		} else {
			\Application\HTMLHelper::AddError('Username or password invalid!');
			$view = new \Application\View();
			$view->title('Login Page');
			$view->render('area\admincp\account\login');
		}
	}

	public function logout() {
		session_destroy();
		\Application\Role::set('visiter');
		$this->redirect('/admincp/account/login');
	}

}
