<?php 
     

class brand
{
	private $db ;
	private $fm;
 
	public function __construct() {

		$this->db=new database();
		$this->fm=new format();
	}
	

    public function brandadding($brandname)
	      {
                  $brandname =$this->fm->validation($brandname);
                
                  if(empty($brandname)){
                  	echo "<span class='warning'> field must not be empty..! </span>";
                  } else {

                  $query="INSERT INTO  tbl_brand(brandname) VALUES('$brandname')  ";
                  $result=$this->db->insert($query);
                  if($result)
                  {
                     
			        echo "<span class='success'><strong>added!</strong> new Brand  </sapan>";              
			                     
                  }else 
                  {
                  	echo "<span class='warning'><strong>sorry!</strong> Brand not added.  </sapan>";
                  }

                  } 
	      }



public function editbrand($brandname,$id)
            {
                  $brandname =$this->fm->validation($brandname);
                


                  if(empty($brandname)){
                        echo "<span class='warning'> field must not be empty..! </span>";
                  } else {

                  $query="UPDATE tbl_brand SET brandname='$brandname' WHERE id='$id'  ";
                  $result=$this->db->update($query);
                  if($result)
                  {
                     
                          echo "<span class='success'><strong>updated!</strong> brnad   </sapan>";              
                                       
                  }else 
                  {
                        echo "<span class='warning'><strong>sorry!</strong> brnad not updated.  </sapan>";
                  }

                  } 
            }


}










?>