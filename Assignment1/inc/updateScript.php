<?php
  if (isset($_POST['updateEvent'])) {
    $id = $_POST['_id'];
    $title = $_POST['title'];
    $library_id = $_POST['library_id'];
    $startdate = $_POST['startdate'];
    $enddate = $_POST['enddate'];
    $starttime = $_POST['starttime'];
    $endtime = $_POST['endtime'];
    $description = $_POST['description'];

  require('../reusables/connect.php');

  $query = "UPDATE tpl_events_feed SET 
      `title` = '" . mysqli_real_escape_string($connect, $title) . "',
      `library_id` = '" . mysqli_real_escape_string($connect, $library_id) . "',
      `startdate` = '" . mysqli_real_escape_string($connect, $startdate) . "',
      `enddate` = '" . mysqli_real_escape_string($connect, $enddate) . "',
      `starttime` = '" . mysqli_real_escape_string($connect, $starttime) . "',
      `endtime` = '" . mysqli_real_escape_string($connect, $endtime) . "',
      `description` = '" . mysqli_real_escape_string($connect, $description) . "'
      WHERE `_id` = '$id'";

  $event = mysqli_query($connect, $query);

  if ($event) {
    header("Location: ../index.php");
  } else {
    echo "There was an error updating the event: " . mysqli_error($connect); 
  }
}
?>