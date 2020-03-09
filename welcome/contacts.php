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

?><!DOCTYPE html>
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
        <li><a href="/play/welcome/index.php"><span class="glyphicon glyphicon-user"></span> Account</a></li>
        <li><a href="/play/welcome/requests.php"> Requests</a></li>
        <li><a href="/play/welcome/myrequests.php"> My requests</a></li>
        <li><a href="/play/welcome/mypart.php"> My participations</a></li>
        <li><a href="/play/welcome/information.php"><span class="glyphicon glyphicon-info-sign"></span> Information</a></li>
        <li><a href="/play/welcome/contacts.php"><span class="glyphicon glyphicon-phone-alt"></span> Contacts</a></li>
        <li><a href="/play/php/logout.php"><span class="glyphicon glyphicon-log-out"></span> Log out</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container">
  <h3>Have something to say to author?!</h3>
  <p>You can contact us:</p>
  <p><strong>ergaziev_e0910@akb.nis.edu.kz</strong> </p>
</div>

</body>
</html>
