<?php include "inc/header.php"; ?>



  <?php  

       if(!isset($_GET['id']))
       {

          echo "<meta  http-equiv='refresh' content='0;URL=?id=LIVE' />";

       }


  ?>

 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Order Details</h2>		    	
            
			    	 <?php 


       if(isset($_GET['del_product_id']) ){
      

       	      $del_id=$_GET['del_product_id'];

       	      $delcart=$cart->deleteCartProduct($del_id);
       	      
       	      
       }

       ?>
				<table class="tblone">
					<tr>
						<th width="5%">Serial</th>
						<th width="20%">Product Name</th>
						<th width="10%">Image</th>
						<th width="15%">Price</th>
						<th width="5%">Quantity</th>
						<th width="10%">Status</th>
						<th width="20%">Date</th>
						<th width="10%">Action</th>
					</tr>
					<tr>
               
                <?php 
                   
                    $cmrid=session::get('customerID');
                   $getorder=$customer->getOrderProduct($cmrid);
                    
                    if($getorder){
                            $i=0;
                            $sum=0;
                            $qty=0;
                      while($value=$getorder->fetch_assoc()){
                            
                            $i++;
                ?>
						<td><?php echo $i; ?></td>

						<td><?php echo $value ['product_name']; ?></td>

						<td><img src="admin/<?php echo $value['image']; ?> " width="120px"  height="130px" /></td>

						<td>$<?php echo $value['price']; ?></td>

						<td> <?php echo $value['quantity'] ;?> </td>

			            <td>
                  <?php 

                        if($value['status']=='0'){
                        	echo "pending";
                        }else{
                        	echo "shifted";
                        }
                  ?>
                  	
                  </td>


                    <td><?php echo $fm->FormatDate($value['quantity'] ); ?> </td>

					<td>
                         <?php 
                              
                              if($value['status']=='1'){ 
                        
                          ?>
						<a href="?del_product_id=<?php echo $value['order_id']; ?> ">X</a></td>
                        
                            <?php }else{ 
                          
                            echo "Not Available";

                            } ?>
                        
					</tr>
				
					
          <?php } } ?>

				</table>
				
					</div>
					<div class="shopping">
						<div style="margin-left:150px;" class="shopleft">
							<a   href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
						
					</div>
    	</div>  	
       <div class="clear"></div>
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

