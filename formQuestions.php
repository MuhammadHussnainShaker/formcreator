<?php include 'inc/header.php'; ?>
<?php
$id = $_GET['form_id'];
$form_questions = null;
$sql = "SELECT * FROM form_questions WHERE FormId = '$id'";
$rs = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($rs)) {
  $form_questions[] = $row;
}
?>
<h2>Form Questions</h2>
<a href="addQuestion.php?form_id=<?= $_GET['form_id'] ?>" class="btn btn-primary">Add Question</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Questions</th>
      <th scope="col">Answer Type</th>
      <th scope="col">Options</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php if (!is_null($form_questions)) { ?>
      <?php foreach ($form_questions as $f) { ?>
        <tr>
          <td><?= $f['Question'] ?></td>
          <td><?= $f['AnswerType'] ?></td>
          <td><?= $f['Options'] ?></td>
          <td>
            <a href="updateQuestion.php?update=<?= $f['Id'] ?>" class="btn btn-xs btn-info">Edit</a>
            <a href="process/deleteQuestionAction.php?delete=<?= $f['Id'] ?>&form_id=<?= $f['FormId'] ?>" class="btn btn-xs btn-danger">Delete</a>
          </td>
        </tr>
      <?php } ?>
    <?php } else { ?>
      <tr>
        <td colspan="4" class="text-info">No records present</td>
      </tr>
    <?php } ?>
  </tbody>
</table>

<br>
<?php include 'inc/footer.php'; ?>