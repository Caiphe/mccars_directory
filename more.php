<?php
    session_start();
    include('includes/db.php');
    include('includes/header.php');

  if(isset($_GET['ref']) AND !empty($_GET["ref"]))
  {
  	 $getid = intval($_GET['ref']);
  	 $getid = htmlspecialchars($_GET["ref"]);
  	 $sqlVehicle = $db->prepare("SELECT * FROM car_data WHERE car_code = ?");
  	 $sqlVehicle->execute(array($getid));
  }

?>
<!DOCTYPE html>
<html>
<head>
<title>More_About</title>
<script type="text/javascript" src="js/lightbox-plus-jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/lightbox.css">
<style type="text/css">
	#front_bar
	{
		background-color: #7f0a0a;
		height: 5px;
	}
	/*.news_cars_thumbnail
	{
		background-color: transparent;
		border:solid 1px transparent;
		background:transparent;
	}
	.news_cars_thumbnail:hover
	{
		background-color: transparent;
		border:solid 1px transparent;
		background:transparent;
	}*/
	.more_car_title
	{
		text-align: center;
		font-size: 30px;
    padding-top: 40px;
    padding: 10px;
	}
	.details_div
	{
		padding: 0px 25px;
		text-align: justify;
    //background-color: #c5c2c3;
	}
	.details_div span
	{
		font-size: 14px;
	}
	#after_menu_gradiant
  {
		width: 100%;
		height: 90px;
		text-align: center;
		color: white;
		background: #68001f; 
		background: -moz-linear-gradient(left, #68001f 0%, #590019 53%, #a00063 100%); 
		background: -webkit-linear-gradient(left, #68001f 0%,#590019 53%,#a00063 100%); 
		background: linear-gradient(to right, #68001f 0%,#590019 53%,#a00063 100%); 
		filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#68001f', endColorstr='#a00063',GradientType=1 ); 
  }
  .cycle-slideshow img
  {
  	width: 100%;
  	//height: 410px;
  	min-height: 200px;
  }
  .cycle-pager
  {
  	padding-right: 30%;
  }
  .my_cars_details_container
  {
  	background-color: #fff;
  	box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.2), 0 3px 4px 0 rgba(0, 0, 0, 0.19);
    margin-top: -60px;z-index: 9999;
  }
  .myBody
  {
  	background-color: #f5f5f5;
  }
  .after_details_div
  {
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.2), 0 3px 4px 0 rgba(0, 0, 0, 0.19);
  }
  .after_details_div img
  {
   
    width: 100%;
  }
  .our_description
  {
  	color: #1a4d9a;
  	//font-style: italic;
  	font-size: 15px;
    //font-weight: bold;
  }
  .icon_description
  {
  	color: #a1a1a1;
  	font-size: 32px;
  }
  .contact_owner_form input
  {
    width: 80%;
    height: 15px;
  }
  .owner_contact
  {
  	
  	color: #fff;
  	font-size: 13px;
  	transition: 1s;
    background-color: #041633;
  }
  .owner_contact:hover
  {
    border:solid 1px #041633;
  	color: #041633;
  	/*MAIN COLOR #7e0a0a*/
  }
  #share_this:hover
  {
    background-color: #041633;
    color: #fff;
    transition: 1s;
    border:solid 1px #041633;
  }
  #share_this
  {
    background-color: transparent;
    border:solid 1px #041633;
    color: #041633;
  }
  #car_views
  {
    padding: 7px 20px;
    border:solid 1px #041633;
    color: #041633;
    transition: 0.5s;
    background-color: ;
  }
   #car_views:hover
  {
   
  }
  #car_likes
  {
    padding: 7px 20px;
    border:solid 1px #041633;
    color: #041633;
    transition: 0.5s;
    background-color: ;
  }
  #car_likes:hover
  {
   background-color:  #041633;
    border:solid 1px #041633;
    color: #fff;
  }
  #btn_report_modal
  {
    padding: 7px 20px;
    border:solid 1px #041633;
    color: #041633;
    transition: 0.5s;
  }
  #btn_report_modal:hover
  {
    background-color:  #041633;
    border:solid 1px #041633;
    color: #fff;
  }
  #btn_reoprt
  {
    padding: 7px 20px;
    border:solid 1px #041633;
    color: #fff;
    transition: 0.5s;
    background-color: #041633;;
  }
  #btn_reoprt:hover
 {
    padding: 7px 20px;
    border:solid 1px #041633;
    color: #041633;
    transition: 0.5s;
    background-color: transparent;
 }
  /*CONTACT OWNER MODAL STYLE*/
  /* The Modal (background) */
.modal 
{
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 9999; /* Sit on top */
  padding-top: 50px; /* Location of the box */
  margin: 0px auto;
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.6); /* Black w/ opacity */
}

/* Modal Content */
 .modal-content 
 {
    background-color: #fefefe;
    margin: auto;
    border: 1px solid #888;
    width: 35%;
    min-width: 250px;
 }

