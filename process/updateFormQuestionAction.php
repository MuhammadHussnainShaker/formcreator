<?php

include '../inc/connection.php';

$Id = $_POST['Id'];
$question = $_POST['question'];
$answerType = $_POST['answerType'];
$options = $_POST['options'];
$formId = $_POST['FormId'];

$query = "UPDATE form_questions SET Question='$question',AnswerType='$answerType',Options='$options' WHERE Id='$Id'";
$rs = mysqli_query($conn, $query);
$rowsaffected = mysqli_affected_rows($conn);
if ($rowsaffected > 0) {
  echo "<script>alert('Record Updated');window.location='../formQuestions.php?form_id=$formId';</script>";
} else {
  echo "<script>alert('Record Updated');window.location='../formQuestions.php?form_id=$formId';</script>";
}
