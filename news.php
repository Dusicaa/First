<?php @session_start();?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>News | First</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/prettyPhoto.css" rel="stylesheet">
        <link href="css/animate.css" rel="stylesheet">
        <link href="css/main.css" rel="stylesheet">
        <script src="js/ajaxObj.js" ></script><!--pagination-->
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
                    <h1>News</h1>
                    <p>The latest news in the car world</p>
                </div>
                <div class="col-sm-6">
                    <ul class="breadcrumb pull-right">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="#">Pages</a></li>
                        <li class="active">News</li>
                    </ul>
                </div>
            </div>
        </div>
    </section><!--/#title-->

    <section id="privacy-policy" class="container" id="demo"><!--stranicenje-->
        <?php

        include("conection.php");

        if(isset($_GET['page'])){
            $start = $_GET['page'];
        }else{
            $start = 0;
        }
        $pps = 2;
        $rezN = mysqli_query($conn,"SELECT *
FROM news order by date_created DESC
LIMIT $start , $pps") or die("Error with news ".mysqli_error());
        while($redN=mysqli_fetch_array($rezN)){

            echo  "<h3>". $redN['title']."</h3>
			   <h6>".$redN['date_created']."</h6>
        <p>".$redN['text']."</p>
        <p>&nbsp;</p>";

        }


        echo '<ul class="pagination" >';
        $br = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM news"));

        if($start!=0){
            $nstart = $start - $pps;
            echo "<div class='tablinks'><a href='news.php?page=$nstart' name='tablinks'  onclick='prikaziVesti(number)'>Previus</a> &nbsp;&nbsp;";
        }
        $zbir = $start + $pps;
        echo "<strong>".$start." - ".$zbir."/".$br."</strong>";
        if($start<($br-$pps)){
            $nstart = $start + $pps;
            echo "&nbsp;&nbsp;&nbsp;<a href='news.php?page=$nstart' name='tablinks'  onclick='prikaziVesti(number)'>Next </a></div> ";
        }
        mysqli_close($conn);
        ?>
        </ul>
    </section><!--/#privacy-policy-->

<?php
include('pages/bottomData.php');
include('pages/footer.php');
?>