<?php

include '../inc/connection.php';

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM creators WHERE Email = '$email'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
  echo "<script>window.location='../register.php';alert('Email Already Registered');</script>";
} else {
  $sql = "INSERT INTO creators (Email,Password) VALUES ('$email','$password')";
  $result = mysqli_query($conn, $sql);
  if ($result > 0) {
    echo "<script>window.location='../login.php';alert('Registered Successfully');</script>";
  }
}