/* The Close Button */
.close 
{
    color: #7f0a0a;
    float: right;
    font-size: 28px;
    font-weight: bold;
    margin-right: 20px;
}
.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}
.modal_style_top_bar
{
    background-color: #7f0a0a;
    height: 30px;
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
    //margin-top: -5px;
}
.modal_style_bottom_bar
{
    background-color: #7f0a0a;
    height: 30px;
    border-bottom-left-radius: 5px;
    border-bottom-right-radius: 5px;
}
.contact_owner_text_top
{
    text-align:center;
    font-size:20px;
    background-color: #a00063;
    color: white;padding: 5px;
    margin-right: auto;
    margin-top:10px auto;
}
.contact_owner_text
{
    text-align:center;
    font-size:20px;
    //background-color: #78073a;
    color: #78073a;
    padding: 5px;
    margin-right: auto;
    margin-top:10px auto;
    border-top-right-radius: 
    5px;border-top-left-radius: 5px;
}
.contact_owner_form_div
{
    padding: 20px;
}
.contact_owner_form_div input
{
    border:solid 1px #818181;
    width: 100%;
    height: 35px;
    padding-left: 10px;
    margin-bottom: 5px;
}
#contact_message
{
    border-radius: 0px;
    border:solid 1px #818181;
}
#send_mail_to_owner
{
  border:solid 1px #050b33;
  border-radius: 0px;
  padding: 7px 30px;
  background-color: #050b33;
  color: white;
  transition: 1s;
}
#send_mail_to_owner:hover
{
  background-color: transparent;
  border:solid 1px #050b33;
  color: #050b33;
}
.contact_owner_form_location_bottom
{
  color: #959595; 
  text-align: center;
}
.contact_owne_right
{
  border:solid 1px lightgray;
}
.vehicle_price_tag
{
 float: right;
  background-color: ;
  color: #c2580b;
}

.thumbnail
  {
    background-color: transparent !important;
    background: transparent !important;
    border:solid 1px transparent ;
    color: transparent;
  }
  .thumbnail:hover
  {
    background-color: transparent !important;
    background: transparent !important;
    border:solid 1px transparent !important;
    color: transparent;
  }
  .car_title
  {
    font-size: 30px;color: black;
  }
  #my_zoom_in
  {
    animation-duration:2s;
    -webkit-animation-duration:2s;
    -moz-animation-duration:2s;
    -o-animation-duration:2s;
  }
  #close_report
  {
    z-index: 9999;
  }
  #after_slider a
  {
    margin-bottom: 5px;
  }
  .own_details
  {
    font-size: 12px;color:#aaaaaa;
    margin-top: -5px;
    magin-left:5px;
  }
  .myIons_social 
  {
  padding: 10px 20px;
  font-size: 15px;
  width: 40px;
  text-align: center;
  text-decoration: none;
  margin: 5px 2px;
  transition: 0.5s;
  background:#C0BFBD;
  color:white;
}
.share_social_media .ion-social-facebook {
  background: #C0BFBD;
  color: white;
  border:solid 1px #C0BFBD;
}
.share_social_media .ion-social-facebook:hover
{
  background-color:transparent;
  border:solid 1px #3B5998;
  color: #3B5998;
}

.share_social_media .ion-social-twitter
{
  border:solid 1px #C0BFBD;
  background: #C0BFBD;
  color: white;
}
.share_social_media .ion-social-twitter:hover
{
  background: transparent;
  color: #55ACEE;
  border:solid 1px #55ACEE;
}
.share_social_media .ion-social-linkedin
{
  border:solid 1px #C0BFBD;
  background: #C0BFBD;
  color: white;
}
.share_social_media .ion-social-linkedin:hover
{
  border:solid 1px #007bb5;
  background: transparent;
  color: #007bb5;
}
.share_social_media .ion-social-google
{
  border:solid 1px #C0BFBD;
  background: #C0BFBD;
  color: white
}
.share_social_media .ion-social-google:hover
{
  border:solid 1px #dd4b39;
  background: transparent;
  color: #dd4b39;
}
.owner_det
{
  color:#3A3838 ;
  font-size: 16px;
  font-weight: bold;
}
.after_model
{
  color:#b5b5b5;
  font-size:16px;
}
.mySmallImages .thumbnail
{
  margin-top: 5px;
  border:solid 2px #B6B3B2;
  background-color: transparent !important;
}
.mySmallImages .thumbnail
{
  border:solid 1px transparent !important;
  background-color: transparent !important;
}
.more_vehicle_details
{
  text-align: center;
  background-color:#A4A4A2;
  padding: 7px ;color:white;
  font-weight: bold;
}
#small_advert
{
  text-align: center;
  margin-top: -10px;
  padding:5px;

}
#small_advert a
{
  text-align: center;
  font-size: 16px;

  color: rgba(162, 149, 146);
  font-weight: none;
  text-decoration: none;
  text-decoration-style: none;
  transition: 0.5s;
}
#small_advert a:hover
{
  color:#ea840c;
}
#submit_comment
{
  border-radius: 0px;
  padding: 10px 35px;
  text-align: center;
  background-color:transparent;
  color:#03061d;
  border:solid 1px #03061d;
  font-size: 16px;
  transition:0.5s;
  box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.2), 0 2px 4px 0 rgba(0, 0, 0, 0.19);
}
#submit_comment:hover
{
  border:solid 1px #03061d;
  border-radius: 0px;
  padding: 10px 35px;
  text-align: center;
  color:white;
  background-color:#03061d;
  font-size: 16px;
}
#comment_form input[type="text"]
{
  border: 0px;
  border-bottom: solid 1px black;
  background-color:#EDECE9;
  color: black;
  border-radius:0px;
  //box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.2), 0 2px 4px 0 rgba(0, 0, 0, 0.19);
}
#comment_form textarea
{
  border: 0px;
  border-bottom: solid 1px black;
  background-color:#EDECE9;
  color: black;
  border-radius: 0px;
  //box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.2), 0 2px 4px 0 rgba(0, 0, 0, 0.19);
}
    
