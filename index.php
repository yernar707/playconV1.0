<?php
if (isset($_COOKIE['username'])&&isset($_COOKIE['moderator'])) {
  if (($_COOKIE['admin']=='0')&&($_COOKIE['moderator']=='1')) {
    header('location:/play/moderator');
  }else{
    if (($_COOKIE['admin']=='1')&&($_COOKIE['moderator']=='0')) {
      header('location:/play/admin');
    }
  }
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
        <li><a href="/play/signup"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="/play/login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
         <li><a href="/play/information"><span class="glyphicon glyphicon-info-sign"></span> Information</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container">
  <h3>Welcome to PlayCON!</h3>
  <p>Here you can find the best sportsmen and cybersportsmen.</p>
  <p>First you should <strong>CREATE</strong> an account or <strong>LOG IN</strong> if you already have an account  </p>
</div>

</body>
</html>
