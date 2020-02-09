<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';

      include "../classes/addcatagory.php";

?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Category</h2>
               <div class="block copyblock"> 
                <?php

        $db = new database();
       $addcat = new addcatagory();

       if( $_SERVER['REQUEST_METHOD'] =='POST' )
       {
           
           $catname=mysqli_real_escape_string($db->link, $_POST['name']);
         


          $addingcatagory = $addcat->catagory($catname);
          if($addingcatagory){
            echo "<span class ='success'> new catagory added </span>";
          }
       }

?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" placeholder="Enter Category Name..." name="name" class="medium" />
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