</style>
</head>
<body class="myBody">
	<?php
      while($rows= $sqlVehicle->fetch())
      {
        $_SESSION["car_id"] = $rows["car_id"];

        $rating = $rows["rate"];
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
               <i id="orange" class="icon ion-ios-star-half "></i>
               <i id="normalStar" class="icon ion-ios-star-outline "></i>
              ';
            }
            if($rating == "2")
            {
              $value ='
               <i id="lightorange" class="icon ion-ios-star "></i>
               <i id="lightorange" class="icon ion-ios-star "></i>
               <i id="normalStar" class="icon ion-ios-star-outline "></i>
               <i id="normalStar" class="icon ion-ios-star-outline "></i>
               <i id="normalStar" class="icon ion-ios-star-outline "></i>
              ';
            }
            if($rating == "1")
            {
              $value ='
               <i id="red" class="icon ion-ios-star "></i>
               <i id="normalStar" class="icon ion-ios-star-outline "></i>
               <i id="normalStar" class="icon ion-ios-star-outline "></i>
               <i id="normalStar" class="icon ion-ios-star-outline "></i>
               <i id="normalStar" class="icon ion-ios-star-outline "></i>
              ';
            }

        // CREATING VEHICLE SESSION 
        $_SESSION["owner_name"] = $rows["dealer_name"];
        $_SESSION["owner_cont"] = $rows["dealer_contact"];
        $_SESSION["owner_email"] = $rows["dealer_email"];

        $id = $rows["car_id"];      
        $userIp = $_SERVER['REMOTE_ADDR'];
        $views = 1;
        $date_time = date("Y-m-d H:m:s");
        $likes = 1;

       // Query For checking the current date in the database
        $query = $db->query("SELECT * FROM car_views WHERE ref='$id' AND ip_address = '$userIp'");
        $count = $query->rowCount();


        if($count == 0){
          $queryInsert = $db->prepare("INSERT INTO car_views ( ref, ip_address, views, date_time) VALUES(?, ?, ?, ?)");
          $queryInsert->execute(array($id, $userIp,  $views, $date_time));
        }
        else
        {
          
          $updateQuery =$db->query("UPDATE car_views SET views = views + 1 WHERE ref = '$id'");
        }

        // LIKE PHP QUERIES

        $likesCount ='';
        if(isset($_POST["car_likes"]))
        {
          $sql_like = $db->query("SELECT * FROM car_likes WHERE  car_id='$id' AND ip_address ='$userIp'");
          $likesCount = $sql_like->rowCount();
          if($likesCount == 0){
            $insertLikes = $db->prepare("INSERT INTO car_likes (car_id,ip_address,likes,date_time) VALUES(?, ?, ?)");
            $insertLikes->execute(array($id, $userIp, $likes));
          }
          else
          {
             //$updateLikes=$db->query("UPDATE car_likes SET likes = likes + 1 WHERE car_id='$id'");
          } 
        }
        

         $queryV = $db->query("SELECT * FROM car_views WHERE ref='$id'");
         $fetchView = $queryV->fetch();
         $v = $fetchView["views"];
        
    	   $getDate = date("d-m-Y",strtotime($rows["date_time"]));
    	   $getTime = date("H:m:s",strtotime($rows["date_time"]));

         $carMake = $rows["make_name"];
             
    ?>
	<div class="container-fluid" id="after_menu_gradiant">	
	</div>
	<br>
