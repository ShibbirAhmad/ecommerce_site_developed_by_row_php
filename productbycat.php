<?php include "inc/header.php"; ?>


     <?php  

          if(!isset($_GET['bycat_name']) || $_GET['bycat_name']==NULL ){
    
         echo  "<script> window.location='404.php' </script>";
       } else{

          $name=$_GET['bycat_name'];

     }


     ?>

 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Latest from Iphone</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
             
             <?php 
                  
                  $getcatproduct=$pd->getProductBycatlist($name);
                  if($getcatproduct){
                  	while ($result=$getcatproduct->fetch_assoc()) {
                 
             ?>

				<div class="grid_1_of_4 images_1_of_4">
					 <a href="preview.php?productID=<?php echo $result['id'];?>"><img src="admin/<?php echo $result['image'];?>" alt="" /></a>

					 <h2><?php echo $result['name'];?> </h2>

					 <p><?php echo $fm->textshorten($result['description']) ;?></p>

					 <p><span class="price">$<?php echo $result['price'];?></span></p>

				     <div class="button"><span><a href="preview.php?productID=<?php echo $result['id'];?>" class="details">Details</a></span></div>
				</div>
				
				<?php }  } else {
                    
                        header("Location:404.php");   
                
			    } ?>
			</div>

	
	
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

