<?php ob_start();?>
<?php include "classes/Recipe.php"?>
<?php include "includes/header.php"?>
<?php include "includes/header.php"?>
<!DOCTYPE html>
<html lang="en">

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
                      <li><a href="./sketch_gallery.html">Recipes</a></li>
                      <li><a href ="./login.php">Sign In</a></li>
					  <li><a href ="./signUp.php">Sign Up</a></li>
                     </ul>
                   </nav>
               </div><br><br><br>
       <div><hr style="height:3px;color:#BCA474;background-color:#BCA474"></div>
	   <br>
<!-- /*End of header content */   <splat></splat>-->
       
<!-- Start of main content */           -->
         <div class="main-container">
				
		
				
                
                  <div class="grid-container">
				<?php
					if(isset($_POST["name"])){
					$name = $_POST["name"];}
					Recipe::Search_By_Name($name);
				  ?> 
                 </div>
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