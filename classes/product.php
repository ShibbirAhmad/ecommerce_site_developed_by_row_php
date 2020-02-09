<?php

    
           
   
class product
{
  	private $db;
  	private $fm;

    public function __construct()
	{
	    $this->db=new database();
	    $this->fm=new Format();
	}

    public function addproduct($data,$file){
           
           $name          =mysqli_real_escape_string($this->db->link, $data['name']);
           $cat_id        =mysqli_real_escape_string($this->db->link, $data['catid']);
           $brand_id      =mysqli_real_escape_string($this->db->link, $data['brandid']);
           $description   =mysqli_real_escape_string($this->db->link, $data['body']);
           $price         =mysqli_real_escape_string($this->db->link, $data['price']);
           $type          =mysqli_real_escape_string($this->db->link, $data['type']);


           $image_permit=array('jpg','png','gif','jpeg');
           $image_name  =$_FILES['image']['name'];
           $image_size  =$_FILES['image']['size'];
           $image_temp  =$_FILES['image']['tmp_name'];
           $image_div   =explode('.', $image_name);
           $image_extn  =strtolower(end($image_div)) ;
           $image_unique=substr(md5(time()), 0,10).'.'.$image_extn;
           $image_upload="upload/".$image_unique;

    
          if($name=="" || $cat_id=="" || $brand_id=="" || $description=="" || $price=="" || 
          	$type=="" || $image_name==""  ){

          	echo "<span class='warning'> sorry! fild must be fill   </sapan>";

         }elseif($image_size>3048576){

		 echo "<span class='warning'>file size should be less than 3 MB </span>";

		}elseif(in_array($image_extn, $image_permit) == false ){

		echo "<span class='warning'>file format should be:-".implode(',',$image_permit)."</span>";

		}else
		{

          move_uploaded_file($image_temp, $image_upload);

		$query="INSERT INTO tbl_product(name,cat_id,brand_id,description,price,image,type) 

		  VALUES('$name','$cat_id','$brand_id', '$description', '$price', '$image_upload','$type')";

		$inserted=$this->db->insert($query);

		if($inserted){

		  echo "<span class='success'>new product uploaded successfully.. </span>";
		}else {

		  echo "<span class='warning'>product uploads fail </span>";
		}



		  }


    }



    public function getAllproduct(){

          $query="SELECT * FROM tbl_product ORDER BY id DESC ";
          $selet_row=$this->db->select($query);
          return $selet_row ;

    }


    public function updateproduct($data,$file,$id){
           
           $name          =mysqli_real_escape_string($this->db->link, $data['name']);
           $cat_id        =mysqli_real_escape_string($this->db->link, $data['catid']);
           $brand_id      =mysqli_real_escape_string($this->db->link, $data['brandid']);
           $description   =mysqli_real_escape_string($this->db->link, $data['body']);
           $price         =mysqli_real_escape_string($this->db->link, $data['price']);
           $type          =mysqli_real_escape_string($this->db->link, $data['type']);


           $image_permit=array('jpg','png','gif','jpeg');
           $image_name  =$_FILES['image']['name'];
           $image_size  =$_FILES['image']['size'];
           $image_temp  =$_FILES['image']['tmp_name'];
           $image_div   =explode('.', $image_name);
           $image_extn  =strtolower(end($image_div)) ;
           $image_unique=substr(md5(time()), 0,10).'.'.$image_extn;
           $image_upload="upload/".$image_unique;

    
          if($name=="" || $cat_id=="" || $brand_id=="" || $description=="" || $price=="" || 
          	$type=="" || $image_name==""  ){

          	echo "<span class='warning'> sorry! fild must be fill   </sapan>";

         }elseif($image_size>3048576){

		 echo "<span class='warning'>file size should be less than 3 MB </span>";

		}elseif(in_array($image_extn, $image_permit) == false ){

		echo "<span class='warning'>file format should be:-".implode(',',$image_permit)."</span>";

		}else
		{

          move_uploaded_file($image_temp, $image_upload);

        		$query="UPDATE tbl_product 

        		SET     name='$name',

            				cat_id='$cat_id',

            				brand_id='$brand_id',

            				description='$description',

            				price='$price',

            				image='$image_upload',

            				type='$type'     

        		WHERE   id='$id'     " ;

		$updated=$this->db->update($query);

		if($updated){

		  echo "<span class='success'>this product updated successfully.. </span>";
		}else {

		  echo "<span class='warning'>product updating fail.. </span>";
		}


    }




}



