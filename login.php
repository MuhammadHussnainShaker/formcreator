<?php include 'inc/header.php'; ?>
<h2>Login</h2>
<div class="col-md-offset-4 col-md-4">
  <form class="form-horizontal" action="process/loginAction.php" method="post">
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" class="form-control" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9._%+-]+\.[a-z]{2,4}$" placeholder="Email">
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" class="form-control" name="password" placeholder="Password">
    </div>
    <div class="form-group">
      <input type="submit" name="login" value="Submit" class="btn btn-block btn-success">
    </div>
  </form>
</div>
<?php include 'inc/footer.php'; ?>