<?php 

include  "../helper/format.php";
include_once "../lib/database.php"; 
       
     

class addcatagory
{
	private $db ;
	private $fm;
 
	public function __construct() {

		$this->db=new database();
		$this->fm=new format();
	}
	

    public function catagory($catname)
	      {
                  $catname =$this->fm->validation($catname);
                


                  if( empty($catname)){
                  	echo "<span class='warning'> field must not be empty..! </span>";
                  } else {

                  $query="INSERT INTO  tbl_category(catname) VALUES('$catname')  ";
                  $result=$this->db->insert($query);
                  if($result)
                  {
                     
			        echo "<span class='success'><strong>added!</strong> new catagory   </sapan>";              
			                     
                  }else 
                  {
                  	echo "<span class='warning'><strong>sorry!</strong> catagory not added.  </sapan>";
                  }

                  } 
	      }






}










?>