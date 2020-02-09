<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';

      include "../classes/brand.php";

?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New brand</h2>
               <div class="block copyblock"> 
                <?php

        $db = new database();
       $adbrand = new brand();

       if( $_SERVER['REQUEST_METHOD'] =='POST' )
       {
           
           $brandname=mysqli_real_escape_string($db->link, $_POST['name']);
         


          $addingbrand = $adbrand->brandadding($brandname);
          if($addingbrand){
            echo "<span class ='success'> new brand added </span>";
          }
       }

?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" placeholder="Enter Brand Name..." name="name" class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>