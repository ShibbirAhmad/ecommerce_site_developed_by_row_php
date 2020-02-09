<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Update Slider</h2>
    <div class="block">               
         
        <?php 

             $sliderClass= new slider();

             if($_SERVER['REQUEST_METHOD']="POST" && isset($_POST['submit'])){
             
             if(isset($_GET['slideID'])){

                $editid=$_GET['slideID'];
             

             $addingSlider=$sliderClass->updateSlider($_POST,$editid);
              
              if($addingSlider) {

                echo $addingSlider;
                
              } }
            }



        ?>
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">     
                <tr>
                    <td>
                        <label>Title</label>
                    </td>
                    <td>
                        <input type="text" name="title" placeholder="Enter Slider Title..." class="medium" />
                    </td>
                </tr>           
    
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        <input type="file" name="image"/>
                    </td>
                    <td> 
                         
                         <?php  
                        
                        if(isset($_GET['slideID'])){
                         
                           $id=$_GET['slideID'];
                          
                        $query="SELECT * FROM tbl_slideshow WHERE slide_id='$id' ";
                        $searhing=$db->select($query);

                    

                       while($value=$searhing->fetch_assoc()){ 
                          

                         ?>

                        <img src="<?php echo $value['slide']; ?>" width="100px" height="120px" />

                    <?php } } ?>

                    </td>
                </tr>
               
				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="update" />
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