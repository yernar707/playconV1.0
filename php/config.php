<?php
$localhost="localhost";
$admin="root";
$code="";
$baza="play";

$relate=mysqli_connect($localhost,$admin,$code,$baza);

if (!$relate) {
    die("Connection failed: " . mysqli_connect_error());
}



?>