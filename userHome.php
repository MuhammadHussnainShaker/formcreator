<?php include 'inc/header.php'; ?>
<div class="jumbotron">
  <h3>Welcome to Online Forms</h3>
  <?php if (isset($_SESSION['user'])) { ?>
  <dl class="">
    <dt>Your Email</dt>
    <dd><?= $_SESSION['user']['Email'] ?></dd>
  </dl>
  <div class="form-group">
  <a href="addForm.php" class="btn btn-info">Add New Form</a> 
  <br> 
  <br> 
  <a href="listForms.php" class="btn btn-info">View Forms</a>  
  </div>
</div>
<?php } else { ?>
  <h4>Please login or register to continue</h4>
  </div>
  <?php }?>

<?php include 'inc/footer.php'; ?>