<?php
  session_start();
  include('includes/db.php');
  
  if(isset($_POST["make_name"]) && !empty($_POST["make_name"]))
  {
  	 $getModel = $db->query("SELECT * FROM model WHERE make_id ='".$_POST["make_name"]."' ORDER BY model_name ASC ");
  	 $modelCount = $getModel->rowCount();
	?>
	<?php
	if($modelCount > 0)
	{
	  while($row=$getModel->fetch())
	 {
	   ?>
	 	 <option value="<?php echo $row["model_name"] ?>"><?php echo $row["model_name"] ?></option>
	   <?php
	 }
	}else{
        ?>
        <option value="" style="background-color:#7f0a0a;color: white;">No Model Found try again</option>
        <?php
	}
  }
?>

