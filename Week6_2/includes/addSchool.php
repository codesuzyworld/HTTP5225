<?php
if(isset($_POST['addSchool'])){
// form name attribute
$schoolName=$_POST['schoolName'];
//echo $schoolName;
$schoolType=$_POST['schoolType'];
$email=$_POST['email'];
$phone=$_POST['phone'];

require('../reusables/connect.php');

$query = "INSERT INTO schools (`School Name`, `School Type`, `Phone`,`Email`)
VALUES ('$schoolName', '$schoolType', '$phone','$email' )";

$school=mysqli_query($connect, $query);

echo "inserted successfully";

}