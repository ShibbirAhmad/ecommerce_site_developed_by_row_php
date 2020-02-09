<?php

include "../lib/database.php";
include "../lib/session.php";
session::checklogin();

include "../classes/adminlogin.php";
 ?>

<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
 
<?php 
        $db = new database();
       $userlog = new adminlogin();

       if( $_SERVER['REQUEST_METHOD'] =='POST' )
       {
           
           $username=mysqli_real_escape_string($db->link, $_POST['name']);
           $password=mysqli_real_escape_string($db->link, $_POST['password']);


          $userlogging = $userlog->userlogin($username,$password);
          if($userlogging){
          	echo "<span class ='success'> welcome to admin pannel </span>";
          }
       }

?>

		<form action="" method="post">
			<h1>Admin Login</h1>
			<div>
				<input type="text" placeholder="Username"  name="name"/>
			</div>
			<div>
				<input type="password" placeholder="Password"  name="password"/>
			</div>
			<div>
				<input type="submit" value="Log in" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="#">Training with shibbir-it.com</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>