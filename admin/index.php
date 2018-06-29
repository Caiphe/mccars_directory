<?php
 session_start();
 include('../includes/db.php');
 
 if(!isset($_SESSION["username"]))
 {
   header('location:login.php');
 }
 $sqlGetCars =$db->query('SELECT * FROM car_data WHERE state = "new car"');
 //$getNewCars = $db->query('SELECT * FROM car_data WHERE state = "newCar"');
 $newCarsCount = $sqlGetCars->rowCount();
 if($newCarsCount <= 0)
 {   $newCarsResult = 0;  
 }else{
  $newCarsResult = $newCarsCount;
 }

 $sqlUseCars =$db->query('SELECT * FROM car_data WHERE state = "used car"');
 //$getNewCars = $db->query('SELECT * FROM car_data WHERE state = "newCar"');
 $usedCarCount = $sqlUseCars->rowCount();
 if($usedCarCount <= 0)
 {   $usedCarResult = 0;  
 }else{
  $usedCarResult = $usedCarCount;
 }

 $carOnSale =$db->query('SELECT * FROM car_data WHERE on_sale = "On Sale"');
 //$getNewCars = $db->query('SELECT * FROM car_data WHERE state = "newCar"');
 $OnsaleCount = $carOnSale->rowCount();
 if($OnsaleCount <= 0)
 {   $OnsaleReults = 0;  
 }else{
  $OnsaleReults = $OnsaleCount;
 }

 $sql_get_all = $db->query('SELECT * FROM car_data');
 $getAll = $sql_get_all->rowCount();
 if($getAll <= 0){
   $all = '0';
 }else{
   $all = $getAll;
 }
 include('header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home</title>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Sales', 'Expenses', 'Profit'],
          ['2015', 1000, 400, 200],
          ['2016', 1170, 460, 250],
          ['2017', 660, 1120, 300],
          ['2018', 1030, 540, 350]
        ]);

        var options = {
          chart: {
            title: 'Company Performance',
            subtitle: 'Sales, Expenses, and Profit: 2016-2018',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Work',     15],
          ['Eat',      1],
          ['Communicate',  1],
          ['Research',     4],
          ['Sleep',    4]
        ]);

        var options = {
          title: 'WHAT WE DO ',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
</head>

<body>
  <section id="container" class="">
    <section id="main-content">
      <section class="wrapper">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <h3 class="page-header" style="color: red;font-weight: bold;"><i class="fa fa-laptop"></i> Dashboard</h3>
            </div>
          </div>

        <div class="row">
          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box blue-bg">
                <i class="fa fa-car"></i>
                <div class="count"><?php echo $all ?></div>
                <div class="title">All Cars</div>
            </div>
          </div>

          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box brown-bg">
                <i class="fa fa-taxi"></i> <i class="icon ion-model-s"></i>
                <div class="count"><?php echo  $newCarsResult ?></div>
                <div class="title">New Cars</div>
            </div>
          </div>

          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box dark_bg">
                <i class="fa fa-car"></i>
                <div class="count"><?= $usedCarResult ?></div>
                <div class="title">Used Cars</div>
            </div>
          </div>

          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box green-bg">
                <i class="fa fa-tags"></i>
                <div class="count"><?= $OnsaleReults ?></div>
                <div class="title">Car On Sale</div>
            </div>
          </div>

        </div>
        <br><br>
        <div class="row">
          <div class="col-lg-8 col-md-12">
              <div id="columnchart_material" style="width: 100%; height: 300px;"></div>
          </div>
          <div class="col-md-4">
             <div id="piechart_3d" style="width: 100%; height:400px;"></div>
          </div>
        <div class="row">
        
          <div class="col-md-3">

          </div>
        </div>
      </div>
        <br><br>
      </section>
      <div class="text-right">
        <div class="credits">
        </div>
      </div>
    </section>
    <!--main content end-->
  </section>
  <!-- javascripts -->
<?php include('script.php'); ?>
    <script>
      //knob
      $(function() {
        $(".knob").knob({
          'draw': function() {
            $(this.i).val(this.cv + '%')
          }
        })
      });

      //carousel
      $(document).ready(function() {
        $("#owl-slider").owlCarousel({
          navigation: true,
          slideSpeed: 300,
          paginationSpeed: 400,
          singleItem: true

        });
      });

      //custom select box

      $(function() {
        $('select.styled').customSelect();
      });

      /* ---------- Map ---------- */
      $(function() {
        $('#map').vectorMap({
          map: 'world_mill_en',
          series: {
            regions: [{
              values: gdpData,
              scale: ['#000', '#000'],
              normalizeFunction: 'polynomial'
            }]
          },
          backgroundColor: '#eef3f7',
          onLabelShow: function(e, el, code) {
            el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
          }
        });
      });
    </script>
</body>

</html>
