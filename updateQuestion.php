<?php include 'inc/header.php'; ?>

<?php
$update = $_GET['update'];

$query = "SELECT * FROM form_questions WHERE Id = $update";
$rs = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($rs);

$_POST['Id'] = $row['Id'];
$_POST['question'] = $row['Question'];
$_POST['answerType'] = $row['AnswerType'];
$_POST['options'] = $row['Options'];

$id = $row['FormId']

?>

<h2>Form</h2>

<form class="col-md-offset-4 col-md-4" method="post" action="process/updateFormQuestionAction.php" autocomplete="off">
  <input type="hidden" name="Id" value="<?= isset($_POST['Id']) ? $_POST['Id'] : '' ?>">
  <input type="hidden" name="FormId" value="<?= $id ?>">

  <div class="form-group">
    <label for="question">Question</label>
    <input type="text" class="form-control" required="required" name="question" placeholder="Question" value="<?= isset($_POST['question']) ? $_POST['question'] : '' ?>">
  </div>
  <div class="form-group">
    <label for="answerType">Answer Type</label>
    <select class="form-control" required="required" name="answerType">
      <option value="TextShort" <?= isset($_POST['answerType']) ? ($_POST['answerType'] == 'TextShort' ? 'selected' : '') : '' ?>>Text Short</option>
      <option value="TextLong" <?= isset($_POST['answerType']) ? ($_POST['answerType'] == 'TextLong' ? 'selected' : '') : '' ?>>Text Long</option>
      <option value="Dropdown" <?= isset($_POST['answerType']) ? ($_POST['answerType'] == 'Dropdown' ? 'selected' : '') : '' ?>>Dropdown</option>
      <option value="Checkbox" <?= isset($_POST['answerType']) ? ($_POST['answerType'] == 'Checkbox' ? 'selected' : '') : '' ?>>Checkbox</option>
      <option value="Radio" <?= isset($_POST['answerType']) ? ($_POST['answerType'] == 'Radio' ? 'selected' : '') : '' ?>>Radio</option>
    </select>
  </div>
  <div class="form-group">
    <label for="options">Options</label>
    <input type="text" class="form-control" name="options" placeholder="Options comma seperated" value="<?= isset($_POST['options']) ? $_POST['options'] : '' ?>">
  </div>
  <div class="form-group">
    <input type="submit" value="Submit" class="btn btn-block btn-success">
  </div>
</form>
<br>
<?php include 'inc/footer.php'; ?>