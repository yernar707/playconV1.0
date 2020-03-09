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
if (isset($_POST['type'])&&isset($_POST['title'])&&isset($_POST['location'])&&isset($_POST['information'])&&isset($_POST['date'])&&isset($_POST['time'])&&isset($_COOKIE['iduser'])&&isset($_POST['max'])) {

	$type=mysqli_real_escape_string($relate,$_POST['type']);
	$title=mysqli_real_escape_string($relate,$_POST['title']);
	$location=mysqli_real_escape_string($relate,$_POST['location']);
	$information=mysqli_real_escape_string($relate,$_POST['information']);
	$date=mysqli_real_escape_string($relate,$_POST['date']);
	$time=mysqli_real_escape_string($relate,$_POST['time']);
	$userid=$_COOKIE['iduser'];
	$max=mysqli_real_escape_string($relate,$_POST['max']);

	$code="INSERT INTO requests(userid,title,location,date,time,type,information,maxpeople) VALUES('".$userid."','".$title."','".$location."','".$date."','".$time."','".$type."','".$information."','".$max."')";
	$product=mysqli_query($relate,$code);
	if($product){
		echo '<script type="text/javascript">'; 
		echo 'swal({position: "center",type: "success",title: "Request is in order!", showConfirmButton: false,timer: 1500});';
		echo 'setTimeout(function(){window.location="/play/welcome/myrequests.php"}, 1500);';
		echo '</script>';
	}else{
		echo '<script type="text/javascript">'; 
		echo 'swal({position: "center",type: "error",title: "Uncaught Error!", showConfirmButton: false,timer: 1500});';
		echo 'setTimeout(function(){window.location="/play/welcome"}, 1500);';
		echo '</script>';
	}
}else{
		echo '<script type="text/javascript">'; 
		echo 'swal({position: "center",type: "error",title: "Uncaught Error!", showConfirmButton: false,timer: 1500});';
		echo 'setTimeout(function(){window.location="/play/welcome"}, 1500);';
		echo '</script>';
}

?>
</body>
</html>