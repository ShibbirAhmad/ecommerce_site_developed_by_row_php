<?php include "inc/header.php"; ?>

 <div class="main">
    <div class="content">
    	 <div class="login_panel">
        	<h3>Existing Customers</h3>
        	<p>Sign in with the form below.</p>
             
             <?php 
      
        if($_SERVER['REQUEST_METHOD'] =='POST' && isset($_POST['login']))
        {

            
            $signing=$customer->customerLogin($_POST);

                 if($signing){
         	          
         	          echo $signing;
                             
                  }

        }


   ?>

        	<form action="" method="POST" >

                	<input type="email" name="email" placeholder="type your email" />
                	<input type="password" name="password" placeholder="password" />
                 
                 <div class="buttons">
                  	<div><button name="login" class="grey">Sign In</button></div>
                  </div>
                 
                 
                 </form>
                 <p class="note">If you forgot your passoword just enter your email and click <a href="#">here</a></p>
                  




                    </div>


      <?php 
      
        if($_SERVER['REQUEST_METHOD'] =='POST' && isset($_POST['register']))
        {

            
            $registring=$customer->customerResgistration($_POST);

                 if($registring){
         	          
         	          echo $registring;
                             
                             }


        }


   ?>
    	<div class="register_account">
    		<h3>Register New Account</h3>
  

	<form action="" method="POST">
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
		          <input type="text" name="phone" placeholder="contact number">
		          </div>
				  
				  <div>
					<input type="password" name="password" placeholder="password">
				</div>

    	</td>
    </tr> 
    </tbody></table>

   <div class="search">

   	   <div>
   	<button name='register' class="grey">Create Account</button>

     </div>
  </div>

    <p class="terms">By clicking 'Create Account' you agree to the <a href="#">Terms &amp; Conditions</a>.</p>

    <div class="clear"></div>
    </form>




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

