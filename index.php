<?php

ini_set('display_errors', 'On');
error_reporting(E_ALL);

$db= new dbConnection();

class dbConnection{
    	public $isConn;
    	protected $base;
	    
	// connect to db
	public function __construct($username = "sp2363", $password ="0EYqA829", $host = "sql1.njit.edu", $dbname = "sp2363", $options = []) {
		$this->isConn = TRUE;
		try {
			$this->base = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $username, $password, $options);
			$this->base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->base->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
		}
		catch (PDOException $e) {
			throw new Exception($e->getMessage());
		}
	}
	// disconnect from db
		public function Disconnect(){
			$this->base=NULL;
			$this->isConn=FALSE;
		}
?>
