<?php include 'inc/header.php'; ?>
<?php
$id = $_GET['form_id'];
$questions = null;
$sql = "SELECT * FROM form_questions WHERE FormId = '$id'";
$rs = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($rs)) {
  $questions[] = $row;
}

if (!is_null($questions)) {
  if (count($questions) == 10) {
    echo "<script>window.location='./formQuestions.php?form_id=$id';alert('You can only create 10 form questions');</script>";
  }
}

?>
<h2>Form Question</h2>

<form class="col-md-offset-4 col-md-4" method="post" action="process/addFormQuestionAction.php" autocomplete="off">
  <input type="hidden" name="FormId" value="<?= $id ?>">

  <div class="form-group">
    <label for="question">Question</label>
    <input type="text" class="form-control" required="required" name="question" placeholder="Question">
  </div>
  <div class="form-group">
    <label for="answerType">Answer Type</label>
    <select class="form-control" required="required" name="answerType" id="answerType">
      <option value="Dropdown">Dropdown</option>
      <option value="TextShort">Text Short</option>
      <option value="TextLong">Text Long</option>
      <option value="Checkbox">Checkbox</option>
      <option value="Radio">Radio</option>
    </select>
  </div>
  <div class="form-group" id="options" style="visibility: none;">
    <label for="options">Options</label>
    <input type="text" class="form-control"  name="options" placeholder="Options comma seperated">
  </div>
  <div class="form-group">
    <input type="submit" value="Submit" class="btn btn-block btn-success">
    <input type="reset" value="Reset" class="btn btn-block btn-info">
  </div>
</form>
<br>
<?php include 'inc/footer.php'; ?>