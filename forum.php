<?@session_start();
?>
    <!--menjamo zeleno i belo polje,ovo sve drugo je isto-->
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Forum | First</title>
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
<?php include('pages/header.php');?>

    <section id="title" class="emerald">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h1>Forum</h1>
                    <p>What our satisfied customers say :)</p>
                </div>
                <div class="col-sm-6">
                    <ul class="breadcrumb pull-right">
                        <li><a href="index.php">Home</a></li>
                        <li class="active">Forum</li>
                    </ul>
                </div>
            </div>
        </div>
    </section><!--/#title-->
    <!-- stranicenje-->
    <section id="services">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div class="center gap">
                        <h2>Only registered users can leave comments</h2>

                    </div>
                    <div class="center">
                        <h2>What our clients say about us</h2>
                        <?php
                        if(isset($_SESSION['id_role'])){
                            ?>
                            <p>Enter your comment here:</p>
                            <!--samo registrovani mogu da vide formu -->

                            <form class="center" action="<?php print $_SERVER['PHP_SELF'];?>" method="POST">
						<textarea rows="4" cols="50" id="comment" name="comment">                  
                        </textarea><br/><br/>
                                <button type="submit" name="btnComment" class="btn btn-primary btn-lg">Comment</button>
                            </form>
                        <?php }?>
                    </div>

                    <div class="row">
                        <?php
                        include("conection.php");
                        if(isset($_REQUEST['btnComment'])){

                            $comment=$_REQUEST['comment'];
                            $insertComment="INSERT INTO comments(text, user_id) VALUES('$comment',5)";
                            $rez_Comm = mysqli_query($conn,$insertComment)or die("Error ".mysqli_error());
                            if($rez_Comm){
                                echo("You have successfully created a comment!");
                            }
                        }

                        ?>
                        <?php
                        include("conection.php");
                        $upitC="select * from comments c inner join users u on c.user_id=u.id";
                        $rezC=mysqli_query($conn,$upitC)or die("Error ".mysqli_error());
                        while($redC=mysqli_fetch_array($rezC)){
                            ?>

                            <div class="col-md-6">
                                <div class="gap">
                                    <blockquote>
                                        <p><?php echo $redC['text']?></p>
                                        <small>Comment left by <cite title="Source Title"><?php echo $redC['username']?></cite></small>
                                    </blockquote>
                                </div>
                            </div>
                        <?php } mysqli_close($conn);?>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/#services-->

<?php include('pages/bottomData.php');
include('pages/footer.php'); ?>