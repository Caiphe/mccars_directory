<?php 

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="#">
  <meta name="author" content="#">
  <meta name="keyword" content="#">
  <title>mccars</title>
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <link href="css/style.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/w3school3.css">
  <link href="css/pop.css" rel="stylesheet">
  <link href="css/animate.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/bs-3.3.5/jq-2.1.4,dt-1.10.8/datatables.min.css"/>
  <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="http://www.datatables.net/rss.xml">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">

  <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
  <script src="js/scripts.js"></script>
  <script src="js/jquery-ui-1.10.4.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.dataTables.min.css">
  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../css/ionicons.css">

</head>
<body>
<div id="sidebar" class="nav-collapse ">
        <ul class="sidebar-menu">
          <li class="active">
            <a class="" href="index.php">
                <i class="icon_house_alt"></i>
                <span>Dashboard</span>
            </a>
          </li>
          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="fa  fa-align-left"></i><span>Car Make</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="addMak.php">Our Makes</a></li>
            </ul>
          </li>

          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="fa fa-th-list"></i><span> Car Model</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="addModel.php">Our Models</a></li>
            </ul>
          </li>

           <li class="sub-menu">
            <a href="javascript:;" class="">
                <i class="fa fa-car"></i>
                <span>All Cars</span>
                <span class="menu-arrow arrow_carrot-right"></span>
            </a>
            <ul class="sub">
              <li><a class="" href="addCars.php"> Add Cars</a></li>
              <li><a class="" href="newCars.php"> News Cars</a></li>
              <li><a class="" href="usedCars.php"> Used Cars</a></li>
              <li><a class="" href="advertisedCars.php"> To Advertise</a></li>
            </ul>
          </li>        
         
          <li class="sub-menu">
            <a href="javascript:;" class="">
              <i class="fa fa-road"></i>
              <span>Area</span>
              <span class="menu-arrow arrow_carrot-right"></span>
            </a>
            <ul class="sub">
              <li><a class="" href="area.php">Area</a></li>
            </ul>
          </li>

           <li class="sub-menu">
            <a href="javascript:;" class="">
                <i class="fa fa-money"></i>
                <span>Price</span>
                <span class="menu-arrow arrow_carrot-right"></span>
                </a>
            <ul class="sub">
              <li><a class="" href="prices.php">Price</a></li>
            </ul>
          </li>

          <li class="sub-menu">
            <a href="javascript:;" class="">
              <i class="fa fa-user"></i>
              <span>Users</span>
              <span class="menu-arrow arrow_carrot-right"></span>
              </a>
            <ul class="sub">
              <li><a class="" href="">Our Users</a></li>
              <li><a class="" href="">Admin</a></li>
            </ul>
          </li>
        </ul>
      </div>
      <header class="header dark-bg">
      <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
      </div>
      <a href="index.php" class="logo"><img src="img/logo.png"></a>

      <div class="nav search-row" id="top_menu">
      </div>

      <div class="top-nav notification-row">
        <ul class="nav pull-right top-menu">
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <span class="profile-ava">
                    <img alt="" src="img/avatar1_small.jpg">
                </span>
                <span class="username">Hello! <?php echo $_SESSION["username"]?></span>
                <b class="caret"></b>
              </a>
            <ul class="dropdown-menu extended logout">
              <div class="log-arrow-up"></div>
              <li class="eborder-top">
                <a href="#"><i class="icon_profile"></i> My Profile</a>
              </li>
             
              <li>
                <a href="logout.php"><i class="icon_key_alt"></i> Log Out</a>
              </li>
              <li>
                <a href="#"><i class="icon_key_alt"></i> Edit</a>
              </li>
              <li>
                <a href="#"><i class="icon_key_alt"></i> Documentation</a>
              </li>
            </ul>
          </li>
          <!-- user login dropdown end -->
        </ul>
        <!-- notificatoin dropdown end-->
      </div>
    </header>
</body>
</html>