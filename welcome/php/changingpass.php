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
if (isset($_POST['current'])&&isset($_POST['new'])) {
  $id=$_COOKIE['iduser'];
  $current=mysqli_real_escape_string($relate,$_POST['current']);
  $new=mysqli_real_escape_string($relate,$_POST['new']);
  require_once($_SERVER['DOCUMENT_ROOT'].'/play/php/config.php');
  $code="SELECT password FROM users WHERE userid='".$id."'";
  $product = mysqli_query($relate, $code);
  $column=mysqli_fetch_assoc($product);
  if($column['password']==$current){
    if ($current==$new) {
      echo '<script type="text/javascript">'; 
      echo 'swal({position: "center",type: "error",title: "New password is same as your current password!", showConfirmButton: false,timer: 1500});';
      echo 'setTimeout(function(){window.location="/play/welcome/php/changepass.php"}, 1500);';
      echo '</script>';
    }else{
    $change="UPDATE users SET password='".$new."' WHERE userid='".$id."'";
    $output=mysqli_query($relate, $change);
    if($output){
      echo '<script type="text/javascript">'; 
      echo 'swal({position: "center",type: "success",title: "Password is changed!", showConfirmButton: false,timer: 1500});';
      echo 'setTimeout(function(){window.location="/play/welcome"}, 1500);';
      echo '</script>';
    }else{
      echo '<script type="text/javascript">'; 
      echo 'swal({position: "center",type: "error",title: "Uncaught Error!", showConfirmButton: false,timer: 1500});';
      echo 'setTimeout(function(){window.location="/play/welcome/php/changepass.php"}, 1500);';
      echo '</script>';
    }}
  }else{
    echo '<script type="text/javascript">'; 
    echo 'swal({position: "center",type: "error",title: "Current password is incorrect!", showConfirmButton: false,timer: 1500});';
    echo 'setTimeout(function(){window.location="/play/welcome/php/changepass.php"}, 1500);';
    echo '</script>';
  }
  
}

?>
</body>
</html>