<div class="container my_cars_details_container" >
  <div class="animated zoomIn" id="my_zoom_in">
  	<br>
  	<div class="container ">        
      <div class="row">
        <div class="col-md-8">
          <p class="car_title"><i class="icon ion-model-s icon_description"></i> <?php echo $rows["make_name"] ?> <?php echo $rows["model_name"] ?> <?php echo $rows["year"]?> <span class="vehicle_price_tag" id="vehicle_price_tag"><i class="icon ion-ios-pricetags"></i> R<?php echo number_format($rows["price"]) ?></span> </p>
                <p style="" class="after_model">
                  <small>Registered by </small><small><i class="icon ion-person"> </i><?php echo $rows["registered_by"]?> 
                    &nbsp;on <i class="icon ion-calendar"> &nbsp;</i><?php echo $getDate ?> at &nbsp; <i class="icon ion-clock"></i> <?php echo $getTime ?> |  Views : <i class="icon ion-eye"></i>  <?= $v ?> | Likes : 25 <i class="icon ion-ios-heart"></i> |  <?php echo $value ?> | </small>
                 </p>
          <div class="cycle-slideshow">
  				   <span class="cycle-pager"></span>
  				   <img id="new_car_main_image1" src="admin/uploads/p1/<?php echo $rows['photo1']?>" alt="image1">
  				   <img id="new_car_main_image2" src="admin/uploads/p2/<?php echo $rows['photo2']?>" alt="image2">
  				   <img id="new_car_main_image3" src="admin/uploads/p3/<?php echo $rows['photo3']?>" alt="image3">
  				   <img id="new_car_main_image4" src="admin/uploads/p4/<?php echo $rows['photo4']?>" alt="image4">
  				   <img id="new_car_main_image5" src="admin/uploads/p5/<?php echo $rows['photo5']?>" alt="image5">
					</div>
          <!-- VEHICLE SMALL IMAGES-->
          <div class="row mySmallImages" >
          <div class="col-md-2 col-sm-2">
           
            <a class="thumbnail"href="admin/uploads/p6/<?php echo $rows['photo6']?>" data-lightbox="gallery" data-title="<?php echo $rows["make_name"] ?> <?php echo $rows["model_name"] ?>"><img src="admin/uploads/p6/<?php echo $rows['photo6']?>" alt="image1"></a>
          </div>
          <div class="col-md-2 col-sm-2">
            <a class="thumbnail" href="admin/uploads/p7/<?php echo $rows['photo7']?>" data-lightbox="gallery" data-title="<?php echo $rows["make_name"] ?> <?php echo $rows["model_name"] ?>"><img src="admin/uploads/p7/<?php echo $rows['photo7']?>" alt="image1"></a>
          </div>
          <div class="col-md-2 col-sm-2">
            <a class="thumbnail" href="admin/uploads/p8/<?php echo $rows['photo8']?>" data-lightbox="gallery" data-title="<?php echo $rows["make_name"] ?> <?php echo $rows["model_name"] ?>"><img src="admin/uploads/p8/<?php echo $rows['photo8']?>" alt="image1"></a>
          </div>
          <div class="col-md-2 col-sm-2">
            <a class="thumbnail" href="admin/uploads/p2/<?php echo $rows['photo2']?>" data-lightbox="gallery" data-title="<?php echo $rows["make_name"] ?> <?php echo $rows["model_name"] ?>"><img src="admin/uploads/p2/<?php echo $rows['photo2']?>" alt="image1"></a>
          </div>
           <div class="col-md-2 col-sm-2">
            <a class="thumbnail" href="admin/uploads/p9/<?php echo $rows['photo9']?>" data-lightbox="gallery" data-title="<?php echo $rows["make_name"] ?> <?php echo $rows["model_name"] ?>"><img src="admin/uploads/p9/<?php echo $rows['photo9']?>" alt="image1"></a>
          </div>
           <div class="col-md-2 col-sm-2">
            <a class="thumbnail" href="admin/uploads/p4/<?php echo $rows['photo4']?>" data-lightbox="gallery" data-title="<?php echo $rows["make_name"] ?> <?php echo $rows["model_name"] ?>"><img src="admin/uploads/p4/<?php echo $rows['photo4']?>" alt="image1"></a>
          </div>
        </div>
         <!---VEHICLE SMALL IMAGES END-->

          <!---VEHICLE DETAILS STARTS-->
          <div style="padding: 10px;">
            <p class="more_vehicle_details">VEHICLE DETAILS</p>            

            <p class="" style="font-size:16px;"><br>
              <span class="our_description">Make : <i class="icon ion-model-s"></i></span> <span><?php echo $rows["make_name"]?> </span><br>
              <span class="our_description">Model : <i class="icon ion-model-s"></i></span> <span><?php echo $rows["model_name"]?> </span><br>
              <span class="our_description">Year : <i class="icon ion-model-s"></i></span> <span><?php echo $rows["year"]?> </span><br>
              <span class="our_description">Location : <i class="icon ion-location"></i></span> <span><?php echo $rows["area"]?> </span><br>
              <span class="our_description">Transmission : <i class="icon ion-ios-analytics-outline"></i></span> <span><?php echo $rows["vehicle_type"]?></span><br> 
              <span class="our_description">Body-Type : <i class="icon ion-model-s"></i></span> <span><?php echo $rows["body_type"]?> </span><br>
              <span class="our_description">Max-mileague  : <i class="icon ion-clock"></i></span> <span><?php echo $rows["max_mileague"]?></span><br>
              <span class="our_description">Fuel-Type  : <i class="icon ion-aperture"></i></span> <span><?php echo $rows["fuel_type"]?></span><br>
              <span class="our_description">Color  : <i class="icon ion-paintbrush"></i> </span> <span><?php echo $rows["color"]?></span><br>
              <span class="our_description">No of Doors  : <i class="icon ion-stop"></i> </span> <span><?php echo $rows["number_of_door"]?> Doors</span><br>
              <span class="our_description">Made in <i class="icon ion-ios-flag"></i> </span> <span><?php echo $rows["madein"]?></span><br>
              <span class="our_description">Vehicle State <i class="icon ion-model-s"></i> </span> <span><?php echo $rows["state"]?></span><hr>
              <span class="our_description"></span> <span><?php echo $rows["more_options"]?></span> <br><br>
              <span class="our_description"></span> <span><?php echo $rows["car_description"]?></span> <br>
            </p>
             <!---VEHICLE DETAILS END-->
              
             <!---OWNER'S DETAILS START-->
                 <p style="border-bottom:solid 1px #d1d1d1;"></p>
                  <p style="color:#7d7f7e;font-size:16px;">
                    <span><b>OWNER : </b></span>
                     <i class="icon ion-ios-contact-outline"></i> <?php echo $rows["dealer_name"]?>&nbsp;&nbsp;
                     <i class="icon ion-ios-telephone"></i> <?php echo $rows["dealer_contact"]?>&nbsp;&nbsp;
                     <i class="icon ion-ios-email-outline"></i> <a href="#void"><?php echo $rows["dealer_email"]?></a>&nbsp;&nbsp;
                     <i class="icon ion-location"></i> <?php echo $rows["area"]?></p>
                  <p style="border-bottom:solid 1px #d1d1d1;"></p>
                  <br>

                  <!--SUGGESTIONS--->
                   <p style="background-color:#4B7FE7;border-top-right-radius: 10px;border-top-left-radius: 10px;padding:9px 25px;color:white;font-size: 15px;">Some Suggestions of the most viewed</p>
                   <?php
                   $getB = $db->query('SELECT * FROM car_data WHERE make_name =  "bmw" LIMIT 2 ');
                   $rowss = $getB->fetch();

                   $getF = $db->query('SELECT * FROM car_data WHERE make_name ="Fords" LIMIT 1 ');
                   $rowfs = $getF->fetch();

                   $getH = $db->query('SELECT * FROM car_data WHERE make_name ="Honda" LIMIT 1 ');
                   $rowHs = $getH->fetch();
                   

                   ?>
                   <div class="row">
                      <div class="col-md-4">
                        <a class="thumbnail"><img src="admin/uploads/p2/<?php echo $rowss['photo2']?>" alt="image1"></a>
                      </div>
                      <div class="col-md-8">
                        <a href="more.php?ref=<?php echo $rowss["car_code"]?>" style="font-size: 15px;"><?php echo  $rowss["make_name"] .'&nbsp;'.$rowss["model_name"].'&nbsp;'. $rowss["year"].'&nbsp;'. $rowss["body_type"].'&nbsp;'. $rowss["vehicle_type"] ?></a><br>
                        <span style="font-size: 22px;color:#F7A50C;"> R <?php echo number_format($rowss["price"])?></span><br>
                        <span style="font-size: 15px;color:#6C6B6A;"><?php echo $rowss["car_description"]?></span>
                      </div>
                   </div>
                   <p style="background-color:#CAC8C6;height: 1px;width: 100%;"></p>
                   <div class="row">
                      <div class="col-md-4">
                        <a class="thumbnail" href="more.php?ref=<?php echo $rowfs["car_code"]?>"><img src="admin/uploads/p1/<?php echo $rowfs['photo1']?>" alt="image1"></a>
                      </div>
                      <div class="col-md-8">
                        <a href="more.php?ref=<?php echo $rowfs["car_code"]?>" style="font-size: 15px;"><?php echo  $rowfs["make_name"] .'&nbsp;'.$rowfs["model_name"].'&nbsp;'. $rowfs["year"].'&nbsp;'. $rowfs["body_type"].'&nbsp;'. $rowfs["vehicle_type"] ?></a><br>
                        <span style="font-size: 22px;color:#F7A50C;"> R <?php echo number_format($rowfs["price"])?></span><br>
                        <span style="font-size: 15px;color:#6C6B6A;"><?php echo $rowfs["car_description"]?></span>
                      </div>
                   </div>
                    <p style="background-color:#CAC8C6;height: 1px;width: 100%;"></p>
                   <div class="row">
                      <div class="col-md-4">
                        <a class="thumbnail" href="more.php?ref=<?php echo $rowHs["car_code"]?>"><img src="admin/uploads/p1/<?php echo $rowHs['photo1']?>" alt="image1"></a>
                      </div>
                      <div class="col-md-8">
                        <a href="more.php?ref=<?php echo $rowHs["car_code"]?>" style="font-size: 15px;"><?php echo  $rowHs["make_name"] .'&nbsp;'.$rowHs["model_name"].'&nbsp;'. $rowHs["year"].'&nbsp;'. $rowHs["body_type"].'&nbsp;'. $rowHs["vehicle_type"] ?></a><br>
                        <span style="font-size: 22px;color:#F7A50C;"> R <?php echo number_format($rowHs["price"])?></span><br>
                        <span style="font-size: 15px;color:#6C6B6A;"><?php echo $rowHs["car_description"]?></span>
                      </div>
                   </div>
                   
        </div>
           
        </div>
        <div class="col-md-4 details_div" >

    <?php 
    if(isset($_POST["send_mail_to_owner"]))
    {
      $frstname = htmlspecialchars($_POST["first_name"]);
      $surname = htmlspecialchars($_POST["second_name"]);
      $contact_number = htmlspecialchars($_POST["contact_number"]);
      $email_address = htmlspecialchars($_POST["email_address"]);
      $contact_message = htmlspecialchars($_POST["contact_message"]);

      if(!empty($frstname) AND !empty($surname) AND !empty($contact_number) AND !empty($email_address) AND inmpty($contact_message))
      {
         if(filter_var($email_address, FILTER_VALIDATE_EMAIL) AND preg_match("/^[a-zA-Z]*$/",$frstname) AND preg_match("/^[a-zA-Z]*$/",$surname) AND preg_match("/^[0-9]*$/",$contact_number))
         {
           $toEmail = 'mardesign1@gmail.com';
             $subject = 'Contact Form mcmcars.com'.$frst_name;
             $body = '<h2>CONTACT REQUEST</h2>
                <h4>Name</h4><p>'.$frst_name.'</p>
                <h4>Email</h4><p>'.$cont_email.'</p>
                <h4>Message</h4><p>'.$message.'</p>
             ';
             $headers = "MINE-Version:1.0"."\r\n";
             $headers .= "Content-Type:text/html;charset=UTF-8"."\r\n";
             $headers .= "From :".$frst_name."<".$cont_email.">" ."\r\n";

             if(mail($toEmail, $subject, $body, $headers)){
              $succ_message = "Your email has been sent";
             }else
             {
              $msg = "Your email was not sent";
             }
         }else
         {
           $owner_error_msg =" Valid email required ";
         }
      }else
      {
        $owner_error_msg = "All fields are required";
      }

    }
