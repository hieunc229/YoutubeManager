<?php
/*
*	Facade point for admincp
*/
namespace Area\Admincp\Core;
class Manager extends \Application\Facade {

	public function __construct() {
		parent::__construct();
	}

	/*
	*	Login checking
	*/
	private function login_validate($user, $pass) {
		$stmt = $this->prepare("SELECT * FROM mv_users WHERE
						u_login = :user AND
						u_pass = :pass");
		$stmt->bindParam(':user', $user);
		$stmt->bindParam(':pass', $pass);
		$stmt->execute();

		return $stmt->rowCount();
	}

	public function LoginValidate($user, $pass) {
		return $this->login_validate($user, MD5($pass));
	}

	/*
	*	Category Funcitons
	*/
	private function categoryById($id)
	{
		$statement = "SELECT * FROM mv_categories WHERE cat_id = '$id'";
		$run = $this->prepare($statement);
		$run->execute();

		$result = $run->fetch();
		$this->objCheck($result);

		$model = new \Application\Model\Category();
		$model->id = $result['cat_id'];
		$model->des = $result['cat_des'];
		$model->name = $result['cat_name'];

		return $model;
	}

	public function GetCategoryById($id)
	{
		$this->validate($id, 'num');

		return $this->categoryById($id);
	}

	// Edit category functions
	private function editCategory($id, $name, $des) {
		$statement = "UPDATE mv_categories SET cat_name = ?, cat_des = ? WHERE cat_id = ?";
		$run = $this->prepare($statement);
		return $run->execute(array($name, $des, $id));
	}

	public function DoEditCategory($id, $name, $des) {
		$this->validate($id, 'num');
		$this->editCategory($id, $name, $des);
	}

	// Remove category functions
	private function removeCategory($id) {
		$statement = "DELETE FROM mv_categories WHERE cat_id = $id";
		$run = $this->prepare($statement);
		return $run->execute();
	}
	
	public function DoRemoveCategory($id) {
		$this->validate($id, 'num');
		return $this->removeCategory($id);
	}

	// Add category functions
	private function addCategory($name, $des, $img) {
		$this->validate($name, 'string');
		$statement = "INSERT INTO mv_categories (cat_name, cat_des, cat_img) VALUES(?, ?, ?)";
		$run = $this->prepare($statement);
		return $run->execute(array($name, $des, $img));
	}

	public function DoAddCategory($name, $des, $img) {
		return $this->addCategory($name, $des, $img);
	}

	/*
	*	Series Funcitons
	*/
	private function seriesById($id) {
		$statement = "SELECT s.*, c.cat_name FROM mv_series s LEFT JOIN mv_categories c ON s.ser_cat_id = c.cat_id WHERE ser_id = $id";
		$run = $this->prepare($statement);
		$run->execute();
		$series = $run->fetch();

		$this->objCheck($series);
		$model = new \Application\Model\Series();
		$model->id = $series['ser_id'];
		$model->cat_id = $series['ser_cat_id'];
		$model->name = $series['ser_name'];
		$model->cat_name = $series['cat_name'];

		return $model;
	}

	public function GetSeriesById($id) {
		$this->validate($id, 'num');
		return $this->seriesById($id);
	}

	private function editSeries($id, $name, $cat_id) {
		$statement = "UPDATE mv_series SET ser_name = ?, ser_cat_id = ? WHERE ser_id = ?";
		$run = $this->prepare($statement);
		return $run->execute(array($name, $cat_id, $id));
	}

	public function DoEditSeries($id, $name, $cat_id) {
		$this->validate($id, 'num');
		return $this->editSeries($id, $name, $cat_id);
	}

	private function removeSeries($id) {
		$statement = "DELETE FROM mv_series WHERE ser_id = $id";
		$run = $this->prepare($statement);
		return $run->execute();
	}

	public function DoRemoveSeries($id) {
		$this->validate($id, 'num');
		return $this->removeSeries($id);
	}

	// Add series functions
	private function addSeries($name, $cat_id) {
		$this->validate($name, 'string');
		$statement = "INSERT INTO mv_series (ser_name, ser_cat_id) VALUES(?, ?)";
		$run = $this->prepare($statement);
		return $run->execute(array($name, $cat_id));
	}

	public function DoAddSeries($name, $cat_id) {
		$this->validate($cat_id, 'num');
		return $this->addSeries($name, $cat_id);
	}

	/*
	*	Links Funcitons
	*/
	private function linkById($id) {
		$statement = "	SELECT l.*, s.ser_id, s.ser_name
						FROM mv_links l
						LEFT JOIN mv_series s ON l.li_ser_id = s.ser_id
						WHERE l.li_id = $id
					";
		$run = $this->prepare($statement);
		$run->execute();
		$series = $run->fetch();

		$this->objCheck($series);
		$model = new \Application\Model\Link();
		$model->id = $series['li_id'];
		$model->name = $series['li_name'];
		$model->v = $series['li_v'];
		$model->des = $series['li_des'];
		$model->ser_id = $series['li_ser_id'];
		$model->ser_name = $series['ser_name'];

		return $model;
	}

	public function GetLinkById($id) {
		$this->validate($id, 'num');
		return $this->linkById($id);
	}

	private function editLink($id, $v, $name, $des, $ser_id) {
		$statement = "UPDATE mv_links SET li_v = ?, li_name = ?, li_des = ?, li_ser_id = ? WHERE li_id = ?";
		$run = $this->prepare($statement);
		return $run->execute(array($v, $name, $des, $ser_id, $id));
	}

	public function DoEditLink($id, $v, $name, $des, $ser_id) {
		$this->validate($id, 'num');
		$this->validate($ser_id, 'num');
		return $this->editLink($id, $v, $name, $des, $ser_id);
	}

	private function removeLink($id) {
		$statement = "DELETE FROM mv_link WHERE li_id = $id";
		$run = $this->prepare($statement);
		return $run->execute();
	}

	public function DoRemoveLink($id) {
		$this->validate($id, 'num');
		return $this->removeLink($id);
	}

	// Add series functions
	private function addLink($v, $name, $des, $ser_id) {
		$this->validate($name, 'string');
		$statement = "INSERT INTO mv_links (li_v, li_name, li_des, li_ser_id) VALUES(?, ?, ?, ?)";
		$run = $this->prepare($statement);
		return $run->execute(array($v, $name, $des, $ser_id));
	}

	public function DoAddLink($v, $name, $des, $ser_id) {
		$this->validate($ser_id, 'num');
		return $this->addLink($v, $name, $des, $ser_id);
	}
}
?>