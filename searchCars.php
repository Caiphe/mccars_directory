<style type="text/css">
	#nodata
	{
		background-color: #78073a;
		color: white;
		padding: 10px ;
    font-size: 17px;
		text-align: center;
		-webkit-animation-duration:2s;
	}
	#search_result
	{
		background-color: #093169;
		text-align: center;
		color: white;
		font-size:17px;
		padding: 12px;
		margin-top: -20px;
	}
	#success_search
	{
		-webkit-animation:duration:2s;
	}
	#notFound
	{
		margin-top: -20px;
	}
  .suggest_p
  {
    background-color: #78073a;
    color: white;
    padding: 10px ;
    text-align: center;
    -webkit-animation-duration:2s;
    width: 50%;
  }

</style>
<?php 
 include('includes/db.php');

 $make_name = htmlspecialchars($_POST["make_name"]);
 $model_name = htmlspecialchars($_POST["model_name"]);
 $area_name = htmlspecialchars($_POST["area_name"]);
 $min_price = htmlspecialchars($_POST["min_price"]);
 $prices = htmlspecialchars($_POST["prices"]);
 

if(!empty($make_name) AND !empty($model_name) AND !empty($area_name) AND !empty($min_price) AND !empty($prices))
{
  if($min_price >= $prices)
  {
      echo '
  <div>
    <div class="container animated slideInDown" id="notFound">
       <p id="nodata" class=""><i class="icon ion-android-search" style="color:black;font-size20px;"></i>&nbsp;
       Minimum price must be less or equals to maximum price</p>
    </div><br>
   </div>';
  }
  else
  {

 $sqlCars = $db->prepare('SELECT * FROM car_data WHERE make_name = ? AND model_name = ? AND area = ? AND price >= ? AND price <= ?');
 $sqlCars->execute(array($make_name, $model_name,$area_name, $min_price, $prices));
 $search_count = $sqlCars->rowCount();

 if($search_count > 0)
 {
  $fetch_search = $sqlCars->fetchAll(); 
 
  foreach ($fetch_search as $key => $result){
    //while ($result = $sqlCars->fetch()) {
      
 		$rating = $result["rate"];
 		if($rating == "5")
            {
              $value ='
               <i id="green" class="icon ion-ios-star "></i>
               <i id="green" class="icon ion-ios-star "></i>
               <i id="green" class="icon ion-ios-star "></i>
               <i id="green" class="icon ion-ios-star "></i>
               <i id="green" class="icon ion-ios-star "></i>
              ';
            }
            if($rating == "4")
            {
              $value ='
               <i id="lightgreen" class="icon ion-ios-star "></i>
               <i id="lightgreen" class="icon ion-ios-star "></i>
               <i id="lightgreen" class="icon ion-ios-star "></i>
               <i id="lightgreen" class="icon ion-ios-star "></i>
               <i id="normalStar" class="icon ion-ios-star-half "></i>
              ';
            }
            if($rating == "3")
            {
              $value ='
               <i id="orange" class="icon ion-ios-star "></i>
               <i id="orange" class="icon ion-ios-star "></i>
               <i id="orange" class="icon ion-ios-star "></i>
               <i id="normalStar" class="icon ion-ios-star-half "></i>
               <i id="normalStar" class="icon ion-ios-star "></i>
              ';
            }
            if($rating == "2")
            {
              $value ='
               <i id="lightorange" class="icon ion-ios-star "></i>
               <i id="lightorange" class="icon ion-ios-star "></i>
               <i id="normalStar" class="icon ion-ios-star "></i>
               <i id="normalStar" class="icon ion-ios-star "></i>
               <i id="normalStar" class="icon ion-ios-star "></i>
              ';
            }
            if($rating == "1")
            {
              $value ='
               <i id="red" class="icon ion-ios-star "></i>
               <i id="normalStar" class="icon ion-ios-star "></i>
               <i id="normalStar" class="icon ion-ios-star "></i>
               <i id="normalStar" class="icon ion-ios-star "></i>
               <i id="normalStar" class="icon ion-ios-star "></i>
              ';
            }



     $date_time =$result["date_time"];
 
    date_default_timezone_get('Africa/Johannesburg');
    list($date, $time) = explode(' ', $date_time);
    list($year, $month, $day) = explode('-', $date);
    list($hour, $minutes, $seconds) = explode(":", $time);
    $unit_timestamp = mktime($hour, $minutes, $seconds, $month, $day, $year);
    
    date_default_timezone_get('Africa/Johannesburg');
    $differentBetweenCurrentAndTimeStamp = time() - $unit_timestamp;
    $periodStrings = ["sec", "min", "hr", "day", "week","month", "year", "decate"];
    $periodNumber = ["60", "60", "24", "7", "4.35", "12", "10"];

    for($iterator = 0;$differentBetweenCurrentAndTimeStamp >=$periodNumber[$iterator]; $iterator++)
       $differentBetweenCurrentAndTimeStamp  /= $periodNumber[$iterator];
       $differentBetweenCurrentAndTimeStamp = round($differentBetweenCurrentAndTimeStamp);

    if($differentBetweenCurrentAndTimeStamp != 1) $periodStrings[$iterator].='s';
       $myoutput = "$differentBetweenCurrentAndTimeStamp $periodStrings[$iterator]".' '.'ago';

 		
 		$output ='
 		<div class="w3-container animated slideInUp" id="success_search">
 		 <p id="search_result"><i class="icon ion-android-checkmark-circle"></i> '.$search_count.' SEARCH RESULT (S)</p>
          <div class="w3-quarter w3-centered " >
			  <div class="w3-card my_cars_cards">
			     <a class="thumbnail" href="more.php?ref='.$result["car_code"].'"><img src="admin/uploads/p1/'.$result['photo1'].'"></a>
			     <div class="my_Text" style="">
			     	<a href="more.php?ref='.$result["car_code"].'"  class="mycars_main_make"><h4><b>
			     	'.$result["make_name"].' '.$result["model_name"].'<b> '.$result["year"].'</b></h4></a>
			       <p><i class="icon ion-model-s my_cars_icons"></i> &nbsp; '.$result["state"].' 
			       &nbsp;<i class="icon ion-location my_cars_icons"></i> '.$result["area"].'  <br>
	            <span>Transmission : <b><span class="car_manuf_year"> '.$result["vehicle_type"].'</span></b></span><br>
			       </p>
			       <span>'.$value.'</span><br>
                 <span style="font-size: 9px;color: #acabac;">posted '.$myoutput.'</span><br>
			       <a class="btn btn-primary btn_mode_details" href="more.php?ref='.$result["car_code"].'" > More Details...</a>
			     </div>
			     <div style="background-color: #800a0a; height: 5px;"></div>  
	         </div>

		   </div>
		   </div>';
 	}
 	echo $output;
 }
  else
 {

   $getSugestion = $db->prepare("SELECT * FROM car_data WHERE make_name = ? ");
   $getSugestion->execute(array($make_name));
   $suggestion_count = $getSugestion->rowCount();
   if($suggestion_count > 0)
   {
      $fetch_sug = $getSugestion->fetchAll();
      $suggestionResult = "";
      foreach ($fetch_sug as $sug_result) {
        $suggestionResult ='
           <div class="w3-container">
              <div class="w3-quarter w3-centered " >
        <div class="w3-card my_cars_cards">
           <a class="thumbnail" href="more.php?ref='.$sug_result["car_code"].'"><img src="admin/uploads/p1/'.$sug_result['photo1'].'"></a>
           <div class="my_Text" style="">
            <a href="more.php?ref='.$sug_result["car_code"].'"  class="mycars_main_make"><h4><b>
            '.$sug_result["make_name"].' '.$sug_result["model_name"].'<b> '.$sug_result["year"].'</b></h4></a>
             <p><i class="icon ion-model-s my_cars_icons"></i> &nbsp; '.$sug_result["state"].' 
             &nbsp;<i class="icon ion-location my_cars_icons"></i> '.$sug_result["area"].'  <br>
              <span>Transmission : <b><span class="car_manuf_year"> '.$sug_result["vehicle_type"].'</span></b></span><br>
             </p>
            
             <a class="btn btn-primary btn_mode_details" href="more.php?ref='.$sug_result["car_code"].'" > More Details...</a>
           </div>
           <div style="background-color: #800a0a; height: 5px;"></div>  
           </div>
        </div>
       <hr>
           </div>
        ';
      }

   }
   else
   {
     $suggestionResult =" ";
   }
   
 	echo '
  <div>
 	<div class="container animated slideInDown" id="notFound">
       <p id="nodata" class=""><i class="icon ion-android-search" style="color:black;font-size20px;"></i>&nbsp; 0 SEARCH RESULT : '.$make_name.' '.$model_name.' '.$area_name.'</p></div><br>
   </div>
 	';

 	   
 }
}
}
else {
	header('location:index.php');
}
 
?>
<script type="text/javascript">
	// setTimeout('NodataFound()', 5000);
	//  function NodataFound(){
	//  $("#nodata").hide(2000);
 // }
</script>