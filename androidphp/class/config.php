<?php

	class config{

		public $host;
		public $user;
		public $pass;
		public $db;
		public $conn;
		public $borrow_day;
		public $max_device;

		function __construct(){

			$this->host = "localhost";
			$this->user = "root";
			$this->pass = "123321";
			$this->db = "eakqlearning";
			$this->max_device = "6";
		}

		function connect(){
			$this->conn = mysqli_connect($this->host,$this->user,$this->pass,$this->db);
			if($this->conn){
   mysqli_set_charset( $this->conn, 'utf8');


				return $this->conn;
			}
			return NULL;

		}

		function Close(){
			mysqli_close($this->conn);
		}
	}
?>
