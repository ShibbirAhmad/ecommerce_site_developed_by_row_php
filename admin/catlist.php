<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';

?>


        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
                 $db=new database();

                 

    if(isset($_GET['delcatid'])){
    	$id=$_GET['delcatid'];

    	$query="DELETE FROM tbl_category WHERE catid='$id' ";
    	$result=$db->delete($query);
    	 
    	if($result) {

    		echo "<span class='success'> you have  deleted one catagory.  </sapan>";
    	}
        
    	
    }

                 $query="SELECT * FROM tbl_category ORDER BY catid ";
                 $select_row=$db->select($query);
                 
                 if($select_row){
                       $i=0;
                 	while($result=$select_row->fetch_assoc()){
                       $i++;
                 
						 ?>
						<tr class="odd gradeX">
							<td><?Php echo $i; ?></td>
							<td><?php echo $result['catname'] ?></td>
							<td><a href="editcat.php?editid=<?php echo $result['catid'] ?>">Edit</a> || 

								<a  onclick="return confirm('are you sure to Delete') " 

								 href="?delcatid=<?php echo $result['catid'] ?>" > Delete </a></td>
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

