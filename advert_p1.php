<?php
  session_start();
  include('includes/db.php');
  include('includes/header.php');
  //Tshilanda88
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style type="text/css">
		.advert_form_div select 
		 {
		   margin-bottom: 10px;
		   border-radius:0px;
		   border:solid 1px #787878;
		 }
		 .advert_form_div input
		 {
		 	border-radius:0px;
		 	border: solid 1px #787878;
		 	margin-bottom: 10px;
		 }
		 .advert_form_div textarea
		 {
		 	border-radius:0px;
		 	border: solid 1px #787878;
		 	margin-bottom: 10px;
		 }
		 .btn_advertise
		 {
		 	background-color: #0c3272;
		 	font-size: 17px;color: #fff;
		 	margin-top: 20px;
		 	border-radius: 0px;
      padding: 7px 55px;
      transition: 0.5s;
		 }
      .btn_advertise:hover
     {
      border:solid 1px #0c3272;
      font-size: 17px;
      color: #0c3272;
      margin-top: 20px;
      border-radius: 0px;
      padding: 7px 55px;
     }
		 .vehicle_info
		 {
		 	font-size: 20px;color: #7f0a0a;
      background-color:lightgray;
      padding:10px ;padding: 10px;
		 }

  .input-file-container {
  position: relative;
  width: 100%;
} 
.js .input-file-trigger {
  display: block;
  padding: 10px 20px;
  background: #39D2B4;
  text-align: center;
  color: #fff;
  font-size: 1em;
  transition: all .4s;
  cursor: pointer;
}
.js .input-file {
  position: absolute;
  top: 0; left: 0;
  width: 225px;
  opacity: 0;
  padding: 14px 0;
  cursor: pointer;
}
.js .input-file:hover + .input-file-trigger,
.js .input-file:focus + .input-file-trigger,
.js .input-file-trigger:hover,
.js .input-file-trigger:focus {
  background: #34495E;
  color: #39D2B4;
}

