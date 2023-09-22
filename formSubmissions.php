<?php include 'inc/header.php'; ?>
<?php
$id = $_GET['form_id'];
$form_questionIds = null;

$sql = "SELECT * FROM form_questions WHERE FormId = '$id'";
$rs = mysqli_query($conn, $sql);
$form_questions = array();

if ($rs) {
  while ($row = mysqli_fetch_assoc($rs)) {
    $form_questionIds[] = $row['Id'];
    $form_questions[$row['Id']] = $row['Question'];
  }
}

$questionIds = "";
$form_submissions = null;

if (!is_null($form_questionIds)) {
  foreach ($form_questionIds as $fqId) {
    $questionIds .= "'$fqId',";
  }
  $questionIds = substr($questionIds, 0, -1);

  $sql = "SELECT * FROM form_submissions WHERE QuestionId IN ($questionIds)";
  $rs = mysqli_query($conn, $sql);
  while ($row = mysqli_fetch_assoc($rs)) {
    $form_submissions[$row['SubmissionId']][$row['QuestionId']] = $row['Answer'];
  }
}
?>

<h2>Form Submissions</h2>

<div class="table-responsive">
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th scope="col">SubmissionId</th>
        <?php
        foreach ($form_questions as $fqId => $question) { ?>
          <th scope="col"><?= $question ?></th>
        <?php } ?>
      </tr>
    </thead>
    <tbody>
      <?php if (!empty($form_submissions)) { ?>
        <?php foreach ($form_submissions as $submissionId => $responses) { ?>
          <tr>
            <td><?= $submissionId ?></td>
            <?php
            foreach ($form_questionIds as $fqId) { ?>
              <td><?= isset($responses[$fqId]) ? $responses[$fqId] : '' ?></td>
            <?php } ?>
          </tr>
        <?php } ?>
      <?php } else { ?>
        <tr>
          <td colspan="<?= count($form_questions) + 1 ?>" class="text-info">No records present</td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>

<br>
<?php include 'inc/footer.php'; ?>
