<?php 
 @session_start();

?>
<!--menjamo zeleno i belo polje,ovo sve drugo je isto-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin panel | First</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
	<script src="js/ajaxObj.js" ></script>
	<script>
function alertDelete() {
    alert("Do you realy want do delete this item?!");

}
</script>
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->
<body>
 <?php  include('pages/header.php');?>

    <section id="title" class="emerald">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h1>Admin panel</h1>
                    <p>Adding, editing and deleting things</p>
                </div>
                <div class="col-sm-6">
                    <ul class="breadcrumb pull-right">
                        <li><a href="index.php">Home</a></li>
                        <li class="active">Admin</li>
                    </ul>
                </div>
            </div>
        </div>
    </section><!--/#title-->    
    <section id="contact-page" class="container">
     <?php  if($_SESSION['id_role']==1){

	 ?>
	 <div class="col-sm-2">
	 <!--linkovizaadministriranje-->
	<ul class="list-group" >
	<li class="list-group-item"><a href="admin.php?table=menu" >Menu</a></li>
	<li class="list-group-item"><a href="admin.php?table=news" >News</a></li>
	<li class="list-group-item"><a href="admin.php?table=picture" >Picture</a></li>
	<li class="list-group-item"><a href="admin.php?table=poll" >Poll</a></li>
	<li class="list-group-item"><a href="admin.php?table=users" >Users</a></li>
	<!-- <li class="list-group-item"><a href="admin.php?table=cars" >Cars</a></li>
	 <li class="list-group-item"><a href="admin.php?table=models" >Models</a></li>-->
	</ul>
	 </div>
	

	 <div id="demo" class="col-sm-10">
	 <!-- ovde se ispisuje sadrzaj-->
	 <?php 
   if(isset($_GET['table'])){
	$table=$_GET['table'];
	
	if($table=='menu'){
		include_once('admin_pages/menuAdmin.php');}
	elseif($table=='news'){include_once('admin_pages/newsAdmin.php');}
	elseif($table=='picture'){include_once('admin_pages/pictureAdmin.php');}
	elseif($table=='poll'){include_once('admin_pages/pollAdmin.php');}
	elseif($table=='users'){include_once('admin_pages/usersAdmin.php');}
	// elseif($table=='cars'){include_once('admin_pages/carsAdmin.php');}
	// elseif($table=='models'){include_once('admin_pages/modelsAdmin.php');}
	else{
			
			echo "error";
		}
	}
	
	?>
	  </div>
	 <?php } ?>
    </section><!--/#contact-page-->
   <?php 
 include('pages/bottomData.php');
 include('pages/footer.php');
?>