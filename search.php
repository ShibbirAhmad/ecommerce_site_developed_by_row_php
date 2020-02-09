<?php include "inc/header.php"; ?>




 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>your searching result</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">

               

<?php 


             if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['search'])) {
                              
                   $searchingData=$_POST['search'];

          }
                  $query="SELECT * FROM tbl_product WHERE name LIKE '%$searchingData%' OR description  LIKE '%$searchingData%' ";

                  $getSearch=$db->select($query);

                  if($getSearch){
            
            while($results=$getSearch->fetch_assoc()){

          
            
        ?>      
	
				<div class="grid_1_of_4 images_1_of_4">
         <?php  
               
    
            
            
         ?>
					 <a href="preview.php"><img src="admin/<?php echo $results['image']; ?>" width="200px" height="200px" alt="" /></a>

					 <h2><?php echo $results['name']; ?> </h2>

					 <p><span class="price">$<?php echo $results['price']; ?></span></p>
				    
				      <div class="button"><span><a href="preview.php?productID=<?php echo $results['id']; ?>" class="details">Details</a></span></div>
				      
				</div>


			<?php 

          }
          	}else{
          		?>
      <p>No related Post found...</p>
          		
         <?php 	} 
          
			?>

            

				

				

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

