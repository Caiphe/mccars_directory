<?php
 session_start();
 include('../includes/db.php');
 if(!isset($_SESSION["username"]))
 {
   header('location:login.php');
 }

 $getMakes = $db->query('SELECT * FROM prices ORDER BY prices ASC');
 $getNewCars = $db->query('SELECT * FROM car_data WHERE state = "new car"');
 include('header.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>new_cars</title>
</head>
<body>
	<section id="main-content" style="padding: 10px;">
		<br><br>
		   <div class="row">
	          <div class="container">
	            <h3 class="page-header" style="color: #7f0a0a;font-weight: bold;"><i class="fa fa-car"></i> NEW VEHICLES</h3>
	          </div>
            </div>
        <div class="row">
         <div>
         	<div class="container">
           </div>
          </div>
         </div>
        <div>
          <table class="table table-responsive table-bordered" id="example" name="example">
            <thead>
              <th>Make Name</th>
              <th>Model Name</th>
              <th>Vehicle Type</th>
              <th>Area</th>
              <th>Year</th>
              <th>Pricing</th>
              <th>Color</th>
              <th>State</th>
              <th>Car door</th>
              <th>Registered_By</th>
            </thead>
            
              <?php
                   while($rows = $getNewCars->fetch())
                   {
                     $getTime = date('H:m:s',strtotime($rows["date_time"]));
                     $getDate = date('Y-m-d',strtotime($rows["date_time"]));
                     ?>
                     <tr>
                     <td><?php echo $rows["make_name"] ?></td>
                     <td><?php echo $rows["model_name"] ?></td>
                     <td><?php echo $rows["vehicle_type"] ?></td>
                     <td><?php echo $rows["area"] ?></td>
                     <td><?php echo $rows["year"] ?></td>
                     <td><?php echo $rows["price"] ?></td>
                     <td><?php echo $rows["color"] ?></td>
                     <td><?php echo $rows["state"] ?></td>
                     <td><?php echo $rows["number_of_door"] ?></td>
                     <td><?php echo $rows["registered_by"] ?></td>
                   </tr>
                     <?php
                   }
              ?>
          </table>
        </div>
    </section>
</body>
<?php include('script.php') ?>
</html>

<script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable( {
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