      public function deleteproduct($id){
          
        $query="SELECT * FROM tbl_product WHERE id='$id'  ";
        $getproduct=$this->db->select($query);
        if($getproduct){
        	while ($contain=$getproduct->fetch_assoc()) {
        		
        		$delete_image=$contain['image'];

        		unlink($delete_image);
        	}
        }


      	$query="DELETE FROM  tbl_product WHERE id='$id'   ";
      	$delproduct=$this->db->delete($query);
      	return $delproduct;

      	if($delproduct){

		  echo "<span class='success'>this product Deleted successfully.. </span>";
		}else {

		  echo "<span class='warning'>product Deleting fail.. </span>";
		}
      


      }



     public function getingAllproducts(){
          
          $query="SELECT * FROM tbl_product  ORDER BY id DESC LIMIT 4 ";
          $geting_product=$this->db->select($query);
          return $geting_product;


    }




    public function getingAllproduct(){
          
          $query="SELECT * FROM tbl_product WHERE type='1' ORDER BY id LIMIT 4 ";
          $geting_product=$this->db->select($query);
          return $geting_product;


    }

    public function  getingnewproduct(){

           $query="SELECT * FROM tbl_product  ORDER BY id DESC LIMIT 4  ";
           $geting_product=$this->db->select($query);
          return $geting_product;

    }


   public function  getingproductshort(){

           $query="SELECT * FROM tbl_product  ORDER BY id DESC LIMIT 2  ";
           $geting_product=$this->db->select($query);

          return $geting_product;

    }

  public function  getingproductshortly(){

           $query="SELECT * FROM tbl_product  ORDER BY id DESC LIMIT 2  ";
           $geting_product=$this->db->select($query);

          return $geting_product;

    }
  
  public function getsingaleleproduct($id){
          
    $query="SELECT p.* , c.catname , b.brandname FROM tbl_product as p,tbl_category as c, tbl_brand as b WHERE p.cat_id=c.catid AND p.brand_id=b.id AND p.id='$id'       "; 
    $querying=$this->db->select($query);
    return $querying;


  }


   

    public function productiphoe(){
          
          $query="SELECT * FROM tbl_product WHERE brand_id='8' ORDER BY id LIMIT 1 ";
          $geting_product=$this->db->select($query);
          return $geting_product;


    } 
   


     public function productsamsung(){
          
          $query="SELECT * FROM tbl_product WHERE brand_id='1' ORDER BY id LIMIT 1 ";
          $geting_product=$this->db->select($query);
          return $geting_product;


    } 



    
     public function productwalton(){
          
          $query="SELECT * FROM tbl_product WHERE brand_id='11' ORDER BY id LIMIT 1 ";
          $geting_product=$this->db->select($query);
          return $geting_product;


    } 




     public function productcanon(){
          
          $query="SELECT * FROM tbl_product WHERE brand_id='7' ORDER BY id LIMIT 1 ";
          $geting_product=$this->db->select($query);
          return $geting_product;


    }
    


    public function getProductBycatlist($name){

          $name=mysqli_real_escape_string($this->db->link,$name);

          
          $query="SELECT * FROM tbl_product WHERE name LIKE '%$name%' ";
          $gettingcatp=$this->db->select($query);


             return $gettingcatp ;


    }



























}


























 ?>