<?php
  session_start();
  include('includes/db.php');
  include('includes/header.php');

   $getCars = $db->query('SELECT * FROM car_data WHERE state="used car" ORDER BY car_id DESC');
   $carCount = $getCars->rowCount();

   if($carCount > 0)
   {
   	  $carCount = $carCount;
   }else{
   	$carCount = 0;
   }

?>
<!DOCTYPE html>
<html>
<head>
<title>used_cars</title>
<link rel="stylesheet" type="text/css" href="css/used.css">

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
    
	
</style>
</head>
<body>
	<div class="container-fluid" id="after_menu">
		<br>
		<span style="" class="all_new_cars_title"><?= $carCount; ?> Used Cars</span><br>
		<span>Browse through our list | Search your favorite</span>
	</div>
	<!--MINI SEARCh FORM-->
	<div class="container">
		<div class="mini_search">
			<div class="min_search_data" align="center">
			<form method="POST" id="mini_search_form" >
				 <div class="form-group">
				 	 <div class="row"> 
				 	 	<div class="col-md-3">
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
                     <div class="col-md-3">
                     	<div class="borderMethod">
                      <select class="form-control" name="model_name" id="model_name" required="required"> 
                        <option value="">Select Vehicle Model</option>
                        </select>       
                     </div>
                     <span class="form_error" id="model_name_error"></span>
                     </div>
                     <div class="col-md-3">
                      <div class="borderMethod">
                     	<select class="form-control" id="year" name="year" required="required">
                         <option value="">Vehicle Production Year</option>
                         <option value="2008">2008</option>
                         <option value="2009">2009</option>
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
		   	 				      <button class="btn btn-warning btn-xs" name="get_alert" id="get_alert"><i class="icon ion-ios-bell animated bounce"></i> Get Alerts</button> &nbsp;&nbsp;<a href="more.php?ref=<?php echo $row["car_code"]?>" class="btn btn-primary btn-xs" name="read_more" id="read_more"><i class="icon ion-information-circled"></i> Read More</a>
		   	 			    
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
		   	</div><br>
		   	 <?php
		   }
       ?>
		<br><br><br><br>
  <?php include('alertIcon.php') ?>

 </div>
</div>
	
</body>
<?php include('includes/scroll.php')?>
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
                   url:'userCarSearch.php',
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
}
</script>