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
    swal({position: "center",type: "info",title: "Click requests on page to get more detail!", showConfirmButton: false,timer: 1500});
    }
    $(document).ready(function(){
      $('#requests').load('/play/welcome/php/mypart.php');

    })
   
      
    function select() {
      if (document.getElementById('another').selected==true) {
        document.getElementById('selectsport').name="none";
        document.getElementById('anothersport').name="type";
        document.getElementById('sport').style.display="block";
      }else{
        document.getElementById('sport').style.display="none";
        document.getElementById('selectsport').name="type";
        document.getElementById('anothersport').name="none";

      }}
       function choose() {
      if (document.getElementById('anothersearch').selected==true) {
        document.getElementById('selectsportsearch').name="none";
        document.getElementById('anothersportsearch').name="type";
        document.getElementById('sportsearch').style.display="block";
      }else{
        document.getElementById('sportsearch').style.display="none";
        document.getElementById('selectsportsearch').name="type";
        document.getElementById('anothersportsearch').name="none";

      }};
     
      function loaddata()
        {
         
         var date=document.getElementById("date").value;
         var location=document.getElementById("location").value;
          var title=document.getElementById( "title" ).value;
          var sporttype=document.getElementById("selectsportsearch").value;
          var another=document.getElementById("anothersportsearch").value;
          var clear=document.getElementById('clear').value;
          
         if(title||location||date||sporttype||clear)
         {
          $.ajax({
          type: 'post',
          url: 'php/mypart.php',
          data:  {
            location:location,
            date:date,
            title:title,
            sporttype:sporttype,
            another:another,
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
      function Clear(){
        document.getElementById('date').value=null;
        document.getElementById('location').value=null;
        document.getElementById('title').value=null;
        document.getElementById('selectsportsearch').value="";
        document.getElementById('anothersportsearch').value=null;
      }
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
        <li><a href="/play/welcome/index.php"><span class="glyphicon glyphicon-user"></span> Account</a></li>
        <li><a href="/play/welcome/requests.php"> Requests</a></li>
        <li><a href="/play/welcome/myrequests.php"> My requests</a></li>
        <li><a href="/play/welcome/information.php"><span class="glyphicon glyphicon-info-sign"></span> Information</a></li>
        <li><a href="/play/welcome/contacts.php"><span class="glyphicon glyphicon-phone-alt"></span> Contacts</a></li>
        <li><a href="/play/php/logout.php"><span class="glyphicon glyphicon-log-out"></span> Log out</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="wrap">


  
  <h4>My Participations:</h4><p>
  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#filter" aria-expanded="false" aria-controls="filter">Filter
  </button> 
</p>
<div class="collapse" id="filter">
  <div class="card card-body">
      <div class="action_form collapse" id="requestform" style="">
    <form>
      <div class="item_field">
        <select name="type" id="selectsportsearch" onchange="choose(); loaddata();">
          <option disabled="" selected="" value="">Choose sport type</option>
          <option value="Football">Football</option>
          <option value="Basketball">Basketball</option>
          <option value="Tennis">Tennis</option>
          <option value="DoTA">DoTA</option>
          <option value="CS:GO">CS:GO</option>
          <option id="anothersearch" value="another">another</option>
        </select>
      </div>
      <div class="item_field" id="sportsearch" style="display: none;" >
        <input  type="text" id="anothersportsearch" name="empty" placeholder="Sport type" onkeyup="loaddata();">
      </div>
      <div class="item_field">
        <input type="text" name="title" id="title" value="" onkeyup="loaddata();">
      </div>
      <div class="item_field">    
        <input type="date" id="date" name="date" value="" onchange ="loaddata();">
      </div>
       <div class="item_field">    
    <input type="text" id="location" name="location" value="" onkeyup="loaddata();"> 
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
