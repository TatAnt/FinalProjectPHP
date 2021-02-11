<?php
class Message{
	public static $Error   = 0;
	public static $Success = 1;
	public static $Warning = 2;
	public static $Info    = 3;
	
	public static $Full_Size = 150;
	public static $Big_Size  = 75;
	public static $Medium_Size = 50;
	public static $Small_Size= 25;
	
	public static function DisplayMessage($message , $size = 150, $type = 3){
		if(! empty($message)){
			switch($type){
				case 0: echo '<div class="alert alert-danger alert-dismissible fade show ';
				        echo ' w-'.$size.'" >';
						echo '<strong>Error! </strong><br>';
						break;
						
				case 1: echo '<div class="alert alert-success alert-dismissible fade show ';
						echo ' w-'.$size.'" >';
						echo '<strong>Success! </strong><br>';
						break;	
						
				case 2: echo '<div class="alert alert-warning alert-dismissible fade show ';
						echo ' w-'.$size.'" >';
						echo '<strong>Warning! </strong><br>';
						break;	
				default: 
				        echo '<div class="alert alert-info alert-dismissible fade show ';
						echo ' w-'.$size.'" >';
						echo '<strong>Information! </strong><br>';
						break;						
			}
			echo $message;
			echo '<button type="button" class="close" data-dismiss="alert">&times</button>';
			echo '</div>';
		}
	}
}


?>





