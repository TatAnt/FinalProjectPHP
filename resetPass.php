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
  
			<div class="title"><h1>Recipe Book</h1></div>

                <div class="container">
				<?php
				if(isset($_POST['Submit'])){
					$username = $_POST['Username'];
					$email = $_POST['Email'];
					$password = $_POST['Password'];
					$confirmPass = $_POST["ConfirmPass"];
							
				if( $password == $confirmPass){
					if(User::Username_Email_Exists($username, $email)){
						User::Update_Password($email, $password);
						Message::DisplayMessage("Well Done! Password is Updated!", Message::$Full_Size, Message::$Success);
					}else{
						Message::DisplayMessage("Username or Email do not exist!", Message::$Full_Size, Message::$Error);
					}
				}else{
					Message::DisplayMessage("Confirmation Password doesn't match!", Message::$Full_Size, Message::$Error);
				    }
				}
				?>
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
                            <input type="text" name='Username' class="myInput" placeholder="Username" required> <font color="red"><b>*</b></font>
                        </label>
                    </div>
					<div class="form-group my-0">
                        <label class="my-0">
                            <i class="fas fa-envelope"></i>
                            <input type="email"  name='Email' class="myInput" placeholder="Email" required>
							<font color="red"><b>*</b></font>
                        </label>
                    </div>
                    <div class="form-group my-0">
                        <label class="my-0">
                            <i class="fas fa-lock"></i>
                            <input type="password" name='Password' class="myInput" placeholder="New Password" required><font color="red"><b>*</b></font>
                        </label>
                    </div>
                     <div class="form-group my-0">
                        <label class="my-0">
                            <i class="fas fa-lock"></i>
                            <input type="password" name='ConfirmPass' class="myInput" placeholder="Confirm Password" required><font color="red"><b>*</b></font> 
                        </label>
                    </div>
                    <div class="form-group">
                        <label> 
                            <input type='submit' name='Submit' value="Reset Password" class="form-control button" value="SIGN_UP"> 
                        </label>
                    </div>
                    
                </form>
				
            </div>
			
		
        </div>
    </div><br><br><br><br><br><br>
	<!-- /*Start of footer*/ -->
          <div class="footer">
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
				  		  
				  
				  
				  
				  