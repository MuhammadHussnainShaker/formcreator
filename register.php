<?php include 'inc/header.php'; ?>
<h2>Register</h2>

<form class="col-md-offset-4 col-md-4" name="registerForm" id="registerForm" method="post" action="process/registerAction.php" enctype="multipart/form-data" autocomplete="off">

  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9._%+-]+\.[a-z]{2,4}$" required="required" name="email" placeholder="Email">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" pattern=".{8,}" title="8 characters minimum" required="required" name="password" placeholder="Password">
  </div>
  <div class="form-group">
    <div class="col-md-6">
      <input type="submit" class="btn btn-block btn-primary" value="Submit" id="btnSubmit">
    </div>
    <div class="col-md-6">
      <input type="reset" class="btn btn-block btn-default" value="Clear" id="btnReset">
    </div>
  </div>
</form>
<br>
<?php include 'inc/footer.php'; ?>