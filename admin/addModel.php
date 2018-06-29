<?php
session_start();

if(!isset($_SESSION["username"]))
 {
   header('location:login.php');
 }
 include('../includes/db.php');
 
 if(isset($_POST["submit"]))
 {
   $make_name = htmlspecialchars($_POST["make_name"]);
   $model_name = htmlspecialchars($_POST["model_name"]);
   $registeredBy = $_SESSION["username"];

   if(empty($_POST["make_name"]) || empty($_POST["model_name"]))
   {
      $erroMsss = "All the inputs are required";
   }
   else
   {
     $modelChck = $db->prepare('SELECT * FROM model WHERE make_id = ? AND model_name = ?');
     $modelChck->execute(array($make_name, $model_name));
     $modelCount = $modelChck->rowCount();
     if($modelCount > 0)
     {
       $erroMsss = "Vehicle Model Exits already! Try again";
     }
     else
     {
       $sqlInsertModel = $db->prepare('INSERT INTO model(make_id, model_name,registeredBy) VALUES(?, ?, ?)');
       $sqlInsertModel->execute(array($make_name, $model_name, $registeredBy));
       $mySucess = "Vehicle model inserted successfully ";
     }
   }
 }
 $getMakes = $db->query('SELECT * FROM make ORDER BY make_name ASC ');
 
 include('header.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add_Model</title>
	<style type="text/css">
		#addModel
		{
			color: white;
			background-color: #092840;
			font-size: 14px;
			border:solid 1px white;
		}
		#addModel:hover
		{
			background-color: transparent;
			color: black;
			border:solid 1px black;
		}
    #add_model
    {
      border-radius: 0px;
      padding: 5px 20px;
      transition: 1s;
    }
    #add_model:hover
    {
      background-color: transparent;
      border:solid 1px #080842;
      color: #080842;
    }
	</style>
</head>
<body>
	<section id="main-content" style="padding: 10px;">
		<br><br>
		<div class="row">
          <div class="container">
            <h3 class="page-header" style="color: #7f0a0a;font-weight: bold;"><i class="fa fa-list-ul"></i> Vehicle Model</h3>
          </div>
          <div id="form_div">
             <form method="POST">
              <br>
              <div class="row">
               <div class="col-md-4 col-sm-4">
                <div class="form-group">
                   <select class="form-control" name="make_name" id="make_name" style="border-radius: 0px;">
                       <option value="">Select </option>           
                         <?php
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
                  <input type="text" name="model_name" id="model_name" class="form-control" placeholder="Model Name" style="border-radius:0px;">
                </div>
              </div>
               <div class="col-md-4 col-sm-4">
                 <div class="form-group">
                <button class="btn btn-info" name="submit" id="submit" type="submit"><i class="fa fa-plus"></i> Add Model</button>
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
            <strong>Oooopp!!!</strong> <?= $erroMsss ?>
          </div>
                 <?php
                }
              ?>
              <?php
                 if(isset($mySucess))
                 {
                  ?>

                  <!--<p class="" id="mySucess"></p>-->
            <div class=" w3-animate-zoom" id="mySucess">
            <button type="button" class="close" data-dismiss="alert" style="color: white;">&times;</button>
            <strong>Thanks!</strong> <?= $mySucess ?>
          </div>
                  <?php
                 }
              ?>
          </div>
    </div>
    <table class="table table-responsive table-bordered" id="example" name="example">
      <thead>
        <th>MODEL ID</th>
        <th>MAKE NAME</th>
        <th>MODEL NAME</th>
        <th>REGISTERED BY</th>
        <th>DATE</th>
        <th>TIME</th>
        <th>EDIT</th>
        <th>DELETE</th>
      </thead>
        <?php
        $getModels = $db->query('SELECT * FROM model ORDER BY model_name ASC');
         while($rows = $getModels->fetch())
         {
           $getTime = date('H:m:s',strtotime($rows["date_time"]));
           $getDate = date('Y-m-d',strtotime($rows["date_time"]));
           ?>
           <tr>
             <td><?php echo $rows["model_id"] ?></td>
             <td><?php echo $rows["make_id"] ?></td>
             <td><?php echo $rows["model_name"] ?></td>
             <td><?php echo $rows["registeredBy"] ?></td>
             <td><?php echo $getDate ?></td>
             <td><?php echo $getTime ?></td>
             <td><a type="submit" id="#" class="btn btn-success btn-xs" href="#"> Edit <i class="fa fa-edit"></i></a></td>
             <td><a class="btn btn-danger btn-xs" href="deleteMake.php?id=<?php echo $rows['make_id']?>">Delete<i class="fa fa-trash-o"></i></a></td>
           </tr>
           <?php
         }
    ?>
    </table>
    </section>
</body>
<?php include('script.php') ?>
</html>

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
