<?php include "inc/header.php"; ?>




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

               $product=$pd->getingAllproducts();
               if($product)
               {
               	while ($result=$product->fetch_assoc()) {

			?>
				<div class="grid_1_of_4 images_1_of_4">

					 <a href="preview.php"><img src="admin/<?php echo $result['image']; ?>" width="200px" height="200px" alt="" /></a>

					 <h2><?php echo $result['name']; ?> </h2>

					 <p><span class="price">$<?php echo $result['price']; ?></span></p>
				    
				      <div class="button"><span><a href="preview.php?productID=<?php echo $result['id']; ?>" class="details">Details</a></span></div>
				      
				</div>

            <?php   }  }  ?>
				

			</div>

			<div class="content_bottom">
    		<div class="heading">
    		<h3>Latest from Acer</h3>
    		</div>
    		<div class="clear"></div>
    	</div>

			<div class="section group">

               <?php 

               $product=$pd->getingAllproduct();
               if($product)
               {
               	while ($result=$product->fetch_assoc()) {

			?>
				<div class="grid_1_of_4 images_1_of_4">

					 <a href="preview.php"><img src="admin/<?php echo $result['image']; ?>" width="200px" height="200px" alt="" /></a>

					 <h2><?php echo $result['name']; ?> </h2>

					 <p><span class="price">$<?php echo $result['price']; ?></span></p>
				    
				     <div class="button"><span><a href="preview.php?productID=<?php echo $result['id']; ?>" class="details">Details</a></span></div>
				</div>

            <?php   }  }  ?>
				
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

