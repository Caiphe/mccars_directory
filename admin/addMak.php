<?php
 session_start();
 include('../includes/db.php');
 if(!isset($_SESSION["username"]))
 {
   header('location:login.php');
 }
 if(isset($_POST["submit"]))
 {
 	$makeName = htmlspecialchars($_POST["makeName"]);
 	$registred_by = $_SESSION["username"];
 	if(!empty($_POST["makeName"]))
 	{
      $makeCheck = $db->prepare("SELECT * FROM make WHERE make_name = ? ");
      $makeCheck->execute(array($makeName));
      $makeCount = $makeCheck->rowCount();
      if($makeCount > 0)
      {
        $error = "Vehicle Make exists already";
        unset($makeName);
      }
      else
      {
        $makeInsert = $db->prepare('INSERT INTO make(make_name, registred_by) VALUES(?, ?)');
        $makeInsert->execute(array($makeName, $registred_by));
        $success ="New Vehicle Make Inserted successfully";
        unset($makeName);
      }
 	}
 	if(empty($_POST["makeName"]))
 	{
 		$error ="Vehicle Make required";
 		unset($makeName);
 	}
 }
 $getMakes = $db->query('SELECT * FROM make ORDER BY make_name ASC');
 include('header.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Add_Make</title>
<style type="text/css">
	#makeName
	{
		width: 100%;
		font-size: 15px;
		border-radius: 0px;
	}
	#btn_add_make
	{
		border-radius: 0px;
		font-size: 15px; 
	}
	#btn_add_make:hover
	{
		background-color: transparent;
      border:solid 1px #080842;
      color: #080842;
	}
	
	#form_div
	{
		background-color: #e7e7e7;
		padding: 20px
	}
</style>
</head>
<body>
	<section id="main-content" style="padding: 10px;">
		<br><br>
		<div class="row">
          <div class="container">
            <h3 class="page-header" style="color: #7f0a0a;font-weight: bold;"><i class="fa fa-align-left"></i> Vehicle Make</h3>
          </div>
        </div>
        <div class="row">
         <div id="form_div">
        	<form method="POST" >
        		<div class="row">
        	    <div class="col-md-6 col-sm-6">
        	    	<div class="form-group">
        	      	<input type="text" name="makeName" id="makeName" placeholder="Make Name" class="form-control">
        	    </div>
        	    </div>
        	    <div class="col-md-6 col-sm-6">
        	    <div class="form-group">
        	    	<button type="submit" class="btn btn-info" name="submit" id="submit"><i class="fa fa-plus"></i> Add Make</button>
        	    </div>
        	    </div>
        	</div>

        	    <?php
                if(isset($error))
                {
                 ?>
                 
                  <div class=" w3-animate-zoom" id="erroMsss">
				  <button type="button" class="close" data-dismiss="alert" style="color: white;">&times;</button>
				  <strong>Oh snap!</strong> <?= $error ?>
				</div>
                 <?php
                }
        	    ?>
        	    <?php
                 if(isset($success))
                 {
                  ?>
                  <!--<p class="" id="mySucess"></p>-->
                   <div class=" w3-animate-zoom" id="mySucess">
				  <button type="button" class="close" data-dismiss="alert" style="color: white;">&times;</button>
				  <strong>Thanks!</strong> <?= $success ?>
				</div>
                  <?php
                 }
        	    ?>
        	</form>
          </div>
        </div>

        <div>
        	<table class="table table-responsive table-bordered" id="example" name="example">
        		<thead>
        			<th>MAKE ID</th>
        			<th>MAKE NAME</th>
        			<th>REGISTRED BY</th>
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
                   	 <td><?php echo $rows["make_id"] ?></td>
                   	 <td><?php echo $rows["make_name"] ?></td>
                   	 <td><?php echo $rows["registred_by"] ?></td>
                   	 <td><?php echo $getDate ?></td>
                   	 <td><?php echo $getTime ?></td>
                   	 <td><a type="submit" id="#" class="btn btn-success btn-xs" href="#"> Edit <i class="fa fa-edit"></i></a></td>
                   	 <td><a class="btn btn-danger btn-xs" href="deleteMake.php?id=<?php echo $rows['make_id']?>">Delete<i class="fa fa-trash-o"></i></a></td>
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
                } )
            }
        }
    } );
} );
</script>

<script type="text/javascript">
  setTimeout('errormessage()',5000);
  function errormessage(){
    $("#erroMsss").fadeOut(2000);
  }
</script>

<script type="text/javascript">
  setTimeout('successMethod()',5000);
  function successMethod(){
    $("#mySucess").fadeOut(2000);
  }
</script>