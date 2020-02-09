<?php 
     

class customer
{
	
  private $db;
	private $fm;
 
	public function __construct() 
      {

		$this->db=new database();
		$this->fm=new format();
	}
	

      public function customerResgistration($data)
      {
         
         $name=mysqli_real_escape_string($this->db->link,$data['name']);
         $name=$this->fm->validation($name);
          
         $city=mysqli_real_escape_string($this->db->link,$data['city']);
         $city=$this->fm->validation($city);
         
         $zip=mysqli_real_escape_string($this->db->link,$data['zip']);
         $zip=$this->fm->validation($zip);

         $email=mysqli_real_escape_string($this->db->link,$data['email']);
         $email=$this->fm->validation($email);

         $address=mysqli_real_escape_string($this->db->link,$data['address']);
         $address=$this->fm->validation($address);

         $country=mysqli_real_escape_string($this->db->link,$data['country']);
         $country=$this->fm->validation($country);

         $phone=mysqli_real_escape_string($this->db->link,$data['phone']);
         $phone=$this->fm->validation($phone);

         $password=mysqli_real_escape_string($this->db->link,$data['password']);
         $password=$this->fm->validation(md5($password));

         

         if($name=="" ||  $city=="" ||  $email=="" ||  $address=="" ||  $country=="" ||  $zip=="" ||
            $phone=="" ||  $password=="" ){
           
           echo "<span class='warning'>field must not be empty...!</span>";

         }else{ 

         $query="SELECT * FROM tbl_customer WHERE email='$email' LIMIT 1 ";
         $getingEmail=$this->db->select($query);
         if($getingEmail != false ){

             echo "<span class='warning'> this email address is already exist...!</span>";
         }else{
          
          $sql="INSERT INTO tbl_customer(name,city,zip,address,country,email,phone,password)

          VALUES('$name','$city','$zip','$address','$country','$email','$phone','$password') ";
        
         $inserting=$this->db->insert($sql);
        
         if($inserting){

               echo "<span class='success'> account created successfully...!</span>";

             }else{

                  echo "<span class='warning'>registration fail..!</span>";
             }



            }
 
          }


      }





      public function customerLogin($Data)
      {

         $email=mysqli_real_escape_string($this->db->link, $Data['email']);
         $email=$this->fm->validation($email);

         $password=mysqli_real_escape_string($this->db->link, $Data['password']);
         $password=$this->fm->validation(md5($password));
      
          
         if($email=="" ||  $password=="" ){
           
           echo "<span class='warning'>field must not be empty...!</span>";

         }else{ 

      $query="SELECT * FROM tbl_customer WHERE email='$email' AND password='$password' 
               LIMIT 1 ";
         $getingcustomer=$this->db->select($query);
         if($getingcustomer != false ){

             $value=$getingcustomer->fetch_assoc();
            
             session::set("customer_login",true);
             session::set("customerID",$value['customer_id']);
             session::set("customer_name",$value['name']);
             session::set("customer_city",$value['city']);

             header("Location:payment.php");


               }else{
                    
                    echo "<span class='warning'> email and password not matched...!</span>";

               }
      }




 }



      
      public function customerData($id){

             $query="SELECT * FROM tbl_customer WHERE customer_id='$id' ";
             $geting=$this->db->select($query);
              return $geting;

      }


      

      public function customerUpdating($data,$id){

         $name=mysqli_real_escape_string($this->db->link,$data['name']);
         $name=$this->fm->validation($name);
          
         $city=mysqli_real_escape_string($this->db->link,$data['city']);
         $city=$this->fm->validation($city);
         
         $zip=mysqli_real_escape_string($this->db->link,$data['zip']);
         $zip=$this->fm->validation($zip);

         $email=mysqli_real_escape_string($this->db->link,$data['email']);
         $email=$this->fm->validation($email);

         $address=mysqli_real_escape_string($this->db->link,$data['address']);
         $address=$this->fm->validation($address);

         $country=mysqli_real_escape_string($this->db->link,$data['country']);
         $country=$this->fm->validation($country);

         $phone=mysqli_real_escape_string($this->db->link,$data['phone']);
         $phone=$this->fm->validation($phone);

         $password=mysqli_real_escape_string($this->db->link,$data['password']);
         $password=$this->fm->validation(md5($password));

         

         if($name=="" ||  $city=="" ||  $email=="" ||  $address=="" ||  $country=="" ||  $zip=="" ||
            $phone=="" ||  $password=="" ){
           
           echo "<span class='warning'>field must not be empty...!</span>";

         }else{
          
          $sql="UPDATE  tbl_customer

              SET   name     ='$name',
                    city     ='$city',
                    zip      ='$zip',
                    address  ='$address',
                    country  ='$country',
                    email    ='$email',
                    phone    ='$phone',
                    password ='$password'
                  
                  WHERE customer_id='$id'
           ";
        
         $updating=$this->db->update($sql);
        
         if($updating){

               echo "<span class='warning'>Data updated!</span>";

             }else{

                  echo "<span class='warning'>Data updating fail..!</span>";
             }

      }

   }


    

  
    public function getingorderProduct(){

           $query="SELECT * FROM tbl_order ORDER BY order_id DESC ";
           $geting=$this->db->select($query);
           return $geting;



    }
    


     public function DeleteShitedOrder($deleteID){

          $query="DELETE FROM tbl_order   WHERE order_id='$deleteID' ";
          $deletingOrder=$this->db->delete($query);

            return $deletingOrder;
   }





     public function updateShiftStatus($updateID){

          $query="UPDATE tbl_order SET status='0'  WHERE order_id='$updateID' ";
          $updatingStatus=$this->db->update($query);

            return $updatingStatus;
   }



   public function updateOrderStatus($updateID){

          $query="UPDATE tbl_order SET status='1'  WHERE order_id='$updateID' ";
          $updatingStatus=$this->db->update($query);

            return $updatingStatus;
   }


    public function getOrderProduct($cmrid){

           $query="SELECT * FROM tbl_order WHERE customer_id='$cmrid' ";
           $geting=$this->db->select($query);
           return $geting;



    }

   


   public function checkOreder($cmrid){
      
          $query="SELECT * FROM tbl_order WHERE customer_id='$cmrid' ";
          $getingOrder=$this->db->select($query);
          return $getingOrder;
   }










}




?>