<?php
 session_start();
 include('../includes/db.php');
 if(!isset($_SESSION["username"]))
 {
   header('location:login.php');
 }
 if(isset($_POST["submit"]))
 {
     //Car info
     $make_name = htmlspecialchars($_POST["make_name"]);
     $model_name = htmlspecialchars($_POST["model_name"]);
     $vehicle_type = htmlspecialchars($_POST["vehicle_type"]);
     $body_type = htmlspecialchars($_POST["body_type"]);
     $fuel_type = htmlspecialchars($_POST["fuel_type"]);
     $max_mileague = htmlspecialchars($_POST["max_mileague"]);
     $year = htmlspecialchars($_POST["year"]);
     $price = htmlspecialchars($_POST["price"]);
     $color = htmlspecialchars($_POST["color"]);
     $carState = htmlspecialchars($_POST["carState"]);
     $area_name = htmlspecialchars($_POST["area_name"]);
     $door_number = htmlspecialchars($_POST["door_number"]);
     $available = htmlspecialchars($_POST["available"]);
     $on_sale = htmlspecialchars($_POST["on_sale"]);
     $madein =htmlspecialchars($_POST["madein"]);
     $short_description = htmlspecialchars($_POST["short_description"]);
     $car_rate = htmlspecialchars($_POST["car_rate"]);
     $more_options = htmlspecialchars($_POST["more_options"]);
    
     // UNIQUE CAR CODE
     $date = date('Y');
     $rand = rand(10000, 100000);
     $car_code = sha1($make_name);
     $unic_car_code = ($car_code.$date.$rand);

     //Dealer Info 
     $dealer_name = htmlspecialchars($_POST["dealer_name"]);
     $dealer_contact = htmlspecialchars($_POST["dealer_contact"]);
     $dealer_email = htmlspecialchars($_POST["dealer_email"]);
     $dealer_address = htmlspecialchars($_POST["dealer_address"]);
     $registered_by = $_SESSION["username"];
     
     //Image PHP
     $image1 = $_FILES['photo1']['name'];
     $tmp_dir1=$_FILES['photo1']['tmp_name'];
     $imageSize3 = $_FILES['photo1']['size'];
     $upload_dir1='uploads/p1/';

     $image2 = $_FILES['photo2']['name'];
     $tmp_dir2=$_FILES['photo2']['tmp_name'];
     $imageSize2 = $_FILES['photo2']['size'];
     $upload_dir2='uploads/p2/';

     $image3 = $_FILES['photo3']['name'];
     $tmp_dir3=$_FILES['photo3']['tmp_name'];
     $imageSize3 = $_FILES['photo3']['size'];
     $upload_dir3='uploads/p3/';

     $image4 = $_FILES['photo4']['name'];
     $tmp_dir4=$_FILES['photo4']['tmp_name'];
     $imageSize4 = $_FILES['photo4']['size'];
     $upload_dir4='uploads/p4/';

     $image5 = $_FILES['photo5']['name'];
     $tmp_dir5=$_FILES['photo5']['tmp_name'];
     $imageSize5 = $_FILES['photo5']['size'];
     $upload_dir5='uploads/p5/';

     $image6 = $_FILES['photo6']['name'];
     $tmp_dir6=$_FILES['photo6']['tmp_name'];
     $imageSize6 = $_FILES['photo6']['size'];
     $upload_dir6='uploads/p6/';

     $image7 = $_FILES['photo7']['name'];
     $tmp_dir7=$_FILES['photo7']['tmp_name'];
     $imageSize7 = $_FILES['photo7']['size'];
     $upload_dir7='uploads/p7/';

     $image8 = $_FILES['photo8']['name'];
     $tmp_dir8=$_FILES['photo8']['tmp_name'];
     $imageSize8 = $_FILES['photo8']['size'];
     $upload_dir8='uploads/p8/';

     $image9 = $_FILES['photo9']['name'];
     $tmp_dir9=$_FILES['photo9']['tmp_name'];
     $imageSize9 = $_FILES['photo9']['size'];
     $upload_dir9='uploads/p9/';

     $imgExt = strtolower(pathinfo($image1,PATHINFO_EXTENSION));
     $valid_extension =array('jpeg', 'jpg', 'gif', 'png');
     $car_pic1 = rand(1000, 1000000).".".$imgExt;
     move_uploaded_file($tmp_dir1, $upload_dir1.$car_pic1);

     $imgExt = strtolower(pathinfo($image2,PATHINFO_EXTENSION));
     $valid_extension =array('jpeg', 'jpg', 'gif', 'png');
     $car_pic2 = rand(1000, 1000000).".".$imgExt;
     move_uploaded_file($tmp_dir2, $upload_dir2.$car_pic2);

     $imgExt = strtolower(pathinfo($image3,PATHINFO_EXTENSION));
     $valid_extension =array('jpeg', 'jpg', 'gif', 'png');
     $car_pic3 = rand(1000, 1000000).".".$imgExt;
     move_uploaded_file($tmp_dir3, $upload_dir3.$car_pic3);

     $imgExt = strtolower(pathinfo($image4,PATHINFO_EXTENSION));
     $valid_extension =array('jpeg', 'jpg', 'gif', 'png');
     $car_pic4 = rand(1000, 1000000).".".$imgExt;
     move_uploaded_file($tmp_dir4, $upload_dir4."".$car_pic4);

     $imgExt = strtolower(pathinfo($image5,PATHINFO_EXTENSION));
     $valid_extension =array('jpeg', 'jpg', 'gif', 'png');
     $car_pic5 = rand(1000, 1000000).".".$imgExt;
     move_uploaded_file($tmp_dir5, $upload_dir5.$car_pic5);

     $imgExt = strtolower(pathinfo($image6,PATHINFO_EXTENSION));
     $valid_extension =array('jpeg', 'jpg', 'gif', 'png');
     $car_pic6 = rand(1000, 1000000).".".$imgExt;
     move_uploaded_file($tmp_dir6, $upload_dir6.$car_pic6);

     $imgExt = strtolower(pathinfo($image7,PATHINFO_EXTENSION));
     $valid_extension =array('jpeg', 'jpg', 'gif', 'png');
     $car_pic7 = rand(1000, 1000000).".".$imgExt;
     move_uploaded_file($tmp_dir7, $upload_dir7.$car_pic7);

     $imgExt = strtolower(pathinfo($image8,PATHINFO_EXTENSION));
     $valid_extension =array('jpeg', 'jpg', 'gif', 'png');
     $car_pic8 = rand(1000, 1000000).".".$imgExt;
     move_uploaded_file($tmp_dir8, $upload_dir8.$car_pic8);

     $imgExt = strtolower(pathinfo($image9,PATHINFO_EXTENSION));
     $valid_extension =array('jpeg', 'jpg', 'gif', 'png');
     $car_pic9 = rand(1000, 1000000).".".$imgExt;
     move_uploaded_file($tmp_dir9, $upload_dir9.$car_pic9);

     $sqlInsert=$db->prepare('INSERT INTO car_data (make_name, model_name, vehicle_type, body_type, max_mileague,fuel_type, area, year, price, color, state, number_of_door,dealer_name, dealer_contact, dealer_email, dealer_address, photo1, photo2, photo3, photo4, photo5, photo6, photo7, photo8, photo9,avalaibility, on_sale, madein, car_description,more_options,car_code,rate, registered_by) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
     $sqlInsert->execute(array($make_name, $model_name, $vehicle_type, $body_type, $max_mileague, $fuel_type, $area_name, $year, $price, $color, $carState, $door_number, $dealer_name, $dealer_contact, $dealer_email, $dealer_address, $car_pic1, $car_pic2, $car_pic3, $car_pic4, $car_pic5,$car_pic6, $car_pic7,$car_pic8, $car_pic9,$available, $on_sale,$madein, $short_description, $more_options, $unic_car_code,$car_rate, $registered_by));
      $mySucess = "New Car added sucessfully"; 
  }
include('header.php');
?>
<!DOCTYPE html>
<html>
<head>
  <title>Add_Make</title>
  <style type="text/css">
      #form_div input 
      {
         margin-bottom: 10px;
      }
       #form_div select
      {
         margin-bottom: 10px;
      }
       #form_div textarea
      {
         margin-bottom: 10px;
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
        }else
        {
          $('#model_name').html('<option value="">No make found </option>');
        }
      });
   });
 </script>

