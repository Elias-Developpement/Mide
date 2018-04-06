<?php
if(isset($_POST['login'])) {
  $data = [
    'username' => htmlspecialchars($_POST['username']),
    'password' => htmlspecialchars($_POST['password']),
  ];

  $connection = new Connection($data, $configuration->database());
}
?>

<form class="form" action="" method="post">
  <div class="form-title">
    <h4>Log in</h4>
  </div>

  <?php
  if(isset($connection) && $connection->response() != "") {
  ?>
  <p><?= $connection->response() ?></p>
  <?php
  }
  ?>

  <div class="form-row">
    <div class="form-left">
      <label>Username : </label>
    </div>

    <div class="form-right">
      <input type="text" name="username" placeholder="Username" value="" required>
    </div>
  </div>

  <div class="form-row">
    <div class="form-left">
      <label>Password : </label>
    </div>

    <div class="form-right">
      <input type="password" name="password" placeholder="Password" value="" required>
    </div>
  </div>

  <div class="form-row">
    <input type="submit" name="login" value="Log in">
  </div>
</form>
