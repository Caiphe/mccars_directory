<?php
  session_start();
  include('includes/db.php');
  include('includes/header.php');
   $getCars = $db->query('SELECT * FROM car_data WHERE state="new car" ORDER BY car_id DESC');
   $carCount = $getCars->rowCount();
   if($carCount > 0)
   {
   	  $carCount = $carCount;
   }else{
   	$carCount = 0;
   }
   if(isset($_POST["submit_alert"])){
  	$alert_email = htmlspecialchars($_POST["alert_email"]);
  	if(empty($_POST["alert_email"])){
  		$error = "Valid email required";
  	}
  	else
  	{
  		if(!filter_var($alert_email, FILTER_VALIDATE_EMAIL)){
  			$error ="Valid email required";
  		}else
  		{
  			$CheckExist = $db->prepare("SELECT * FROM alert_email WHERE email_alert = ?");
  			$CheckExist->execute(array($alert_email));
  			$emailCount = $CheckExist->rowCount();

  			if($emailCount > 0){
  				$error ="Email Exist already";
  			}
  			else{
  				$slqAlertEmail = $db->prepare("INSERT INTO alert_email (email_alert)VALUES(?)");
	  			$slqAlertEmail->execute(array($alert_email));
	  			$alert_success = "Thank you.You'll be email when a new car";
  			}  			
  		}
  	 }
  }

?>
<!DOCTYPE html>
<html>
<head>
<title>used_cars</title>
<style type="text/css">
	/*the container must be positioned relative:*/
