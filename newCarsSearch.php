<style type="text/css">
  #noneFound
  {
    background-color: #78073a;
    text-align: center;
    color: white;
    font-size: 18px;
    padding: 7px;
  }
  #success_result
  {
    background-color: #093169;
    text-align: center;
    color: white;
    font-size: 17px;font-weight: lighter;
    padding: 7px 0px;
  }
  #myMainSearch
  {
      -webkit-animation-duration:1s;
      z-index: 99999;
   
  }
  #main_search_result
  {
     animaton-duration:2s;
    -webkit-animaton-duration:2s;
    -moz-animaton-duration:2s;
    -0-animaton-duration:2s;

  }
</style>
<?php 
 //echo $_POST["model_name"];
  session_start();
  include('includes/db.php');

  $make_name = htmlspecialchars($_POST["make_name"]);
  $model_name = htmlspecialchars($_POST["model_name"]);
  $year = htmlspecialchars($_POST["year"]);

  if(!empty($make_name) AND !empty($model_name) AND !empty($year))
  {
     $getCars = $db->query('SELECT * FROM car_data WHERE state="new car" ORDER BY date_time ASC');
     $carCount = $getCars->rowCount();
     if($carCount > 0)
     {
        $sqlSearch = $db->prepare('SELECT * FROM car_data WHERE make_name = ? AND model_name = ? AND year = ? AND state ="new car"');
        $sqlSearch->execute(array($make_name, $model_name, $year));
        $sqlCount = $sqlSearch->rowCount();

        if($sqlCount > 0)
        {
           while($result = $sqlSearch->fetch())
           {
              $output = '
              <div class="animated zoomIn" id="main_search_result">
              <div class="container "  id="myMainSearch">
               <p id="success_result"> <i class="icon ion-android-checkmark-circle"></i> '.$sqlCount.' SEARCH RESULT</p>
                 <div class="row">
                  
                      <div class="col-md-3">
                         <a class="thumbnail news_cars_thumnail" href="more.php?ref='.$result["car_code"].'"  ><img id="new_car_main_image" src="admin/uploads/p1/'.$result['photo1'].'"></a>
                      </div>
                      <div class="col-md-6">
                              <div style="height: 2px;background-color: #7f0a0a;"></div>
                  <div class="news_car_details">
                    <div class="new_car_details_info">
                                      <p class="main_user_car_title"><i class="icon ion-model-s"></i> 
                    <span style="font-size: 12px;color:#8b8b8b;">'.$result["make_name"].'</span><br>
                     <a class="my_model_name" href="more.php?ref='.$result["car_code"].'">'.$result["model_name"].' </a></p>
                     <h5 class="new_car_price" id="new_car_price"> &nbsp; <i class="icon ion-ios-pricetags"></i>&nbsp;&nbsp;R'.number_format($result["price"]).'</h5>
                    <table class=" news_cars_main_table">
                      <tr>
                        <td><i class="icon ion-android-pin"></i> '.$result["area"].' <i class="icon ion-model-s"> </i>'.$result["state"].' </td>
                      </tr>
                      <tr>
                      <td><i class="icon ion-model-s"></i> '.$result["year"].'&nbsp; '.$result["make_name"].' &nbsp;'.$result["model_name"].' '.$result["body_type"].'&nbsp; '.$result["vehicle_type"].'&nbsp;
                      <i class="icon ion-paintbrush"></i> '.$result["color"].'</td>
                      </tr>
                      <tr>
                    <td><i class="icon ion-android-call"></i> <span style="text-decoration-style: none;text-decoration-line: none;text-decoration:none;">'.$result["dealer_contact"].'</span> &nbsp; | &nbsp; <i class="icon ion-ios-email"></i> '.$result["dealer_email"].'</td>
                         </tr>
                         <tr><td>---------------------------------------------------------------</td></tr>
                         <tr>
                  <td>
                      <button class="btn btn-warning btn-xs" name="get_alert" id="get_alert"><i class="icon ion-ios-bell animated bounce"></i> Get Alerts</button> &nbsp;&nbsp;<a href="more.php?ref='.$result["car_code"].'" class="btn btn-primary btn-xs" name="read_more" id="read_more"><i class="icon ion-information-circled"></i> Read More</a>
                  
                  </td>
                </tr>
                </table>
                  <h5 class="availability animated flash" id="availability">'.$result["avalaibility"].'</h5>
                    </div>
                  </div>
                  </div>
              
                      <div class="col-md-3">
                              <div class="row">
              <div class="col-md-6">
                <a class="thumbnail news_cars_thumnail"><img id="new_car_main_image" src="admin/uploads/p4/'.$result['photo4'].'"></a>
              </div>
              <div class="col-md-6">
                <a class="thumbnail news_cars_thumnail"><img id="new_car_main_image" src="admin/uploads/p3/'.$result['photo3'].'"></a>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
              <a class="thumbnail news_cars_thumnail"><img id="new_car_main_image" src="admin/uploads/p2/'.$result['photo2'].'"></a>
              </div>
              <div class="col-md-6">
                <a class="thumbnail news_cars_thumnail"><img id="new_car_main_image" src="admin/uploads/p5/'.$result['photo5'].'"></a>
              </div>
            </div>
                  </div>
               </div>
      </div></div>
           ';
           }
           echo $output;
        }
        else
        {
           echo '<div class="container">
                <p id="noneFound" class="animated slideInDown"><i class="icon ion-android-search" style="color:black;"></i> 0 Search Result : '.$make_name.'&nbsp;'.$model_name.'&nbsp;'.$year.'</p>
           </div>';
        }
     
     }
    }
?>