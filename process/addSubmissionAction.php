<?php

include '../inc/connection.php';

$subId = time();
foreach ($_POST['answers'] as $key => $value) {
  if (is_array($value)) $value = implode(', ', $value);
  $sql = "INSERT INTO form_submissions (SubmissionId,QuestionId,Answer) VALUES ('$subId','$key','$value')";
  $result = mysqli_query($conn, $sql);
}
echo "<script>window.location='../index.php';alert('Submission Send Successfully');</script>";
