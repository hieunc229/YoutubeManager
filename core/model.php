<?php
namespace Application\Model;
class Model {	
	protected $db;	
	public function __construct() {
		$this->db = new MyDPO(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, DB_CHARSET);
	}	
}