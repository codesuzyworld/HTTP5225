<?php 

if(isset($_POST['deleteEvent'])){
  $id = $_POST['_id'];
    // Error Reporting
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    require('../reusables/connect.php');

    $query = "DELETE FROM `tpl_events_feed` WHERE `_id` = '$id'";

    $event = mysqli_query($connect, $query);

    if($event){
      header("Location: ../index.php");
    }else{
      echo "There was an error deleting the event: " . mysqli_error($connect); 
    }

  }
  ?>