<?php   

include "../classes/product.php";

 if(!isset($_GET['delete_id']) || $_GET['delete_id']==NULL ){
    
         echo  "<script> window.location='productlist.php' </script>";
       } else{

          $id=$_GET['delete_id'];

          $product=new product();

          $deleting=$product->deleteproduct($id);
          if($deleting){
          	return $deleting;
          }
      }

?>