?>
        <div class="contact_owne_right ">
        <br>
        <!--<div style="" class="modal_style_top_bar"></div>-->
    <p style="" class="contact_owner_text_top">CONTACT OWNER</p>
     <div class="contact_owner_form_div">
        <form method="POST">
                 <div class="form-group">
              
                   <input type="text" name="first_name" id="first_name" placeholder="Your name" required="required">
                 </div>
                  <div class="form-group">
                   <input type="number" name="contact_number" id="contact_number" placeholder="Contact Number" required="required" >
                 </div>
             
           <div class="form-group">
                   <input type="email" name="email_address" id="email_address" placeholder="Email Address" required="required">
           </div>

            <div class="form-group">
                   <input type="text"  disabled="" value="Owner's Name : <?php echo $rows["dealer_name"]?>" style="border:solid 1px #8c8888;color:#8c8888;">
                </div>
                
           <div class="form-group">
             <textarea name="contact_message" id="contact_message" cols="5" rows="6" placeholder="Type your message here...." class="form-control"></textarea>
           </div>
           <div class="form-group">
              <button type="submit" name="send_mail_to_owner" id="send_mail_to_owner" class="btn btn-default btn-block"><i class="icon ion-send"></i> SEND</button>
              </div>
          
        </form>
        <p style="color:#0b43b6;font-size:17px;">
        <span style="color:black;"><b>OWNER : </b></span><br>
         <span><i class="icon ion-ios-contact-outline"></i><b> NAME : </b></span><span class="owner_det" ><?php echo $rows["dealer_name"]?></span><br>
         <span><i class="icon ion-ios-telephone"></i><b> CONTACT : </b></span><span class="owner_det"><?php echo $rows["dealer_contact"]?></span><br>
         <span><i class="icon ion-ios-email-outline"></i><b> EMAIL : </b></span><span class="owner_det"> <?php echo $rows["dealer_email"]?></span><br>
         <pan><i class="icon ion-location"></i><b> LOCATION : </b></pan><span class="owner_det"><?php echo $rows["area"]?></pan>
         </p>
          <p style="color:#B6ADAC;text-align:center;margin-bottom:5px;">--------------------------------</p>
         <p style="color:#B6ADAC;text-align:center;margin-bottom:5px;font-size: 17px;font-weight: bold;">SHARE WITH SOCIAL MEDIA</p><br>
          <p style="text-align: center;" class="share_social_media">
            <a href="#void" class="icon ion-social-facebook myIons_social"></a> &nbsp;&nbsp; 
            <a href="#void" class="icon ion-social-twitter myIons_social"></a>&nbsp;&nbsp; 
            <a href="#void" class="icon ion-social-google myIons_social"></a>&nbsp;&nbsp;
            <a href="#void" class="icon ion-social-linkedin myIons_social"></a>&nbsp;&nbsp;
          </p>
         <br>
        <a class="btn btn-default btn-block" name="share_this" id="share_this"><i class="icon ion-android-share-alt"></i> SHARE THIS POST</a>
        <a class="btn btn-default btn-block" name="btn_report_modal" id="btn_report_modal"><i class="icon ion-speakerphone"></i> REPORT THIS POST</a>
         <button type="submit" class="btn btn-default btn-block" name="car_likes" id="car_likes">
          <i class="icon ion-ios-heart"></i> LIKE THIS POST </button>
         <a class="btn btn-default btn-block" name="share_this" id="share_this"><i class="icon ion-plus-circled"></i> ADD TO WISHLIST</a>
            	           	                 
  	          </div>
  	       	</div>
            <div style="border:solid 1px #E1DFDC;margin-top:5px;" class="mySmallImages">
                <a class="thumbnail" href="#"><img src="img/sm4.jpg" alt="image1"></a>
                <p style="" class="small_advert" id="small_advert">
                  <a href="#void">View Our BMW</a></p>
            </div>            
              
              <div style="border:solid 1px #E1DFDC;margin-top:5px;">  
              <p style="margin-top:5px;background-color:#C1C2C4;padding:9px 25px;color:white;font-size: 15px;">Popular Makes</p>              
                <p style="padding:10px;">
                    <a href="all_bmw.php"> BMW </a><br>
                    <a href="#void"> Honda </a><br>
                    <a href="#void"> Fords</a>
                </p>
            </div>
            <div style="border:solid 1px #E1DFDC;margin-top:5px;padding:10px;">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d110737.65264783872!2d30.922422018177375!3d-29.84836086961131!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1ef7aa0001bc61b7%3A0xcca75546c4aa6e81!2sDurban!5e0!3m2!1sen!2sza!4v1526666913610" width="100%" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
            <div style="border:solid 1px #E1DFDC;margin-top:5px;">           
                <a class="thumbnail" href="index.php"><img src="img/morelo.png"></a>
            </div>

          </div>

  	       </div>
  	 	  </div>
       <br>
  	</div>
  </div>
