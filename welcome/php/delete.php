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
<!DOCTYPE html>
<html>
<head>
	<title></title>
	
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="/play/js/sweetalert2.js"></script>
  <script src="/play/js/sweetalert2.all.js"></script>
  <script src="/play/js/sweetalert2.all.min.js"></script>
  <script src="/play/js/sweetalert2.min.js"></script>
</head>
<body>
<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/play/php/config.php');
if (isset($_POST['id'])&&isset($_COOKIE['iduser'])){

	$id=$_POST['id'];
	$userid=$_COOKIE['iduser'];

	$code="DELETE FROM participate WHERE requestid='".$id."'";
	$secondcode="DELETE FROM requests WHERE id='".$id."'";
	$secondproduct=mysqli_query($relate,$secondcode);
	$product=mysqli_query($relate,$code);
			if ($product&&$secondproduct) {
				echo '<script type="text/javascript">'; 
				echo 'swal({position: "center",type: "success",title: "Successfully deleted!", showConfirmButton: false,timer: 1500});';
				echo 'setTimeout(function(){window.location="/play/welcome/myrequests.php"}, 1500);';
				echo '</script>';
			}else{
				echo '<script type="text/javascript">'; 
				echo 'swal({position: "center",type: "error",title: "Uncaught Error!", showConfirmButton: false,timer: 1500});';
				echo 'setTimeout(function(){window.location="/play/welcome/myrequests.php"}, 1500);';
				echo '</script>';
			}
		}else{
				echo '<script type="text/javascript">'; 
				echo 'swal({position: "center",type: "error",title: "Error!", showConfirmButton: false,timer: 1500});';
				echo 'setTimeout(function(){window.location="/play/welcome/myrequests.php"}, 1500);';
				echo '</script>';

	}

?>
</body>
</html>