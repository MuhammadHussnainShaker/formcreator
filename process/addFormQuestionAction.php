<?php

include '../inc/connection.php';

$question = $_POST['question'];
$answerType = $_POST['answerType'];
$options = $_POST['options'];
$formId = $_POST['FormId'];

$sql = "INSERT INTO form_questions (Question,AnswerType,Options,FormId) VALUES ('$question','$answerType','$options','$formId')";
$result = mysqli_query($conn, $sql);
if ($result > 0) {
  echo "<script>window.location='../formQuestions.php?form_id=$formId';</script>";
}