</div>
 <br>
 <div class="container  after_details_div" >
	<div class="row">
		<div class="col-md-3 col-sm-3">
			<a class="thumbnail" href="#void"><img src="admin/uploads/p6/<?php echo $rows['photo6']?>" alt="image1"></a>
		</div>
		<div class="col-md-3 col-sm-3">
			<a class="thumbnail" href="#void"><img src="admin/uploads/p7/<?php echo $rows['photo7']?>" alt="image1"></a>
		</div>
		<div class="col-md-3 col-sm-3">
			<a class="thumbnail" href="#void"><img src="admin/uploads/p8/<?php echo $rows['photo8']?>" alt="image1"></a>
		</div>
		<div class="col-md-3 col-sm-3">
			<a class="thumbnail" href="#void"><img src="admin/uploads/p9/<?php echo $rows['photo9']?>" alt="image1"></a>
		</div>
	</div>
</div>
<br>
 <?php include('alertIcon.php') ?>
<br><br>

<!--SHARE MODAL-->
<div id="shareModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content w3-animate-zoom">
   <div style="" class="modal_style_top_bar"></div>
    <span class="close" id="close">&times;</span>
    <p style="" class="contact_owner_text">SHARE THIS POST</p>
     <div class="contact_owner_form_div">
      <p id="share_msg" ></p>
        <form method="POST" name="share_submit" id="share_submit">
           <div class="form-group">
              <div class="row">
                 <div class="col-md-6">
                   <input type="text" name="first_name" id="first_name" placeholder="Your name" required="required">
                 </div>
                 <div class="col-md-6">
                   <input type="text" name="second_name" id="second_name" placeholder="Your Surname" required="required">
                 </div>
              </div>
           </div>
           <div class="form-group">
              <div class="row">
                 <div class="col-md-6">
                   <input type="number" name="contact_number" id="contact_number" placeholder="Contact Number" required="required">
                 </div>
                 <div class="col-md-6">
                   <input type="email" name="email_address" id="email_address" placeholder="Email Address" required="required">
                 </div>
              </div>
           </div>
           <div class="form-group">
             <textarea name="contact_message" id="contact_message" cols="5" rows="7" placeholder="Type your message here...." class="form-control"></textarea>
           </div>
           <div class="form-group">
              <div class="row">
                  <div class="col-md-6">
                    <button type="submit" name="send_mail_to_owner" id="send_mail_to_owner" class="btn btn-default"><i class="icon ion-chatbubbles"></i> SHARE POST</button>
                  </div>
                  <div class="col-md-6">               
                  </div>
              </div>
           </div>
        </form>
     </div>
      <div style="" class="modal_style_bottom_bar"></div>
  </div>
