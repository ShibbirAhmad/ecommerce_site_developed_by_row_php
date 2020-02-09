<?php 


class social
{
	private $fm;
	private $db;

   public function __construct(){
      
      $this->db = new database();
      $this->fm = new Format();

   }

	public function UpdateSocial($data) {

           $facebook=mysqli_real_escape_string($this->db->link,$data['facebook']);
           $twitter=mysqli_real_escape_string($this->db->link,$data['twitter']);
           $google=mysqli_real_escape_string($this->db->link,$data['google']);
           $contact=mysqli_real_escape_string($this->db->link,$data['contact']);

        if($facebook=="" || $twitter=="" || $google=="" || $contact==""){
          
          echo "<span class='warning' >field must not be empty.. </span>";

        } else {

		 $sql="UPDATE tbl_social SET facebook='$facebook', twitter='$twitter', 

		                 google= '$google', contact='$contact' WHERE id='1' ";

		           $update_row=$this->db->update($sql);

		           if($update_row)
		           {

		         echo "<span class='success' >medial updated successfully.. </span>";

		           }else {
		          
		          echo "<span class='success' >medial updating failed.. </span>";


		           }

        }

          
                 


	}



}











?>