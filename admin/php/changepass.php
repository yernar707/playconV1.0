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
  <script type="text/javascript">
  </script>
</head>
<body class="main">

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
  <h3>Change password:</h3>
  <div class="internal" id="account">
    <form class="action_form" action="/play/admin/php/changingpass.php" method="post">
    <div class="item_field">
      <input type="password" name="current" placeholder="Current password"  required="">
    </div>
    <div class="item_field">
      <input type="password" name="new" placeholder="New password"  required="">
    </div>
    
    <div class="item_field">
      <button type="submit">Save</button>
      <button type="button" onclick="window.location='/play/admin'">Cancel</button>
    </div>
  </form>
  </div>
</div>

</body>


</html>
