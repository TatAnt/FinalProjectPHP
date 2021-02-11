<?php
include_once "PDO_Database.php";

class FavoriteRecipe {
    
	
    public static function Add_Favorite($userId, $recipeId){
       
		try{
			$query  = "INSERT INTO FavoriteRecipe(userId, recipeId)";
			$query .= " VALUES(?, ?)";
			
			$database = PDO_Database::Get_Instance();
			$statement = $database->Connection->prepare($query);
			$statement->bindParam(1,$userId);
			$statement->bindParam(2,$recipeId);
          
			$statement->execute();
			
		}catch(PDOException $e){
			echo "Query Failed ".  $e->getMessage();
		}
    }
    
       
    public static function IsFavoriteRecipe($userId, $recipeId){
		
		try{
			$query = "SELECT Count(*) FROM FavoriteRecipe WHERE Car_ID = $recipeId AND User_ID = $userId";
            
			$database = PDO_Database::Get_Instance();
			$statement = $database->Connection->prepare($query);	
			$statement->execute();
			$result = $statement->fetch(PDO::FETCH_ASSOC);
			
			return !empty($result['Count(*)']);
			
		}catch(PDOException $e){
			echo "Query Failed ".$e->getMessage();
		}
	}
    
    public static function Delete_Favorite($userId, $recipeId){
	
		try{
			$query = "Delete FROM FavoriteRecipe WHERE Car_ID = $recipeId AND User_ID = $userId";
			
			$database = PDO_Database::Get_Instance();
			$connection = $database->Get_Connection();
			$connection->exec($query);
			
		}catch(PDOException $e){
			echo "Delete Query Failed ".$e->getMessage();
		}
	}
    
    
    
    public static function Display_Delete_Form($recipeId){
        echo "<form action = '#' method = 'post'>";
        echo "<input type = 'hidden' name= 'Car_ID' value =".$recipeId." >";
        echo "<button type ='submit' name = 'Delete' class='btn btn-danger'><span class='fa fa-trash'></span></button>";
        echo "</form>";
	}
	public static function Display_Add_Form($isFavorite = FALSE){
		echo "<form action = '#' method = 'POST'>";
        echo "<input type = 'hidden' name= 'Favorite' >";
		echo '<div class="pretty p-icon p-toggle p-plain" style="font-size:16px;color:red;">'; 
			echo '<input type="checkbox" name = "Checkbox" ';
			if($isFavoriteRecipe){ echo "checked"; }
			echo ' onchange="this.form.submit();"  />'; 
			echo '<div class="state p-off">'; 
			echo '<i class="icon fa fa-heart-o" ></i>'; 
			echo '<label>Add To Favorite Recipes</label>'; 
			echo '</div>'; 
			echo '<div class="state p-on p-danger-o">'; 
			echo '<i class="icon fa fa-heart"></i>'; 
			echo '<label>Remove From Favorite Recipes</label>'; 
			echo '</div>'; 
		echo '</div>'; 	
        echo "</form>";
	}
    
}
?>