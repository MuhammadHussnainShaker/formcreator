<?php

include '../inc/connection.php';

$id = $_GET['delete'];
$formId = $_GET['form_id'];
$query = "DELETE FROM form_submissions WHERE QuestionId = '$id'";
$rs = mysqli_query($conn, $query);
$query = "DELETE FROM form_questions WHERE Id = '$id'";
$rs = mysqli_query($conn, $query);
$rowsaffected = mysqli_affected_rows($conn);
if ($rowsaffected > 0) {
  echo "<script>window.location='../formQuestions.php?form_id=$formId';</script>";
}
