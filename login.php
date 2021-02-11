<?php ob_start(); ?>
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
                      <li ><a href="./index.php">Home</a></li>
                      <li ><a href="./sketch_gallery.html">Recipes</a></li>
                      <li class="current"><a href ="./login.php">Sign In</a></li>
					  <li><a href ="./signUp.php">Sign Up</a></li>
                     </ul>
                   </nav>
               </div>
       
<!-- /*End of header content */   <splat></splat>-->
       
<!-- Start of main content */           -->
 
			<div class="main-container">

            <div class="container">
			<div class="card">
            <div class="card-body">
                <div class="circle"></div>
                <header class="myHed text-center">
                    <i class="far fa-user"></i>
                    <p>SIGN IN</p>
                </header>
				 <?php 
					$Cookie_Email = '';
					$Cookie_Password = '';
					if(isset($_COOKIE['Cookie_Email']) && isset($_COOKIE['Cookie_Password']))
					{
						$Cookie_Email = $_COOKIE['Cookie_Email'];
						$Cookie_Password = $_COOKIE['Cookie_Password'];
					}
					
					 if(! isset($_SESSION)){
							session_start();
						}
						if(isset($_POST['Submit'])){
							$email = $_POST['Email'];
							$password = $_POST['Password'];
							
							if(User::Email_Exists($email)){
								if(User::Login($email, $password) == true){
									$_SESSION['Email'] = $_POST['Email'];
								    $_SESSION['User_Id'] = User::Get_Id($email);
									$_SESSION['Role_Id'] = User::Get_Role($email);
									echo "Your Login is Successful";
									if(isset($_POST["Remember_Me"])){
										$expiration = time() + (60*60*24*365);
										setcookie('Cookie_Email', $_POST['Email'], $expiration);
										setcookie('Cookie_Password', $_POST['Password'], $expiration);
										
										if(count($_COOKIE) > 0)
											echo "Cookies are enabled <br>";
									}
									if($_SESSION['Role_Id'] == 1){
										header('Location: Member/index.php');
									}

								}else{
									Message::DisplayMessage("Incorrect Password!", Message::$Full_Size, Message::$Error);
								}
							}else{
								Message::DisplayMessage("Incorrect Email!", Message::$Full_Size, Message::$Error);
							}
						}
				    ?>
                <form class="main-form text-center" action='#' method="POST">
                    <div class="form-group my-0">
                        <label class="my-0">
                            <i class="fas fa-envelope"></i>
                            <input type="email" name="Email" value='<?php echo $Cookie_Email?>'  class="myInput" placeholder="Email" required> 
                        </label>
                    </div>
                    <div class="form-group my-0">
                        <label class="my-0">
                            <i class="fas fa-lock"></i>
                            <input type="password" name="Password" value='<?php echo $Cookie_Password?>' class="myInput" placeholder="Password" required> 
                        </label>
                    </div>
                    <label class="check_1">
                         Remember Me<input type="checkbox" name="Remember_Me">
                    </label>
                    <div class="form-group">
                        <label> 
                            <input type='submit' name='Submit' class="form-control button" value="LOGIN"> 
                        </label>
                    </div>
                    <a href="resetPass.php"><span class="check_1">Hello World!</span><br></a>
					<a href="signUp.php"><span class="check_2">Are you a new user ?</span></a>
					</form>
             
				<?php
					
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


			  