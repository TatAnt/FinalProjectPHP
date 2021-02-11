<?php include "../classes/Search.php"?>
<?php include "../classes/Recipe.php"?>
<?php include "includes/header.php"?>
<!DOCTYPE html >

<body>
 <div class="wrapper" >
   <div class="page"> 

<!-- /*Start of Header menu/    -->
               <div class="header-container">
                   <div id="brand">
                     <img src="./images/Cook.png" /><h1><span class="highlight"> Recipe Book
					 </span></h1>
                   </div>
				   
                   <nav>
                     <ul>
                      <li class="current"><a href="../index.php">Home</a></li>
                      <li ><a href="./sketch_gallery.html">Recipes</a></li>
					  <li><a href="logout.php">Sign-Out</a></li>
                     </ul>
                   </nav>
               </div><br><br><br>
			    <div><hr style="height:3px;color:#BCA474;background-color:#BCA474"></div>
	   <br>
       	  <?php
	 $recipes = Recipe::ReadAllRecipeFromDB();
	 
	  $selected = 0;
			
					
	  ?>
	  <div class="forms">
		<form action ='#' method = "post">
				<select name="meal_search" onchange = "this.form.submit();">
					<option value=0 <?php if($selected == 0)echo "selected"; ?>>Select Meal Type</option>
					<option value=1 <?php if($selected == 1)echo "selected"; ?>>Main Dishes</option>
					<option value=2 <?php if($selected == 2)echo "selected"; ?>>Appetizers</option>
					<option value=3 <?php if($selected == 3)echo "selected"; ?>>Desserts</option>
				</select>
		</form>
			<form action ='#' method = "post">
				<select name="category_search" onchange = "this.form.submit();">
					<option value=0 <?php if($selected == 0)echo "selected"; ?>>Select Category</option>
					<option value=1 <?php if($selected == 1)echo "selected"; ?>>Salad</option>
					<option value=2 <?php if($selected == 2)echo "selected"; ?>>Fruit</option>
					<option value=3 <?php if($selected == 3)echo "selected"; ?>>Rice</option>
					<option value=4 <?php if($selected == 4)echo "selected"; ?>>Chicken</option>
					<option value=5 <?php if($selected == 5)echo "selected"; ?>>Savoury Breads</option>
				</select>
			</form>
	 </div>
<!-- /*End of header content */   <splat></splat>-->
       
<!-- Start of main content */           -->
          <div class="main-container">
				<div class="forms">
			 <form action="search.php" method="POST" id="search-items">
				<input id="name-to-find" type="text" name="name" placeholder="Search items by name..">	
				<button id="button" type="submit">Search</button> <img src="./images/search.png" style="padding: 0 0 0 15px";>
             </form>
			</div>
				<br><br><br>
				
				<?php
						echo "<b><h4>Welcome back!</h4></b> ";
					if(isset($_POST["meal_search"])){
						$selected = $_POST["meal_search"];
						switch($selected){
							case 1: $resultRecipes = Search::searchMainDish();
									break;
							case 2: $resultRecipes = Search::searchAppetizers();
									break;
							case 3: $resultRecipes = Search::searchDesserts();
									break;
						}
						Search::Display($resultRecipes);
					}
					if(isset($_POST["category_search"])){
						$selected = $_POST["category_search"];
						switch($selected){
							case 1: $resultRecipes = Search::searchSalad();
									break;
							case 2: $resultRecipes = Search::searchFruit();
									
									break;
							case 3: $resultRecipes = Search::searchRice();
									break;
							case 4: $resultRecipes = Search::searchChicken();
									break;
							case 5: $resultRecipes =  Search::searchBreads();
									break;
						}
						Search::Display($resultRecipes);
					}
					
				  ?> 
                
                  <div class="grid-container">
				 <?php
                     Recipe::Display($recipes);
					
                  ?>
                 </div>
             <br><br>
				<br><br>
				<p>  <a href="#"><img src="./images/backtop.png" title="Back up"></a></p>
				</div>

	
<!-- /*End of main content*/ -->

<!-- /*Start of footer*/ -->
         <?php include "includes/footer_menu.php"?>

<!-- /*End of footer*/ -->
 <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
   </div>
<!-- /*End of page box*/     -->

 </div>
<!-- /* End of WRAPPER*/ -->
   
</body>
   
</html> 