<?@session_start(); ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Login page | First</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/prettyPhoto.css" rel="stylesheet">
        <link href="css/animate.css" rel="stylesheet">
        <link href="css/main.css" rel="stylesheet">
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
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=144716315690681";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<?php  include('pages/header.php');?>

<section id="title" class="emerald">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h1>Login</h1>
                <p>Log in for many benefits...</p>
            </div>
            <div class="col-sm-6">
                <ul class="breadcrumb pull-right">
                    <li><a href="index.html">Home</a></li>
                    <li class="active">Login page</li>
                </ul>
            </div>
        </div>
    </div>
</section><!--/#title-->
<?php
if(isset($_POST['btnLogin']))
{
    $email=$_POST['email'];
    $pass=md5($_POST['password']);
    //promeni u ovom upitu tvoje podatke iz baze
    $upit="
	SELECT * FROM users u
	JOIN roles r 
	ON u.id_role=r.id_role
	WHERE u.email='".$email."'
	AND u.password='".$pass."'	
	";
    include("conection.php");
    $rezultat=mysqli_query($conn,$upit) or die ("query was not executed!".mysqli_error());
    if(mysqli_num_rows($rezultat)==1)
    {
        $red=mysqli_fetch_array($rezultat);

        $_SESSION['id_role']=$red['id_role'];
        $_SESSION['nameRole']=$red['name'];
        $_SESSION['id']=$red['id'];
        $_SESSION['username']=$red['username'];

        //redirekcija zavisno od uloge
        if($_SESSION['id_role']==1){
            echo ' <script> location.replace("admin.php"); </script>';

        }
        else{

            echo' <script> location.replace("index.php"); </script>';
        }
        //kraj redirekcije
    }
    else
    {
        echo 'There is no user with this email and password.';
    }
}?>

<section id="login" class="container">
    <form class="center" role="form" method="POST" action="<?php print $_SERVER['PHP_SELF'];?>">
        <fieldset class="registration-form">
            <div class="form-group">
                <input type="text" id="email" name="email" placeholder="E-mail" class="form-control">
            </div>
            <div class="form-group">
                <input type="password" id="password" name="password" placeholder="Password" class="form-control">
            </div>
            <div class="form-group">
                <button type="submit" id="btnLogin" name="btnLogin" class="btn btn-success btn-md btn-block">Login</button>
            </div>
        </fieldset>
    </form>
</section><!--/#login-->
<?php
include('pages/bottomData.php');
include('pages/footer.php');?>