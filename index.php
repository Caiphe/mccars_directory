<?php
session_start();
include('includes/db.php');
include('includes/flav.php');

    //Pagination Start
   $carPerPage = 8;
   $carRequest = $db->query("SELECT car_id FROM car_data");
   $carRequest_count = $carRequest->rowCount();
   $totalPages = ceil($carRequest_count/$carPerPage);

   //PAGINATION
   if(isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0 AND $_GET['page'] <= $totalPages)
   {
      $_GET['page'] = intval($_GET['page']);
      $currentPage = $_GET['page'];
   }else
   {
     $currentPage = 1;
   }
   $start = ($currentPage -1)*$carPerPage;

   // Get New Cars 
   $get_new_cars = $db->query('SELECT * FROM car_data WHERE state="new car"');
   $count_new = $get_new_cars->rowCount();
   if($count_new > 0)
   {
     $count_new = $count_new;
   }else
   {
      $count_new = 0;
   }
   //Get Used cars
   $get_used_cars = $db->query('SELECT * FROM car_data WHERE state="used car"');
   $count_used = $get_used_cars->rowCount();

   if($count_used > 0){
     $count_used = $count_used;
   }else{
      $count_used = 0;
   }
   
   //Get cars on sale
   $get_on_sale = $db->query('SELECT * FROM car_data WHERE on_sale="On Sale" ');
   $count_onSale = $get_on_sale->rowCount();
    if($count_onSale > 0){
     $count_onSale = $count_onSale;
   }else{
      $count_onSale = 0;
   }

include('includes/header.php');
?>
<!DOCTYPE html>
<html>
<head>
  <title>Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="themes/1/tooltip.css" rel="stylesheet" type="text/css" />
  <script src="themes/1/tooltip.js" type="text/javascript"></script>

  <style type="text/css">
  #myBackGround
  {
	  background: url(img/home_small1.jpg)  no-repeat 50% 50%;;
    //background: url(../img/bigbody.jpg) no-repeat 50% 50%;
	  background-attachment: fixed;
	  background-repeat: no-repeat;
	  background-position: center;
    width: 100%;
    height: 200px;
  }
  .home_form_footer
  {
  	background-color: #7f0a0a;
  	height: 50px;
  	border-bottom-left-radius: 10px;
  	border-bottom-right-radius: 10px; 
  }
  #main_container img
  {
  	// height: 230px;
  	 border-bottom: solid 2px #7f0a0a;
  }
  .btn_mode_details
  {
  	border-radius: 0px;
  	background-color: #d76f0a;
  	text-align: center;
  	border: solid 1px #d76f0a;
    text-decoration-style: none
    text-decoration: none;
  	padding: 6px 13px;
  	transition: 1s;
  }
  .btn_mode_details:hover
  {
  	background-color: #7f0a0a;
  	border:solid 1px #7f0a0a;
    text-decoration-style: none;
    text-decoration:none;
  }
  .my_cars_cards  {
  	margin-bottom: 15px;
  }
  .my_cars_icons
  {
  	color: #9b9b9b;
  }
  .car_manuf_year
  {
  	color: #071236;
    font-weight: bold;
  }
  .mycars_main_make
  {
  	color: #1a3794;
  	text-decoration: none;
    text-decoration-style: none;
  	transition: 0.5s;
  }
  .mycars_main_make:hover
  {
  	color: #e2680f;
  	text-decoration-style: initial;
    text-decoration: none !important;
  }
  #myIcons_car
  {
    width: 93px;
    height: 74px;
    margin-left: auto;
  }
  #car_count
  {
    padding-top:5px ;
  }
  #car_count span
  {
    color: white;
    font-size: 15px;
    font-weight: lighter;
  }
  .my_icons
  {
    font-size: 30px;color: white;
  }
  .container_icons a
  {
    text-decoration: none;
  }
  .container_icons a:hover
  {
    text-decoration: none;
  }
   #pagination_active
  {
    background-color: #6b084b !important;
    color: white  !important;
  }
  #pagination_list li a
  {
    margin-right: 3px;
    background-color: transparent;
    border:solid 1px #6b084b;
    padding: 6px 11px;
    color: black;
    font-size:17px;
    transition:1s;
    box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.2), 0 2px 4px 0 rgba(0, 0, 0, 0.19);
  }
   #pagination_list li a:hover
   {
       background-color: #6b084b;
       color: white;
   }
   #pagination_list li a:after
   {

   }
   .main_pagination
   {
     margin-left: 20px;
   }
   select{
    border:1px solid #777;
    padding: .8rem 3rem .8rem .5rem;
    border-radius: 3px;
    color:#B00A50;
    -moz-appearance: none;
    -webkit-appearance: none;
    appearance: none;
    background-color:blue;
    cursor: pointer;
}

