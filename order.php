<?php include "inc/header.php"; ?>

<div class="main">
<div class="content">
    	 
      <div style="text-align:center;min-width:400px;min-height:300px;background:#fc9;" class="box">
        <h2 style="color:green;font-style:italic;text-align:center;margin-bottom:50px;"> ordered successfully...!  </h2>
       
       <h2><a style="font-size:20px;color:blue;" href="orderdetails.php">show order details......</a></h2>

      </div>


</div>
</div>
     
       
   <?php include "inc/footer.php";  ?>

   
    <script type="text/javascript">
		$(document).ready(function() {
			/*
			var defaults = {
	  			containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
	 		};
			*/
			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
    <a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
</body>
</html>