</div>


<!--REPORT MODAL-->
<div id="reportModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content w3-animate-zoom">
    <div style="" class="modal_style_top_bar"></div>
    <span class="close" id="close_report">&times;</span>
    <p style="" class="contact_owner_text">REPORT THIS POST</p>
      <p style="text-align: center;color: #7e7d7d;font-size: 13px;margin-left: -35px;"><i class="icon ion-information-circled"></i> Tell us what you know about this post !</p>
     <div class="contact_owner_form_div">
      <span id="report_error_ajax"></span>
        <form method="POST" action="" id="report_post_form">
           <div class="form-group">
              <div class="row">
                 <div class="col-md-6">
                   <input type="text"  name="user_name" id="user_name" placeholder="Name" required="required">
                   <span class="report_error" id="report_username_error"></span>
                 </div>
                 <div class="col-md-6">
                   <input type="number" name="contact_report" id="contact_report" placeholder="Contact Number" required="required">
                   <span class="report_error" id="report_contact_error"></span>
                 </div>
              </div>
           </div>
           <div class="form-group">
             <textarea style="border:solid 1px #818181;border-radius: 0px;" name="message_report" id="message_report" cols="5" rows="7" placeholder="Type your message here...." class="form-control"></textarea>
             <span class="report_error" id="report_message_error"></span>
           </div>
           <div class="form-group">
              <div class="row">
                  <div class="col-md-6">
                    <button type="submit" name="btn_reoprt" id="btn_reoprt" class="btn btn-default"><i class="icon ion-speakerphone"></i> REPORT </button>
                  </div>
                  <div class="col-md-6">               
                  </div>
              </div>
           </div>
        </form>
     </div>
      <div style="" class="modal_style_bottom_bar"></div>
  </div>
