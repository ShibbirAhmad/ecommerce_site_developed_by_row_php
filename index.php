<?php include "inc/header.php"; ?>



	<div class="header_bottom">
		<div class="header_bottom_left">


			<div class="section group">
                 
                 <?php 

                     $getIphone=$pd->productiphoe();
                     	if($getIphone){

                         while($iphone=$getIphone->fetch_assoc()){
                             

                 ?>

                    <div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="preview.php?productID=<?php echo $iphone['id']; ?>"> <img src="admin/<?php echo $iphone['image']; ?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>Laptop</h2>
						<p><?php echo $fm->textshorten($iphone['description'],130)  ; ?></p>
						<div class="button"><span><a href="preview.php?productID=<?php echo $iphone['id']; ?>">Add to cart</a></span></div>
				   </div>
			   </div>	
             <?php }  } ?>
             

            <?php 

                     $getsamsung=$pd->productsamsung();
                     	if($getsamsung){

                         while($samsung=$getsamsung->fetch_assoc()){
                             

                 ?>
            
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <a href="preview.php?productID=<?php echo $iphone['id']; ?>"> <img src="admin/<?php echo $samsung['image']; ?>" alt="" /></a>
					</div>
					<div class="text list_2_of_1">
						  <h2>Samsung</h2>
						  <p><?php echo $fm->textshorten($samsung['description'],130)  ; ?></p>
						  <div class="button"><span><a href="preview.php?productID=<?php echo $samsung['id']; ?>">Add to cart</a></span></div>
					</div>
				</div>

            <?php }  } ?>

			</div>



			<div class="section group">
            <?php 

                     $getwalton=$pd-> productwalton();
                     	if($getwalton){

                         while($walton=$getwalton->fetch_assoc()){
                             

                 ?>
				<div class="listview_1_of_2 images_1_of_2">
                      <div class="listimg listimg_2_of_1">
						  <a href="preview.php?productID=<?php echo $walton['id']; ?>"> <img src="admin/<?php echo $walton['image']; ?>" alt="" /></a>
					</div>
					<div class="text list_2_of_1">
						  <h2>CANON</h2>
						  <p><?php echo $fm->textshorten($walton['description'],130)  ; ?></p>
						  <div class="button"><span><a href="preview.php?productID=<?php echo $walton['id']; ?>">Add to cart</a></span></div>
					</div>
			   </div>
            
            <?php }  } ?>

        <?php 

                     $getcanon=$pd->productcanon();
                     	if($getcanon){

                         while($canon=$getcanon->fetch_assoc()){
                             

                 ?>
				<div class="listview_1_of_2 images_1_of_2">
				 
				 <div class="listimg listimg_2_of_1">
						  <a href="preview.php?productID=<?php echo $canon['id']; ?>"> <img src="admin/<?php echo $canon['image']; ?>" alt="" /></a>
					</div>
					<div class="text list_2_of_1">
						  <h2>WALTON</h2>
						  <p><?php echo $fm->textshorten($canon['description'],130)  ; ?></p>
						  <div class="button"><span><a href="preview.php?productID=<?php echo $canon['id']; ?>">Add to cart</a></span></div>
					</div>
				</div>

              <?php }  } ?>

			</div>

		  <div class="clear"></div>



		</div>



			 <div class="header_bottom_right_images">
		   <!-- FlexSlider -->
             
	<?php include "inc/slider.php" ; ?>		
   

<!-- FlexSlider -->
	    </div>
	  <div class="clear"></div>
  </div>	

 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Feature Products</h3>
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
					 <p><?php echo $fm->textshorten($result['description'],150); ?></p>
				 	 <p><span class="price">$<?php echo $result['price']; ?></span></p>
				     <div class="button"><span><a href="preview.php?productID=<?php echo $result['id']; ?>" class="details">Details</a></span></div>
	    
				</div>

				 <?php                  		
               	
                 }
               }

        ?>
			</div>
			<div class="content_bottom">
    		<div class="heading">
    		<h3>New Products</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">

        <?php  

               $product=$pd->getingnewproduct();
               if($product)
               {
               	while ($results=$product->fetch_assoc()) {

			?>

				<div class="grid_1_of_4 images_1_of_4">
					
			 		<a href="preview.php"><img src="admin/<?php echo $results['image']; ?>" width="250px" height="280px" alt="" /></a>

					 <h2><?php echo $results['name']; ?> </h2>

					 <p><span class="price">$<?php echo $results['price']; ?></span></p>

				     <div class="button"><span><a href="preview.php?productID=<?php echo $results['id']; ?>" class="details">Details</a></span> 
				     </div>
	    				

				 </div>

				<?php   }

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
    <link href="css/flexslider.css" rel='stylesheet' type='text/css' />
	  <script defer src="js/jquery.flexslider.js"></script>
	  <script type="text/javascript">
		$(function(){
		  SyntaxHighlighter.all();
		});
		$(window).load(function(){
		  $('.flexslider').flexslider({
			animation: "slide",
			start: function(slider){
			  $('body').removeClass('loading');
			}
		  });
		});
	  </script>
</body>
</html>
