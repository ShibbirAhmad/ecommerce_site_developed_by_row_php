<?php 
  
   include "lib/session.php";
   session::init();
   include "lib/database.php";
   include "helper/format.php";
   
            spl_autoload_register(function($class){
            	include_once "classes/".$class.".php";
            });

           $db       = new database();
           $fm       = new format();
           $pd       = new product();
           $cart     = new cart();
           $customer = new customer();
           $wishlist = new wishlist();
        
           

?>

<!DOCTYPE HTML>
<head>
<title>Store Website</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/menu.css" rel="stylesheet" type="text/css" media="all"/>
<script src="js/jquerymain.js"></script>
<script src="js/script.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="js/nav.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script> 
<script type="text/javascript" src="js/nav-hover.js"></script>
<link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
<script type="text/javascript">
  $(document).ready(function($){
    $('#dc_mega-menu-orange').dcMegaMenu({rowItems:'4',speed:'fast',effect:'fade'});
  });
</script>
</head>

        <?php 

             if(isset($_GET['logoutID'])){
                   
                   $delsCustomer=$cart->DeleteSessionCustomer();
                   if($delsCustomer){
                   	echo $delsCustomer;
                   }

                   session::destroy();
             }

        ?>

<body>
  <div class="wrap">
		<div class="header_top">
			<div class="logo">
				<a href="index.php"><img src="images/logo.png" alt="" /></a>
			</div>
			  <div class="header_top_right">
			    <div class="search_box">


          
 
				    <form action="search.php" method="post">

				    	<input type="text" name="search" value="Search for Products" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search for Products';}"> 

              <input type="submit" value="search">

				    </form>


			    </div>
			    <div class="shopping_cart">
					<div class="cart">
						<a href="#" title="View my shopping cart" rel="nofollow">
								<span class="cart_title">Cart</span>
								<span class="no_product">
                            
                    <?php
                            if($cart->checkCart()){
                                  $sum=session::get("sum");
                                  $qty=session::get("qty");
                                  
                                  echo "$".$sum ." >".$qty."-item";
                        }else{

                           ?>

                               (empty)
                    <?php
                         }
                    ?>
								</span>
							</a>
						</div>
			      </div>
		   <div style="margin-top:0px " class="login">
             
             <?php 
             $login=session::get("customer_login");
                   
                   if($login==false) {
              ?>
		    <a href="login.php">Login</a>
            <?php } else{?>
            <a href="?logoutID">Logout</a>
        <?php  } ?>

		</div>
		 <div class="clear"></div>
	 </div>
	 <div class="clear"></div>
 </div>
<div class="menu">

	<ul id="dc_mega-menu-orange" class="dc_mm-orange">
	  <li><a href="index.php">Home</a></li>
	  <li><a href="products.php">Products</a> </li>
	  
             <?php 
               
               $getingcart=$cart->checkCart();
              
               if($getingcart){
        ?> 
         <li><a href="cart.php">Cart</a></li>
         <li><a href="payment.php">Payment</a></li> 
       
             <?php  } ?>

       <?php 
               
               $getingwishlist=$wishlist->checkWishlist();
              
               if($getingwishlist){
        ?> 

         <li><a href="wishlist.php">wishList</a></li>

       <?php }  ?>
	        
          <?php 
               
               $cmrid=session::get('customerID');
               $getingOrderCustomer=$customer->checkOreder($cmrid);

               if($getingOrderCustomer){
                ?>

               <li><a href="orderdetails.php">order</a></li> 

           <?php     
               }
          ?>
        
        <?php
              $prof=session::get('customer_login');
              if($prof==true){
         ?>

         <li><a href="profile.php">profile</a> </li>
        
          <?php    }
         ?>
	  

	  <li><a href="contact.php">Contact</a> </li>
	  <div class="clear"></div>
	</ul>

</div>