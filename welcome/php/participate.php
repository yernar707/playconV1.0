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

	$code="SELECT * FROM participate WHERE requestid='".$id."' AND userid='".$userid."'";
	$product=mysqli_query($relate,$code);
	$allrows=mysqli_num_rows($product);
	if($allrows>0){
		echo '<script type="text/javascript">'; 
		echo 'swal({position: "center",type: "error",title: "You are already participant!", showConfirmButton: false,timer: 1500});';
		echo 'setTimeout(function(){window.location="/play/welcome/requests.php"}, 1500);';
		echo '</script>';
	}else{
		$secondcode=mysqli_query($relate, "SELECT * FROM participate WHERE requestid='".$id."'");
		$thirdcode=mysqli_query($relate, "SELECT maxpeople FROM requests WHERE id='".$id."'");
		$thirdrows=mysqli_num_rows($thirdcode);
		$secondrows=mysqli_num_rows($secondcode);
		if($secondrows<$thirdrows){
			$final="INSERT INTO participate(requestid,userid) VALUES('".$id."','".$userid."')";
			$finalproduct=mysqli_query($relate,$final);
			if ($finalproduct) {
				echo '<script type="text/javascript">'; 
				echo 'swal({position: "center",type: "success",title: "Now you are participant!", showConfirmButton: false,timer: 1500});';
				echo 'setTimeout(function(){window.location="/play/welcome/requests.php"}, 1500);';
				echo '</script>';
			}else{
				echo '<script type="text/javascript">'; 
				echo 'swal({position: "center",type: "error",title: "Uncaught Error!", showConfirmButton: false,timer: 1500});';
				echo 'setTimeout(function(){window.location="/play/welcome/requests.php"}, 1500);';
				echo '</script>';
			}
		}else{
				echo '<script type="text/javascript">'; 
				echo 'swal({position: "center",type: "error",title: "Event is full!", showConfirmButton: false,timer: 1500});';
				echo 'setTimeout(function(){window.location="/play/welcome/requests.php"}, 1500);';
				echo '</script>';
		}
	}
	}else{
				echo '<script type="text/javascript">'; 
				echo 'swal({position: "center",type: "error",title: "Error!", showConfirmButton: false,timer: 1500});';
				echo 'setTimeout(function(){window.location="/play/welcome/requests.php"}, 1500);';
				echo '</script>';

	}

?>
</body>
</html>