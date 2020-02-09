<?php include "inc/header.php"; ?>





 <div class="main">
    <div class="content">
    	<div class="section group">
          
          <?php 
               
       if(!isset($_GET['productID']) || $_GET['productID']==NULL ){
    
         echo  "<script> window.location='404.php' </script>";
       } else{

          $id=$_GET['productID'];
               


               $getsingle=$pd->getsingaleleproduct($id);
               if($getsingle){
               	while ($result=$getsingle->fetch_assoc()) {
               	

               
     ?>
				<div class="cont-desc span_1_of_2">				
					<div class="grid images_3_of_2">

				 <a href="#"><img src="admin/<?php echo $result['image']; ?>" width="200px" height="200px" alt="" /></a>

					</div>
				<div class="desc span_3_of_2">
					<h2><?php echo $result['name']; ?> </h2>
									
					<div class="price">
						<p>Price: <span>$<?php echo $result['price']; ?></span></p>
						<p>Category: <span><?php echo $result['catname']; ?></span></p>
						<p>Brand:<span><?php echo $result['brandname']; ?></span></p>
					</div>

				<div class="add-cart">

            <?php 

             if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['submit']) ){
             	   
                   $quantity=$_POST['quantity'];

                   $sendig_cart=$cart->addingtocart($quantity,$id);

             }elseif ($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['wishlist'])) {
             	 
             	   $quantity=$_POST['quantity'];

                   $sendig_cart=$wishlist->addingToWishList($quantity,$id);
             }else  {}
         
         ?>

       

					<form action="" method="post">
					
						<input type="number" class="buyfield" name="quantity" value="1"/>
						<input type="submit" class="buysubmit" name="submit" value="Buy Now"/> 
                        


            <input type="submit" class="buysubmit" name="wishlist" value="Add wishlist" />



		</form>				
				</div>


			</div>
			<div class="product-desc">
			<h2>Product Details</h2>

			<p><?php echo $fm->textshorten($result['description']); ?> </p>

	    </div>
				
	</div>

 <?php  

             }
           }
        }
?>

				<div class="rightsidebar span_3_of_1">
					<h2>CATEGORIES</h2>
					<ul>
            <?php  

        $query="SELECT * FROM tbl_category  ORDER BY catid DESC  ";
           $getcat=$db->select($query);
            while ($value=$getcat->fetch_assoc()) {
            	
             ?>
				      <li><a href="productbycat.php?bycat_name=<?php echo $value['catname'];  ?>"><?php echo $value['catname']; ?></a></li>
				     
          <?php  }  ?>
    				</ul>
    	
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

