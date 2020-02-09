<?php include "inc/header.php"; ?>





 
 <?php 


      $customer=session::get('customer_login');
      if($customer == false){

              header("Location:login.php");
      }

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

<style type="text/css">
  
.payment {
            width: 500px;
            min-height: 300px;
            background: #f6eead;
            margin: 0 auto;
            text-align: center;
            border: 1px solid #fc721e;
            border-radius: 5px;
         }

  
.content h2 {
              font-size: 23px;
              color: #6C6C6C;
              font-family: 'Monda', sans-serif;
              border-bottom: 2px solid #fc721e;
              margin-bottom: 50px;
              margin-top: 20px;
              padding: 10px;
            }


.content  a {
            text-decoration: none;
            background: #4e4e4e;
            padding: 20px;
            border-radius: 20px;
            color: #fff;
            font-size: 20px;
            font-style: italic;
}

.back {
  min-width:100px;
  height: 40px;
  text-align: center;
  margin: 0 auto;
  margin-top:25px; 
}

.back a{
  padding:10px;
  border-radius:5px;

}

</style>

 <div class="main">
    <div class="content">
    	
         <div class="payment">
         <h2>chose your payment method</h2>
        
       <a href="offlinepayment.php">offline payment</a>
         
         <a href="#">online payment</a>
         </div>
         
         <div class="back">
                <a href="cart.php">Back</a>
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

