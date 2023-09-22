<?php

include '../inc/connection.php';

$Id = $_POST['Id'];
$Name = $_POST['name'];
$datetime = $_POST['datetime'];
$timestamp = strtotime($datetime);
$mysql_timestamp = date("Y-m-d H:i:s", $timestamp);
$query = "UPDATE forms SET Name='$Name',Deadline='$mysql_timestamp' WHERE Id='$Id'";
$rs = mysqli_query($conn, $query);
$rowsaffected = mysqli_affected_rows($conn);
if ($rowsaffected > 0) {
  echo "<script>alert('Record Updated');window.location='../listForms.php';</script>";
} else {
  echo "<script>window.location='../listForms.php';</script>"; 
}
?>
