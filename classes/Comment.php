<?php
require_once "PDO_Database.php";

class Comment{
	private $UserId;
	private $RecipeId;
	private $Comment;
	
	function Comment($user_Id, $recipe_Id, $comment){
		$this->UserId = $user_Id;
		$this->RecipeId = $recipe_Id;
		$this->Comment = $comment;
	}
//===========================================================================
public function CreateComment(){
		try{
			$database = PDO_Database::Get_Instance();
			$query = "INSERT INTO comments(UserId, RecipeId, Comment) ";
			$query .= " VALUES (?, ?, ?)";
			$statement = $database->Connection->prepare($query);
			$statement->bindParam(1, $this->UserId);
			$statement->bindParam(2, $this->RecipeId);
			$statement->bindParam(3, $this->Comment);
			$statement->execute();
			
		}catch(PDOException $e)
		{
			echo "INSERT Query Failed: ".$e->getMessage();
		}	
	}
	
	
	public static function Display_Comment($comment){
	//}
}
}


?>