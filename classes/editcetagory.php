<?php 

include  "../helper/format.php";
include_once "../lib/database.php"; 
       
     

class editcatagory
{
	private $db ;
	private $fm;
 
	public function __construct() {

		$this->db=new database();
		$this->fm=new format();
	}
	

    public function editcatagory($catname,$id)
	      {
                  $catname =$this->fm->validation($catname);
                


                  if(empty($catname)){
                  	echo "<span class='warning'> field must not be empty..! </span>";
                  } else {

                  $query="UPDATE tbl_category SET catname='$catname' WHERE catid='$id'  ";
                  $result=$this->db->update($query);
                  if($result)
                  {
                     
			        echo "<span class='success'><strong>updated!</strong> catagory   </sapan>";              
			                     
                  }else 
                  {
                  	echo "<span class='warning'><strong>sorry!</strong> catagory not updated.  </sapan>";
                  }

                  } 
	      }






}










?>