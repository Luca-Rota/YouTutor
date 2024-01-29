<?php
  $mysql_host = "localhost";
  $mysql_user = "S4512576";
  $mysql_pass = "barcollomanonMorro";
  $mysql_db = "S4512576";
  $con = new mysqli($mysql_host, $mysql_user, $mysql_pass, $mysql_db);
  if(mysqli_connect_error())
    die('Errore di connessione ('.mysqli_connect_errno().') '.mysqli_connect_error());
?>
