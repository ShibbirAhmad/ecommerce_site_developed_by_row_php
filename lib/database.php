
<?php 

 include "config.php" ;

class database {

  private $db_host=db_host;
  private $db_user=db_user;
  private $db_pass=db_pass;
  private $db_name=db_name;

  public $link ;
  public $error;

  public function __construct() {

        $this->connectionDB();

         }

  private function connectionDB(){

        $this->link= new mysqli($this->db_host,$this->db_user,$this->db_pass,$this->db_name);
        
        if(!$this->link){
           
            $this->error="connection fail..".$this->link->connect_error();

            return $this->error;
        }else {
          return false;
        }

  }

 
 // Select or Read data
  
  public function select($query){
        
        $result = $this->link->query($query) or die($this->link->error.__LINE__);
                
                if($result->num_rows > 0){
                  return $result;
                } else {
                  return false;
                }
  }
  
  // Insert data
  public function insert($query){
                
                $insert_row = $this->link->query($query) or die($this->link->error.__LINE__);
                
                if($insert_row){
                  return $insert_row;
                }
                 else {
                  return false;
                }
  }
  
    // Update data
  public function update($query){
                  
                  $update_row = $this->link->query($query) or die($this->link->error.__LINE__);
                  if($update_row){
                    return $update_row;
                  } else {
                    return false;
                  }
  }
  
  // Delete data
  public function delete($query){
                
                $delete_row = $this->link->query($query) or die($this->link->error.__LINE__);
                if($delete_row){
                  return $delete_row;
                } else {
                  return false;
                }
  }



 }











?>