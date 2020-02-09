<?php 

include  "../helper/format.php";
include_once "../lib/database.php"; 
       
     

class adminlogin
{
	private $db ;
	private $fm;

	public function __construct() {

		$this->db=new database();
		$this->fm=new format();
	}
	public $username;
	public $password;

	public function userlogin($username,$password)
	      {
                  $this->username =$this->fm->validation($username);
                  $this->password=$this->fm->validation($password); 


                  if( empty($this->username) || empty($this->password)){
                  	echo "<span class='warning'> field must not be empty..! </span>";
                  } else {

                  $query="SELECT * FROM tbl_admin WHERE username='$this->username' AND password ='$this->password' ";
                  $result=$this->db->select($query);
                  if($result != false)
                  {
                      $value=$result->fetch_assoc();
			                      
			                      session::init();
			                      session::set("login",true);
			                      session::set("userid",$value['id']);
			                      session::set("username",$value['username']);
			                      session::set("name",$value['name']);
			                      header("location:index.php");
                  }else 
                  {
                  	echo "<span class='warning'><strong>incorrect!</strong> username && password   </sapan>";
                  }

                  } 
	      }






}










?>