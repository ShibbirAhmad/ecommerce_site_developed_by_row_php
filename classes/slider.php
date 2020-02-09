<?php


class slider{

     private $db;
     private $fm;

     public function __construct(){

        $this->db=new database();
        $this->fm=new format();

     }

    public function addslider($data){

          $title=mysqli_real_escape_string($this->db->link,$data['title']);
          

          $image_permit=array('jpg','png','jpeg','gif');

          $image_name=$_FILES['image']['name']; 
          $image_size=$_FILES['image']['size'];
          $image_temp=$_FILES['image']['tmp_name'];
          $div=explode('.', $image_name);
          $image_extn=strtolower(end($div));
          $unique_image=substr(md5(time()),0,10).'.'.$image_extn;
          $upload_path='upload/slideshow/'.$unique_image;

          if(empty($title) || empty($image_name)){
            echo "<span class='warning'>filed mustn't be empty..</span>";
          }else{
          

          if($image_size>5048756){

             echo "<span class='warning'>this slide size is too large..</span>";

          } 
          elseif(in_array($image_extn, $image_permit) == false ){

               echo "<span class='warning'>slide format should be:-".implode(',',$image_permit)."</span>";

         }   
              move_uploaded_file($image_temp,$upload_path);

              $query="INSERT INTO tbl_slideshow(title,slide) VALUES ('$title','$upload_path')";
              
              $inserting=$this->db->insert($query);
              if($inserting)
               {
                echo "<span class='success'>slide added successfully..!</span>";
               }else{
                echo "<span class='warning'>slide uploading fail..!</span>";
               }
          }




    }




    public function updateSlider($data,$id){


    $title=mysqli_real_escape_string($this->db->link,$data['title']);
          

          $image_permit=array('jpg','png','jpeg','gif');

          $image_name=$_FILES['image']['name']; 
          $image_size=$_FILES['image']['size'];
          $image_temp=$_FILES['image']['tmp_name'];
          $div=explode('.', $image_name);
          $image_extn=strtolower(end($div));
          $unique_image=substr(md5(time()),0,10).'.'.$image_extn;
          $upload_path='upload/slideshow/'.$unique_image;

          if(empty($title) || empty($image_name)){
            echo "<span class='warning'>filed mustn't be empty..</span>";
          }else{
          

          if($image_size>5048756){

             echo "<span class='warning'>this slide size is too large..</span>";

          } 
          elseif(in_array($image_extn, $image_permit) == false ){

               echo "<span class='warning'>slide format should be:-".implode(',',$image_permit)."</span>";

         }   
              move_uploaded_file($image_temp,$upload_path);

              $query="UPDATE tbl_slideshow SET title='$title' , slide='$upload_path' WHERE slide_id='$id' ";
              
              $inserting=$this->db->update($query);
              if($inserting)
               {
                echo "<span class='success'>slide updated successfully..!</span>";
               }else{
                echo "<span class='warning'>slide updating fail..!</span>";
               }
          }





    }









    
  public function showSlider(){

        $query="SELECT * FROM tbl_slideshow ";
        $searhing=$this->db->select($query);
        
        if($searhing){

          return $searhing;
        }
  }  


   


}












?>