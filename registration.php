<?php @session_start();?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Registration | First</title>
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
<?php  include('pages/header.php');?>

    <section id="title" class="emerald">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h1>Registration</h1>

                </div>
                <div class="col-sm-6">
                    <ul class="breadcrumb pull-right">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="#">Pages</a></li>
                        <li class="active">Registration</li>
                    </ul>
                </div>
            </div>
        </div>
    </section><!--/#title-->
    <!-- php kod za registraciju--POCETAK-->
<?php
include('conection.php');
if($conn)
{
    if(isset($_REQUEST["btnRegister"]))
    {
        $username = $_REQUEST['username'];
        $email = $_REQUEST['email'];
        $pass = md5($_REQUEST['password']);
        $password_confirm = md5($_REQUEST['password_confirm']);
        $regUsername="/^[A-z0-9]{3,}$/";
        $regEmail= "/^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/";


        if(!preg_match($regUsername,$username))
        {
            echo "<div style='color:red'>Username is in wrong format</div>";
        }
        else if(!preg_match($regEmail,$email))
        {
            echo "<div style='color:red'>E-Mail is in wrong format</div>";
        }
        else if($pass != $password_confirm)
        {
            echo "<div style='color:red'>Password is must be equals with confirm password</div>";
        }
        else{
            $upit_mail = "SELECT * FROM users WHERE email='".$email."'";
            $rez_mail = mysqli_query($conn,$upit_mail)or die("Error ".mysqli_error());
            if(mysqli_num_rows($rez_mail) != 0)
                echo("User is exist already");

            else
            {

                $upit_dodaj = "INSERT INTO users(id,username, email, password,id_role) 
VALUES('','$username','$email','$pass',2)  ";
                $rez_dodaj = mysqli_query($conn,$upit_dodaj)or die("Error ".mysqli_error());
                if($rez_dodaj)
                {
                    echo("You have successfully created an account!");
                    echo '</br><a href="login.php"style="color:red"  >Login in</a> ';
//ispisuje korisniku da se uspesno registrovao i prikazuje mu link za logovanje u meniju 
                }
            }

        }
    }}
unset($conn);
?>

    <!-- php kod za registraciju-KRAJ-->
    <section id="registration" class="container">
        <form class="center" role="form" method="POST" action="<?php print $_SERVER['PHP_SELF'];?>">
            <fieldset class="registration-form">
                <div class="form-group">
                    <input type="text" id="username" name="username" placeholder="Username" class="form-control">
                </div>
                <div class="form-group">
                    <input type="text" id="email" name="email" placeholder="E-mail" class="form-control">
                </div>
                <div class="form-group">
                    <input type="password" id="password" name="password" placeholder="Password" class="form-control">
                </div>
                <div class="form-group">
                    <input type="password" id="password_confirm" name="password_confirm" placeholder="Password (Confirm)" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" id="btnRegister" name="btnRegister" class="btn btn-success btn-md btn-block">Register</button>
                </div>
            </fieldset>
        </form>
    </section><!--/#registration-->

<?php
include('pages/bottomData.php');
include('pages/footer.php');
?>