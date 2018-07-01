<style type="text/css">
	#username_error{
		color: #7f0a0a;
		font-size: 13px;
		font-weight: bold;
		animation-duration:2s;
		animation-iteration-count: 2;
		-webkit-animation-duration:2s;
		-webkit-animation-iteration-count: 2;
		-moz-animation-duration:2s;
		-moz-animation-iteration-count: 2;
		-o-animation-duration:2s;
		-o-animation-iteration-count: 2;
	}
	#check_ok{
		margin-top: -40px;
		margin-right: 10px;
		font-weight: bold;
		float: right;
		font-size: 25px;
		color: green;
		font-weight: bold;
	}
</style>
<link rel="stylesheet" type="text/css" href="css/animate.css">
<?php 
  include('includes/db.php');

  if(isset($_POST["user_name"])){
  	$sql = $db->prepare('SELECT * FROM users WHERE username = ? ');
  	$sql->execute(array($_POST["user_name"]));
  	$checkRow = $sql->rowCount();

  	if($checkRow > 0){
       echo '<p id="check_ok"><i class="ionicon ion-ios-checkmark-outline"></i></p>';
  	}else
  	{
  		echo '<span class="animated shake" id="username_error">Username does not exist </span>';
  	}
  }


?>