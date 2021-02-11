<?php 
ob_start();
header('Location: ../index.php');
  /*<?php include "../classes/recipe.php"?>*/
/*<?php include "../classes/sorting.php"?>*/

if(!isset($_SESSION)){
	session_start();
}

if(isset($_SESSION['Email'])){
	unset($_SESSION['Email']);
}

if(isset($_SESSION['User_Id'])){
	unset($_SESSION['User_Id']);
}
if(isset($_SESSION['Role_Id'])){
	unset($_SESSION['Role_Id']);
}
?>