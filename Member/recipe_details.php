<?php ob_start();?>
<?php include "../classes/Recipe.php"?>
<?php include "../classes/Comment.php"?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe Book | HomePage</title>
    <link rel="shortcut icon" href="./media/iconfinder_image.png" type="image/png">
    <link rel="stylesheet" href="images/style.css" type="text/css" />
	<link rel="stylesheet" href="images/rating.css" type="text/css" />
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
</head>
<body>
 <div class="wrapper" >
   <div class="page"> 

<!-- /*Start of Header/    -->
               <div class="header-container">
                   <div id="brand">
                     <img src="./images/Cook.png" /><h1><span class="highlight"> Recipe Book
					 </span></h1>
                   </div>
                   <nav>
                     <ul>
                      <li class="current"><a href="./index.php">Home</a></li>
                      <li ><a href="./sketch_gallery.html">Recipes</a></li>
					  <li><a href ="./logout.php">Sign Out</a></li>
                     </ul>
                   </nav>
               </div>
			 
			   <br><br>
       
<!-- /*End of header content */   <splat></splat>-->
       
<!-- Start of main content */           -->
         <div class="main-container">				 
                  <?php
				  if(!isset($_SESSION)){
						session_start();
					}
						if(isset($_GET['Id'])){
							$recipe_Id = $_GET['Id'];
							$user_Id = $_SESSION['User_Id'];
							if(isset($_POST["rating"])){
								$ratingObj = new Rating($user_Id, $recipe_Id, $_POST["rating"]);
								$ratingObj->Create();
							}
						Recipe::Display_Details($recipe_Id, $user_Id);	
							/*if(isset($_POST["add"])){
								if(!empty($_POST["Comment"])){
									$msg="<pre>$Comment</pre>";
									//$comm = explode("\r\n", $_POST["Comment"]);
									//$query = "INSERT INTO comments(Comment) VALUES('$Comment')";
									$comm = new Comment($user_Id, $recipe_Id, $_POST["Comment"]);
									$comm->CreateComment();
								}
							}*/
						
						}
				  ?>
                  <div class="grid-container">

                </div>
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