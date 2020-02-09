<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_10">
        	<?php 

                 if(isset($_GET['deleteOrderID']) && $_GET['deleteOrderID']!=NULL){
                        
                        $deleteID=$_GET['deleteOrderID'];

                        $delete_order=$customer->DeleteShitedOrder($deleteID);
                       
                           if($delete_order){

                        	echo $delete_order;
                        }
                 }
            ?>
            <div class="box round first grid">

            <?php 

                 if(isset($_GET['shiftID']) && $_GET['shiftID']!=NULL){
                        
                        $updateID=$_GET['shiftID'];

                        $update_status=$customer->updateShiftStatus($updateID);
                       
                           if($update_status){

                        	echo $update_status;
                        }
                 }
            ?>



     <?php 

                 if(isset($_GET['pendingID']) && $_GET['pendingID']!=NULL){
                        
                        $updateID=$_GET['pendingID'];

                        $update_status=$customer->updateOrderStatus($updateID);
                       
                           if($update_status){

                        	echo $update_status;
                        }
                 }
            ?>



                   <h2>Inbox</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th width="10%" >Serial No.</th>
							<th width="15%" >Product Name</th>
							<th width="25%" >Image</th>
							<th width="15%" >Price</th>
							<th width="10%" >Quntity</th>
							<th width="15%" >Status</th>
							<th width="10%" >Action</th>
						</tr>
					</thead>
					<tbody>
                      
                      <?php 
                             $getorder=$customer->getingorderProduct();

                           if($getorder){
                                 $i=0;
                           	while ($result=$getorder->fetch_assoc()) {
                           		$i++;
                           	
                      ?>

						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['product_name'] ;?></td>
							<td><img  src="<?php echo $result['image'] ;?>" height="100px" widht="90px" /></td>
							<td><?php echo $result['price'] ;?></td>
							<td><?php echo $result['quantity'] ;?></td>

							<td>
                      <?php 
                              if($result['status']=='0'){ ?>

                              	<a onclick="return confirm('Are You Sure to Shift') " href="?pendingID=<?php echo $result['order_id']; ?> " > pending</a>
                             
                             <?php  }else{  ?>
                             
                             <a onclick="return confirm('Are You Sure to Pending') " href="?shiftID=<?php echo $result['order_id']; ?> " > Shifted </a>
                              
                           <?php    }  
                      ?>
							</td>

							<td> <a  style="color:red;" onclick="return confirm('Are You Sure to Delete') "  href="?deleteOrderID=<?php echo $result['order_id']; ?>"> X </a></td>
						</tr>
						

                <?php   }   } ?>

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
