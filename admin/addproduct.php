<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';
     
     
     include "../classes/product.php";
    

     $db=new database();
     $fm=new format();

?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Product</h2>
        <div class="block">  

          <?php 

     if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['submit'])){
         
                 $product=new product();

                 $addingprodcut= $product->addproduct($_POST,$_FILES);
                
                 if( $addingprodcut){

                    return  $addingprodcut;
                 }
             }

           ?>
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="text" placeholder="Enter Product Name..." 
                        name="name"  class="medium" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Category</label>
                    </td>
                    <td>
                        <select id="select" name="catid">
                            <option>Select Category</option>
                                     <?php 
                            
            $query="SELECT * FROM tbl_category  ";
            $result=$db->select($query);
            while ($value=$result->fetch_assoc()) {
               
            
                            ?>
                <option value="<?php echo $value['catid']; ?>"><?php echo $value['catname']; ?>    </option>
                  
                  <?php } ?>                    
                               </select>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Brand</label>
                    </td>
                    <td>
                        <select id="select" name="brandid">
                            <option>Select Brand</option>
                            <?php 
                            
            $query="SELECT * FROM tbl_brand  ";
            $result=$db->select($query);
            while ($value=$result->fetch_assoc()) {
               
            
                            ?>
         <option value="<?php echo $value['id']; ?>"><?php echo $value['brandname']; ?> 
            </option>
          
          <?php } ?>  
                            
                        </select>
                    </td>
                </tr>
				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Description</label>
                    </td>
                    <td>
                        <textarea class="tinymce" name="body" ></textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Price</label>
                    </td>
                    <td>
                        <input type="text" placeholder="Enter Price..." name="price" class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        <input type="file" name="image" />
                    </td>
                </tr>
				
				<tr>
                    <td>
                        <label>Product Type</label>
                    </td>
                    <td>
                        <select id="select" name="type">
                            <option>Select Type</option>
                            <option value="0">General</option>
                            <option value="1">Featured</option>
                   
                        </select>
                    </td>
                </tr>

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Save" />
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>


