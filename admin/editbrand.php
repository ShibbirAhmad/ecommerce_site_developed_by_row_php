<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';

      include "../classes/brand.php";

?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Edit Brand</h2>
               <div class="block copyblock"> 
                <?php

        $db = new database();
       $editbrand = new brand();
     


      if(!isset($_GET['editid']) || $_GET['editid']==NULL) {

             echo" <scrtipt>window.location='brandlist.php'</scrtipt>";
      }else{
 
            $id=$_GET['editid'];

             $query="SELECT * FROM  tbl_brand WHERE id='$id' ";
             $result=$db->select($query);
             while($value=$result->fetch_assoc()){
         
         
       if( $_SERVER['REQUEST_METHOD'] =='POST' )
       {
           
           $brandname=mysqli_real_escape_string($db->link, $_POST['name']);
         


          $addingbrand = $editbrand->editbrand($brandname,$id);
          if($addingbrand){
            echo "<span class ='success'>brandupdated </span>";
          }
       }

?>
                 <form action="" method="post">
                    <table class="form">                          
                        <tr>
                            <td>
                                <input type="text" value="<?php echo $value['brandname']; ?>" name="name" class="medium" />
                            </td>
                        </tr>
                                    <tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>

    <?php   
        }
      }
 ?>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>