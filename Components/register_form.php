<?php
if(isset($_POST['register'])) {
  $data = [
    'username' => htmlspecialchars($_POST['username']),
    'password' => htmlspecialchars($_POST['password']),
    'email' => htmlspecialchars($_POST['email'])
  ];

  $registration = new Registration($data, $configuration->database());
}
?>

<form class="form" action="" method="post">
  <div class="form-title">
    <h4>Register</h4>
  </div>

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
    <div class="form-left">
      <label>Confirm password : </label>
    </div>

    <div class="form-right">
      <input type="password" name="password2" placeholder="Confirm password" value="" required>
    </div>
  </div>

  <div class="form-row">
    <div class="form-left">
      <label>Email address : </label>
    </div>

    <div class="form-right">
      <input type="mail" name="email" placeholder="Email" value="" required>
    </div>
  </div>

  <div class="form-row">
    <input type="submit" name="register" value="Register">
  </div>
</form>