.file-return {
  margin: 0;
}
.file-return:not(:empty) {
  margin: 1em 0;
}
.js .file-return {
  font-style: italic;
  font-size: .9em;
  font-weight: bold;
}
.js .file-return:not(:empty):before {
  content: "Selected file: ";
  font-style: normal;
  font-weight: normal;
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
	<div class="container-fluid" id="main_container">
	<div class="container">
		<br><br>
		<div class="row">
			<div class="col-md-8">
				<div class="advert_form_div">
					<p class="vehicle_info">VEHICLE INFO</p>
					<form method="POST" id="main_search_form" action="searchCars.php">
				      
				        	<div class="row">
				        		<div class="col-md-4">
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
				        		<div class="col-md-4">
                       <div class="borderMethod">
				        			 <select class="form-control" name="model_name" id="model_name" required="required"> 
							            <option value="">Select Vehicle Model</option>    
							         </select>
                     </div>
				        		</div>
				        		<div class="col-md-4">
				        			 <div class="borderMethod">
				        			<select class="form-control" name="transmission" id="transmission" required="required">
				                       <option value="">Select Transmission</option>           
				                       <option value="Manual">Manual Vehicle</option> 
				                       <option value="Automatic">Automatic Vehicle</option> 
				                     </select>
				        		</div>
				        	</div>
				        </div>
				   
		       <div class="row">
                <div class="col-md-4 col-sm-4">
                   <div class="borderMethod">
                    <select class="form-control" name="body_type" id="body_type" required="required">
                       <option value="">Select Body Type</option>
                       <option value="Hatchbacks">Hatchbacks</option>
                       <option value="sedans">Sedans</option>
                       <option value="SUV's">SUV's</option>
                       <option value="MPV'S">MPV'S</option>
                       <option value="Bakkies">Bakkies</option>
                       <option value="Double Cabs">Double Cabs</option> 
                       <option value="Coupe's">Coupe's</option> 
                       <option value="Cabriolets">Cabriolets</option>
                       <option value="Station Wagons">Station Wagons</option>                 
                   </select>
                 </div>
               </div> 
                <div class="col-md-4 col-sm-4">  <div class="borderMethod">                  
                     <select class="form-control" name="fuel_type" id="fuel_type" required="required">
                       <option value="">Select Fuel Type</option>           
                       <option value="Diesel">Diesel</option> 
                       <option value="Electric">Electric</option>
                       <option value="Hibrid">Hibrid</option>  
                       <option value="Petrol">Petrol</option> 
                     </select>
                 </div>
                </div>
                <div class="col-md-4 col-sm-4">
                   <div class="borderMethod">
                     <select class="form-control" name="max_mileague" id="max_mileague" required="required" >
                       <option value="">Select Max Mileague</option>        
                       <option value="0 Km">0 Km</option> 
                       <option value="10 000 Km">10 000 Km</option> 
                       <option value="15 000 Km">15 000 Km</option>
                       <option value="20 000 Km">20 000 Km</option> 
                       <option value="25 000 Km">25 000 Km</option> 
                       <option value="30 000 Km">30 000 Km</option> 
                       <option value="40 000 Km">40 000 Km</option> 
                       <option value="50 000 Km">50 000 Km</option>
                       <option value="60 000 Km">60 000 Km</option>
                       <option value="70 000 Km">70 000 Km</option>
                       <option value="80 000 Km">80 000 Km</option>
                       <option value="90 000 Km">90 000 Km</option>
                       <option value="100 000 Km">100 000 Km</option> 
                       <option value="125 000 Km">125 000 Km</option>
                       <option value="150 000 Km">150 000 Km</option>
                       <option value="175 000 Km">175 000 Km</option>
                       <option value="200 000 Km">200 000 Km</option>  
                     </select></div>
              </div>
          </div>
          <div class="row">
               <div class="col-md-4 col-sm-4">
                <div class="borderMethod">
                   <select class="form-control" id="carState" name="carState" required="required">
                     <option value="">Select Car State</option>
                     <option value="new car">New Car</option>
                     <option value="used car">Used Car</option>
                  </select>
                </div>
               </div>
               <div class="col-md-4 col-sm-4">
                <div class="borderMethod">
                 <select class="form-control" name="area_name" id="area_name" required="required">
                   <option value=""  >Select Area Of the Vehicle</option>           
                     <?php
                      $getArea = $db->query('SELECT * FROM area_table ORDER BY area_name ASC ');
                      while($res = $getArea->fetch())
                      {
                        ?>
                         <option value="<?php echo $res["area_name"]?>"><?php echo $res['area_name'] ?></option>
                        <?
                      }
                     ?>
                 </select>
               </div>
           
               </div>
                <div class="col-md-4 col-sm-4"> 
                 <input type="number" name="door_number" id="door_number" class="form-control" placeholder="Number of Doors (e.g : 4)" required="required" />
              </div>
            </div>
			<div class="row">
               <div class="col-md-4 col-sm-4">
                <div class="borderMethod">
                  <select class="form-control" id="year" name="year" required="required">
                     <option value="">Select Car Production Year</option>
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
                </div>
               </div>                
               <div class="col-md-4 col-sm-4">
               <div class="borderMethod">                    
                  <select class="form-control" id="color" name="color" required="required">
                     <option value="">Select Car color</option>
                     <option value="Black">Black </option>
                     <option value="Blue">Blue</option>
                     <option value="Grey">Grey</option>
                     <option value="Red">Red</option>
                     <option value="Silver">Silver</option>
                     <option value="Yellow">Yellow</option>
                     <option value="White">White</option>
                     <option value="Other">Other</option>
                  </select>
                </div>
                </div>
               <div class="col-md-4 col-sm-4">        
                  <input type="number" name="price" id="price" class="form-control" placeholder="R30 000" required="required" />
                </div>
            </div>
            
            <div class="row">
            	<div class="col-md-4 col-sm-4">
            		<textarea name="short_description" id="short_description" class="form-control" cols="7" rows="5" placeholder="Vehicle Description"></textarea>
            	</div>
            	<div class="col-md-4 col-sm-4">
            		<textarea name="more_options" id="more_options" class="form-control" cols="7" rows="5" placeholder="More Options(air-conditionig)"></textarea>
            	</div>
            	<div class="col-md-4 col-sm-4">
            		 <div class="input-file-container">  
                  <input class="input-file" id="my-file" type="file" multiple="">
                  <label tabindex="0" for="my-file" class="input-file-trigger"> <i class="icon ion-images"></i> Select up to 9 images</label>
                </div>
                <p class="file-return"></p>
            	</div>
            </div>

            <div class="row">

            	<p style="margin-left:15px;font-size: 20px;color: #7f0a0a;">DEALER'S INFO</p>
            	<div class="col-md-4 col-sm-4">
            		<input type="text" name="dealer_name" id="dealer_name" class="form-control" placeholder="Dealer's Name">
            	</div>
            	<div class="col-md-4 col-sm-4">
            		<input type="number" name="dealer_contact" id="dealer_contact" class="form-control" placeholder="Contact Number">
            	</div>
            	<div class="col-md-4 col-sm-4">
            		<input type="email" name="dealer_email" id="dealer_email" class="form-control" placeholder="Email address">
            	</div>
            </div>		      
       			
			<div class="form-group">
				<button type="submit" class="btn btn-default btn_advertise" id="btn_advertise" name="btn_advertise"><i class="icon ion-ios-plus-outline"></i> SUBMIT </button>
			</div>
				
			</div>
			</form>
			</div>
			<div class="col-md-4">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="item active">
        <img src="img/advert4.jpg" alt="Los Angeles" width="100%">
      </div>

      <div class="item">
        <img src="img/advert5.jpg" alt="Chicago" width="100%">
      </div>
    
      <div class="item">
        <img src="img/advert3.jpg" alt="New york" width="100%">
      </div>
    </div>
    
  </div>
				<!--<div style="padding: 0px 40px;">
				<img src="img/advert4.jpg">
				<br><br>
			</div>-->
      <br><br>
		</div>
	</div>
	</div>
</div>


<?php include('alertIcon.php') ?>
<?php include('includes/footer.php') ?>
</body>
</html>
<script type="text/javascript">
document.querySelector("html").classList.add('js');

var fileInput  = document.querySelector( ".input-file" ),  
    button     = document.querySelector( ".input-file-trigger" ),
    the_return = document.querySelector(".file-return");
      
button.addEventListener( "keydown", function( event ) {  
    if ( event.keyCode == 13 || event.keyCode == 32 ) {  
        fileInput.focus();  
    }  
});
button.addEventListener( "click", function( event ) {
   fileInput.focus();
   return false;
});  
fileInput.addEventListener( "change", function( event ) {  
    the_return.innerHTML = this.value;  
});  
</script>