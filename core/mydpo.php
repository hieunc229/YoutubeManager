<?php
	// PDO class for database communication
	class MyDPO {
		protected $db;

		public function __construct($host, $user, $pass, $data, $charset = "utf8")
		{
			$this->db = new PDO("mysql:host=$host;dbname=$data;charset=$charset",$user,$pass);
		}
	}