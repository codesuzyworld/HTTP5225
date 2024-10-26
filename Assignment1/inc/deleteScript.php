<?php 

if(isset($_POST['deleteEvent'])){
  $id = $_POST['_id'];

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