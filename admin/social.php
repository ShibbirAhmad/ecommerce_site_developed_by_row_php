<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<div class="grid_10">
    <div class="box round first grid">

    <?php  
          
          $objofSocial=new social();

        if($_SERVER['REQUEST_METHOD']='POST' &&  isset($_POST['submit'] )){

            $catch_social_data=$objofSocial->UpdateSocial($_POST);

            if($catch_social_data){

                echo $catch_social_data ;
            }
        }

     ?>

        <h2>Update Social Media</h2>
        <div class="block">               
         <form action="" method="POST" >
            <table class="form">					
                <tr>
                    <td>
                        <label>Facebook</label>
                    </td>
                    <td>
                        <input type="text" name="facebook" placeholder="Facebook link.." class="medium" />
                    </td>
                </tr>
				 <tr>
                    <td>
                        <label>Twitter</label>
                    </td>
                    <td>
                        <input type="text" name="twitter" placeholder="Twitter link.." class="medium" />
                    </td>
                </tr>
				
				 <tr>
                    <td>
                        <label>google</label>
                    </td>
                    <td>
                        <input type="text" name="google" placeholder="google link." class="medium" />
                    </td>
                </tr>
				
				 <tr>
                    <td>
                        <label>Contact</label>
                    </td>
                    <td>
                        <input type="number" name="contact" placeholder=" contact number" class="medium" />
                    </td>
                </tr>
				
				 <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Update" />
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>
</div>
<?php include 'inc/footer.php';?>