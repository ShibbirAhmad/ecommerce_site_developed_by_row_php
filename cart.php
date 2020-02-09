<?php include "inc/header.php"; ?>






 <?php 

             if($_SERVER['REQUEST_METHOD']=='POST'){

             	    $id=$_POST['cartid'];
             	    $quantity=$_POST['quantity'];
                  

             	   $updatecart=$cart->updateProductCart($quantity,$id);
                     
            
                    if($quantity <= 0){
                   
                    	$delcart=$cart->deleteCartProduct($id);
                    } 
       

             }

             ?>
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
			    	<h2>Your Cart</h2>		    	
            
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
						<th width="20%">Quantity</th>
						<th width="20%">Total Price</th>
						<th width="10%">Action</th>
					</tr>
					<tr>
               
                <?php 
                   
                   $getcat=$cart->getCartProduct();
                    
                    if($getcat){
                            $i=0;
                            $sum=0;
                            $qty=0;
                      while($value=$getcat->fetch_assoc()){
                            
                            $i++;
                ?>
						<td><?php echo $i; ?></td>
						<td><?php echo $value ['product_name']; ?></td>
						<td><img src="admin/<?php echo $value['image']; ?> " width="80px"  height="100px" /></td>
						<td>$<?php echo $value['product_price']; ?></td>
						<td>

			<form action="" method="post">
                <input type="hidden"  name="cartid" value="<?php echo $value['cart_id'] ;?>"/>
				<input type="number" name="quantity" value="<?php echo $value['quantity']; ?>"/>
				<input type="submit" name="submit" value="Update"/>

			</form>


						</td>
						<td>$ <?php 

                          $total= $value['product_price'] * $value['quantity'];
                          $qty=$qty +  $value['quantity'];
                            
                            echo $total;

						?></td>
						<td><a href="?del_product_id=<?php echo $value['cart_id']; ?>">X</a></td>
					</tr>
				
					<?php $sum=$sum + $total ; 

                          session::set("sum",$sum);
                          session::set("qty",$qty);

					?>

          <?php } } ?>

				</table>
				<table style="float:right;text-align:left;" width="40%">
					
					<?php 
                          
                          if($cart->checkCart()){ 

					?>

					<tr>
						<th>Sub Total : </th>
						<td>$<?php echo $sum; ?></td>
					</tr>
					<tr>
						<th>VAT : </th>
						<td>10%</td>
					</tr>
					<tr>
						<th>Grand Total :</th>
						<td>$ <?php 

                              $vat=$sum * 0.10 ;
                              $grand_total=$sum + $vat ;
                              echo $grand_total ;
						  ?> </td>
					</tr>

                     <?php }else {
                   
                         header("Location:index.php");

                     }  ?>

			   </table>
					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
						<div class="shopright">
							<a href="payment.php"> <img src="images/check.png" alt="" /></a>
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

