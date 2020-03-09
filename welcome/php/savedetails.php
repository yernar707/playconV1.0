<?php
if (isset($_COOKIE['username'])&&isset($_COOKIE['moderator'])) {
  if (($_COOKIE['admin']=='0')&&($_COOKIE['moderator']=='1')) {
    header('location:/play/moderator');
  }else{
    if (($_COOKIE['admin']=='1')&&($_COOKIE['moderator']=='0')) {
      header('location:/play/admin');
    }
  }
}else{
  header("location:/play/login");
}

?>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Play" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="/play/css/sweetalert2.css">
  <link rel="stylesheet" type="text/css" href="/play/css/sweetalert2.min.css">
  <link href="/play/css/style.css" rel="stylesheet">
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
if (isset($_POST['username'])&&isset($_POST['email'])&&isset($_POST['phone'])) {
	$username=mysqli_real_escape_string($relate,$_POST['username']);
	$email=mysqli_real_escape_string($relate,$_POST['email']);
	$phone=mysqli_real_escape_string($relate,$_POST['phone']);
	$code="UPDATE users SET username='".$username."', email='".$email."', phone='".$phone."' WHERE userid='".$_COOKIE['iduser']."'";
	$product = mysqli_query($relate, $code);
	if($product){
		setcookie("username",$username,$_COOKIE['date'],"/");	
		echo '<script type="text/javascript">'; 
		echo 'swal({position: "center",type: "success",title: "Account details are edited", showConfirmButton: false,timer: 1500});';
		echo 'setTimeout(function(){window.location="/play/admin"}, 1500);';
		echo '</script>';
	}
	else
	{
		echo '<script type="text/javascript">'; 
		echo 'swal({position: "center",type: "error",title: "Uncaught Error!", showConfirmButton: false,timer: 1500});';
		echo 'setTimeout(function(){window.location="/play/admin/"}, 1500);';
		echo '</script>';

	}
}

?>
 </body>
  </html>