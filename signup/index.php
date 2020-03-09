<!DOCTYPE html>
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
  <script type="text/javascript">
    $(document).ready(function(){
      $('#phone').click(function(){
        $('#phone').val('+7');
      });
    });
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
      <a class="navbar-brand" href="">PlayCON</a>
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
  <h2 class="title">Sign Up</h2>
  <form class="action_form" action="/play/php/signup.php" method="post">
    <div class="item_field">
      <input type="text" name="username" pattern="^[A-Za-z0-9]{3,}$" title="Must contain only numbers and letters. And at least 4 characters" placeholder="username" required="">
    </div>
    <div class="item_field">
      <input type="email" name="email" placeholder="Email" required="">
    </div>
    <div class="item_field">
      <input type="password" name="password" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" placeholder="password" title="Must contain at least one number or symbol and one uppercase and lowercase letter, and at least 8 or more characters" required="">
    </div>
    <div class="item_field">
      <input type="tel" id="phone" name="phone" maxlength="12" placeholder="phone number" required="">
    </div>
    <div class="item_field">
      <button>Login</button>
    </div>
  </form>

</div>

</body>
</html>
