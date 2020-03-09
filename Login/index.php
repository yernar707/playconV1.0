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
  <h2 class="title">Login</h2>
  <form class="action_form" action="/play/php/login.php" method="post">
    <div class="item_field">
      <input type="text" name="username" placeholder="username" required="">
    </div>
    <div class="item_field">
      <input type="password" name="password" minlength="8" maxlength="16" placeholder="password" required="">
    </div>
    <div class="item_field">
      <input type="checkbox" name="remember">
      <label>Remember me</label>
    </div>
    <div class="item_field">
      <button>Login</button>
    </div>
  </form>
</div>

</body>
</html>
