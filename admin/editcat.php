<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';

      include "../classes/editcetagory.php";

?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Edit Cetagory Category</h2>
               <div class="block copyblock"> 
                <?php

        $db = new database();
       $editcat = new editcatagory();
     


      if(!isset($_GET['editid']) || $_GET['editid']==NULL) {

      	 echo" <scrtipt>window.location='catlist.php'</scrtipt>";
      }else{
 
      	$id=$_GET['editid'];

      	 $query="SELECT * FROM  tbl_category where catid='$id' ";
      	 $result=$db->select($query);
      	 while($value=$result->fetch_assoc()){
         
         
       if( $_SERVER['REQUEST_METHOD'] =='POST' )
       {
           
           $catname=mysqli_real_escape_string($db->link, $_POST['name']);
         


          $addingcatagory = $editcat->editcatagory($catname,$id);
          if($addingcatagory){
            echo "<span class ='success'> catagory updated </span>";
          }
       }

?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" value="<?php echo $value['catname']; ?>" name="name" class="medium" />
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