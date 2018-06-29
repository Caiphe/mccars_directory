
<!Doctype html>
<html lang="en" class="no-js">
<head>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
	<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
	<style>
#myBtn 
{
  display: none;
  position: fixed;
  bottom: 40px;
  right: 30px;
  z-index: 99;
  border: none;
  outline: none;
  background-color : #7f0a0a;
  color: white;
  font-weight: bold;
  cursor: pointer;
  padding: 15px;
  font-size: 18px;
  width: 45px;
  height: 55px;
  border-radius: 10%;
  border:solid 1px white;
  box-shadow: -2px 1px 3px 0px rgba(0,0,0,0.75);
  -webkit-box-shadow: -2px 1px 3px 0px rgba(0,0,0,0.75);
  -moz-box-shadow: -2px 1px 3px 0px rgba(0,0,0,0.75);
  transition: 1s;
  
}
#myBtn:hover 
{
  background-color: #3d0808;
  font-weight: bold;
  color: #ffffff;
}
</style>
</head>
<button onclick="topFunction()" id="myBtn" title="Go to top" class="back-to-top"><i class="icon ion-chevron-up" aria-hidden="true"></i></button>
<div style=""></div>
<script type="text/javascript">
  jQuery(document).ready(function() {
    var offset = 200;
    var duration = 700;
    jQuery(window).scroll(function() {
        if (jQuery(this).scrollTop() > offset) {
            jQuery('.back-to-top').fadeIn(duration);
        } else {
            jQuery('.back-to-top').fadeOut(duration);
        }
    });
    jQuery('.back-to-top').click(function(event) {
        event.preventDefault();
        jQuery('html, body').animate({scrollTop: 0}, duration);
        return false;
    })
});

</script>
<script >
   $(document).ready(function(e){
      $("#searchtextBox").keyup(function(){
        
        var text = $("#searchtextBox").val();
        if(text != '')
        {
          $.ajax({
          method : 'GET',
          url :'fetchCompany.php',
          data : 'txt=' + text,
          dataType ="text",
          success: function(data){
            $("#results").html(data);
          }
        });
       }
        else
        {
          $('#results').html('');
        }
      })
   });
 </script>