</div>
 <?php
  }
?>
</body>
 <?php include('alertIcon.php') ?>
<?php include('includes/footer.php') ?>
</html>


<!--CONTACT OWNER'S MODAL-->
<script>
var modal = document.getElementById('myModal');
var btn = document.getElementById("cont_owner");
var span = document.getElementsByClassName("close")[0];
btn.onclick = function() {
    modal.style.display = "block";
}
span.onclick = function() {
    modal.style.display = "none";
}
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
  }
}
</script>

<!--SHARE MODAL-->
<script>
var share_modal = document.getElementById('shareModal');
var shareBtn = document.getElementById("share_this");
var span = document.getElementById("close")[0];
shareBtn.onclick = function() {
    share_modal.style.display = "block";
}
span.onclick = function() {
    share_modal.style.display = "none";
}
window.onclick = function(event) {
    if (event.target == share_modal) {
        share_modal.style.display = "none";
  }
}
</script>

<!--REPORT MODAL-->
<script>
var rep_pst = document.getElementById('reportModal');
var btn_report = document.getElementById("btn_report_modal");
var span = document.getElementById("close_report")[0];
btn_report.onclick = function() {
    rep_pst.style.display = "block";
}
span.onclick = function() {
    rep_pst.style.display = "none";
}
window.onclick = function(event) {
    if (event.target == rep_pst) {
        rep_pst.style.display = "none";
  }
}
</script>

<!--JQUERY SCRIPT In AND OUT-->
<script type="text/javascript">
   $(document).ready(function(){
     $("#close_modal").on('click',function(){
         $("#myModal").fadeOut(1000);
     });
     $("#close").on('click',function(){
         $("#shareModal").fadeOut(1000);
     });
     $("#close_report").on('click',function(){
         $("#reportModal").fadeOut(1000);
     });
    
    $("#report_username_error").hide();
    $("#report_contact_error").hide();
    $("#report_message_error").hide();

    var rep_username = false;
    var rep_con= false;
    var rep_ms = false;

    
    $("#user_name").focusout(function(){
        check_report_username();
    });

    $("#contact_report").focusout(function(){
       check_report_contact();
    });

    $("#message_report").focusout(function(){
      check_report_message();
    });

    function check_report_username()
    {
       var user_name = $("#user_name").val();
       if(user_name !== '')
       {
         $("#user_name").css('border','solid 1px #23761a');
       }else{
        $("#user_name").css('border','solid 1px #a20808');
        rep_username = true;

       }
    }
     function check_report_contact()
    {
       var contact_report = $("#contact_report").val();
       if(contact_report !== '')
       {
         $("#contact_report").css('border','solid 1px #23761a');
       }else{
        $("#contact_report").css('border','solid 1px #a20808');
        rep_username = true;

       }
    }
    function check_report_message()
    {
       var message_report = $("#message_report").val();
       if(message_report !== '')
       {
         $("#message_report").css('border','solid 1px #23761a');
       }else{
        $("#message_report").css('border','solid 1px #a20808');
        rep_ms = true;
       }
     }
     $("#report_post_form").submit(function(){
         rep_username = false;
         rep_con= false;
         rep_ms = false;

        check_report_username();
        check_report_contact();
        check_report_message();

        if(rep_username == false && rep_con == false && rep_ms == false )
        {
          return true;
        }
        else
        {
          return false;
        }
     });
   });
</script>

<!--COMMENT AJAX START--->
<script>
$(document).ready(function(){
 
 $('#comment_form').on('submit', function(event){
  event.preventDefault();
  var form_data = $(this).serialize();
  $.ajax({
   url:"add_comment.php",
   method:"POST",
   data:form_data,
   dataType:"JSON",
   success:function(data)
   {
    if(data.error != '')
    {
     $('#comment_form')[0].reset();
     $('#comment_message').html(data.error);
     $('#comment_id').val('0');
     load_comment();
    }
   }
  })
 });

 load_comment();

 function load_comment()
 {
  $.ajax({
     url:"fetch_comment.php",
     method:"POST",
     success:function(data)
     {
      $('#display_comment').html(data);
     }
  })
 }

 $(document).on('click', '.reply', function(){
  var comment_id = $(this).attr("id");
  $('#comment_id').val(comment_id);
  $('#comment_name').focus();
 });
 
});
</script>
<!--COMMENT AJAX END--->

<!--REPORT EMAIL -->
<script type="text/javascript">
  $(document).ready(function(){
    $("#report_post_form").on('submit',function(event){
      event.preventDefault();
      var report_post_form = $(this).serialize();
      $.ajax({
        url:'reportPost.php',
        data : report_post_form,
        method:"POST",
        success:function(data){
        $("#report_error_ajax").html(data);
       }
      });   
    });
     
  });
</script>
<!--REPORT EMAIL -->

<!--SHARE THIS POST START-->
<script type="text/javascript">
  $(document).ready(function(){
    $("#share_submit").on('submit', function(event){
      event.preventDefault();
      var share_pst = $(this).serialize();
      $.ajax({
        url :'share_report.php',
        data : share_pst,
        method : "POST",
        success:function(data){
          $("#share_msg").html(data);
        }
      })
    })
  })
</script>
<!--SHARE THIS POST END-->


