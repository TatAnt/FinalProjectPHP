<?php ob_start();?>
<?php include "classes/User.php"?>
<?php include "classes/Message.php"?>
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
                      <li ><a href="./sketch_gallery.html">Recipes</a></li>
                      <li><a href ="./login.php">Sign In</a></li>
                     </ul>
                   </nav>
               </div>
       
<!-- /*End of header content */   <splat></splat>-->
       
<!-- Start of main content */ -->
 
			<div class="main-container">
  
                <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="circle"></div>
                <header class="myHed text-center">
                    <i class="far fa-user"></i>
                    <p>SIGN UP</p>
                </header>
                <form class="main-form text-center" action='#' method="post">
                    <div class="form-group my-0">
                        <label class="my-0">
                            <i class="fas fa-user"></i>
                            <input type="text" name='Username' class="myInput" placeholder="Username"> 
                        </label>
                    </div>
					<div class="form-group my-0">
                        <label class="my-0">
                            <i class="fas fa-envelope"></i>
                            <input type="email"  name='Email' class="myInput" placeholder="Email"> 
                        </label>
                    </div>
                    <div class="form-group my-0">
                        <label class="my-0">
                            <i class="fas fa-lock"></i>
                            <input type="password" name='Password' class="myInput" placeholder="Password"> 
                        </label>
                    </div>
                    
                    <div class="form-group">
                        <label> 
                            <input type='submit' name='Submit' class="form-control button" value="SIGN_UP"> 
                        </label>
                    </div>
                    
                </form>
				<?php
				
				if(isset($_POST['Submit'])){
							$username = $_POST['Username'];
							$email = $_POST['Email'];
							$password = $_POST['Password'];
							
							if(! User::Email_Exists($email)){
								$obj = new User($username, $email, $password);
								$obj->Create();
								Message::DisplayMessage("Welcome Aboard! <br> Your account is created !", Message::$Full_Size, Message::$Success);
							}else{
								
								Message::DisplayMessage("Error: Your email already exists ! Try another one or Change your password", Message::$Full_Size, Message::$Error);
							}
							
						}
				?>
            </div>
        </div>
    </div><br><br><br><br><br><br>
	<!-- /*Start of footer*/ -->
      <?php include "includes/footer_menu.php"?>

<!-- /*End of footer*/ -->

   </div>
<!-- /*End of page box*/     -->

 </div>
<!-- /* End of WRAPPER*/ -->
      
 <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
				  		  			  
				  
				  
				  