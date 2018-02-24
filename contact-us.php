<?php @session_start();?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Contact Us | First</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/prettyPhoto.css" rel="stylesheet">
        <link href="css/animate.css" rel="stylesheet">
        <link href="css/main.css" rel="stylesheet">
        <script src="js/ajaxObj.js"></script>

        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
        <style>
            .error {color: #FF0000;}
        </style>
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
                    <h1>Contact Us</h1>
                    <p>We are always there for you...</p>
                </div>
                <div class="col-sm-6">
                    <ul class="breadcrumb pull-right">
                        <li><a href="index.php">Home</a></li>
                        <li class="active">Contact Us</li>
                    </ul>
                </div>
            </div>
        </div>
    </section><!--/#title-->

    <section id="contact-page" class="container">
        <div class="row">
            <div class="col-sm-6">

                <h4>Contact Form</h4>
                <form action="<?php echo  $_SERVER['PHP_SELF'];?>" method="POST" >
                    <p>Name</p> <input type="text" name="name" class="form-control">
                    <p>Email</p> <input type="text" name="email" class="form-control">
                    <p>Message</p><textarea name="message" rows="6" cols="25" class="form-control"></textarea><br />
                    <input type="submit"  class="btn btn-primary btn-lg"  value="Send" name="btnSend">&nbsp;<input type="reset"  class="btn btn-primary btn-lg"  value="Clear">
                </form>
                <div class="status alert " id="errorContact"  >
                    <?php
                    if(isset($_POST['btnSend'])){
                        $name = $_POST['name'];
                        $email = $_POST['email'];
                        $message = $_POST['message'];

                        if(!preg_match("/^[a-zA-Z ]*$/", $name)) {
                            echo "Only letters and white space allowed";
                        }

                        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                            echo "Invalid email format";}

                        $formcontent="From: $name \n Message: $message";
                        $recipient = "dusicacakic@gmail.com";
                        $subject = "Contact Form";
                        $mailheader = "From: $email \r\n";
                        @mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
                        echo "Thank You!";}
                    ?>
                </div>
            </div><!--/.col-sm-8-->
            <div class="col-sm-6">
                <h4>Our Location</h4>
                <iframe width="100%" height="215" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com.au/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Dhaka,+Dhaka+Division,+Bangladesh&amp;aq=0&amp;oq=dhaka+ban&amp;sll=40.714353,-74.005973&amp;sspn=0.836898,1.815491&amp;ie=UTF8&amp;hq=&amp;hnear=Dhaka+Division,+Bangladesh&amp;t=m&amp;ll=24.542126,90.293884&amp;spn=0.124922,0.411301&amp;z=8&amp;output=embed"></iframe>
            </div><!--/.col-sm-4-->
        </div>
    </section><!--/#contact-page-->

<?php
include('pages/bottomData.php');
include('pages/footer.php');
?>