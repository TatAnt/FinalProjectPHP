<?php

class Search{
	
		public static function searchMainDish(){
			try
			{
			$database = PDO_Database::Get_Instance();
			$query = "SELECT * FROM recipes JOIN mealtypes ON recipes.MealTypeId = mealtypes.MealTypeId WHERE MealTypeName = 'MainDish'";
			$statement = $database->Connection->prepare($query);
			$statement->execute();
			$result = $statement->fetchAll(PDO::FETCH_ASSOC);
			return $result;	
			}catch(PDOException $e)
			{
				echo "Query Failed: ".$e->getMessage();
			}
	}	
	//======================================================================================
	
		
		
	public static function searchAppetizers(){
			try
			{
			$database = PDO_Database::Get_Instance();
			$query = "SELECT * FROM recipes JOIN mealtypes ON recipes.MealTypeId = mealtypes.MealTypeId WHERE MealTypeName = 'Appetizers'";
			$statement = $database->Connection->prepare($query);
			$statement->execute();
			$result = $statement->fetchAll(PDO::FETCH_ASSOC);
			return $result;	
			}catch(PDOException $e)
			{
				echo "Query Failed: ".$e->getMessage();
			}
				
	}			
	
	//==============================================================================================
	
	
	public static function searchDesserts(){
		try
			{
			$database = PDO_Database::Get_Instance();
			$query = "SELECT * FROM recipes JOIN mealtypes ON recipes.MealTypeId = mealtypes.MealTypeId WHERE MealTypeName = 'Desserts'";
			$statement = $database->Connection->prepare($query);
			$statement->execute();
			$result = $statement->fetchAll(PDO::FETCH_ASSOC);
			return $result;	
			}catch(PDOException $e)
			{
				echo "Query Failed: ".$e->getMessage();
			}
			
	}
//=============================================================================================
public static function searchSalad(){
			try
			{
			$database = PDO_Database::Get_Instance();
			$query = "SELECT * FROM recipes JOIN categories ON recipes.CategoryId = categories.CategoryId WHERE CategoryName = 'Salads'";
			$statement = $database->Connection->prepare($query);
			$statement->execute();
			$result = $statement->fetchAll(PDO::FETCH_ASSOC);
			return $result;				
		
			}catch(PDOException $e)
			{
				echo "Query Failed: ".$e->getMessage();
			}
	}
	//==========================================================================================================
	public static function searchFruit(){
			try
			{
				$database = PDO_Database::Get_Instance();
				$query = "SELECT * FROM recipes JOIN categories ON recipes.CategoryId = categories.CategoryId WHERE CategoryName = 'Fruit'";
				$statement = $database->Connection->prepare($query);
				$statement->execute();
				$total=$statement->rowCount();
				$result = $statement->fetchAll(PDO::FETCH_ASSOC);
				return $result;				
		
			}catch(PDOException $e)
			{
				echo "Query Failed: ".$e->getMessage();
			}
		}
	//===============================================================================================================
	public static function searchRice(){
			try
			{
				$database = PDO_Database::Get_Instance();
				$query = "SELECT * FROM recipes JOIN categories ON recipes.CategoryId = categories.CategoryId WHERE CategoryName = 'Rice'";
				$statement = $database->Connection->prepare($query);
				$statement->execute();
				$total=$statement->rowCount();
				$result = $statement->fetchAll(PDO::FETCH_ASSOC);
				return $result;				
		
			}catch(PDOException $e)
			{
				echo "Query Failed: ".$e->getMessage();
			}
		}
		//===============================================================================================================
	public static function searchChicken(){
			try
			{
				$database = PDO_Database::Get_Instance();
				$query = "SELECT * FROM recipes JOIN categories ON recipes.CategoryId = categories.CategoryId WHERE CategoryName = 'Chicken'";
				$statement = $database->Connection->prepare($query);
				$statement->execute();
				$total=$statement->rowCount();
				$result = $statement->fetchAll(PDO::FETCH_ASSOC);
				return $result;				
		
			}catch(PDOException $e)
			{
				echo "Query Failed: ".$e->getMessage();
			}
		}
			//===============================================================================================================
	public static function searchBreads(){
			try
			{
				$database = PDO_Database::Get_Instance();
				$query = "SELECT * FROM recipes JOIN categories ON recipes.CategoryId = categories.CategoryId WHERE CategoryName = 'Savoury Breads'";
				$statement = $database->Connection->prepare($query);
				$statement->execute();
				$total=$statement->rowCount();
				$result = $statement->fetchAll(PDO::FETCH_ASSOC);
				return $result;				
		
			}catch(PDOException $e)
			{
				echo "Query Failed: ".$e->getMessage();
			}
		}
	public static function Display(&$recipes){
		
			foreach($recipes as $Element){
				$i=0;
			echo '<table border="0" cellpadding="10">';
				if($i%3==0){
				
				echo "<tr>";
					echo "<td>";
					echo "<a href='recipe_details.php?Id=" .$Element['Id']."'>"."<img src = \"images/".$Element['Image']." \" height='auto' width='350px' />"."</a>";
					echo "</td>";
					echo "</tr>";
				echo "<tr>";
					echo "<td><b>";
					echo "<h3>";
					echo "<a href='recipe_details.php?Id=" .$Element['Id']."'>".$Element['Name']."</a>";
					echo "</h3>";
					echo "</b></td>";
					echo "</tr>";
				echo "<tr>";
					echo "<td>";
					echo "Cooking time: ".$Element['CookingTime'];
					echo "</td>";
					echo "</tr>";
					echo "<br>";
				echo "<tr>";
					echo "<td>";
					echo "Servings: ".$Element['Servings'];
					echo "</td>";
				 echo "</tr>";
				 echo "<br>";
				  /*echo "<tr>";
				  echo "<td>";
					$averageRating = self::Calculate_Rating($Element['Id']);
					Rating::Dispaly_Stars($averageRating);
					echo "</td>";
				echo "</tr>";*/
				echo "<br><br><br>";
				}else{
					echo "<td>";
				echo "<a href='recipe_details.php?Id=" .$Element['Id']."'>".$Element['Name']."</a>";
					echo "</h3>";
					echo "</b></td>";
				}
				$i++;
			
			echo "</table>";
			}
	}
	
	
	
	
	
	
	
}
?>




