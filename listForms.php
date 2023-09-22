<?php include 'inc/header.php'; ?>
<?php
$owner = $_SESSION['user']['Id'];
$forms = null;
$sql = "SELECT * FROM forms WHERE OwnerId = '$owner'";
$rs = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($rs)) {
  $forms[] = $row;
}
?>
<h2>Forms</h2>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Deadline</th>
      <th scope="col">Questions</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php if (!is_null($forms)) { ?>
      <?php foreach ($forms as $f) { ?>
        <tr>
          <td><?= $f['Name'] ?></td>
          <td><?= $f['Deadline'] ?></td>
          <td><a href="formQuestions.php?form_id=<?= $f['Id'] ?>" class="btn btn-xs btn-info">Edit Questions</a></td>
          <td><a href="formSubmissions.php?form_id=<?= $f['Id'] ?>" class="btn btn-xs btn-info">View Submissions</a></td>
          <td>
          <a href="mailto:?subject=Form To Fill: <?= $f['Name'] ?>&body=Salam, I am inviting you to fill this form. You can fill by visting http://localhost/FormCreator/viewForm.php?form_id=<?= $f['Id'] ?>." class="btn btn-xs btn-info">Email Form</a>
            <a href="viewForm.php?form_id=<?= $f['Id'] ?>" class="btn btn-xs btn-info">View</a>
            <a href="updateForm.php?update=<?= $f['Id'] ?>" class="btn btn-xs btn-info">Edit</a>
            <a href="process/deleteFormAction.php?delete=<?= $f['Id'] ?>" class="btn btn-xs btn-danger">Delete</a>
          </td>
        </tr>
      <?php } ?>
    <?php } else { ?>
      <tr>
        <td colspan="3" class="text-info">No records present</td>
      </tr>
    <?php } ?>
  </tbody>
</table>

<br>
<?php include 'inc/footer.php'; ?>