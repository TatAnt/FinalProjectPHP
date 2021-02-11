<?php
$HOST = 'localhost';
$USER = 'root';
$PASSWORD = '';
$DB = 'recipes_db';

class PDO_Database{
	public $Connection;
	private static $instance;
/* ========================================================*/
	private function PDO_Database(){
		$this->OpenConnection();
	}
/* ========================================================*/
	public static function Get_Instance(){
		if(! isset(self::$instance)){
			self::$instance = new PDO_Database();
		}
		return self::$instance;
	}
/* ========================================================*/	
	public function OpenConnection(){
		global $HOST, $USER, $PASSWORD, $DB;
		try{
			$this->Connection = new PDO("mysql:host=$HOST;dbname=$DB",$USER,$PASSWORD);
				$this->Connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}catch(PDOException $e){
			echo "Connection failed: ".$e->getMessage();
		}
}

/* ========================================================*/
public function CloseConnection(){
	$this->Connection = null;
}
}







?>