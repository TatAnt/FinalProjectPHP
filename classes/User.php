<?php
require_once "PDO_Database.php";

class User{
	private $User_Id;
	private $Username;
	private $Email;
	private $Password;
	private $Salt;
	private $Role_Id;

/* ========================================================================*/	
	function __construct($username, $email, $password, $role_Id = 1, $user_Id = null)// 1 - member
	{
		$this->Username = $username;	
		$this->Email = $email;
		$this->Password = $password;
		$this->Salt = self::Create_Salt($password);
		$this->Role_Id = $role_Id;
		$this->User_Id = $user_Id;
	}
	
/* ========================================================================*/
	private static function Create_Salt($password){
		$random = MD5($password);
		$salt = Substr($random, 0, 22);
		$hash = '$2y$10$';
		return $hash. $salt;
	}

/* ========================================================================*/	
 public function Create(){
	try{
		$database = PDO_Database::Get_Instance();
		$query = "INSERT INTO users(Username, Email, Password, Salt, Role_Id) ";
		$query .= " VALUES(?,?,?,?,?)";
		
		$crypted_password = crypt($this->Password, $this->Salt);

		$statement = $database->Connection->prepare($query);
		$statement->bindParam(1, $this->Username);
		$statement->bindParam(2, $this->Email);
		$statement->bindParam(3, $crypted_password);
		$statement->bindParam(4, $this->Salt);
		$statement->bindParam(5, $this->Role_Id);
		
		$statement->execute();
		//echo "User inserted ID = ".$database->Connection->lastInsertId();
	}catch(PDOException $e){
		echo "INSERT Query Failed : ".$e->getMessage();
	}	
}	
/* ========================================================================*/	
public function Update(){	
	$database = PDO_Database::Get_Instance();
}
/* ========================================================================*/
	
public static function Email_Exists($email){
	try{
		$database = PDO_Database::Get_Instance();
		$query = "SELECT * FROM users WHERE Email = '$email' ";
		$statement = $database->Connection->prepare($query);
		$statement->execute();
		$result = $statement->fetch(PDO::FETCH_ASSOC);
		//print_r($result); //remove it later
		if(! empty($result['User_Id'])){
			return true;
		}
		return false;
		
	}catch(PDOException $e){
		echo "Query Failed : ".$e->getMessage();
	}
}
	
/* ========================================================================*/
	
public static function UserName_Exists($username){
	try{
		$database = PDO_Database::Get_Instance();
		$query = "SELECT * FROM users WHERE Username = '$username'";
		$statement = $database->Connection->prepare($query);
		$statement->execute();
		$result = $statement->fetch(PDO::FETCH_ASSOC);
		if( ! empty($result['User_Id'])){
			return true;
		}
		return false;
		
	}catch(PDOException $e){
		echo "Query Failed : ".$e->getMessage();
	}
}
/* ========================================================================*/
public static function Username_Email_Exists($username, $email){
		try{
			
			$query = "SELECT * FROM users WHERE Username= '$username' AND Email= '$email'";
		
			$database = PDO_Database::Get_Instance();
			$statement = $database->Connection->prepare($query);
			$statement->execute();
			
			$result = $statement->fetch(PDO::FETCH_ASSOC);

			if(!empty($result['User_Id'])){
				return true;
			}
	
			return false;
			
		}catch(PDOException $e){
			echo "INSERT Query Failed : ".$e->getMessage();
		}	
	}

/* ========================================================================*/
	public static function Update_Password($email, $password){
		try{
			$salt = self::Get_Salt($email);
			$encrypted_password = crypt($password, $salt);
			
			$query = "Update users SET Password = '$encrypted_password' ";
			$query .= " WHERE Email = '$email' ";
			
			$database = PDO_Database::Get_Instance();
			$statement = $database->Connection->prepare($query);
			$statement->execute();
			
		}catch(PDOException $e){
			echo "Update Query Failed : ".$e->getMessage();
		}
	}
/* ========================================================================*/	
	public static function Get_Password($email){
	try{
		$database = PDO_Database::Get_Instance();
		$query = "SELECT * FROM users WHERE Email = '$email' ";
		$statement = $database->Connection->prepare($query);
		$statement->execute();
		$result = $statement->fetch(PDO::FETCH_ASSOC);
		
		return $result['Password'];
		
	}catch(PDOException $e){
		echo "SELECT Query Failed : ".$e->getMessage();
	}	

}
/* ========================================================================*/	
	public static function Get_Salt($email){
	try{
		$database = PDO_Database::Get_Instance();
		$query = "SELECT * FROM users WHERE Email = '$email' ";
		$statement = $database->Connection->prepare($query);
		$statement->execute();
		$result = $statement->fetch(PDO::FETCH_ASSOC);
		
		return $result['Salt'];
		
	}catch(PDOException $e){
		echo "SELECT Query Failed : ".$e->getMessage();
	}	

}
/* ========================================================================*/
public static function Login($email, $password){
		try{
			$database = PDO_Database::Get_Instance();
			$query = "SELECT * FROM users WHERE Email = '$email'";
			$statement = $database->Connection->prepare($query);
			$statement->execute();
			$result = $statement->fetch(PDO::FETCH_ASSOC);
			
			$salt = self::Get_Salt($email);
			if(crypt($password, $salt) == $result['Password']){
				return true;
			}
			return false;
			
		}catch(PDOException $e){
			echo "SELECT Query Failed : ".$e->getMessage();
		}
    }	
/* ========================================================================*/
public static function Get_Id($email){
	try{
		$database = PDO_Database::Get_Instance();
		$query = "SELECT * FROM users WHERE Email = '$email' ";
		$statement = $database->Connection->prepare($query);
		$statement->execute();
		$result = $statement->fetch(PDO::FETCH_ASSOC);
		
		return $result['User_Id'];
		
	}catch(PDOException $e){
		echo "SELECT Query Failed : ".$e->getMessage();
	}	
}	
/* ========================================================================*/	
public static function Get_Role($email){
		try{
			$database = PDO_Database::Get_Instance();
			$query = "SELECT * FROM users WHERE Email = '$email' ";
			$statement = $database->Connection->prepare($query);
			$statement->execute();
			$result = $statement->fetch(PDO::FETCH_ASSOC);
			
			return $result['Role_Id'];
			
		}catch(PDOException $e){
			echo "SELECT Query Failed : ".$e->getMessage();
		}	
	}	
	
//public static function Get_Id($username){
/*	try{
		$database = PDO_Database::Get_Instance();
		$query = "SELECT * FROM users WHERE Username = '$username'";
		$statement = $database->Connection->prepare($query);
		$statement->execute();
		$result = $statement->fetch(PDO::FETCH_ASSOC);
		
		return $result['User_Id'];
		
	}catch(PDOException $e){
		echo "SELECT Query Failed : ".$e->getMessage();
	}	
}	*/
/* ========================================================================*/	
/*public static function Get_Role($username){
		try{
			$database = PDO_Database::Get_Instance();
			$query = "SELECT * FROM users WHERE Username = '$username'";
			$statement = $database->Connection->prepare($query);
			$statement->execute();
			$result = $statement->fetch(PDO::FETCH_ASSOC);
			
			return $result['Role_Id'];
			
		}catch(PDOException $e){
			echo "SELECT Query Failed : ".$e->getMessage();
		}	
	}	*/	
	
	
	
}


?>


