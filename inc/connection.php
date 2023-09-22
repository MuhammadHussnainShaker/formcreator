<?php
session_start();
$server = "localhost";
$user = "root";
$pass = "";
$dbname = "formcreator";

$conn = mysqli_connect($server,$user,$pass) or die("Error Connecting To Server");
mysqli_select_db($conn,$dbname) or die("Error Selecting Database");
