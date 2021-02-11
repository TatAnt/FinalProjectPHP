<?php
require_once "PDO_Database.php";
require_once "Rating.php";

class Recipe{
	private $Id;
	private $CategoryId;
	private $MealTypeId;
	private $Name;
	private $Ingridients;
	private $PrepSteps;
	private $PreparationTime;
	private $CookingTime;
	private $Servings;
	private $RecipeDate;
	private $Image;
	private $Comment;

/* ========================================================================*/	
	function __construct($recipe_Id, $categoryId, $mealTypeId, $name, $ingridients, $prepSteps, $preparationTime, $cookingTime, $servings, $recipeDate, $image, $comment)
	{
		$this->Id = $recipe_Id;	
		$this->CategoryId = $categoryId;
		$this->MealTypeId = $mealTypeId;
		$this->Name = $name;
		$this->Ingridients = $ingridients;
		$this->PrepSteps = $prepSteps;
		$this->PreparationTime = $preparationTime;
		$this->CookingTime = $cookingTime;
		$this->Servings = $servings;
		$this->RecipeDate = $recipeDate;
		$this->Image = $image;
		$this->Comment = $comment;
	}
	
/* ========================================================================*/

	public static function ReadAllRecipeFromDB(){
			try
			{
				$database = PDO_Database::Get_Instance();
				$query = "SELECT * FROM recipes";
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

/* ========================================================================*/
    public static function Search_By_Name($name){
		
			$database = PDO_Database::Get_Instance();
			$query = "SELECT * FROM `recipes` WHERE Name LIKE '%$name%'";
			$statement = $database->Connection->prepare($query);
			$statement->bindValue(1,"%$name%");
			$statement->execute();
			//$result = $statement->fetch(PDO::FETCH_ASSOC);
			
			if(!$statement->rowCount() == 0){
			
			while($result = $statement->fetch(PDO::FETCH_ASSOC)){
				//foreach($result as $Element){
					$i=0;
				echo '<table border="0" cellpadding="10">';
				if($i%3==0){			
				echo "<tr>";
					echo "<td>";
					echo "<a href='recipe_details.php?Id=" .$result['Id']."'>"."<img src = \"images/".$result['Image']." \" height='auto' width='350px' />"."</a>";
					echo "</td>";
					echo "</tr>";
				echo "<tr>";
					echo "<td><b>";
					echo "<h3>";
					echo "<a href='recipe_details.php?Id=" .$result['Id']."'>".$result['Name']."</a>";
					echo "</h3>";
					echo "</b></td>";
					echo "</tr>";
				echo "<tr>";
					echo "<td>";
					echo "Cooking time: ".$result['CookingTime'];
					echo "</td>";
					echo "</tr>";
					echo "<br>";
				echo "<tr>";
					echo "<td>";
					echo "Servings: ".$result['Servings'];
					echo "</td>";
				 echo "</tr>";
				 echo "<br>";
				  echo "<tr>";
				  echo "<td>";
					$averageRating = self::Calculate_Rating($result['Id']);
					Rating::Dispaly_Stars($averageRating);
					echo "</td>";
				echo "</tr>";
				echo "<br><br><br>";
				}else{
					echo "<td>";
				echo "<a href='recipe_details.php?Id=" .$result['Id']."'>".$result['Name']."</a>";
					echo "</h3>";
					echo "</b></td>";
				}
				
				$i++;
				echo "</table>";}
				
			}
	
				//echo $result['Name'];
				//echo $result['Servings'];
			}
	
//====================================================================
public static function Calculate_Rating($recipe_Id, $user_Id = null){
		try{
			$query = "";
			if(empty($user_Id)){
				$query = "SELECT AVG(Rating) FROM ratings WHERE RecipeId= $recipe_Id "; 
			}else{
				$query = "SELECT AVG(Rating) FROM ratings WHERE RecipeId = $recipe_Id AND UserId = $user_Id";
			}
			$database = PDO_Database::Get_Instance();
			$statement = $database->Connection->prepare($query);
			$statement->execute();
			
			$result = $statement->fetch(PDO::FETCH_ASSOC);
			return $result['AVG(Rating)']; 
		}catch(PDOException $e){
			echo "Query Failed: ". $e->getMessage();
		}
	}
	
//============================================================================
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
				  echo "<tr>";
				  echo "<td>";
					$averageRating = self::Calculate_Rating($Element['Id']);
					Rating::Dispaly_Stars($averageRating);
					echo "</td>";
				echo "</tr>";
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
	
	
		public static function Search_By_Id($recipe_Id){
		try
		{
			$database = PDO_Database::Get_Instance();
			$query = "SELECT * FROM recipes WHERE Id = $recipe_Id";
			$statement = $database->Connection->prepare($query);
			$statement->execute();
			$result = $statement->fetch(PDO::FETCH_ASSOC);
			return $result;
		}catch(PDOException $e)
		{
			echo "Query Failed: ".$e->getMessage();
		}
	}
	
	
	
		public static function Display_Details($recipe_Id, $user_Id = null){
		$recipe = self::Search_By_Id($recipe_Id);
		echo '<div class="card w-100">';
		// Card body
		echo '<div class="row">';
		
			echo '<div class="m-3 pb-3 col-md-5">';
		
				echo "<img src='images/".$recipe['Image'] ."' height='auto' width='400px' >";
			
			echo '</div>';//end of column1
			echo '<div class="col-md-6">';
			echo '<span class="highlight"><h3><b>'.$recipe['Name'].'</b></h3></span><br><br>';
			echo '<h5 style="display: inline;"><b>Preparation Time: </b></h5>'.'<h6 style="display: inline;">'.$recipe['PreparationTime'].'</h6><hr style="clear: both;" />';
			echo '<h5 style="display: inline;"><b>Cooking Time: </b></h5>'.'<h6 style="display: inline;">' .$recipe['CookingTime'].'</h6><hr style="clear: both;" />';
			echo '<h5 style="display: inline;"><b>Servings: </b></h5>'.'<h6 style="display: inline;">' .$recipe['Servings'].'</h6><hr style="clear: both;" />';
			echo '<h5 style="display: inline;"><b>Recipe Date: </b></h5>'.'<h6 style="display: inline;">'  .$recipe['RecipeDate'].'</h6><hr style="clear: both;" />';
			echo '<h5 style="display: inline;"><b>Ingridients: </b></h5>'.'<h6 style="display: inline;">'.$recipe['Ingridients'].'</h6><hr style="clear: both;" />';
			echo '<h5><b>Preparation Steps: </b></h5>'.'<h6>'.$recipe['PrepSteps'].'</h6>';
			
			echo '<form>';
			echo '<div class="form-outline">';
			  echo '<textarea name="Comment" class="form-control" id="textAreaExample" rows="4"></textarea>';
			  echo'<label class="form-label" for="textAreaExample">Your Comment</label>';
			  echo '<input type="submit" name="add" class="btn" value="Add"/>';
			
			echo '</div>';
			echo '</form>';
			
			echo '</div>';//end of column2
			echo '</div>'; //end of row
				echo '<div class="col-md-1">';
				echo'<a href="index.php">';
				echo "<button class='btn btn-success'>". '<span class="fa fa-angle-double-left" style="font-size:24px"></span></button>'; 
				echo'</a>';
			echo '</div>';//end of column4
		echo '</div>';//end of body
		echo '<div class="card-footer">';
		//Card footer
		echo '<div class="row">';
		echo '<div class="col-md-4">';
		$avgerageRating = self::Calculate_Rating($recipe_Id);
		Rating::Dispaly_Stars($avgerageRating);//display average rating
		echo '</div>';//end of col1
		echo '<div class="col-md-4">';
		if(!empty($user_Id)){
			echo "<div><h5><b>Rate This Recipe: </b></h5></div>";
			$rating = self::Calculate_Rating($recipe_Id, $user_Id);
			Rating::Display_Form($rating);
		}
		echo '</div>';//end of col2
		echo '<div class="col-md-4">';
		
		echo '</div>';
		echo '</div>';//end of row2
		echo '</div>';//end of footer
		
		
	}
}


?>