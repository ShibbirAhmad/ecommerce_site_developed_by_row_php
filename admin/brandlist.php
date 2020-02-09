<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';

?>


        <div class="grid_10">
            <div class="box round first grid">
                <h2>Brand List</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Brand Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
                 $db=new database();

                 

    if(isset($_GET['delid'])){
    	$id=$_GET['delid'];

    	$query="DELETE FROM tbl_brand WHERE id='$id' ";
    	$result=$db->delete($query);
    	 
    	if($result) {

    		echo "<span class='success'> you have  deleted one catagory.  </sapan>";
    	}
        
    	
    }

                 $query="SELECT * FROM tbl_brand ORDER BY id ";
                 $select_row=$db->select($query);
                 
                 if($select_row){
                       $i=0;
                 	while($result=$select_row->fetch_assoc()){
                       $i++;
                 
						 ?>
						<tr class="odd gradeX">
							<td><?Php echo $i; ?></td>
							<td><?php echo $result['brandname'] ?></td>
							<td><a href="editbrand.php?editid=<?php echo $result['id'] ?>">Edit</a> || 

								<a  onclick="return confirm('are you sure to Delete') " 

								 href="?delid=<?php echo $result['id'] ?>" > Delete </a></td>
						</tr>
			<?php  }
		       
		          }

		          ?>
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

