<?php
 session_start();
 include('../includes/db.php');
 if(!isset($_SESSION["username"]))
 {
   header('location:login.php');
 }
 if(isset($_POST["submit"]))
 {
  $prices = htmlspecialchars($_POST["prices"]);
  $registred_by = $_SESSION["username"];

  if(!empty($_POST["prices"]))
  {
      $priceCheck = $db->prepare("SELECT * FROM prices WHERE prices = ?");
      $priceCheck->execute(array($prices));
      $priceCount = $priceCheck->rowCount();
      if($priceCount > 0)
      {
        $erroMsss = "Vehicle price exsits already";
        unset($prices);
      }
      else
      {
        $priceInsert = $db->prepare('INSERT INTO prices(prices) VALUES(?)');
        $priceInsert->execute(array($prices));
        $success ="Vehicle price inserted";
        unset($prices);
      }
  }
  if(empty($_POST["prices"]))
  {
    $erroMsss ="Vehicle Make required";
    unset($prices);
  }
 }
 $getMakes = $db->query('SELECT * FROM prices ORDER BY prices DESC');
 include('header.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>prices</title>
	
</head>
<body>
	<section id="main-content" style="padding: 10px;">
		<br><br><br>
		   <div class="row">
          <div class="container">
            <h3 class="page-header" style="color: #7f0a0a;font-weight: bold;"><i class="fa fa-money"></i> VEHICLE PRICING</h3>
          </div>
        </div>
        <div class="row">
         <div>
         	<div class="container">
        	<form method="POST" id="form_div">
        	   <div class="row">
              <div class="col-md-6 col-sm-6">
                <div class="form-group">
                  <input type="text" name="prices" id="prices" placeholder="Vehicle Peices(R20 000.00 - R35 000.00)" class="form-control">
              </div>
              </div>
              <div class="col-md-6 col-sm-6">
                <div class="form-group">
                  <button type="submit" class="btn btn-info" name="submit" id="submit"><i class="fa fa-plus"></i> Add Vehicle Price</button>
                </div>
              </div>
             </div>
          	</form>
            <?php
              if(isset($erroMsss))
              {
               ?>
                <div class=" w3-animate-zoom" id="erroMsss">
                  <button type="button" class="close" data-dismiss="alert" style="color: white;">&times;</button>
                  <strong>Oh snap!</strong> <?= $erroMsss ?>
                </div>
               <?php
              }
            ?>

             <?php
              if(isset($success))
              {
               ?>
                <div class=" w3-animate-zoom" id="mySucess">
                  <button type="button" class="close" data-dismiss="alert" style="color: white;">&times;</button>
                  <strong>Well Done !!!</strong> <?= $success ?>
                </div>
               <?php
              }
            ?>
           </div>
          </div>
         </div>


        <div>
          <table class="table table-responsive table-bordered" id="example" name="example">
            <thead>
              <th>MAKE ID</th>
              <th>MAKE NAME</th>
              <th>DATE </th>
              <th>TIME </th>
              <th>EDIT</th>
              <th>DELETE</th>
            </thead>
            
              <?php
                   while($rows = $getMakes->fetch())
                   {
                     $getTime = date('H:m:s',strtotime($rows["date_time"]));
                     $getDate = date('Y-m-d',strtotime($rows["date_time"]));
                     ?>
                     <tr>
                     <td><?php echo $rows["price_id"] ?></td>
                     <td><?php echo $rows["prices"] ?></td>
                     <td><?php echo $getDate ?></td>
                     <td><?php echo $getTime ?></td>
                     <td><a type="submit" id="#" class="btn btn-success btn-xs" href="#"> Edit <i class="fa fa-edit"></i></a></td>
                     <td><a class="btn btn-danger btn-xs" href="deleteMake.php?id=<?php echo $rows['price_id']?>">Delete<i class="fa fa-trash-o"></i></a></td>
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