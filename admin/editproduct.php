<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';
     
     
     include "../classes/product.php";
    

     $db=new database();
     $fm=new format();

?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>update Product</h2>
        <div class="block">  

          <?php 
               
       if(!isset($_GET['editid']) || $_GET['editid']==NULL ){
    
         echo  "<script> window.location='productlist.php' </script>";
       } else{

          $id=$_GET['editid'];



          if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['submit'])){
         
                 $product=new product();

                 $updating= $product->updateproduct($_POST,$_FILES,$id);
                
                 if( $updating){

                    return  $updating;
                 }
             }


       }

     
           ?>
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
         <?php  
                   
                $query="SELECT * FROM tbl_product WHERE id='$id' ";
          
                $getproduct=$db->select($query);
            if($getproduct) {
                while($show=$getproduct->fetch_assoc()){
            

         ?>
                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="text" value="<?php echo $show['name'] ; ?>" 
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
                        $getcat=$db->select($query);
                        if($getcat) { 
                        while ($cat=$getcat->fetch_assoc()) {
                           
                
                 ?>
                        <option 
                    
                      <?php 

                      if($show['cat_id'] == $cat['catid']){
                     ?>

                     selected="selected"

                     <?php } ?>

                        value="<?php echo $cat['catid']; ?>" > <?php echo $cat['catname']; ?>    

                         </option>
                  
                  <?php } } ?>                    
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
            $getbrand=$db->select($query);
            if($getbrand){ 
            while ($brand=$getbrand->fetch_assoc()) {
               
            
                            ?>
         <option
         
         <?php 

          if($show['brand_id'] == $brand['id']){
         ?>

         selected="selected"

         <?php } ?>

                    
          value="<?php echo $brand['id']; ?>" > <?php echo $brand['brandname']; ?> 
            </option>
          
          <?php } } ?>  
                            
                        </select>
                    </td>
                </tr>
				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Description</label>
                    </td>
                    <td>
                        <textarea class="tinymce" name="body" >

                          <?php echo $show['description'] ; ?>
                          
                        </textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Price</label>
                    </td>
                    <td>
                        <input type="text" value="<?php echo $show['price'];?>" name="price" class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        <img src="<?php echo $show['image'] ; ?>" width="100px" height="120px" /> <br/>
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

                            <?php 
                                 if($show['type']==0){ ?>
                                    <option selected="selected" value="0">General</option>
                                <?php  }else { ?>
                                     
                                     <option selected="selected" value="1">Featured</option>

                               <?php  }
                            ?>
                            
                           
                   
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

        <?php  } } ?>

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


