<?php
  session_start();
   include('../includes/db.php');
 if(isset($_GET['model_id']) AND $_GET['model_id'] > 0){
   $getid = intval($_GET['model_id']);
   $deleteData = $db->prepare('DELETE * FROM model WHERE model_id = ?');
   $deleteData->execute(array($getid));

   if($deleteData){
   ?>
    <script type="text/javascript">
      alert('Teacher Deleted Successfully !!!');
      window.location.href="addModel.php";
    </script>
   <?php
   }
}
?>