<table>
		   				<tbody>

						<tr>
						<td>
							<div>
							<input type="text" name="name" placeholder="your name">
							</div>
							
							<div>
                           <input type="text" name="city" placeholder="your city">
							</div>
							
							<div>
								<input type="number" name="zip" placeholder="zip code">
							</div>
							<div>
								<input type="email" name="email" placeholder="email address">
							</div>
		    			 </td>
		    			<td>
						<div>
							<input type="text" name="address" placeholder="address">
						</div>
		    		<div>
						<select id="country" name="country"  class="frm-field required">
							<option value="null">Select a Country</option>         
							<option value="Afghanistan">Afghanistan</option>
							<option value="Albania">Albania</option>
							<option value="Algeria">Algeria</option>
							<option value="Argentina">Argentina</option>
							<option value="Armenia">Armenia</option>
							<option value="Aruba">Aruba</option>
							<option value="Australia">Australia</option>
							<option value="Austria">Austria</option>
							<option value="Azerbaijan">Azerbaijan</option>
							<option value="Bahamas">Bahamas</option>
							<option value="Bahrain">Bahrain</option>
							<option value="Bangladesh">Bangladesh</option>

		         </select>
				 </div>		        
	
		           <div>
		          <input type="number" name="phone" placeholder="contact number">
		          </div>
				  
				  <div>
					<input type="passoword" name="passoword" placeholder="passoword">
				</div>
		    	</td>
		    </tr> 
		    </tbody></table> 








		    <?php include "inc/header.php"; ?>

 <div class="main">
    <div class="content">
    	 

      <?php 
      
        if($_SERVER['REQUEST_METHOD'] =='POST' && isset($_POST['save']))
        {

            
            $updating=$customer->customerUpdating($_POST);

                 if($updating){
         	          
         	          echo $updating;
                             
                             }


        }


   ?>
    	<div class="register_account">
    		<h3>Update your information</h3>
		  <?php   

		                  $id=session::get('customer_id');

		                  $showing_customer=$customer->customerData($id);

		                  if($showing_customer){

		                  	while ($result=$showing_customer->fetch_assoc()) {
		                  		

		              ?>

	<form action="" method="POST">
   			 
           <table>
 			
 			

   				<tbody>
				<tr>
				<td>
		        	<div>
						<input type="text" name="name" value="<?php echo $result['name']; ?>"  >
						</div>
						
						<div>
                       <input type="text" name="city" value="<?php echo $result['city']; ?>"    >
						</div>
						
						<div>
							<input type="number" name="zip"  value="<?php echo $result['zip']; ?>" >
						</div>
						<div>
							<input type="email" name="email" value="<?php echo $result['email']; ?>"  >
						</div>
	    			 </td>
    			<td>
				<div>
							<input type="text" name="address" value="<?php echo $result['address']; ?>" >
						</div>
    		<div>
				<select id="country" name="country"  class="frm-field required">
						
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
		          <input type="text" name="phone" value="<?php echo $result['phone']; ?>" />
		          </div>
				  
				  <div>
					<input type="password" name="password" value="<?php echo $result['password']; ?>" />
				</div>

    	</td>
    </tr> 
    </tbody>


 

</table>
      
   <div class="search">

   	   <div>
   	<button name='save' class="grey">Save</button>

     </div>
  </div>


    <div class="clear"></div>
         

    </form>
  
 <?php   }  }  ?>


    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
</div>
  
<?php include "inc/footer.php";  ?>
</body>
</html>

