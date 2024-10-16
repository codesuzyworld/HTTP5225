<?php 

if(isset($_POST['deleteSchool'])){
  $id = $_POST['id'];

    require('../reusables/connect.php');


    //'$schoolName','$schoolType', '$phone', '$email'

    $query = "DELETE FROM `schools` WHERE `id` = '$id'";

    $school = mysqli_query($connect, $query);

    if($school){
      header("Location: ../index.php");
    }else{
      echo "There was an error deleting the school: " . mysqli_error($connect); 
    }

  }