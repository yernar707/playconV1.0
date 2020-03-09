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


</body>
</html>
<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/play/php/config.php');

if(isset($_POST['name'])){
	$name=mysqli_real_escape_string($relate,$_POST['name']);}else{
		$name="";
	}
if(isset($_POST['phone'])){
	$phone=mysqli_real_escape_string($relate,$_POST['phone']);}else{
		$phone="";
		echo $phone;
	}
if(isset($_POST['email'])){
	$email=mysqli_real_escape_string($relate,$_POST['email']);}else{
		$email="";
	}
if(isset($_POST['role'])){
	$role=mysqli_real_escape_string($relate,$_POST['role']);
	if ($role=='admin') {
		$admin='1';
		$moderator='0';
	}else{
		if ($role=='moderator') {
			$moderator='1';
			$admin='0';
		}else{
			$moderator='0';
			$admin='0';
		}
	}
	}else{
		$role="";
		$moderator='0';
			$admin='0';
	}



if ($name!="") {
	$code="SELECT userid,username,phone,email,moderator,admin FROM users WHERE (username LIKE '%".$name."%')";
	if ($phone!="") {
	 	$code .="AND (phone LIKE '%".$phone."%')";
		if ($email!="") {
			$code .="AND (email LIKE '%".$email."%')";
			if ($role!="") {
				$code .=" AND (moderator='".$moderator."') AND (admin='".$admin."')";
			}else{
				$code ="SELECT userid,username,phone,email,moderator,admin FROM users WHERE (username LIKE '%".$name."%') AND (email LIKE '%".$email."%') AND (phone LIKE '%".$phone."%')";
			}
		}else{
			if ($role!="") {
				$code .="AND (moderator='".$moderator."') AND (admin='".$admin."')";
			}else{
				$code="SELECT userid,username,phone,email,moderator,admin FROM users WHERE (username LIKE '%".$name."%') AND (phone LIKE '%".$phone."%') ";
			}
		}
	}else{
		if ($email!="") {
			$code .="AND (email LIKE '%".$email."%')";
			if ($role!="") {
				$code .="AND (moderator='".$moderator."') AND (admin='".$admin."')";
			}else{
				$code ="SELECT userid,username,phone,email,moderator,admin FROM users WHERE (username LIKE '%".$name."%') AND (email LIKE '%".$email."%')";
			}
		}else{
				if ($role!="") {
				$code .="AND (moderator='".$moderator."') AND (admin='".$admin."')";
			}else{
				$code ="SELECT userid,username,phone,email,moderator,admin FROM users WHERE (username LIKE '%".$name."%')";
			}
		}
	}
}else{
	if ($phone!="") {
	 	$code ="SELECT userid,username,phone,email,moderator,admin FROM users WHERE (phone LIKE '%".$phone."%')";
		 if ($email!="") {
		 	$code .="AND (email LIKE '%".$email."%')";
		 	if ($role!="") {
				$code .="AND (moderator='".$moderator."') AND (admin='".$admin."')";
			}else{
				$code ="SELECT userid,username,phone,email,moderator,admin FROM users WHERE (phone LIKE '%".$phone."%') AND (email LIKE '%".$email."%') ";
			}
		}else{
			if ($role!="") {
				$code .="AND (moderator='".$moderator."') AND (admin='".$admin."')";
			}else{
				$code ="SELECT userid,username,phone,email,moderator,admin FROM users WHERE (phone LIKE '%".$phone."%')";
			}
		}
	}else{
		if ($email!="") {
		 	$code ="SELECT userid,username,phone,email,moderator,admin FROM users WHERE (email LIKE '%".$email."%') ";
		 	if ($role!="") {
				$code .="AND (moderator='".$moderator."') AND (admin='".$admin."')";
			}else{
				$code ="SELECT userid,username,phone,email,moderator,admin FROM users WHERE (email LIKE '%".$email."%') ";
			}
		}else{
			if ($role!="") {
				$code ="SELECT userid,username,phone,email,moderator,admin FROM users WHERE (moderator='".$moderator."') AND (admin='".$admin."') ";
			
			}else{
				$code ="SELECT userid,username,phone,email,moderator,admin FROM users";
			}
			
		}
	}
}
if (isset($_COOKIE['username'])) {
	$product = mysqli_query($relate, $code);	
	$allrows=mysqli_num_rows($product);
	if ($allrows>0) {
		for ($i=0; $i <$allrows ; $i++) { 
			for ($j=0; $j < 1; $j++) { 
				$column=mysqli_fetch_assoc($product);
				if($column['admin']=='1'){
					$type='admin';}
					else{
						if ($column['moderator']=='1') {
							$type='moderator';}
							else{
								$type='user';
							}
										}
				echo '
      <div class="window " >
        <div class="detail info_window" id="phonetime'.$i.'">
          <span class="detail_title">'.$column["username"].'</span>
        </div>
        <script>
        	$("#phonetime'.$i.'").click(function(){
        		if(document.getElementById("data'.$i.'").style.display=="none"){
        			document.getElementById("data'.$i.'").style.display="block";
        		}else{
        			document.getElementById("data'.$i.'").style.display="none";
        		}
        	});
        </script>
        <div class="info" id="data'.$i.'" style="display:none;">
	        <div class="detail">
	          <span class="detail_title">Phone number</span>
	          <span class="detail_value">'.$column["phone"].'</span>
	        </div>
	        <div class="detail">
	          <span class="detail_title">Email</span>
	          <span class="detail_value">'.$column["email"].'</span>
	        </div>
	        <div class="detail">
	          <span class="detail_title">Role</span>
	          <span class="detail_value">'.$type.'</span>
	        </div>
	        
	        <div class="detail last">
	         	<span class="detail_title"></span>
	         	<span class="detail_value">
		          	<form action="/play/admin/php/changerole.php" method="post">
		          		<input hidden name="id" value="'.$column["userid"].'">
		          		<input type="submit" value="Change role">
		          	</form>
	         	</span>
	        </div>
        </div>
      </div>'
     ;}
			}
		
	}else{
		echo "No requests";
	}
}else{
		echo '<script type="text/javascript">'; 
		echo 'swal({position: "center",type: "error",title: "Login Please!", showConfirmButton: false,timer: 1500});';
		echo 'setTimeout(function(){window.email="/play/login"}, 1500);';
		echo '</script>';
}

?>