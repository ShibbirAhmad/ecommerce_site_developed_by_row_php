<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Slider List</h2>
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>No.</th>
					<th>Slider Title</th>
					<th>Slider Image</th>
					<th>Action</th>
				</tr>

			</thead>
			<tbody>
                
                <?php 
                 
                      $objofslide  = new slider();
                      $catchslide=$objofslide->showSlider();
                      if($catchslide){
                          
                          $i=0;
                           
                      	while ($value=$catchslide->fetch_assoc()) {
                      		$i++;
                     
                ?>
				<tr class="odd gradeX">
					<td><?php echo $i; ?></td>
					<td><?php echo $value['title'];?></td>

					<td><img src="<?php echo $value['slide'];?>" height="80px" width="70px"/></td>				
				<td>
					<a href="editslide.php?slideID=<?php echo $value['slide_id'] ;?>">Edit</a> 

				</td>
					</tr>
           <?php }  } ?>
			</tbody>
		</table>

       </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
