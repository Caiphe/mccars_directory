<?php 
  echo "<h1> MY TIME STAMP TEST</h1>";
 include('includes/db.php');

  //$date_time = "2018-05-07 10:22:16";
  $get_new_cars = $db->query('SELECT * FROM car_data WHERE state="new car"');
  $count = $get_new_cars->rowCount();
  if($count > 0)
  while($result = $get_new_cars->fetch())
  {
  	 $fetch = $get_new_cars->fetch();
    //$date_t = $fetch["date_time"];
   $date_time =$fetch["date_time"];

     //function convertToUnixTimeStamp($value){
  	date_default_timezone_get('Africa/Johannesburg');
  	list($date, $time) = explode(' ', $date_time);
  	list($year, $month, $day) = explode('-', $date);
  	list($hour, $minutes, $seconds) = explode(":", $time);
  	$unit_timestamp = mktime($hour, $minutes, $seconds, $month, $day, $year);
  	 //return $unit_timestamp;
    //}
    //function convertToAgoFormat($timestamp) {
  	//date_default_timezone_get('Africa/Johannesburg');
  	$differentBetweenCurrentAndTimeStamp = time() - $unit_timestamp;
  	$periodStrings = ["sec", "min", "hr", "day", "week","month", "year", "decate"];
  	$periodNumber = ["60", "60", "24", "7", "4.35", "12", "10"];

  	for($iterator = 0;$differentBetweenCurrentAndTimeStamp >=$periodNumber[$iterator]; $iterator++)
  	   $differentBetweenCurrentAndTimeStamp  /= $periodNumber[$iterator];
  	   $differentBetweenCurrentAndTimeStamp = round($differentBetweenCurrentAndTimeStamp);

  	   if($differentBetweenCurrentAndTimeStamp != 1) $periodStrings[$iterator].='s';
  	   $myoutput = "$differentBetweenCurrentAndTimeStamp $periodStrings[$iterator]".'<br>';

  	   //return 'Posted ' .$myoutput.' ago'; }
      //$unixTimeStamp = convertToUnixTimeStamp($date_time)
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div>
		<h1><?php echo $myoutput; }?></h1>
	</div>

</body>
</html>