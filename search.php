 <?php
	include('conection.php');
	$q = $_REQUEST["q"];
	$upitSearch2="select * from cars c inner join models m ON c.id=m.cars_id INNER JOIN picture p ON m.picture_id=p.id
	WHERE c.id='$q'  OR m.id='$q' OR
	m.year='$q'";
	$rezultatSearch2=mysqli_query($conn,$upitSearch2)or die("error:search ".mysqli_error());
	 while( $redSearch2=mysqli_fetch_array($rezultatSearch2)){
		 
		  echo"<div class='col-sm-2'>
				   <table><tr>
				          <td><img src='images/buy/".$redSearch2['src']."' alt='".$redSearch2['alt']."'width=120 height=70/></tr>
				           <tr><td><b>".$redSearch2['nameCars']."</b></td></tr>
						   <tr><td>".$redSearch2['modelsName']."</td></tr>
						   <tr><td>".$redSearch2['year']."</td></tr>
						   <tr><td>".$redSearch2['price']."$</td></tr>";
				     echo    "</tr></table></div>";
			   }
	 
  ?>