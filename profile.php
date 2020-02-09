<?php include "inc/header.php"; ?>

 <div class="main">
    <div class="content">
    	 

      <?php 
      
        if($_SERVER['REQUEST_METHOD'] =='POST' && isset($_POST['save']))
        {

              $ID=session::get('customerID');

            $updating=$customer->customerUpdating($_POST,$ID);

                 if($updating){
         	          
         	          echo $updating;
                             
                             }


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
				  
				  <div>
			password:<input type="password" name="password" value="<?php echo $result['password']; ?>" />
				</div>

    	</td>
    </tr> 
        <?php   }  }  ?>

		    </tbody></table> 


      
   <div class="search">

   	   <div>
   	<button name='save' class="grey">Save</button>

     </div>
  </div>


    <div class="clear"></div>
         

    </form>
  
 


    	</div>  	
       <div class="clear"></div>
    </div>

</div>
  
<?php include "inc/footer.php";  ?>
</body>
</html>

