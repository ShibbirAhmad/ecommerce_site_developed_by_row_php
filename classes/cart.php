<?php

    
           
   
class cart
{
  	private $db;
  	private $fm;

    public function __construct()
	{
	    $this->db=new database();
	    $this->fm=new Format();
	}

    

    public function addingtocart($data,$id){
           
           $quantity=mysqli_real_escape_string($this->db->link,$data);
           $product_id=mysqli_real_escape_string($this->db->link,$id);
           $session_ID=session_id();

           $query="SELECT * FROM tbl_product WHERE id='$product_id' ";
           $result=$this->db->select($query)->fetch_assoc();

           $product_name=$result['name'];
           $product_price=$result['price'];
           $product_image=$result['image'];



           $sql="INSERT INTO tbl_cart(sessionID,product_id,product_name,product_price,quantity,image) 

           VALUES('$session_ID','$product_id','$product_name','$product_price','$quantity','$product_image')  ";

           $inserting_row=$this->db->insert($sql);
           if($inserting_row)
           {
            header("Location:cart.php");
           }else {
            header("Location:404.php");
           }




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
            header("Location:cart.php");
           }else {
            header("Location:404.php");
           }

  }

 


  public function getCartProduct(){

         $session_ID=session_id();

         $query="SELECT * FROM tbl_cart WHERE sessionID ='$session_ID'   ";
         $getingcart=$this->db->select($query);

                 return $getingcart;

           

  }





  public function checkCart(){

         $session_ID=session_id();

         $query="SELECT * FROM tbl_cart WHERE sessionID ='$session_ID'   ";
         $getingcart=$this->db->select($query);
         return $getingcart;

           

  }


  
  //add data into order table

  public function AddOrder($cmrid){
        
         $session_ID=session_id();

         $query="SELECT * FROM tbl_cart WHERE sessionID='$session_ID'   ";
         $getingcart=$this->db->select($query);

         if($getingcart){
          while ($result=$getingcart->fetch_assoc()) {
           
           
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


  public function updateProductCart($data,$id){
           
           $quantity=mysqli_real_escape_string($this->db->link,$data);
           $product_id=mysqli_real_escape_string($this->db->link,$id);


         $query="UPDATE tbl_cart 

          SET     quantity='$quantity'
    

         WHERE   cart_id='$id'     " ;

    $updated=$this->db->update($query);

    if($updated){
                
       header("Location:cart.php");   
      
    }else {

     $msg= "<span class='success'> quantity not updated </span>";
     return $msg;    
    }


    }


  public function deleteCartProduct($id) {
             
       $id=mysqli_real_escape_string($this->db->link,$id);
       
       $query="DELETE FROM tbl_cart WHERE cart_id='$id'  ";  
       $deleting=$this->db->delete($query);
       return $deleting;    
  }



  public function DeleteSessionCustomer(){

         $session_ID=session_id();

         $query="DELETE FROM tbl_cart WHERE sessionID='$session_ID'  ";
         $delting_row=$this->db->delete($query);

         return $delting_row;


  }






}


























 ?>