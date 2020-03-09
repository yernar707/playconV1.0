<?php
if (isset($_COOKIE['username'])&&isset($_COOKIE['moderator'])) {
  if ($_COOKIE['moderator']!='1') {
    if ($_COOKIE['admin']!='1') {
    header('location:/play/welcome');
    }else{
    header('location:/play/admin');
  }}
}else{
  header("location:/play/login");
}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="/play/js/sweetalert2.js"></script>
  <script src="/play/js/sweetalert2.all.js"></script>
  <script src="/play/js/sweetalert2.all.min.js"></script>
  <script src="/play/js/sweetalert2.min.js"></script>
  <script type="text/javascript">
  
  </script>
</head>
<body>
<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/play/php/config.php');
if (isset($_POST['id'])&&isset($_COOKIE['moderator'])) {
	$id=$_POST['id'];
	$code="DELETE FROM requests WHERE id='".$id."'";
	$product=mysqli_query($relate,$code);
	if ($product) {
		echo '<script type="text/javascript">'; 
		echo 'swal({position: "center",type: "success",title: "Deleted!", showConfirmButton: false,timer: 1500});';
		echo 'setTimeout(function(){window.location="/play/moderator/requests.php"}, 1500);';
		echo '</script>';
	}else{
		echo '<script type="text/javascript">'; 
		echo 'swal({position: "center",type: "error",title: "Uncaught error!", showConfirmButton: false,timer: 1500});';
		echo 'setTimeout(function(){window.location="/play/moderator/requests.php"}, 1500);';
		echo '</script>';
	}
}else{
		echo '<script type="text/javascript">'; 
		echo 'swal({position: "center",type: "error",title: "Login please!", showConfirmButton: false,timer: 1500});';
		echo 'setTimeout(function(){window.location="/play/login"}, 1500);';
		echo '</script>';
}


?>

</body>
</html>