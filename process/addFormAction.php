<?php

include '../inc/connection.php';

$name = $_POST['name'];
$owner = $_SESSION['user']['Id'];
$datetime = $_POST['datetime'];
$timestamp = strtotime($datetime);
$mysql_timestamp = date("Y-m-d H:i:s", $timestamp);
$sql = "INSERT INTO forms (Name,Deadline,OwnerId) VALUES ('$name','$mysql_timestamp','$owner')";
$result = mysqli_query($conn, $sql);
if ($result > 0) {
  echo "<script>window.location='../listForms.php';alert('Created Successfully');</script>";
}
