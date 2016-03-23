<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Site under construction</title>

<link rel="stylesheet" type="text/css" href="suc/style.css" />
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.pack.js"></script>
<script type="text/javascript" src="suc/js/jquery.countdown.js"></script>

<!-- jquery countdown-->
<script type="text/javascript">
$(function () {
var austDay = new Date("December 19, 2014 19:30:00");
    $('#defaultCountdown').countdown({until: austDay, layout: '{dn} {dl}, {hn} {hl}, {mn} {ml}, y {sn} {sl}'});
    $('#year').text(austDay.getFullYear());
    });
</script>

</head>

<body>


<div class="container">
	
    <div id="header">
    
    	<div id="logo">
        	<a href="http://www.abrenet.com/" target="_blank"><img src="suc/abrenet-logo.jpg" alt="logo"/></a>
        </div><!--end logo-->
            
        <div id="contact_details">
        	<!--<p><a href="#">support@yoursite.com</a></p>
			<p><a href="#">phone : 555-534-231</a></p>-->
		</div><!--end contact details-->     
                
	</div><!--end header-->
              <div style="clear:both"></div> 
              
	<div id="main">

		 <div id="content">
                    
              <div class="text">
              <h2>Este sitio web está en mantenimiento</h2>
              </div><!--end text-->
                  
              <div class="counter">
              <h3>Tiempo estimado restante antes de lanzamiento:</h3>
              <div id="defaultCountdown"></div>

         </div><!--end counter-->
                 
          
                </div><!--end content-->
            <p class="copyright">Copyright &copy; www.abrenet.com.</p>
</div><!--end main-->

</div><!--end class container-->

</body>

</html>
