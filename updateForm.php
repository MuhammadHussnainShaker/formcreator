<?php include 'inc/header.php'; ?>

<?php
$update = $_GET['update'];

$query = "SELECT * FROM forms WHERE Id = $update";
$rs = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($rs);

$_POST['Id'] = $row['Id'];
$_POST['Name'] = $row['Name'];
$_POST['Deadline'] = $row['Deadline'];

?>

<h2>Form</h2>

<form class="col-md-offset-4 col-md-4" method="post" action="process/updateFormAction.php" autocomplete="off">
  <input type="hidden" name="Id" value="<?= isset($_POST['Id']) ? $_POST['Id'] : '' ?>">
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" required="required" name="name" placeholder="Name" value="<?= isset($_POST['Name']) ? $_POST['Name'] : '' ?>">
  </div>
  <div class="form-group">
    <label for="name">Submission Deadline</label>
    <input type="datetime-local" class="form-control" required="required" name="datetime" value="<?= isset($_POST['Deadline']) ? $_POST['Deadline'] : '' ?>">
  </div>
  <div class="form-group">
    <input type="submit" value="Submit" class="btn btn-block btn-success">
  </div>
</form>
<br>
<?php include 'inc/footer.php'; ?>