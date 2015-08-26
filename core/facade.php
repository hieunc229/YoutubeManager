<?php
namespace Application;
class Facade extends \PDO{

	public function __construct() {
		require_once(ROOT . DS . app_name . DS .'config' . DS . 'config.php');
		parent::__construct("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8", DB_USER, DB_PASSWORD);
	}

	/* Video functions */
	private function videoById($id) {
		$model = new \Application\Model\Link();
		$statement = "SELECT * FROM mv_links WHERE li_id = $id";
		$run = $this->prepare($statement);
		$run->execute();

		$result = $run->fetch();

		// validate object returned value
		$this->objCheck($result);

		$model->id = $result['li_id'];
		$model->v = $result['li_v'];
		$model->name = $result['li_name'];
		$model->des = $result['li_des'];
		$model->ser_id = $result['li_ser_id'];
		return $model;
	}

	public function GetVideoById($id) {
		$this->validate($id, 'num');
		return $this->videoById($id);
	}

	private function moviesBySeriesId($id) {
		$model = array();
		$statement = "SELECT l.*, s.ser_name FROM mv_links l
						LEFT JOIN mv_series s ON l.li_ser_id = s.ser_id WHERE li_ser_id = $id";
		$run = $this->query($statement);

		while($rows = $run->fetch())
		{	
			$model = new \Application\Model\Link();
			$model->id = $rows['li_id'];
			$model->v = $rows['li_v'];
			$model->name = $rows['li_name'];
			$model->des = $rows['li_des'];
			$model->ser_name = $rows['ser_name'];
			$models[] = $model;
		}
		return $models;
	}

	public function GetMoviesBySeriesId($id) {
		return $this->moviesBySeriesId($id);
	}

	private function links() {
		$models = array();
		$statement = "SELECT * FROM mv_links";
		$run = $this->prepare($statement);
		$run->execute();

		while($rows = $run->fetch())
		{	
			$model = new \Application\Model\Link();
			$model->id = $rows['li_id'];
			$model->des = $rows['li_v'];
			$model->name = $rows['li_name'];
			$model->name = $rows['li_des'];
			$model->name = $rows['li_ser_id'];
			$models[] = $model;
		}
		return $models;
	}

	private function linksFull() {
		$models = array();
		$statement = "	SELECT l.*, s.ser_id, s.ser_name, c.cat_id, c.cat_name
						FROM mv_links l
						LEFT JOIN mv_series s ON l.li_ser_id = s.ser_id
						LEFT JOIN mv_categories c ON s.ser_cat_id = c.cat_id
					";
		$run = $this->prepare($statement);
		$run->execute();

		while($rows = $run->fetch())
		{	
			$model = new \Application\Model\Link();
			$model->id = $rows['li_id'];
			$model->des = $rows['li_v'];
			$model->name = $rows['li_name'];
			$model->des = $rows['li_des'];
			$model->ser_id = $rows['ser_id'];
			$model->ser_name = $rows['ser_name'];
			$model->cat_id = $rows['cat_id'];
			$model->cat_name = $rows['cat_name'];
			$models[] = $model;
		}
		return $models;
	}

	public function GetLinks($full = false) {
		if($full) return $this->linksFull();
		return $this->links();
	}


	/* Category functions */
	private function categories() {
		$models = array();
		$statement = "SELECT * FROM mv_categories";
		$run = $this->prepare($statement);
		$run->execute();

		while($rows = $run->fetch())
		{	
			$model = new \Application\Model\Category();
			$model->id = $rows['cat_id'];
			$model->des = $rows['cat_des'];
			$model->name = $rows['cat_name'];
			$model->img = $rows['cat_img'];
			$models[] = $model;
		}
		return $models;
	}

	public function GetCategories() {
		return $this->categories();
	}

	/* Series functions */
	private function series() {
		$models = array();
		$statement = "SELECT s.*,c.cat_name FROM mv_series s left join mv_categories c ON c.cat_id = s.ser_cat_id";
		$run = $this->prepare($statement);
		$run->execute();

		while($rows = $run->fetch())
		{	
			$model = new \Application\Model\Series();
			$model->id = $rows['ser_id'];
			$model->cat_id = $rows['ser_cat_id'];
			$model->name = $rows['ser_name'];
			$model->cat_name = $rows['cat_name'];
			$models[] = $model;
		}
		
		return $models;
	}

	public function GetSeries() {
		return $this->series();
	}

	private function seriesByCategoryId($id) {
		$model = array();
		$statement = "SELECT s.*, (SELECT l.li_v FROM mv_links as l WHERE l.li_ser_id = s.ser_id LIMIT 1) as li_v FROM mv_series as s WHERE s.ser_cat_id = $id";
		$run = $this->prepare($statement);
		$run->execute();

		while($rows = $run->fetch())
		{	
			$model = new \Application\Model\Series();
			$model->id = $rows['ser_id'];
			$model->cat_id = $rows['ser_cat_id'];
			$model->name = $rows['ser_name'];
			$model->v = $rows['li_v'];
			$models[] = $model;
		}
		return $models;
	}

	public function GetSeriesByCategoryId($id) {
		return $this->seriesByCategoryId($id);
	}

	// Used to check weather the excution return result or not
	protected function objCheck($obj)
	{
		if(empty($obj))
			throw new \Application\MeException('Me4O4');
	}

	/*
	* Used to validate value
	* Valid $type: 'num' => number
	*/
	protected function validate($val, $type)
	{
		switch ($type) {
			case 'num':
				if(!is_numeric($val))
				{
					throw new \Application\MeException('Me002');
				}
				break;
			case 'string':
				if(empty($val)) {
					throw new \Application\MeException('Me003');	
				}
			default:
				# code...
				break;
		}
	}
}
?>