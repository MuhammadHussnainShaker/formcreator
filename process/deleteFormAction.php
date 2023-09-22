<?php

include '../inc/connection.php';

$id = $_GET['delete'];
$sql = "SELECT * FROM form_questions WHERE FormId = '$id'";
$rs = mysqli_query($conn, $sql);
$data = mysqli_fetch_all($rs, MYSQLI_ASSOC);
foreach ($data as $d) {
  $qId = $d['Id'];
  $query = "DELETE FROM form_submissions WHERE QuestionId = '$qId'";
  $rs = mysqli_query($conn, $query);
}
$query = "DELETE FROM form_questions WHERE FormId='$id'";
$rs = mysqli_query($conn, $query);
$query = "DELETE FROM forms WHERE Id='$id'";
$rs = mysqli_query($conn, $query);
$rowsaffected = mysqli_affected_rows($conn);
if ($rowsaffected > 0) {
  echo "<script>alert('Record Deleted');window.location='../listForms.php';</script>";
}
