<?php include 'inc/header.php'; ?>

<?php

$owner = $_SESSION['user']['Id'];
$forms = null;
$sql = "SELECT * FROM forms WHERE OwnerId = '$owner'";
$rs = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($rs)) {
  $forms[] = $row;
}

if (!is_null($forms)) {
  if (count($forms) == 10) {
    echo "<script>window.location='listForms.php';alert('You can only create 10 forms');</script>";
  }
}

?>

<h2>Form</h2>

<form class="col-md-offset-4 col-md-4" method="post" action="process/addFormAction.php" autocomplete="off">

  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" required="required" name="name" placeholder="Name">
  </div>
  <div class="form-group">
    <label for="name">Submission Deadline</label>
    <input type="datetime-local" class="form-control" required="required" name="datetime">
  </div>
  <div class="form-group">
    <input type="submit" value="Submit" class="btn btn-block btn-success">
  </div>
</form>
<br>
<?php include 'inc/footer.php'; ?>