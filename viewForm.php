<?php include 'inc/header.php'; ?>

<?php
$formId = $_GET['form_id'];

$query = "SELECT * FROM forms WHERE Id = $formId";
$rs = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($rs);

$idForm = $row['Id'];
$formName = $row['Name'];
$formDeadline = $row['Deadline'];
$currentTime = date("Y-m-d H:i:s");

$form_questions = null;
$sql = "SELECT * FROM form_questions WHERE FormId = '$idForm'";
$rs = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($rs)) {
  $form_questions[] = $row;
}

?>

<h2>Form - <?= $formName ?></h2>

<?php if (strtotime($currentTime) > strtotime($formDeadline)) { ?>
  <h1 class="text-danger text-center">The submission deadline has passed.</h1>
<?php } else { ?>
  <form class="col-md-offset-4 col-md-4" method="post" action="process/addSubmissionAction.php" autocomplete="off">
    <input type="hidden" name="Id" value="<?= $idForm ?>">
    <?php if (!is_null($form_questions)) { ?>
      <?php foreach ($form_questions as $f) { ?>
        <div class="form-group">
          <label for="name">Question : <?= $f['Question'] ?></label>
          <?php if ($f['AnswerType'] == 'TextShort') { ?>
            <input type="text" class="form-control" required="required" name="answers[<?= $f['Id'] ?>]">
          <?php } else if ($f['AnswerType'] == 'TextLong') { ?>
            <textarea class="form-control" required="required" name="answers[<?= $f['Id'] ?>]"></textarea>
          <?php } else if ($f['AnswerType'] == 'Dropdown') { ?>
            <select class="form-control" required="required" name="answers[<?= $f['Id'] ?>]">
              <option value="">Select Option</option>
              <?php
              $values = explode(",", $f['Options']);
              foreach ($values as $fopt) { ?>
                <option value="<?= $fopt ?>"><?= $fopt ?></option>
              <?php } ?>
            </select>
          <?php } else if ($f['AnswerType'] == 'Checkbox') { ?>
            <?php
            $values = explode(",", $f['Options']);
            foreach ($values as $fopt) { ?>
              <input type="checkbox" name="answers[<?= $f['Id'] ?>][]" value="<?= $fopt ?>"><?= $fopt ?></option>
            <?php } ?>
          <?php } else if ($f['AnswerType'] == 'Radio') { ?>
            <?php
            $values = explode(",", $f['Options']);
            foreach ($values as $fopt) { ?>
              <input type="radio" name="answers[<?= $f['Id'] ?>]" value="<?= $fopt ?>"><?= $fopt ?></option>
            <?php } ?>
          <?php } ?>
        </div>
      <?php } ?>

      <div class="form-group">
        <input type="submit" value="Submit" class="btn btn-block btn-success">
      </div>
    <?php } else { ?>
      <p class="text-info">No Questions Present</p>
    <?php } ?>
  </form>
<?php } ?>
<br>
<?php include 'inc/footer.php'; ?>