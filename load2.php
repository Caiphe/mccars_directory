<?php 
  include('includes/links.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style type="text/css">
		body
		{
			width: 100%;
			height: 100%;
			overflow: hidden;
		}
		.spinner
		{
			width: 80px;
			height: 80px;
			border:2px solid #f3f3f3;
			border-top: 3px solid #7f0a0a;
			border-radius: 100%;
			position: absolute;
			top: 0;
			bottom: 0;
			left: 0;
			right: 0;
			margin:auto;
			animation:spin 1s infinite linear;
		}
		@keyframes spin {
			from{
				transform :rotate(0deg);
			}to{
				transform : rotate(360deg);
			}
		}
		#loader_overlay
		{
			height: 100%;
			width:100%;
			background: rgba(0, 0, 0, .6);
			position: fixed;
			left: 0;top: 0;
			z-index: 9999;
		}
	</style>
</head>
<body>
	<div id="loader_overlay">
      <div class="spinner"></div>
    </div>
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
          <li data-target="#carousel-example-generic" data-slide-to="1"></li>
          <li data-target="#carousel-example-generic" data-slide-to="2"></li>
          <li data-target="#carousel-example-generic" data-slide-to="3"></li>
        </ol>
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
          <div class="item active">
            <img src="img/advertise2.jpg" alt="">
            <div class="carousel-caption">
            </div>
          </div>
           <div class="item">
            <img src="img/advertise1.jpg" alt="">
            <div class="carousel-caption">
            </div>
          </div>
          <div class="item">
            <img src="img/advertise4.jpg" alt="">
            <div class="carousel-caption">
            </div>
          </div>
          <div class="item">
            <img src="img/advertise3.jpg" alt="">
            <div class="carousel-caption">
            </div>
          </div>
        </div>
      </div>
</body>
</html>
<script type="text/javascript">
	 setTimeout('hide_overlay()',4000);
      function hide_overlay(){
        $("#loader_overlay").fadeOut(1000);
	/*var loader_overlay = getElementById("loader_overlay");
	window.addEventListener('load', function(){
      loader_overlay.style.display = 'none';
      www.cfdglobal.com
	});
</script>