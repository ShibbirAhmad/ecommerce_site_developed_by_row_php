
<div class="footer">
   	  <div class="wrapper">	
	     <div class="section group">
				<div class="col_1_of_4 span_1_of_4">
						<h4>Information</h4>
						<ul>
						<li><a href="#">About Us</a></li>
						<li><a href="contact.php">Customer Service</a></li>
						<li><a href="index.php"><span>Advanced Search</span></a></li>
						<li><a href="order.php">Orders and Returns</a></li>
						<li><a href="contact.php"><span>Contact Us</span></a></li>
						</ul>
					</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>Why buy from us</h4>
						<ul>
						<li><a href="about.php">About Us</a></li>
						<li><a href="contact.php">Customer Service</a></li>
						<li><a href="contact.php">Privacy Policy</a></li>
						<li><a href="contact.php"><span>Site Map</span></a></li>
						<li><a href="preview.php"><span>Search Terms</span></a></li>
						</ul>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>My account</h4>
						<ul>
							<li><a href="contact.php">Sign In</a></li>
							<li><a href="cart.php">View Cart</a></li>
							<li><a href="Wishlist.php">My Wishlist</a></li>
							<li><a href="order.php">Track My Order</a></li>
							<li><a href="contact.php">Help</a></li>
						</ul>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>Contact</h4>
						<ul>
							<li><span>+88-01737-481778</span></li>
							<li><span>+88-01856-920229</span></li>
						</ul>
						<div class="social-icons">
							<h4>Follow Us</h4>
					   		  <ul>
					   		  	<?php 

                                

                                 $query="SELECT * FROM tbl_social WHERE id='1' ";
                                 $seleting=$db->select($query);
                                 if($seleting){

                                 while($result=$seleting->fetch_assoc()){ 

					   		  	 ?>
							      <li class="facebook"><a href="<?php echo $result['facebook'];?>" target="_blank"> </a></li>

							      <li class="twitter"><a href="<?php echo $result['twitter'];?>" target="_blank"> </a></li>

							      <li class="googleplus"><a href="<?php echo $result['google'];?>" target="_blank"> </a></li>

							      <li class="contact"><a href="<?php echo $result['contact'];?>" target="_blank"> </a></li>
                            <?php  } } ?>

							      <div class="clear"></div>
						     </ul>
   	 					</div>
				</div>
			</div>
			<div class="copy_right">
				<p>Developing by Shibbir Ahmad &amp; All rights Reseverd </p>
		   </div>
     </div>
    </div>