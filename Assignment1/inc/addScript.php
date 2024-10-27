<?php 
  // Error Reporting
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  if (isset($_POST['addEvent'])) {
    // Collect and sanitize form inputs
    $title = $_POST['title'];
    $description = $_POST['description'];
    $startdate = $_POST['startdate'];
    $enddate = $_POST['enddate'];
    $starttime = $_POST['starttime'];
    $endtime = $_POST['endtime'];
    $eventtype1 = $_POST['eventtype1'];
    $eventtype2 = $_POST['eventtype2'];
    $eventtype3 = $_POST['eventtype3'];
    $library_id = $_POST['library_id'];
    $pagelink = $_POST['pagelink'];
    $otherinfo = $_POST['otherinfo'];

    require('../reusables/connect.php');

    // Insert data into the database
    $query = "INSERT INTO tpl_events_feed (`title`, `description`, `startdate`, `enddate`, `starttime`, `endtime`, `eventtype1`, `eventtype2`, `eventtype3`, `library_id`, `pagelink`, `otherinfo`) VALUES (
          '" . mysqli_real_escape_string($connect, $title) . "',
          '" . mysqli_real_escape_string($connect, $description) . "',
          '" . mysqli_real_escape_string($connect, $startdate) . "',
          '" . mysqli_real_escape_string($connect, $enddate) . "',
          '" . mysqli_real_escape_string($connect, $starttime) . "',
          '" . mysqli_real_escape_string($connect, $endtime) . "',
          '" . mysqli_real_escape_string($connect, $eventtype1) . "',
          '" . mysqli_real_escape_string($connect, $eventtype2) . "',
          '" . mysqli_real_escape_string($connect, $eventtype3) . "',
          '" . mysqli_real_escape_string($connect, $library_id) . "',
          '" . mysqli_real_escape_string($connect, $pagelink) . "',
          '" . mysqli_real_escape_string($connect, $otherinfo) . "'
    )";

    $event = mysqli_query($connect, $query);

    if ($event) {
      header("Location: ../index.php");
    } else {
      echo "There was an error adding the event: " . mysqli_error($connect); 
    }
  }
?>