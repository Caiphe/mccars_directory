<?php
 session_start();
 include('../includes/db.php');
 if(!isset($_SESSION["username"]))
 {
   header('location:login.php');
 }

 include('header.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add_Make</title>
	
</head>
<body>
	<section id="main-content" style="padding: 10px;">
		<br><br><br>
		<div class="row">
          <div class="container">
            <h3 class="page-header"><i class="fa fa-tasks"></i> Vehicle Make</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.php">Dashboard</a></li>
              <li><i class="fa fa-tasks"></i>Add Make</li>
            </ol>
          </div>
        </div>
        <div class="row">
         <div style="padding: 2px 30px;">
         	<div class="container">
        	<form method="POST" id="my_model_form">
        	      
        	</form>
       
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
    $(".erroMsss").hide(1000);
  }
</script>

<script type="text/javascript">
  setTimeout('successMethod()',4000);
  function successMethod(){
    $("#mySucess").hide(1000);
</script>