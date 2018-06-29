<?php
 session_start();
  include('../includes/db.php');
 if(!isset($_SESSION["username"]))
 {
   header('location:login.php');
 }
 if(isset($_POST["submit"]))
 {
   $areaName = htmlspecialchars($_POST["areaName"]);

   if(empty($areaName))
   {
     $erroMsss ="Area name required";
   }else
   {
     $AreaCheck = $db->prepare("SELECT * FROM area_table WHERE area_name = ?");
     $AreaCheck->execute(array($areaName));
     $areaCount=$AreaCheck->rowCount();
     if($areaCount > 0)
     {
       $erroMsss ="Area name exists already !!!";
       unset($areaName);
     }else
     {
       $sqlArea = $db->prepare("INSERT INTO area_table(area_name) VALUES(?)");
       $sqlArea->execute(array($areaName));
       $successMessage ="vehicle Area Inserted Successfully";
     }
   }
 }
 include('header.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add_Make</title>
	 <style type="text/css">
    #addArea
    {
      border-radius:0px;
    } 
     #addArea:hover
     {
      background-color: transparent;
      border:solid 1px #080842;
      color: #080842;
     }
     #erroMsss
     {
       background-color: rgb(157, 11, 33);
        color:white;
        padding: 8px 50px;
        width: 20%px;
     }
   </style>
</head>
<body>
	<section id="main-content" >
		<br><br>
    <div style="padding: 10px;">
		<div class="row">
          <div class="container">
            <h3 class="page-header" style="color:#7f0a0a;font-weight: bold;"><i class="fa fa-road"></i> Vehicle Area</h3>
          </div>
    </div>
      <div class="row">
        <div id="form_div">
         	 <div class="container">
        	  <form method="POST" id="my_model_form">
      	      <div class="row">
               <div class="col-md-4 col-sm-4">
                  <input type="text" name="areaName" id="areaName" placeholder="Vehicle area" class="form-control" style="border-radius:0px;">
               </div> 
               <div class="col-md-4 col-sm-4">
                 <button class="btn btn-info" name="submit" id="submit"><i class="fa fa-plus"></i> Add Area</button>
               </div>
                <div class="col-md-4 col-sm-4">
                 
               </div>  
              </div>
        	  </form>
           </div>
          </div>
          <div class="container">
             <?php
             if(isset($erroMsss))
             {
              ?>
              <div class="w3-animate-zoom" id="erroMsss">
                  <button type="button" class="close" data-dismiss="alert" style="color: white;">&times;</button>
                  <strong>Oooops!</strong> <?php echo $erroMsss ?>
              </div>
              <?php
             }
          ?>
           <?php
             if(isset($successMessage))
             {
               ?>
            <!--<p id="erroMsss"></p>-->
            <div class="w3-animate-zoom" id="mySucess">
              <button type="button" class="close" data-dismiss="alert" style="color: white;">&times;</button>
              <strong>Thanks!</strong> <?php echo $successMessage ?>
            </div>
               <?php
             }
          ?>
          <table class="table table-responsive table-bordered" id="example" name="example">
            <thead>
              <th>AREA ID</th>
              <th>AREA NAME</th>
              <th>DATE & TIME</th>
              <th>EDIT</th>
              <th>DELETE</th>
            </thead>
            <?php
               $getArea = $db->query('SELECT * FROM area_table ORDER BY area_name ASC');
               while($row = $getArea->fetch()) 
               {
                ?>
                  <tr>
                    <td><?php echo $row["area_id"] ?></td>
                    <td><?php echo $row["area_name"] ?></td>
                    <td><?php echo $row["date_time"] ?></td>
                    <td><a class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit</a></td>
                     <td><a class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete</a></td>
                  </tr>
                <?php                   
               }
            ?>
          </table>



          </div>
      </div>
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