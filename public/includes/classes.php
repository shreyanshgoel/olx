<?php

class mysqldatabase
{
 private $db_server="localhost", $db_name="olx", $db_pass = "", $db_user = "shrey";
 static public $conn;
	
  public function connect()
	    {
			
        // Create connection
        mysqldatabase::$conn = new PDO('mysql:host=' . $this->db_server . ';dbname=' . $this->db_name, $this->db_user, $this->db_pass);
		
		// Check connection
        if (!(mysqldatabase::$conn)) {
                    die("Connection failed: " . mysqli_connect_error());
                    }			
		}
	
	
	
	
}

class user
{
	private $name , $pass, $cpass;
	public $email;
	
	
function assign($n, $e, $p, $c)
           {
			   $this->name = $n;
			   $this->email = $e;
			   $this->pass = $p;
			   $this->cpass = $c;
		   }
		   
		   	
function register()
           {
			   
			   $query = "SELECT * FROM users WHERE email = '$this->email'";
			   $query_run = mysqldatabase::$conn->query($query);
			   echo $query_num_rows = $query_run->rowcount();
			   
			   
			   
			 if($query_num_rows == 0) 
	          if($this->pass == $this->cpass)
	             {
					 
		            			  
				   	$query = "INSERT INTO users (name, email, password) VALUES ('$this->name', '$this->email', '$this->pass')";
					mysqldatabase::$conn->query($query); 
					
					$_SESSION['set_user'] = $this->email;
					 
				 }
			   else echo "password dont match";	 
			  else echo "user exsists";	 
	
           }

function login()
           {
	          $query = "SELECT * FROM users WHERE email = '$this->email' AND password = '$this->pass'";                  
	          $query_run = mysqldatabase::$conn->query($query);
			  $query_num_rows = $query_run->rowcount();
			  
			  
			  
			  if($query_num_rows != 0)
			  {
        		  
				  $user = $query_run->fetch();	  
				  $_SESSION['set_user'] = $user['user_id']; 
				  $_SESSION['set_user_email'] = $user['email'] ;
				  
				  
			  }
			  else echo "email and password dont match";
			  
           }


	
}

class myaccount
{
	
 private $name, $price, $cat, $add, $place;
 public $query,  $query_run, $query_num_rows;
 
 
 public function update($a, $b, $c)
 {
	 $this->name = $a; 
	 $this->add = $b;
	 $this->place = $c;
	 
	 $this->query = "UPDATE users SET name = '$this->name', address = '$this->add', place = '$this->place' WHERE user_id = '" . $_SESSION['set_user'] . "'";
     mysqldatabase::$conn->query($this->query);
	 
 }
 
 
 public function add($a, $b, $c)
 {
	$this->name = $a;
	$this->price = $b;
	$this->cat = $c;


	 $this->query = "SELECT * FROM products WHERE category = '$this->cat'";
	 $this->query_run = mysqldatabase::$conn->query($this->query);
	 $this->query_num_rows = $this->query_run->rowcount();
	 $this->query_num_rows++;
 
	 $code = $this->cat . '_' . $this->query_num_rows; 

    if(!empty($_FILES["file"]["name"]))
	{
     $imageFileType = pathinfo($_FILES["file"]["name"],PATHINFO_EXTENSION);
	 
	 $target_file = "../uploads/images/products/" . $code . "." . $imageFileType;
	 
	 move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
	}	 
	
	 $this->query = "INSERT INTO products (user_id, name, category, price, code) VALUES ('" . $_SESSION['set_user'] . "', '$this->name', '$this->cat', '$this->price', '$code')";
	
	 mysqldatabase::$conn->query($this->query);
	  
 }
 
 
 public function delete($a)
 {
	 $this->name = $a;
	 
	 $this->query = "SELECT * FROM products WHERE product_id = '$this->name'";
	 $this->query_run = mysqldatabase::$conn->query($this->query);
	 $item = $this->query_run->fetch();
		   
	  $filename = "../uploads/images/products/" . $item['category'] . ".*";
	  
	  foreach(glob($filename) as $file)
	  {
	      unlink($file);
	  }
	 
	 $this->query = "DELETE FROM products WHERE product_id = '$this->name'";
	 mysqldatabase::$conn->query($this->query);
	 	 
 }	

 public function all_products()
 {
	 $this->query = "SELECT * FROM products WHERE user_id = '" . $_SESSION['set_user'] . "'";
	 $this->query_run = mysqldatabase::$conn->query($this->query);
	 $this->query_num_rows = $this->query_run->rowcount();
	 
 }
	
	
	
}

class session
{
	
	
	static function construct()
              {
	             session_start();
	
              }	
			  
	static function destruct()
              {
	            // remove all session variables
				session_unset();
				
				// destroy the session
				session_destroy();         
	
              }	
}

class queries
{
	
	public $query, $query2, $p, $query_run, $query_run2, $query_num_rows;
 
 
 
 public function search($s)
 {
	 	 
	 $this->query = "SELECT * FROM products WHERE name LIKE '%$s%' OR category LIKE '%$s%'";
	 $this->query_run = mysqldatabase::$conn->query($this->query);
	 $this->query_num_rows = $this->query_run->rowcount();
	  
 }
 
 
 public function cat_search($s)
 {
	 	 
	 $this->query = "SELECT * FROM products WHERE category = '$s'";
	 $this->query_run = mysqldatabase::$conn->query($this->query);
	 $this->query_num_rows = $this->query_run->rowcount();
	  
 }
	
 public function pro_search($p)
 {
	 $this->query = "SELECT * FROM products WHERE product_id = '$p'";
	 $this->query_run = mysqldatabase::$conn->query($this->query);
	 $this->query_num_rows = $this->query_run->rowcount();
	 
	 if($this->query_num_rows != 0)
	 {
	 $this->p = $this->query_run->fetch();
	 
	 $this->query2 = "SELECT * FROM users WHERE user_id = '" . $this->p['user_id'] . "'";
	 $this->query_run2 = mysqldatabase::$conn->query($this->query2);
	  
	 }
 }
	
	
	
	
}



?>