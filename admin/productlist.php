<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';
      
      include "../classes/product.php";
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Post List</h2>
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th width="8%" >Serial</th>
					<th width="10%" >Name</th>
					<th width="8%" >Cat_id</th>
					<th width="10%" >Brand_id</th>
					<th width="20%" >Description</th>
					<th width="14%" >Image</th>
					<th width="10%" >Price</th>
					<th width="8%" >Type</th>
					<th width="12%" >Action</th>
				</tr>
			</thead>
			<tbody>
	<?php
                $fm=new format();
                $product=new product();

				$get_product=$product->getAllproduct();

                if($get_product){ 

                      $i=0;

                while ($result=$get_product->fetch_assoc()) {

                	$i++;

                 
    ?>
				<tr class="odd gradeX">

					<td><?php echo $i; ?></td>
					<td><?php echo $result['name'] ; ?></td>
					<td><?php echo $result['cat_id'] ; ?></td>
					<td><?php echo  $result['brand_id'] ?></td>
                    <td><?php echo $fm->textshorten( $result['description'] , 100 ); ?></td>
                    <td> <img src="<?php echo $result['image'] ; ?>" width="100px" height="120px" /> </td>
                    <td><?php echo $result['price'] ; ?></td>
                    <td><?php 
                         
                         if($result['type']==0){

                         	echo "General";
                         }else{
                         	echo "Fetaured";
                         }

                    ?></td>
					
					<td><a href="editproduct.php?editid=<?php echo $result['id']; ?> " >Edit</a> || <a onclick="return confirm('Are you sure to Delete');" href="deleteproduct.php?delete_id=<?php echo $result['id']; ?>">Delete</a></td>
				</tr>

			<?php 
             
               }
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
