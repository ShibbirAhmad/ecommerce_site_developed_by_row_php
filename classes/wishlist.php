<?php

    
           
   
class wishlist
{
  	private $db;
  	private $fm;

    public function __construct()
	{
	    $this->db=new database();
	    $this->fm=new Format();
	}

    



  public function addingToWishList($data,$id){

         
           $quantity=mysqli_real_escape_string($this->db->link,$data);
           $product_id=mysqli_real_escape_string($this->db->link,$id);
           $session_ID=session_id();

           $query="SELECT * FROM tbl_product WHERE id='$product_id' ";
           $result=$this->db->select($query)->fetch_assoc();

           $product_name=$result['name'];
           $product_price=$result['price'];
           $product_image=$result['image'];



           $sql="INSERT INTO tbl_wishlist(sessionID,product_id,product_name,product_price,quantity,image) 

           VALUES('$session_ID','$product_id','$product_name','$product_price','$quantity','$product_image')  ";

           $inserting_row=$this->db->insert($sql);
           if($inserting_row)
           {
            header("Location:wishlist.php");
           }else {
            header("Location:404.php");
           }

  }

   
 public function getwishlist(){

         $session_ID=session_id();

         $query="SELECT * FROM tbl_wishlist WHERE sessionID ='$session_ID'   ";
         $getingwishlist=$this->db->select($query);

                 return $getingwishlist;

           

  }  




  public function checkWishlist(){

         $session_ID=session_id();

         $query="SELECT * FROM tbl_wishlist WHERE sessionID ='$session_ID'   ";
         $getingwishlist=$this->db->select($query);
         return $getingwishlist;

           

  }


  
  //add data into order table

  public function AddOrder($cmrid){
        
         $session_ID=session_id();

         $query="SELECT * FROM tbl_wishlist WHERE sessionID='$session_ID'   ";
         $getingwishlist=$this->db->select($query);

         if($getingwishlist){
          while ($result=$getingwishlist->fetch_assoc()) {
           
           
           $product_id=$result['product_id'];
           $product_name=$result['product_name'];
           $product_image=$result['image'];
           $price=$result['product_price'];
           $quantity=$result['quantity'];



           $query="INSERT INTO tbl_order (customer_id,product_id,product_name,image,price,quantity) 

           VALUES('$cmrid','$product_id','$product_name','$product_image','$price','$quantity') ";
          
          $inserting=$this->db->insert($query);
          return $inserting;


          }

         }
         

  }


  public function updateProductwishlist($data,$id){
           
           $quantity=mysqli_real_escape_string($this->db->link,$data);
           $product_id=mysqli_real_escape_string($this->db->link,$id);


         $query="UPDATE tbl_wishlist 

          SET     quantity='$quantity'
    

         WHERE   wishlistId='$id'     " ;

    $updated=$this->db->update($query);

    if($updated){
                
       header("Location:wishlist.php");   
      
    }else {

     $msg= "<span class='success'> quantity not updated </span>";
     return $msg;    
    }


    }


  public function deletewishlistProduct($id) {
             
       $id=mysqli_real_escape_string($this->db->link,$id);
       
       $query="DELETE FROM tbl_wishlist WHERE wishlistId='$id'  ";  
       $deleting=$this->db->delete($query);
       return $deleting;    
  }



  public function DeleteSessionCustomer(){

         $session_ID=session_id();

         $query="DELETE FROM tbl_wishlist WHERE sessionID='$session_ID'  ";
         $delting_row=$this->db->delete($query);

         return $delting_row;


  }






}


























 ?>