.imgBgMethod, .borderMethod,.glyphIconMethod{
    display: inline-block;
    position: relative;
    width: 100%;
}

.imgBgMethod select{
    background: #fff url("http://i68.tinypic.com/9t3d3d.png ") no-repeat 95% 50%;
}

.borderMethod select, .glyphIconMethod select{background: #fff;width: 100%; color:#4D4D4D;}

.borderMethod::after{
    content: "";
    display: inline-block;
    border-top: 6px solid #4D4D4D;
    border-right:6px solid transparent;
    border-left:6px solid transparent;
    position: absolute;
    top:calc(50% - 5px);
    right:.5rem;
    z-index: 0;
    pointer-events: none;
}
.glyphIconMethod::after{
    content: " \f13a";
    font-family: "FontAwesome";
    color: #fff;
    position: absolute;
    right:.5rem;
    top:15px;
    z-index: -1;
    pointer-events: none;
}

select:focus{
    border: 1px solid blue;
}

select::-ms-expand{
    display: none;
}
#searchResults
{
  margin-top: 30px;
}

  </style>

  <script typecar_id DESCript">
   $(document).ready(function(){
      $("#make_name").on('change',function(){
        var make_name = $(this).val();
        if(make_name) {
         $.ajax({
            url:"get_model.php",
            type:"POST",
            data :"make_name="+make_name,
            success:function(data)
            {
              $("#model_name").html(data);
            }
         });
        }else{
          $('#model_name').html('<option value="">No make found for this model</option>');
        }
      });
   });
 </script>

</head>
<body>
  <!--<div id="overlay">
     <div class="spinner"></div> 
  </div>-->

	<div class="cycle-slideshow">
		<span class="cycle-pager"></span>
		    <img src="img/slid1.jpg" alt="my used car to be sold" width="100%">
		    <img src="img/slid2.jpg" alt="second car used as well" width="100%">
		    <img src="img/slid3.jpg" alt="third used car to be sold" width="100%">
		    <img src="img/slid4.jpg" alt="third used car to be sold" width="100%">
	</div>

	<!--Search Form form_div-->
	<div class="form_div animated slideInRight" id="form_div">
		<div class="form_header">
			<p class="search_title "><i class=""></i> SEARCH FOR A VEHICLE !!!</p>
		</div>
		<div class="actual_form">
			<form  id="main_search_form" action="searchCars.php">
        <div class="form-group">
           <div class="borderMethod">
          <select class="form-control" name="make_name" id="make_name" required="required">
             <option value="">Select Make (e.g : Ford)</option>           
               <?php
                $getMakes = $db->query('SELECT * FROM make ORDER BY make_name ASC ');
                while($result = $getMakes->fetch())
                {
                  ?>
                   <option value="<?php echo $result["make_name"]?>"><?php echo $result['make_name'] ?></option>
                  <?
                }
               ?>
         </select>
       </div>
        </div> 

		   <div class="form-group">
         <div class="borderMethod">
         <select class="form-control" name="model_name" id="model_name" required="required"> 
            <option value="">Select Vehicle Model</option>    
         </select>
       </div>
        </div>
        <div class="form-group">
           <div class="borderMethod">
        <select class="form-control" name="area_name" id="area_name" required="required">
          <option value="">Select Area</option>
            <?php
              $getArea = $db->query('SELECT * FROM area_table ORDER BY area_name ASC');
              while($rows = $getArea->fetch())
              {
                ?>
                <option value="<?php echo $rows["area_name"]?>"><?php echo $rows["area_name"]?></option>
                <?php
              }
            ?>
        </select>
      </div>
        
      </div>
      <div class="form-group">
        <div class="borderMethod">
        <select class="form-control" name="min_price" id="min_price" required="required">
           
          <option value="">Select Min Price</option>
            <?php
              $getPrice = $db->query('SELECT * FROM prices ORDER BY prices ASC');
              while($rows = $getPrice->fetch())
              {
                ?>
                <option value="<?php echo $rows["prices"]?>">R<?php echo number_format($rows["prices"]) ?></option>
                <?php
              }
            ?>
        </select>
      </div>
      </div>
       <div class="form-group">
        <div class="borderMethod">
        <select class="form-control" name="prices" id="prices" required="required">
          <option value="">Select Max Price</option>
            <?php
              $getPrice = $db->query('SELECT * FROM prices ORDER BY prices ASC');
              while($rows = $getPrice->fetch())
              {
                ?>
                <option value="<?php echo $rows["prices"]?>">R<?php echo number_format($rows["prices"]) ?></option>
                <?php
              }
            ?>
        </select>
      </div>
      </div>
			<div class="form-group">
				<button type="submit" class="btn btn-default btn-block btn_search" id="mySearchBtn" name="mySearchBtn"><i class="ion-ios-search-strong"></i></button>
			</div>
		</form>
	 </div>
	</div>
	<!--End Search Form-->
	<div class="container-fluid container_icons" id="myContainerIcons" >
	<div class="container">
		<div class="row">
			<div class="col-md-3 col-sm-3" align="center">
          <!--<img src="icons/usedCars.png">-->
          <a href="usedCars.php">
          <p id="car_count" >
            <i class="icon ion-model-s my_icons"></i> <br>
             <!--<span>Over</span><br>-->
            <span><?= $count_used; ?> USED CARS</span> 
          </p>
        </a>
      </div>
			<div class="col-md-3 col-sm-3" align="center">
				  <!--<img src="icons/usedCars.png">-->
          <a href="newCars.php">
          <p id="car_count" >
             <i class="icon ion-model-s my_icons"></i> <br>
              <!--<span>Over</span><br>-->
            <span class=""><?= $count_new; ?> NEW CARS</span> 
          </p></a>
			</div>
			<div class="col-md-3 col-sm-3" align="center">
				  <!--<img src="icons/specials.png">-->
          <a href="onSale.php">
            <p id="car_count" >
             <i class="icon icon ion-ios-pricetags my_icons"></i> <br>
              <!--<span>Over</span><br>-->
            <span><?= $count_onSale; ?> CARS ON SALE</span> 
          </p></a>
			</div>
        <div class="col-md-3 col-sm-3" align="center">
          <!--<img src="icons/specials.png">-->
          <a href="#">
            <p id="car_count" >
             <i class="icon icon ion-person my_icons"></i> <br>
             <!--<span>Over</span><br>-->
            <span>30 000 BUYERS</span> 
          </p></a>
      </div>
		</div>
	</div>
	 <!--SERACHED CARS-->
   <!--END OF SERACH CARS-->
	</div>
       <div class="container-fluid " id="main_container" >
         <div class="animated " id="searchResults" class="w3-animated-zoom">
 
         </div>
			 <div class="w3-container" id="container_hide">
         <!--PAGINATION START-->
         <div  class="main_pagination" align="center">
            <nav aria-label="Page navigation">
            <ul class="pagination" id="pagination_list">
              <li>
                <a href="#" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                </a>
              </li>
              <?php 
                for($i=1;$i <= $totalPages;$i++ )
                {
                  if($i == $currentPage)
                  {
                    echo ' <li class="" ><a class="pagination_active" id="pagination_active" href="#">'.$i.' <span class="sr-only">(current)</span></a></li>';
                  }
                  else
                  {
                    echo '<li><a href="index.php?page='.$i.'">'.$i.'</a></li>';
                  }
                }
              ?>
               <li>
                <a href="#" aria-label="Next">
                  <span aria-hidden="true">&raquo;</span>
                </a>
              </li>
            </ul>
          </nav>
          </div>
    <!--PAGINATION END-->
		<div class="w3-row-padding my_img">
     <?php 
        $sqlCars = $db->query('SELECT * FROM car_data ORDER BY car_id ASC LIMIT '.$start.','.$carPerPage);
        $allCars = $sqlCars->fetchAll();

        foreach ($allCars as $myCars) 
        {

          $rating = $myCars["rate"];
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
               <i id="normalStar" class="icon ion-ios-star-outline "></i>
              ';
            }
            if($rating == "2")
            {
              $value ='
               <i id="lightorange" class="icon ion-ios-star "></i>
               <i id="lightorange" class="icon ion-ios-star "></i>
               <i id="normalStar" class="icon ion-ios-star- "></i>
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

     // Fetching the time from the database
     $date_time =$myCars["date_time"];

     //Separating date and time
     date_default_timezone_get('Africa/Johannesburg');
     list($date, $time) = explode(' ', $date_time);
     list($year, $month, $day) = explode('-', $date);
     list($hour, $minutes, $seconds) = explode(":", $time);
     // Making the time
     $unit_timestamp = mktime($hour, $minutes, $seconds, $month, $day, $year);
    //date_default_timezone_get('Africa/Johannesburg');
    $differentBetweenCurrentAndTimeStamp = time() - $unit_timestamp;
    $periodStrings = ["sec", "min", "hr", "day", "week","month", "year", "decate"];
    $periodNumber = ["60", "60", "24", "7", "4.35", "12", "10"];

    for($iterator = 0;$differentBetweenCurrentAndTimeStamp >=$periodNumber[$iterator]; $iterator++)
       $differentBetweenCurrentAndTimeStamp  /= $periodNumber[$iterator];
       $differentBetweenCurrentAndTimeStamp = round($differentBetweenCurrentAndTimeStamp);

       if($differentBetweenCurrentAndTimeStamp != 1) $periodStrings[$iterator].='s';
       $myoutput = "$differentBetweenCurrentAndTimeStamp $periodStrings[$iterator]".' '.'ago';
       $tm = time();
      ?>
				<div class="w3-quarter w3-centered ">
				  <div class="w3-card my_cars_cards">
             <div style="height: 2px;background-color: #7f0a0a;width: 100%;"></div>
            <!--<img src="src/tooltips-cd3.jpg" onmouseover="tooltip.pop(this, '#tip2');" alt="" />-->
				     <a class="#"  onmouseover="tooltip.pop(this, '#tip2');" alt="" href="more.php?ref=<?php echo $myCars["car_code"]?>"><img src="admin/uploads/p1/<?php echo $myCars['photo1']?>"></a>
				     <div class="my_Text" style="">
				     	<a href="more.php?ref=<?php echo $myCars["car_code"]?>"  class="mycars_main_make"><h4><b><?php echo $myCars["make_name"]?> <?php echo $myCars["model_name"]?> <?php echo $myCars["year"]?> </b></h4></a>
				       <p><i class="icon ion-model-s my_cars_icons"></i> &nbsp;<?php echo $myCars["state"]?> &nbsp;<i class="icon ion-location my_cars_icons"></i> <?php echo $myCars["area"]?>  <br>
		            <span>Transmission : <b><span class="car_manuf_year"><?php echo $myCars["vehicle_type"]?></span></b>
              </span><br>
				       </p>
               <span><?= $value; ?></span><br>
               <span style="font-size: 10px;color: #acabac;"><i class="ionicon ion-ios-clock-outline "></i> posted <?= $myoutput?></span><br>
               <a class="btn btn-primary btn_mode_details" href="more.php?ref=<?php echo $myCars["car_code"]?>" > More Details...</a><br>
				     </div> 
             <div style="background-color: #800a0a; height: 5px;"></div>
		         </div>
		         </div>
			      <?php
			       }
				  ?>   
	   </div>
     <!--TO BE DISPLAYED ON PICTURE HOVER-->
             <!--<div style="display:none;width: 300px">
                    <div id="tip2" style="">
                       <span>Transmission : <b><span class="car_manuf_year"></span>
                      <h3>PICTURE TOOLTIP</h3>
                        <p>Allows any HTML content contained in the page by <br>
                          just passing the element ID <br>
                        to the tooltip.pop() command.</p>
                    </div>
                </div>-->
      <!--END OF TOOLTIP--->
	 </div>
   </div>
	 <br>
  </div>  

 <?php include('alertIcon.php') ?>
</body>
<?php include('includes/footer.php') ?>
</html>
<script type="text/javascript">
  $(document).ready(function(){

      var make_name_error = false;
      var model_name_error = false;
      var prices_error = false;
      var min_price_error = false;
      var area_name_error = false;

      $("#make_name").focusout(function(){
         check_make_name();
      });
      $("#model_name").focusout(function(){
        chck_model_name();
      });
      $("#min_price").focusout(function(){
        check_min_price();
      })
      $("#prices").focusout(function(){
        check_price();
      });
      $("#area_name").focusout(function(){
        check_area_name();
      });

      function check_make_name()
      {
         var make_name = $("#make_name").val();

         if(make_name !== ''){
           $("#make_name").css('border','1px solid #158f43');
           $("#make_name").css('color','#158f43');
         }else
         {
           $("#make_name").css("border","1px solid #a21d3c");
           $("#make_name").css('color','#6b6b6b');
           make_name_error = true;
         }
      }

      function chck_model_name()
      {
        var model_name = $("#model_name").val();
        if(model_name !== ''){
           $("#model_name").css('border','1px solid #158f43');
           $("#model_name").css('color','#158f43');
         }else
         {
           $("#model_name").css("border","1px solid #a21d3c");
           $("#model_name").css('color','#6b6b6b');
           model_name_error = true;
         }
      }

      function check_min_price(){
        var min_price = $("#min_price").val();
        var prices = $("#prices").val();

        if(min_price !== '')
        {
          $("#min_price").css('border','1px solid #158f43');
          $("#min_price").css('color','#158f43');
        }
        else
        {
          $("#min_price").css("border","1px solid #a21d3c");
          $("#min_price").css('color','#6b6b6b');
          min_price_error = true;
        }
      }

      function check_price()
      {
        var prices = $("#prices").val();
        var min_price = $("$min_price").val();

        if(min_price >= prices)
        {
          alert("min price must be less than max price");
          prices_error = true;
        }

        if(prices !== ''){
           $("#prices").css('border','1px solid #158f43');
           $("#prices").css('color','#158f43');
         }else
         {
           $("#prices").css("border","1px solid #a21d3c");
           $("#prices").css('color','#6b6b6b');
           prices_error = true;
         }
      }

       function check_area_name()
      {
        var area_name = $("#area_name").val();
        if(area_name !== ''){
           $("#area_name").css('border','1px solid #158f43');
           $("#area_name").css('color','#158f43');
         }else
         {
           $("#area_name").css("border","1px solid #a21d3c");
           $("#area_name").css('color','#6b6b6b');
           area_name_error = true;
         }
      }

      $("#main_search_form").on('submit',function(event){
         event.preventDefault();

         if($("#make_name") != '' && $("#model_name") != '' && $("#prices") != '' && $("#area_name") != '' && prices_error == false)
         {
          var main_search_form = $('#main_search_form').serialize();
            $.ajax({
            method : 'POST',
            url : 'searchCars.php',
            data : main_search_form,
            success:function(data){
              $("#searchResults").html(data);

              $("#make_name").val('');
              $("#make_name").css('border','1px solid transparent');
              $("#make_name").css('color','#363637');
              $("#model_name").val('');
              $("#model_name").css('border','1px solid transparent');
              $("#model_name").css('color','#363637');
              $("#area_name").val('');
              $("#area_name").css('border','1px solid transparent');
              $("#area_name").css('color','#363637');
               //console.log(data);
               //alert(data);
              $("#container_hide").fadeOut(1000);

             }
           });
         }else
         {
           $('#');
         }
     });
  });

</script>
<script type="text/javascript">
	$(document).scroll(function(){
	   var form_div = $(this).scrollTop();
	   if(form_div > 200)
	   {
	     $("#form_div").fadeOut('slow');
	   }
	   else
	   {
	   	 $("#form_div").fadeIn(2000);
	   }
	});
</script>

