<?php
if (isset($_COOKIE['username'])&&isset($_COOKIE['admin'])) {
  if ($_COOKIE['admin']!='1') {
    if ($_COOKIE['moderator']!='1') {
    header('location:/play/welcome');
    }else{
    header('location:/play/moderator');
  }}
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
if (isset($_POST['id'])&&isset($_POST['role'])) {
	$id=mysqli_real_escape_string($relate,$_POST['id']);
	$role=mysqli_real_escape_string($relate,$_POST['role']);
	if ($role=='admin') {
		$admin='1';
		$moderator='0';
	}

	if ($role=='moderator') {
			$admin='0';
			$moderator='1';
		}
	if ($role=='user') {
			$admin='0';
			$moderator='0';
	}
	$code="UPDATE users SET admin='".$admin."', moderator='".$moderator."' WHERE userid='".$id."'";
	$product = mysqli_query($relate, $code);
	if($product){	
		echo '<script type="text/javascript">'; 
		echo 'swal({position: "center",type: "success",title: "Account role is edited", showConfirmButton: false,timer: 1500});';
		echo 'setTimeout(function(){window.location="/play/admin/users.php"}, 1500);';
		echo '</script>';
	}
	else
	{
		echo '<script type="text/javascript">'; 
		echo 'swal({position: "center",type: "error",title: "Uncaught Error!", showConfirmButton: false,timer: 1500});';
		echo 'setTimeout(function(){window.location="/play/admin/users.php"}, 1500);';
		echo '</script>';

	}
}

?>
 </body>
  </html>