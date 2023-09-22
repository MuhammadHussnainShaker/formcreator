<?php

include '../inc/connection.php';

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM creators WHERE Email = '$email' AND Password = '$password' ";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_assoc($result);
  $_SESSION['user'] = array(
    'Id' => $row['Id'],
    'Email' => $row['Email'],
  );
  echo "<script>window.location='../userHome.php';alert('Welcome');</script>";
} else {
  echo "<script>window.location='../login.php';alert('Invlaid Email or Password');</script>";
}
