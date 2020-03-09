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
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Play" rel="stylesheet">
  <link href="/Play/css/style.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="/play/js/sweetalert2.js"></script>
  <script src="/play/js/sweetalert2.all.js"></script>
  <script src="/play/js/sweetalert2.all.min.js"></script>
  <script src="/play/js/sweetalert2.min.js"></script>
  <script type="text/javascript">
      function hello(){
    swal({position: "center",type: "info",title: "Click users on page to get more detail!", showConfirmButton: false,timer: 1500});
    };
    $(document).ready(function(){
      $('#requests').load('/play/admin/php/users.php');

    });
   
      function Clear(){
        document.getElementById('name').value=null;
        document.getElementById('phone').value=null;
        document.getElementById('email').value=null;
        document.getElementById('role').value="";
      };
      
     
      function loaddata()
        {
         
         var role=document.getElementById("role").value;
         var name=document.getElementById("name").value;
          var phone=document.getElementById( "phone" ).value;
          var email=document.getElementById("email").value;
          var clear=document.getElementById('clear').value;
          
         if(role||name||phone||email||clear)
         {
          $.ajax({
          type: 'post',
          url: 'php/users.php',
          data:  {
            role:role,
            name:name,
            phone:phone,
            email:email,
          },
          success: function (response) {
           $('#requests').html(response);
          }
          });
         }
          
         else
         {
         }
        };
  </script>
</head>
<body class="main" onload="hello();">

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">PlayCON</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="/play/admin/index.php"><span class="glyphicon glyphicon-user"></span> Account</a></li>
        <li><a href="/play/admin/users.php"> Users</a></li>
        <li><a href="/play/php/logout.php"><span class="glyphicon glyphicon-log-out"></span> Log out</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="wrap">

  
  <h4>Users:</h4><p>
  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#filter" aria-expanded="false" aria-controls="filter">Filter
  </button> 
</p>
<div class="collapse" id="filter">
  <div class="card card-body">
      <div class="action_form collapse" id="requestform" style="">
    <form>
      <div class="item_field">
        <select name="role" id="role" onchange="loaddata();">
          <option disabled="" selected="" value="">Choose role</option>
          <option value="admin">Admin</option>
          <option value="moderator">Moderator</option>
          <option value="user">User</option>
        </select>
      </div>
      <div class="item_field">
        <input type="text" name="name" id="name" placeholder="username" value="" onkeyup="loaddata();">
      </div>
      <div class="item_field">    
        <input type="tel" id="phone" name="phone" placeholder="phone number" value="" onkeyup="loaddata();">
      </div>
       <div class="item_field">    
    <input type="text" id="email" name="email" placeholder="email" value="" onkeyup="loaddata();"> 
      </div>
      <div class="item_field">    
    <input type="button" style id="clear" name="clear" value="Clear" onclick="Clear();loaddata(); "> 
      </div>
    </form>
  </div>
  </div>
</div>

  <div class="internal" id="requests">

    
  </div>
</div>

</body>
</html>
