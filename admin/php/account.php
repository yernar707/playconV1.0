<?php
if (isset($_COOKIE['username'])&&isset($_COOKIE['admin'])) {
  if ($_COOKIE['admin']!='1') {
    if ($_COOKIE['moderator']!='1') {
    header('location:/play/welcome');
    }else{
    header('location:/play/moderator');
  }}
else{


require_once($_SERVER['DOCUMENT_ROOT'].'/play/php/config.php');
if(isset($_COOKIE['username'])&&isset($_COOKIE['iduser'])){
	$username=$_COOKIE['username'];
	$id=$_COOKIE['iduser'];
	$code="SELECT * FROM users WHERE username='".$username."' AND userid='".$id."'";
	$product = mysqli_query($relate, $code);
	$allrows=mysqli_num_rows ($product);
	if ($allrows==1) 
	{
		$column=mysqli_fetch_assoc($product);
		echo '
      <div class="window">
        <div class="detail">
          <span class="detail_title">Username</span>
          <span class="detail_value">'.$column["username"].'</span>
        </div>
        <div class="detail">
          <span class="detail_title">Email</span>
          <span class="detail_value">'.$column["email"].'</span>
        </div>
        <div class="detail">
          <span class="detail_title">Phone</span>
          <span class="detail_value">'.$column["phone"].'</span>
        </div>
        <div class="detail">
          <span class="detail_title">Role</span>
          <span class="detail_value">Admin</span>
        </div>
      </div>
      <form action="/play/admin/php/edit.php" method="post">
      <input hidden name="id" value="'.$_COOKIE["iduser"].'"/>
      <button>Edit</button>
      </form>
      <form action="/play/admin/php/changepass.php" method="post">
      <input hidden name="id" value="'.$_COOKIE["iduser"].'"/>
      <button>Change password</button>
      </form>';
	}

}  }
}else{
  header('location:/play/login');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
<style type="text/css">
	
</style>
</head>

<body class="internal" style="text-align: left;">
	
</body>
</html>