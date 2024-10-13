<?php
  $connect = mysqli_connect(
    'localhost', 
    'root', 
    'root', //writye your password
    'phpweek6' // write your database name
  );

  if(!$connect){
    echo "Connection Failed: " . mysqli_connect_error();
  }
?>