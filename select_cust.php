<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style type="text/css">
   *{
	  box-sizing: border-box;
	  font-family: 'Helvetica Neue';
	}
	.input {
	  border: 1px solid #ddd;
	  border-radius: 3px;
	  padding: 8px 6px;
	  color: #fff;
	  background-color:#9C0A6D;
	  font-weight: 300;
	  font-size: 13px;
	  position: relative;
	}

	.select {
	  cursor: pointer;
	  position: relative;
	  margin: 50px auto;
	  width: 250px;

	}
	.select .input:after, .select .input:before {
	  content: '';
	  position: absolute;
	  left: calc(100% - 20px);
	  transform: translateY(-50%);
	  width: 0;
	  height: 0;
	  
	}
	.select .input:before {
	  border-top: 5px solid #999;
	  border-left: 5px solid transparent;
	  border-right: 5px solid transparent;
	  top: 50%;
	}
	.select .input:after {
	  border-top: 5px solid #fff;
	  border-left: 5px solid transparent;
	  border-right: 5px solid transparent;
	  top: calc(50% - 1px);
	}
	.select-options {
	  border: 1px solid orange;
	  position: absolute;
	  width: 100%;
	  background-color:#790B56;
	  border-radius: 3px;
	  z-index: 100;
	  top: 0;
	  left: 0;
	  padding-top: 30px;
	  display: none;
	  overflow: hidden;
	}
	.select-options.visible {
	  display: block;
	}
	.select-options ul {
	  list-style: none;
	  padding: 0;
	  margin: 0;
	}
	.select-options ul li {
	  padding: 8px 50px 8px 6px;
	  border-bottom: 1px solid #ddd;
	  font-size: 13px;
	  color: #999;
	  font-weight: 300;
	  position: relative;
	  overflow: hidden;
	}
	.select-options ul li:hover {
	  background-color: #f2f2f2;
	}
	.select-options ul li:last-child {
	  border-bottom: 0;
	}
	.select-options ul li.selected > span:first-child {
	  color: orange;
	}
	.select-options ul li.selected:after {
	  content: '';
	  width: 5px;
	  height: 10px;
	  border: 1px solid orange;
	  border-right: 0;
	  border-bottom: 0;
	  left: calc(100% - 20px);
	  top: 50%;
	  transform: translateY(-50%) rotate(-135deg);
	  position: absolute;
	}
</style>
</head>
<body>
<div class="container">
  <div class="row">
  	<div class="col-md-4">
  		<div class="select">
    <div class="input">
    </div>
    <div class="select-options">
      <ul>
        <li>
          <span>Option 1 description</span>
        </li>
        <li>
          <span>Option 2 description</span>
        </li>
        <li>
          <span>Option 3 description</span>
        </li>
        <li class="selected">
          <span>Option 4 description</span></li>
      </ul>
    </div>
  </div>
  	</div>

  </div>

</div>
</body>
</html>
<script type="text/javascript">
	$(function() {
  if ($('.select-options ul li').hasClass('selected')) {
    $('.select .input').text($('.select-options li.selected > span:first-child').text());
  } else {
    $('.select .input').text($('.select-options li:first-child > span:first-child').text());
  }
  $('.select').click(function() {
    $('.select-options').toggleClass('visible');
  });
  $('.select-options li').click(function() {
    $('.selected').removeClass('selected');
    $(this).addClass('selected');
    $('.select .input').text($(this).find('span:first-child').text());
  });
})
</script>