</head>
<body>
  <section id="main-content" style="padding: 10px;">
    <br><br><br>
          <div class="container">
            <h3 class="page-header" style="color:#7f0a0a;font-weight:bold;"><i class="fa fa-car"></i> Add New  Car</h3>
          </div> 
       <?php 
         if(isset($erroMss))
         {
           ?>
           <div class=" w3-animate-zoom" id="erroMsss">
             <button type="button" class="close" data-dismiss="alert" style="color: white;">&times;</button>
             <strong>Ooooops!!</strong> <?php echo $erroMsss ?>
             <br>
           </div>
         <?php
         }
        ?>

        <?php 
         if(isset($mySucess))
         {
           ?>
           <div class=" w3-animate-zoom" id="mySucess">
             <button type="button" class="close" data-dismiss="alert" style="color: white;">&times;</button>
             <strong>Thanks !!</strong> <?php echo  $mySucess ?>
           </div>
           <?php
         }
        ?>
      <div class="container">
        <div class="row">
          <div id="form_div">
            <form method="POST" id="my_model_form" enctype="multipart/form-data">
              <div class="row">
                <p style="color: #7f0a0a;font-size: 15px;font-weight: bold;">&nbsp;&nbsp;&nbsp; VEHICLE INFO</p>
                 <div class="col-md-4 col-sm-4">
                   <div class="form-group">
                    <select class="form-control" name="make_name" id="make_name" required="required">
                       <option value="">Select Available Make (e.g : Ford)</option>           
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
                <div class="col-md-4 col-sm-4">
                   <div class="form-group">
                       <select class="form-control" name="model_name" id="model_name" > 
                         <option value="">Select Vehicle Model</option>       
                      </select>
                   </div> 
                </div>
                <div class="col-md-4 col-sm-4">
                  <div class="form-group">
                     <select class="form-control" name="vehicle_type" id="vehicle_type" required="required">
                       <option value="">Select Transmission</option>           
                       <option value="Manual">Manual Vehicle</option> 
                       <option value="Automatic">Automatic Vehicle</option> 
                     </select>
                </div> 
              </div>
              </div>

              <div class="row">
                <div class="col-md-4 col-sm-4">
                  <div class="form-group">
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
                <div class="col-md-4 col-sm-4">
                   <div class="form-group">
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
                  <div class="form-group">
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
                     </select>
                </div> 
              </div>
              </div>

                <div class="row">
                   <div class="col-md-4 col-sm-4">
                    <div class="form-group">
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
                    <div class="form-group">
                      <select class="form-control" id="price" name="price" required="required">
                         <option value="">Select Available Price</option>
                       <?php
                          $getPrice = $db->query('SELECT * FROM prices ORDER BY prices ASC ');
                          while($res = $getPrice->fetch())
                          {
                            ?>
                             <option value="<?php echo $res['prices']?>"><?php echo $res['prices']?></option>
                            <?
                          }
                         ?>
                      </select>
                   </div>
                </div>
                   <div class="col-md-4 col-sm-4">
                     <div class="form-group">
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
                </div>

                <div class="row">
                   <div class="col-md-4 col-sm-4">
                    <div class="form-group">             
                       <select class="form-control" id="carState" name="carState" required="required">
                         <option value="">Select Car State</option>
                         <option value="new car">New Car</option>
                         <option value="used car">Used Car</option>
                      </select>
                    </div>
                   </div>
                   <div class="col-md-4 col-sm-4">
                    <div class="form-group">
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
                    <div class="form-group">                  
                     <input type="number" name="door_number" id="door_number" class="form-control" placeholder="Number of Doors (e.g : 4)" required="required" />
                    </div>
                   </div>
                </div>

                <div class="row">
                   <div class="col-md-4 col-sm-4">
                    <div class="form-group">             
                       <select class="form-control" id="available" name="available" required="required">
                         <option value="">Select sold / Available</option>
                         <option value="Available">Available</option>
                         <option value="Sold">Sold</option>
                      </select>
                    </div>
                   </div>
                   
                    <div class="col-md-4">
                     <select class="form-control" id="on_sale" name="on_sale" required="required">
                         <option value="">Select Sales Option</option>
                         <option value="On Sale">On Sale</option>
                         <option value="not_on_sale">Not on Sale</option>
                      </select>
                  </div>
                  <div class="col-md-4">
                     <select class="form-control" id="madein" name="madein" required="required">
                         <option value="">Made in</option>
                         <option value="CHINA">CHINA</option>
                         <option value="ENGLAND">ENGLAND</option>
                         <option value="FRANCE">FRANCE</option>
                         <option value="SOUTH AFRICA">SOUTH AFRICA</option>
                         <option value="VENEZUELA">VENEZUELA</option>
                         <option value="USA">USA</option>
                      </select>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                   <select class="form-control" name="car_rate" id="car_rate" required="required">
                      <option value="">Select Star Rating (1 - 5)</option>
                      <option value="1">1 Star (Bad)</option>
                      <option value="2">2 Stars (Not too Bad)</option>
                      <option value="3">3 Stars (Average)</option>
                      <option value="4">4 Stars (Good)</option>
                      <option value="5">5 Stars (Best)</option>
                   </select>
                  </div>
                  <div class="col-md-4">
                    <textarea name="short_description" id="short_description" class="form-control" cols="7" rows="5" placeholder="Short Description of the vehicle"></textarea>
                  </div>
                  <div class="col-md-4">
                    <textarea name="more_options" id="more_options" class="form-control" cols="7" rows="5" placeholder="More Description"></textarea>
                  </div>
                </div>

                <div class="row">
                  <p style="color: #7f0a0a;font-size: 15px;font-weight: bold;">&nbsp;&nbsp;&nbsp; DEALER INFO</p>
                  
                  <div class="col-md-4">
                    <input type="text" name="dealer_name" class="form-control"  placeholder="Dealer name" id="dealer_name" required="required">
                  </div>

                  <div class="col-md-4">
                    <input type="contact" name="dealer_contact" class="form-control"  placeholder="Dealer Contact" id="dealer_contact" required="required">
                  </div>

                  <div class="col-md-4">
                    <input type="email" name="dealer_email" class="form-control"  placeholder="Dealer Email" id="dealer_email" required="required">
                  </div>

                </div>
                <br>
                <div class="row">
                  <div class="col-md-4">
                    <input type="text" name="dealer_address" id="dealer_address" class="form-control" placeholder="Dealeer address" required="required">
                  </div>
                </div>
                <br>
              
                <div class="row">
                  <p style="color: #7f0a0a;font-size: 15px;font-weight: bold;">&nbsp;&nbsp;&nbsp; VEHICLE IMAGES</p>
                <div class="col-md-4 col-sm-4">
                    <div class="form-group">
                     <input type="file" name="photo1" id="photo1" required="required">
                  </div>
                 </div>
                 <div class="col-md-4 col-sm-4">
                    <div class="form-group">
                     <input type="file" name="photo2" id="photo2" required="required">
                  </div>
                 </div>
                 <div class="col-md-4 col-sm-4">
                    <div class="form-group">
                     <input type="file" name="photo3" id="photo3" required="required">
                  </div>
                 </div>
                </div>
                 <div class="row">
                <div class="col-md-4 col-sm-4">
                    <div class="form-group">
                     <input type="file" name="photo4" id="photo4">
                  </div>
                 </div>
                 <div class="col-md-4 col-sm-4">
                    <div class="form-group">
                     <input type="file" name="photo5" id="photo5">
                  </div>
                 </div>
                 <div class="col-md-4 col-sm-4">
                    <div class="form-group">
                     <input type="file" name="photo6" id="photo6">
                  </div>
                 </div>
                </div>

                <div class="row"> 
                    <div class="col-md-4">
                        <input type="file" name="photo7" id="photo7">
                    </div>
                    <div class="col-md-4">
                       <input type="file" name="photo8" id="photo8">
                    </div>
                    <div class="col-md-4">
                       <input type="file" name="photo9" id="photo9">
                    </div>

                </div>
                <br><br>
                <div class="row">
                   <div class="col-md-6">
                     <div class="form-group">
                      <button type="submit" name="submit" class="btn btn-default btn-block" id="submit"><i class="fa fa-car"></i> ADD CARS</button>
                    </div>
                   </div>
                   <div class="col-md-6">
                     <div class="form-group">
                      <button type="reset" id="cancel" name="cancel" class="btn btn-default btn-block"><i class="fa fa-plus"></i> RESET</button>
                    </div>
                   </div>
                 
                </div>
          </form>
        </div>
        </div>
      </div>
    </div>
    </section>
</body>
<?php include('script.php') ?>
</html>

<script type="text/javascript">
  $(document).ready(function() {
    $('#myTable').DataTable( {
        responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.modal( {
                    header: function ( row ) {
                        var data = row.data();
                        return 'Details for '+data[0]+' '+data[1];
                    }
                } ),
                renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
                    tableClass: 'table'
                })
            }
        }
    });
});
</script>

<script type="text/javascript">
  setTimeout('errormessage()',4000);
  function errormessage(){
    $("#erroMsss").hide(1000);
  }
</script>

<script type="text/javascript">
  setTimeout('successMethod()',4000);
  function successMethod(){
    $("#mySucess").hide(1000);
  }
</script>