.custom-select {
  position: relative;
  font-family: Arial;
}
.custom-select select {
  display: none; /*hide original SELECT element:*/
}
.select-selected {
  background-color: #800a0a;
}
/*style the arrow inside the select element:*/
.select-selected:after {
  position: absolute;
  content: "";
  top: 14px;
  right: 10px;
  width: 0;
  height: 0;
  border: 6px solid transparent;
  border-color: #fff transparent transparent transparent;
}
/*point the arrow upwards when the select box is open (active):*/
.select-selected.select-arrow-active:after {
  border-color: transparent transparent #fff transparent;
  top: 7px;
}
/*style the items (options), including the selected item:*/
.select-items div,.select-selected {
  color: #ffffff;
  padding: 8px 16px;
  border: 1px solid transparent;
  border-color: transparent transparent rgba(0, 0, 0, 0.1) transparent;
  cursor: pointer;
  user-select: none;
}
/*style items (options):*/
.select-items {
  position: absolute;
  background-color: #800a4f;
  top: 100%;
  left: 0;
  right: 0;
  z-index: 99;
}
/*hide the items when the select box is closed:*/
.select-hide {
  display: none;
}
.select-items div:hover, .same-as-selected {
  background-color: rgba(0, 0, 0, 0.1);
}
#mini_search_form select
{
	margin-bottom: 3px;
	box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.2), 0 2px 4px 0 rgba(0, 0, 0, 0.19);
	border:solid 1px #909090;
}
</style>
<script type="text/javascript">
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
<style type="text/css">
	.custom-select 
	{
	  position: relative;
	  font-family: Arial;
	}
	.custom-select select 
	{
	  //display: none; /*hide original SELECT element:*/
	}
	.select-selected 
	{
	  background-color: #6b084b;
	  box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.2), 0 2px 4px 0 rgba(0, 0, 0, 0.19);
	  border:solid 1px #073154;
	}
	/*style the arrow inside the select element:*/
	.select-selected:after 
	{
	  position: absolute;
	  content: "";
	  top: 14px;
	  right: 10px;
	  width: 0;
	  height: 0;
	  border: 6px solid transparent;
	  border-color: #fff transparent transparent transparent;
	}
	/*point the arrow upwards when the select box is open (active):*/
	.select-selected.select-arrow-active:after 
	{
	  border-color: transparent transparent #fff transparent;
	  top: 7px;
	}
	/*style the items (options), including the selected item:*/
	.select-items div,.select-selected 
	{
	  color: #fff;
	  text-align: justify;
	  padding: 8px 16px;
	  border: 1px solid transparent;
	  border-color: transparent transparent rgba(0, 0, 0, 0.1) transparent;
	  cursor: pointer;
	  user-select: none;
	}
	/*style items (options):*/
	.select-items {
	  position: absolute;
	  background-color: #800a4f;
	  top: 100%;
	  left: 0;
	  right: 0;
	  z-index: 99;
	}
	/*hide the items when the select box is closed:*/
	.select-hide {
	  display: none;
	}
	.select-items div:hover, .same-as-selected {
	  background-color: rgba(0, 0, 0, 0.1);
	}
	/*End of selectCustom*/

    .thumbnail
    {
    	background-color: transparent;
    	background: transparent;
    	border:solid 2px transparent;
    	color: transparent;
    }
	.news_cars_main_table
	{
		font-size: 13px;
		color: #8a8787;
		text-align: justify;
	}
	.news_cars_thumnail
	{
		border:solid 1px transparent !important;
	}
	#new_car_main_image
	{
		border-radius: 0px;
		border:0px;
		//height: 170px;
		width: 100%;
		box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.2), 0 2px 4px 0 rgba(0, 0, 0, 0.19);
	}
	.main_user_car_title
	{
		font-size: 18px;
	    font-weight: bold;
	    color: #7f0a0a;
	    text-align: justify;
	    text-decoration-style: none;
	    text-decoration: none;
	}
	.news_car_details
	{
		background-color: #fff;
		border:0px;
	}
	.news_car_details:over
	{
		background-color: #7f0a0a;
		color: white;
	}
	.new_car_details_info
	{
		padding: 10px;
	}
	.news_cars_span_year
	{
		font-style: 
	}
	#new_car_price
	{
		float: right;
		font-size: 23px;
		margin-top: -55px;
		z-index: 9999;
		font-weight: bold;
		color: #c2580b;
	}
	#availability
	{
		float: right;
		font-size: 18px;
		margin-top: -20px;
		z-index: 9999;
		font-weight: bold;
		color: #103a89;
		-webkit-animation-iteration-count:infinite;
		-webkit-animation-duration:4s;
	}
	#bottom_buttons
	{
		float: right;
	}
	#get_alert
	{
		text-decoration: none;
		text-decoration-style: none;
		text-decoration-line: none;
		text-align: center;
		background-color: #ee560b;
		border:solid 1px transparent !important;
		transition: 0.5s;
	}
	#get_alert:hover
	{
		background-color: #883810;
		color: white;
	}
	#read_more
	{
		text-decoration: none;
		text-decoration-style: none;
		text-decoration-line: none;
		text-align: center;
		background-color: #0B7A3E;
		transition: 0.5s;
	}
	#read_more:hover
	{
		background-color: #063f22;
		color: white;
	}
	.alert_box
	{
		display: none;
		position: fixed;
		z-index: 9999;
		margin-bottom: 10px;
		margin-left: 10px;
		width: 300px;
		height: 220px;
		background-color: #7f0a0a;
		border-radius: 10px;
		left: 0;
		bottom: 0;
	}
	.alert_form
	{
		padding: 10px;
	}
	#after_menu
	{
		width: 100%;
		height: 120px;
		text-align: center;
		color: white;
		background: #68001f; 
		background: -moz-linear-gradient(left, #68001f 0%, #590019 53%, #a00063 100%); 
		background: -webkit-linear-gradient(left, #68001f 0%,#590019 53%,#a00063 100%); 
		background: linear-gradient(to right, #68001f 0%,#590019 53%,#a00063 100%); 
		filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#68001f', endColorstr='#a00063',GradientType=1 ); 
	}
	.all_new_cars_title
	{
		font-size: 30px;
	}
	.alert_form p
	{
		font-style: italic;
		font-size: 11px;
		color: white;
		font-weight: bold;
		text-align: center;
	}
	.alert_form input
	{
		border-radius:0px;
	}
	#bell_icon
	{
		-webkit-animation-iteration-count:infinite;
		-webkit-animation-duration:2s;

	}
	.btn_alert_submit
	{
		background-color: #640707;
		border:solid 1px white;
		color: white;
		border-radius: 0px;
		transition: 0.5s;
		width: 100%;
		transition: 1s;
	}
	.btn_alert_submit:hover
	{
	   background-color: #350404;
	   color: white;
	}
	.btn_close
	{
		color: white;
		font-size: 17px;
	}
	#myError
	{
		padding: 5px;
		background-color: #7f0a0a;
		border-radius: 10px;
		text-align: center;
		color: white;
		width: 300px;
		z-index: 9999;
	}
	.my_model_name
	{
		text-decoration: none;
	}
	.my_model_name:hover
	{
		text-decoration: none;
	}
	.separator
	{
		height: 10px;
	}
	.mini_search
	{
		padding:20px;
		background-color: #e8e8e8;
	}
	.min_search_data
	{
		margin: auto 2px;
	}
	#submit_mini_search
	{
		background-color: #6f0747;
		color: white;
		border-radius: 0px;
		border:solid 1px #fff;
		font-size: 16px;
		padding: 5px 15px;
		transition:1s;
		padding: 8px 10px;
		box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.2), 0 1px 4px 0 rgba(0, 0, 0, 0.19);
	}
	#submit_mini_search:hover
	{
		background-color: #4a071f;
		color: white;
		border:solid 1px #fff;
	}
	.form_error
	{
		z-index: 99999;
	}
	.borderMethod select
	{
		margin-bottom: 10px;
	}
	
	/*select_div option
	{
		background-color: #6b084b;
		color: white;
		transition: 1s;
		padding: 3px 10px; 
		font-size: 14px;
		margin-bottom: 5px;
	}
	select_div option:hover .same-as-selected
	{
		background-color: red;
		color: black;
	}*/
	.car_min_info
	{
		margin-top: 5px;
	}
	
</style>
</head>
<body>
	<div class="container-fluid" id="after_menu">
		<br>
		<span style="" class="all_new_cars_title"><?= $carCount; ?> New Cars</span><br>
		<span>Browse through our list | Search your favorit</span>
	</div>
	<!--MINI SEARCh FORM-->
	<div class="container">
		<div class="mini_search">
			<div class="min_search_data" align="center">
			<form method="POST" id="mini_search_form" >
				 <div class="form-group">
				 	 <div class="row"> 
				 	 	<div class="col-md-3" id="select_div">
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
		    
	                   <span class="form_error" id="make_name_error"></span>
	               </div>
                     </div>
                     <div class="col-md-3">
                   <div class="borderMethod">
                      <select class="form-control" name="model_name" id="model_name" required="required"> 
                        <option value="">Select Vehicle Model</option>       
                     </select>
                     <span class="form_error" id="model_name_error"></span>
                   </div>
                     </div>
                     <div class="col-md-3 ">
                     	<div class="borderMethod">
                     	<select class="form-control " id="year" name="year" required="required">
                          <option value="">Vehicle Production Year</option>
                          <option value="2010">2010</option>
                          <option value="2011">2011</option>
                          <option value="2012">2012</option>
                          <option value="2013">2013</option>
                          <option value="2014">2014</option>
                          <option value="2015">2015</option>
                          <option value="2016">2016</option>
                          <option value="2017">2017</option>
                          <option value="2018">2018</option>
                          <option value="2019">2019</option>
                          <option value="2020">2020</option>
                      </select>
                      <span class="form_error" id="year_error"></span>
                  </div>
                   
                 </div>
                     <div class="col-md-3">
                     	<button class="btn btn-default btn-block" type="submit" name="submit_mini_search" id="submit_mini_search" ><i class="icon ion-ios-search"></i> SEARCH</button>
                     </div>
               </div>
            </div> 
			</form>
		</div>
	  </div>
	</div>

   <div  class="container-fluid">
   	<div class="contaier" id="show_result"></div>
   	
   </div>

   <div class="w3-animate-zoom" id="hide_dv">		
	<div class="w3-container w3-center myMainCont">
		<br>
       <?php
           while($row = $getCars->fetch())
		   {
		   	
		   	 ?>
		   	 <div class="container">
		   	 <div class="row">
		   	 	<div class="col-md-3">
		   	 	 <a class="thumbnail news_cars_thumnail" href="more.php?ref=<?php echo $row["car_code"]?>"  ><img id="new_car_main_image" src="admin/uploads/p1/<?php echo $row['photo1']?>"></a>
		   	 	</div>
		   	 	<div class="col-md-6">
                 <div class="car_min_info">
		   	 	  <div style="height: 2px;background-color: #7f0a0a;"></div>
		   	 		<div class="news_car_details">
		   	 		  <div class="new_car_details_info">

		   	 			<p class="main_user_car_title"><i class="icon ion-model-s"></i> 
		   	 				<span style="font-size: 12px;color:#8b8b8b;"><?php echo $row["make_name"]?></span><br>
		   	 				 <a class="my_model_name" href="more.php?ref=<?php echo $row["car_code"]?>" "><?php echo $row["model_name"]?> </a></p>

		   	 			<h5 class="new_car_price" id="new_car_price"> &nbsp; <i class="icon ion-ios-pricetags"></i>&nbsp;&nbsp;R<?php echo number_format($row["price"]) ?></h5>
		   	 			<table class=" news_cars_main_table">
		   	 				<tr>
		   	 					<td><i class="icon ion-android-pin"></i> <?php echo $row["area"]?> <i class="icon ion-model-s"></i> <?php echo $row["state"]?> </td>
		   	 				</tr>
		   	 				<tr>
		   	 					<td><i class="icon ion-model-s"></i> <?php echo $row["year"]?>&nbsp;<?php echo $row["make_name"] ?>&nbsp;<?php echo $row["model_name"]?> <?php echo  $row["body_type"]?>&nbsp;<?php echo $row["vehicle_type"]?>&nbsp;
		   	 						<i class="icon ion-paintbrush"></i> <?php echo $row["color"]?></td>
		   	 				</tr>
		   	 				
		   	 				<tr>
		   	 					<td><i class="icon ion-android-call"></i> <span style="text-decoration-style: none;text-decoration-line: none;text-decoration:none;"><?php echo $row["dealer_contact"]?></span> &nbsp; | &nbsp; <i class="icon ion-ios-email"></i> <?php echo $row["dealer_email"]?></td>
		   	 				</tr>
		   	 				<tr>
		   	 					<td>---------------------------------------------------------------</td>
		   	 				</tr>
		   	 				<tr>
		   	 					<td>
		   	 				      <a class="btn btn-warning btn-xs" name="get_alert" id="get_alert"><i class="icon ion-ios-bell animated bounce"></i> Get Alerts</a> &nbsp;&nbsp;
		   	 				      <a href="more.php?ref=<?php echo $row["car_code"]?>" class="btn btn-primary btn-xs" name="read_more" id="read_more"><i class="icon ion-information-circled"></i> Read More</a>
		   	 			    
		   	 					</td>
		   	 				</tr>
		   	 			</table>
		   	 			<h5 class="availability animated flash" id="availability"> <?php echo $row["avalaibility"]?></h5>
		   	 		  </div>
		   	 		</div>
		   	 	</div>
		   	 	</div>
		   	 	<div class="col-md-3">
		   	 		<div class="row">
		   	 			<div class="col-md-6">
		   	 				<a class="thumbnail news_cars_thumnail"><img id="new_car_small" src="admin/uploads/p4/<?php echo $row['photo4']?>"></a>
		   	 			</div>
		   	 			<div class="col-md-6">
		   	 				<a class="thumbnail news_cars_thumnail"><img id="new_car_small" src="admin/uploads/p2/<?php echo $row['photo2']?>"></a>
		   	 			</div>
		   	 		</div>
		   	 		<div class="row">
		   	 			<div class="col-md-6">
		   	 			<a class="thumbnail news_cars_thumnail"><img id="new_car_small" src="admin/uploads/p3/<?php echo $row['photo3']?>"></a>
		   	 			</div>
		   	 			<div class="col-md-6">
		   	 				<a class="thumbnail news_cars_thumnail"><img id="new_car_small" src="admin/uploads/p5/<?php echo $row['photo5']?>"></a>
		   	 			</div>
		   	 		</div>
		   	 	</div>
		   	 </div>
		   	</div>
		   	<br><br>
		   	 <?php
		   }
       ?>
		<br><br><br><br>
 </div>
</div>
</body>
<?php include('alertIcon.php') ?>
<?php include('includes/footer.php') ?>
</html>
<script type="text/javascript">
	$(document).ready(function(){
        $("#get_alert").click(function(){
           $(".alert_box").fadeIn(1000);
        });

	});
</script>
<script type="text/javascript">
	
</script>
<script type="text/javascript">
	$(function(){

		$("#make_name_error").hide();
		$("#model_name_error").hide();
		$("#year_error").hide();

		var error_mkname = false;
		var error_mdname = false;
		var error_proyear = false;

		$("#model_name").focusout(function(){
			check_model_name();
		});

		$("#make_name").focusout(function(){
			check_make_name();
		});
		$("#year").focusout(function(){
            check_year();
		});

		function check_make_name(){
			var make_name = $("#make_name").val();
			if(make_name !== ''){
				//$("#make_name_error").hide();
				$("#make_name").css("border","1px solid #0d5039");
			}else{
				//$("#make_name_error").html("Select Make in the list");
				//$("#make_name_error").show();
				//$("#make_name_error").css("color","#a21d3c");
				$("#make_name").css("border","1px solid #a21d3c");
				error_mkname = true;
			}
		}
		function check_model_name(){
			var model_name = $("#model_name").val();
			if(model_name !== '')
			{
				//$("#model_name_error").hide();
				$("#model_name").css("border","1px solid #0d5039");
			}
			else{
				//$("#model_name_error").html("Select Model Name n the list");
				//$("#model_name_error").show();
				//$("#model_name_error").css("color","#a21d3c");
				$("#model_name").css("border","1px solid #a21d3c");
				error_mdname = true;
			}
		}

		function check_year(){
			var year = $("#year").val();
			if(year !== '')
			{
				//$("#year_error").hide();
				$("#year").css("border","1px solid #0d5039");
			}
			else{
				//$("#year_error").html("Select production year ");
				//$("#year_error").show();
				//$("#year_error").css("color","#a21d3c");
				$("#year").css("border","1px solid #a21d3c");
				error_mdname = true;
			}
		}

		$("#mini_search_form").on('submit', function(event){
			event.preventDefault();
            if($("#make_name") != '' && $("#model_name") != '' && $("#year") != '')
            {
            	var myForm = $("#mini_search_form").serialize();
            	$.ajax({
                   method:'POST',
                   url:'newCarsSearch.php',
                   data : myForm,
                   success:function(data)
                   {
                      //console.log(data);
                   	  $("#show_result").html(data);
                      $("#hide_dv").fadeOut(500);
                      $("#make_name").css("border","1px solid #313131");

                      $("#model_name").css("border","1px solid #313131");
                      $("#year").css("border","1px solid #313131");
                      $("#make_name").val('');
                      $("#model_name").val('');
                      $("#year").val('');

                   }
            	});
            }
		});

	});
</script>
<script>
var x, i, j, selElmnt, a, b, c;
/*look for any elements with the class "custom-select":*/
x = document.getElementsByClassName("custom-select");
for (i = 0; i < x.length; i++) {
  selElmnt = x[i].getElementsByTagName("select")[0];
  /*for each element, create a new DIV that will act as the selected item:*/
  a = document.createElement("DIV");
  a.setAttribute("class", "select-selected");
  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
  x[i].appendChild(a);
  /*for each element, create a new DIV that will contain the option list:*/
  b = document.createElement("DIV");
  b.setAttribute("class", "select-items select-hide");
  for (j = 0; j < selElmnt.length; j++) {
    /*for each option in the original select element,
    create a new DIV that will act as an option item:*/
    c = document.createElement("DIV");
    c.innerHTML = selElmnt.options[j].innerHTML;
    c.addEventListener("click", function(e) {
        /*when an item is clicked, update the original select box,
        and the selected item:*/
        var y, i, k, s, h;
        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
        h = this.parentNode.previousSibling;
        for (i = 0; i < s.length; i++) {
          if (s.options[i].innerHTML == this.innerHTML) {
            s.selectedIndex = i;
            h.innerHTML = this.innerHTML;
            y = this.parentNode.getElementsByClassName("same-as-selected");
            for (k = 0; k < y.length; k++) {
              y[k].removeAttribute("class");
            }
            this.setAttribute("class", "same-as-selected");
            break;
          }
        }
        h.click();
    });
    b.appendChild(c);
  }
  x[i].appendChild(b);
  a.addEventListener("click", function(e) {
      /*when the select box is clicked, close any other select boxes,
      and open/close the current select box:*/
      e.stopPropagation();
      closeAllSelect(this);
      this.nextSibling.classList.toggle("select-hide");
      this.classList.toggle("select-arrow-active");
    });
}
function closeAllSelect(elmnt) {
  /*a function that will close all select boxes in the document,
  except the current select box:*/
  var x, y, i, arrNo = [];
  x = document.getElementsByClassName("select-items");
  y = document.getElementsByClassName("select-selected");
  for (i = 0; i < y.length; i++) {
    if (elmnt == y[i]) {
      arrNo.push(i)
    } else {
      y[i].classList.remove("select-arrow-active");
    }
  }
  for (i = 0; i < x.length; i++) {
    if (arrNo.indexOf(i)) {
      x[i].classList.add("select-hide");
    }
  }
}
/*if the user clicks anywhere outside the select box,
then close all select boxes:*/
document.addEventListener("click", closeAllSelect);</script>

</script>
