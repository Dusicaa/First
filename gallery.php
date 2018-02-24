<?php @session_start();?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Gallery | First</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/prettyPhoto.css" rel="stylesheet">
        <link href="css/animate.css" rel="stylesheet">
        <link href="css/main.css" rel="stylesheet">
        <script src="js/ajaxObj.js" ></script><!-- tab links-->
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
                    <h1>Gallery</h1>
                    <p>Here you can see the latest models...</p>
                </div>
                <div class="col-sm-6">
                    <ul class="breadcrumb pull-right">
                        <li><a href="index.html">Home</a></li>
                        <li class="active">Gallery</li>
                    </ul>
                </div>
            </div>
        </div>
    </section><!--/#title-->

    <section id="portfolio" class="container">
        <ul class="portfolio-filter">
            <!-- ajax galerija-->
            <li><a class="btn btn-default active" href="gallery.php" >All</a></li>
            <?php
            include ('conection.php');
            $upitC="select * from cars";
            $rezC=mysqli_query($conn,$upitC) or die ("Nije dobar upit za tab galeriju".mysqli_error());
            while($cars=mysqli_fetch_array($rezC)){ ?>
                <li><a id="<?php echo $cars['id'];?>" class="btn btn-default" href="gallery.php?id=<?php echo $cars['id'];?>" name="tablinks"  onclick="prikazi(id)"><?php echo $cars['name'];?></a></li>
            <?php }
            mysqli_close($conn);
            ?>

            <br/>
        </ul><!--/#portfolio-filter-->

        <ul class="portfolio-items col-3" id="demo">
            <?php
            include ('conection.php');
            if($id=$_GET['id']){
                $upit="select p.name as pn, p.src, p.alt ,c.id from picture p inner join models m on p.id=m.picture_id inner join cars c on m.cars_id=c.id where c.id=".$id;
                $rez=mysqli_query($conn,$upit) or die ("Nije dobar upit za galeriju slika".mysqli_error());
                while($red=mysqli_fetch_array($rez)){ ?>
                    <li class="portfolio-item apps"  >
                        <div class="item-inner" >
                            <img src = "images/buy/<?php echo $red['src'];?>" alt = "<?php echo $red['alt'];?>" height=160 >
                            <h5 ><?php echo $red['pn'];?> </h5 >
                            <div class="overlay">
                                <a class="preview btn btn-danger" href = "images/buy/large/<?php echo $red['src'];?>" rel = "prettyPhoto" ><i class="icon-eye-open" ></i ></a >
                            </div >
                        </div >
                    </li >
                <?php }}
            else{
                $upit="select p.name as pn, p.src, p.alt  from picture p inner join models m on p.id=m.picture_id inner join cars c on m.cars_id=c.id";
                $rez=mysqli_query($conn,$upit) or die ("Nije dobar upit za galeriju slika".mysqli_error());
                while($red=mysqli_fetch_array($rez)){ ?>
                    <li class="portfolio-item apps"  >
                        <div class="item-inner" >
                            <img src = "images/buy/<?php echo $red['src'];?>" alt = "<?php echo $red['alt'];?>" height=160 >
                            <h5 ><?php echo $red['pn'];?> </h5 >
                            <div class="overlay">
                                <a class="preview btn btn-danger" href = "images/buy/large/<?php echo $red['src'];?>" rel = "prettyPhoto" ><i class="icon-eye-open" ></i ></a >
                            </div >
                        </div >
                    </li >


                <?php }}
            mysqli_close($conn);
            ?>
        </ul>

    </section><!--/#portfolio-->
<?php
include('pages/bottomData.php');
include('pages/footer.php');
?>