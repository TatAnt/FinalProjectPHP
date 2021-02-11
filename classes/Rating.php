<?php
require_once "PDO_Database.php";

class Rating{
	private $UserId;
	private $RecipeId;
	private $Rating;
	
	function Ratings($user_Id, $recipe_Id, $rating){
		$this->UserId = $user_Id;
		$this->RecipeId = $recipe_Id;
		$this->Rating = $rating;
	}
	public function Create(){
		try{
			$database = PDO_Database::Get_Instance();
			
			$query = "INSERT INTO ratings(UserId, RecipeId, Rating) ";
		    $query .= " VALUES (?,?,?,?)";
			$statement = $database->Connection->prepare($query);
			$statement->bindParam(1, $this->UserId);
			$statement->bindParam(2, $this->RecipeId);
			$statement->bindParam(3, $this->Rating);
			$statement->execute();
			
		}catch(PDOException $e)
		{
			echo "INSERT Query Failed : ".$e->getMessage();
		}
	}
	
	
	public static function Display_Form($rating){
		echo '<form action = "#" method= "Post">';
		echo '<fieldset class="rating"';
		if(! empty($rating)){
			echo "disabled = 'disabled'";
		}
		echo '/>'; 
		echo '<input type="radio" id="star5" name="rating" value="5"';
		if($rating==5){echo "checked='checked'";}
		echo 'onchanged = "this.form.submit();"';
		echo '/><label for="star5" title="Exceptional!"> 5 stars</label>';
		
		echo '<input type="radio" id="star4" name="rating" value="4"';
		if($rating==4){echo "checked='checked'";}
		echo 'onchanged = "this.form.submit();"';
		echo '/><label for="star4" title="Good"> 4 stars</label>';
		
		echo '<input type="radio" id="star3" name="rating" value="3"';
		if($rating==3){echo "checked='checked'";}
		echo 'onchanged = "this.form.submit();"';
		echo '/><label for="star3" title="Not bad"> 3 stars</label>';
		
		echo '<input type="radio" id="star2" name="rating" value="2"';
		if($rating==2){echo "checked='checked'";}
		echo 'onchanged = "this.form.submit();"';
		echo '/><label for="star2" title="Fair"> 2 stars</label>';
		
		echo '<input type="radio" id="star1" name="rating" value="1"';
		if($rating==1){echo "checked='checked'";}
		echo 'onchanged = "this.form.submit();"';
		echo '/><label for="star1" title="Poor"> 1 stars</label>';
		
		echo '</fieldset>';
		echo '</form>';
	}
	
	public static function Dispaly_Stars($rating){
		$full_stars = floor($rating);
		$empty_stars = 5 - $full_stars;
		//Dispaly Full stars:
		for($i=0; $i<$full_stars; $i++){
			echo '<i class="fa fa-star text-warning float-left" style="font-size:26px; color: #FF9900"></i>';
		}
		
		//Dispaly half star;
		if($rating - $full_stars > 0){
			$empty_stars--;
			echo '<i class="fa fa-star-half-o text-warning float-left" style="font-size:26px; color: #FF9900"></i>';
		}
		
		//Dispaly empty stars:
		for($i=0; $i<$empty_stars; $i++){
			echo '<i class="fa fa-star-o text-warning float-left" style="font-size:26px; color: #FF9900"></i>';
		}
	}
}

?>