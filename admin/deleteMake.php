<?php 
 include('../includes/db.php');
if(isset($_GET['make_id']) AND $_GET['make_id'] > 0){
   $getid = intval($_GET['make_id']);
   $deleteData = $db->prepare('DELETE FROM make WHERE make_id = ?');
   $deleteData->execute(array($getid));

   if($deleteData){
   ?>
    <script type="text/javascript">
      alert('Vehicle Make Deleted Successfully !!!');
      window.location.href="addMak.php";
    </script>
   <?php
   }
}
?>