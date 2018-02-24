<?php @session_start();?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Buy | First</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/prettyPhoto.css" rel="stylesheet">
        <link href="css/animate.css" rel="stylesheet">
        <link href="css/main.css" rel="stylesheet">
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>-->
        <!--[endif]-->
        <script type="text/javaScript">

            function pretraga(obj){

                var xhttp;
                if (obj == "") {
                    document.getElementById("rezultatPretrage").innerHTML = "";
                    return;
                }
                xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("rezultatPretrage").innerHTML = this.responseText;
                    }
                };
                xhttp.open("GET", "search.php?q="+obj, true);
                xhttp.send();
            }
        </script>

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
                    <h1>Look at this...</h1>
                    <p>Here you will find all the necessary information about your favorite car</p>
                </div>
                <div class="col-sm-6">
                    <ul class="breadcrumb pull-right">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="#">Pages</a></li>
                        <li class="active">All vehicles</li>
                    </ul>
                </div>
            </div>
        </div>
    </section><!--/#title-->

    <section id="career" class="container">
        <div class="center" id="pretragaAuta">
            <form method="post">
                <table align="center" >
                    <tr>
                        <td><select name="brand" onchange="pretraga(this.value)">
                                <option value="0">Choose...</option>
                                <?php include('conection.php');
                                $rezCar=mysqli_query($conn,"select * from cars")or die("error:select cars");

                                while( $redCar=mysqli_fetch_array($rezCar)){echo  "<option value='".$redCar['id']."'>".$redCar['name']."</option>";}

                                ?>
                            </select></td>
                        <td><select name="models" onchange="pretraga(this.value)">
                                <option value="0">Choose...</option>
                                <?php include('conection.php');
                                $rezModel=mysqli_query($conn,"select * from models")or die("error:select models");

                                while( $redModel=mysqli_fetch_array($rezModel)){echo  "<option value='".$redModel['id']."'>".$redModel['name']."</option>";}

                                ?>
                            </select></td>
                        <td><select name="year" onchange="pretraga(this.value)">
                                <option value="0">Choose...</option>
                                <?php

                                for($i=2000;$i<=2030;$i++){echo  "<option value='$i'>$i</option>";}

                                ?>
                            </select></td>
                    </tr>
                </table></form>
            <br/>

        </div>
        <div class=" col-sm-12" id="rezultatPretrage"></div>
        <hr>

        <div class="center">
            <div class="col-sm-12" >

                <div class="panel-group" id="accordion1">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapseOne1">
                                    Hyundai
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne1" class="panel-collapse collapse">
                            <div class="panel-body">
                                <?php
                                include('conection.php');
                                $upitHyundai="select c.name as nameCars,m.name as modelsName,src,alt,year,price from cars c inner join models m ON c.id=m.cars_id inner join picture p ON m.picture_id=p.id WHERE c.name='Hyundai'";
                                $rezulatHyundai=mysqli_query($conn,$upitHyundai) or die("error :select hyundai".mysqli_error);

                                while($redHyundai=mysqli_fetch_array($rezulatHyundai)){

                                    echo"<div class='col-sm-2'>
				   <table><tr>
				          <td><img src='images/buy/".$redHyundai['src']."' alt='".$redHyundai['alt']."'width=120 height=70/></tr>
				           <tr><td><b>".$redHyundai['nameCars']."</b></td></tr>
						   <tr><td>".$redHyundai['modelsName']."</td></tr>
						   <tr><td>".$redHyundai['year']."</td></tr>
						   <tr><td>".$redHyundai['price']."$</td></tr>";
                                    echo    "</tr></table></div>";
                                }

                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapseTwo1">
                                    Kia
                                </a>
                            </h4>
                        </div>
                        <div id="collapseTwo1" class="panel-collapse collapse">
                            <div class="panel-body">
                                <?php
                                include('conection.php');
                                $upitHyundai="select c.name as nameCars,m.name as modelsName,src,alt,year,price from cars c inner join models m ON c.id=m.cars_id inner join picture p ON m.picture_id=p.id WHERE c.name='Kia'";
                                $rezulatHyundai=mysqli_query($conn,$upitHyundai) or die("error :select hyundai".mysqli_error);

                                while($redHyundai=mysqli_fetch_array($rezulatHyundai)){

                                    echo"<div class='col-sm-2'>
				   <table><tr>
				          <td><img src='images/buy/".$redHyundai['src']."' alt='".$redHyundai['alt']."'width=120 height=70/></tr>
				           <tr><td><b>".$redHyundai['nameCars']."</b></td></tr>
						   <tr><td>".$redHyundai['modelsName']."</td></tr>
						   <tr><td>".$redHyundai['year']."</td></tr>
						   <tr><td>".$redHyundai['price']."$</td></tr>";
                                    echo    "</tr></table></div>";
                                }

                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapseThree1">
                                    Range Rover
                                </a>
                            </h4>
                        </div>
                        <div id="collapseThree1" class="panel-collapse collapse">
                            <div class="panel-body">
                                <?php
                                include('conection.php');
                                $upitHyundai="select c.name as nameCars,m.name as modelsName,src,alt,year,price from cars c inner join models m ON c.id=m.cars_id inner join picture p ON m.picture_id=p.id WHERE c.name='Range Rover'";
                                $rezulatHyundai=mysqli_query($conn,$upitHyundai) or die("error :select hyundai".mysqli_error);

                                while($redHyundai=mysqli_fetch_array($rezulatHyundai)){

                                    echo"<div class='col-sm-2'>
				   <table><tr>
				          <td><img src='images/buy/".$redHyundai['src']."' alt='".$redHyundai['alt']."'width=120 height=70/></tr>
				           <tr><td><b>".$redHyundai['nameCars']."</b></td></tr>
						   <tr><td>".$redHyundai['modelsName']."</td></tr>
						   <tr><td>".$redHyundai['year']."</td></tr>
						   <tr><td>".$redHyundai['price']."$</td></tr>";
                                    echo    "</tr></table></div>";
                                }

                                ?>
                            </div>

                        </div>

                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapseFour1">
                                    Bmw
                                </a>
                            </h4>
                        </div>
                        <div id="collapseFour1" class="panel-collapse collapse">
                            <div class="panel-body">
                                <?php
                                include('conection.php');
                                $upitHyundai="select c.name as nameCars,m.name as modelsName,src,alt,year,price from cars c inner join models m ON c.id=m.cars_id inner join picture p ON m.picture_id=p.id WHERE c.name='Bmw'";
                                $rezulatHyundai=mysqli_query($conn,$upitHyundai) or die("error :select hyundai".mysqli_error);

                                while($redHyundai=mysqli_fetch_array($rezulatHyundai)){

                                    echo"<div class='col-sm-2'>
				   <table><tr>
				          <td><img src='images/buy/".$redHyundai['src']."' alt='".$redHyundai['alt']."'width=120 height=70/></tr>
				           <tr><td><b>".$redHyundai['nameCars']."</b></td></tr>
						   <tr><td>".$redHyundai['modelsName']."</td></tr>
						   <tr><td>".$redHyundai['year']."</td></tr>
						   <tr><td>".$redHyundai['price']."$</td></tr>";
                                    echo    "</tr></table></div>";
                                }

                                ?>
                            </div>

                        </div>

                    </div>
                </div><!--/#accordion1-->
            </div><!--/.col-sm-4-->

        </div>
    </section>
    <!-- /Career -->

<?php
include('pages/bottomData.php');
include('pages/footer.php');
?>