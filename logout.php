<?php
@session_start();

if(isset($_SESSION['id_role'])){
	
	
	unset($_SESSION['id_role']);
	unset($_SESSION['username']);
	
	session_destroy();
	header("Location:index.php");
}
else{
	
	header("Location:index.php");
}

 ?>