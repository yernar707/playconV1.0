<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Play" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="/play/css/sweetalert2.css">
  <link rel="stylesheet" type="text/css" href="/play/css/sweetalert2.min.css">
  <link href="/Play/css/style.css" rel="stylesheet">
  <script src="/play/js/sweetalert2.js"></script>
  <script src="/play/js/sweetalert2.all.js"></script>
  <script src="/play/js/sweetalert2.all.min.js"></script>
  <script src="/play/js/sweetalert2.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/play/php/config.php');
if(isset($_POST['username'])&&isset($_POST['password'])){
	$username=mysqli_real_escape_string($relate,$_POST['username']);
	$password=mysqli_real_escape_string($relate,$_POST['password']);
	$code="SELECT * FROM users WHERE username='".$username."' AND password='".$password."'";
	$product = mysqli_query($relate, $code);
	$allrows=mysqli_num_rows ($product);
	if ($allrows==1) {
		$column=mysqli_fetch_assoc($product);
		if (!empty($_POST['remember'])) 
		{	
			$date=time()+ (10 * 365 * 24 * 60 * 60);
			setcookie("date",$date, $date, "/");
			setcookie("iduser", $column['userid'],$date, "/");
			setcookie("username", $column['username'],$date, "/");
			setcookie("admin", $column['admin'],$date, "/");
			setcookie("moderator", $column['moderator'],$date, "/");
		}
		else
		{	$date=time()+ (60 * 60);
			setcookie("date",$date, $date, "/");
			setcookie("iduser", $column['userid'],$date, "/");
			setcookie("username", $column['username'],$date, "/");
			setcookie("admin", $column['admin'],$date, "/");
			setcookie("moderator", $column['moderator'],$date, "/");
		}
		if($column['admin']==1)
		{
			header('location:/play/admin');
		}
		else
		{
			if ($column['moderator']==1) 
			{
				header('location:/play/moderator');
			}
			else
			{
				header('location:/play/welcome');
			}
		}
	}else{
		echo '<script type="text/javascript">'; 
		echo 'swal({position: "center",type: "error",title: "Error while logging in!", showConfirmButton: false,timer: 1500});';
		echo 'setTimeout(function(){window.location="/play/login"}, 1500);';
		echo '</script>';
	}
}
else
{
	echo '<script type="text/javascript">'; 
		echo 'swal({position: "center",type: "error",title: "Error while logging in!", showConfirmButton: false,timer: 1500});';
		echo 'setTimeout(function(){window.location="/play/login"}, 1500);';
		echo '</script>';
}
?>  </body>
  </html>