<?php
  session_start();
  include('includes/db.php');
  include('includes/header.php');

  // GET ALL BMW CARS
  $getBmw = $db->query('SELECT * FROM car_data WHERE make_name  = "bmw" ');
  $count = $getBmw->rowCount();
  if($count > 0){
     $fetch_sug = $getBmw->fetch();
     
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>stolen_Cars</title>
</head>
<body>		
<div class="container-fluid" id="after_menu_gradiant">	
	</div>
	<div class="w3-container w3-center myMainCont">
		<br><br><br><br><br>
           <h2>COMING SOON</h2>
		<br><br><br><br>
 </div>

</body>
 <?php include('alertIcon.php') ?>
<?php include('includes/footer.php') ?>
</html>