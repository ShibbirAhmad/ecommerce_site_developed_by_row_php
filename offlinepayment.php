<?php include "inc/header.php"; ?>

 <div class="main">
    <div class="content">

    	
<?php 

    if(isset($_GET['orderID'] ))
    {
    	$customer_id=session::get('customerID');

    	$getorder=$cart->AddOrder($customer_id);

		if($getorder)
					{
                      header("Location:order.php"); 
					}
    	echo $delsc=$cart->DeleteSessionCustomer();
    }

?>
    	<div class="register_account">
    		<h3>Update your information</h3>
		 

	<form action="" method="POST">
   			 
          <table>
		   				<tbody>
                            <?php   

		                     $SessionID=session::get('customerID');
                              

		                  $showing_customer=$customer->customerData($SessionID);

		                  if($showing_customer){

		                  	while ($result=$showing_customer->fetch_assoc()) {
		                  		

		              ?>
							<tr>
				<td>
		        	<div>
					
				Name:<input type="text" name="name" value="<?php echo $result['name']; ?>"  >
						</div>
						
						<div>
                  City: <input type="text" name="city" value="<?php echo $result['city']; ?>"    >
						</div>
						
						<div>
				Zip-code:<input type="number" name="zip"  value="<?php echo $result['zip']; ?>" >
						</div>
						<div>
			    Email:		<input type="email" name="email" value="<?php echo $result['email']; ?>"  >
						</div>
	    			 </td>
    			<td>
				<div>
				Address:<input type="text" name="address" value="<?php echo $result['address']; ?>" >
						</div>
    		<div>
				Country:<select id="country" name="country"  class="frm-field required">
						
							<option  value="null">Select a Country</option>
							<?php 
							if($result['country']=='Afghanistan'){ ?>

                          <option selected="selected" value="Afghanistan">Afghanistan</option>

							<?php }elseif ($result['country']=='Albania') { ?>

								<option selected="selected" value="Albania">Albania</option>

							<?php }elseif ($result['country']=='Algeria') { ?>

								<option selected="selected" value="Algeria">Algeria</option>

							<?php }elseif ($result['country']=='Argentina') { ?>

								<option selected="selected" value="Argentina">Argentina</option>

							<?php }elseif ($result['country']=='Australia') { ?>

								<option selected="selected" value="Australia">Argentina</option>

							<?php }elseif ($result['country']=='Bahrain') { ?>

								<option selected="selected" value="Bahrain">Bahrain</option>

							<?php }else{ 	?> 
							
							
							<option selected="selected" value="Bangladesh">Bangladesh</option>
                           
                           <?php   } ?>  
		         </select>
		 </div>		        

           
		           <div>
		        Phone: <input type="text" name="phone" value="<?php echo $result['phone']; ?>" />
		          </div>
				 

    	</td>
    </tr> 
        <?php   }  }  ?>

		    </tbody></table> 


      
   <div class="search">

   	   <div>
   	<button name='save' class="grey"><a href="profile.php">update address</a></button>
   	<a class="or" >OR</a>
   	<a class="order" href='?orderID=order'>Order confirmly</a>

     </div>
  </div>


    <div class="clear"></div>
         

    </form>
  
 
<style>
	.grey{margin-left:370px;margin-top:-70px; }
	.or{background:black;color:#fff;padding:10px;}
	.order{border-radius:5px;min-width:100px;height:36px;background:red;padding:10px;
		color:#fff;font-style:bold;border:1px solid #4e4e4e; }
</style>

    	</div>  	
       <div class="clear"></div>
    

   
   </div>
   </div>


  
<?php include "inc/footer.php";  ?>
</body>
</html>

