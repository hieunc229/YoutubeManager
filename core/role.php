<?php
/*
* Role.php
* Handle Role for user login
*/
namespace Application;

class Role {
	public static $role;
	public static $exe = true;
	public function __construct() {

		if(isset($_SESSION['isLogin']))
		{
			\Application\Role::$role = $_SESSION["u_role"];
		} else \Application\Role::$role = 'visiter';
	}

	/*
	* Used to forbid invalid access from other user
	* Valid $role: 'admin', 'user', 'visiter';
	* $redirect is the controller will be redirect if the role is invalid
	*/
	public static function allow($role, $redirect) {
		$currentRole = isset($_SESSION['u_role']) ? $_SESSION['u_role'] : 'visiter';
		if($currentRole != $role && \Application\Role::$exe) {
			if(!empty($redirect)) header('Location: '.$redirect);
			throw new \Application\MeException('Me001');
		}
	}

	public static function disable() {
		\Application\Role::$exe = false;
	}

	public static function enable() {
		\Application\Role::$exe = true;
	}

	public static function set($role) {
		$_SESSION['u_role'] = $role;
	}
}
?>