<nav class="main-menu">
  <div class="menu-title">
    <a class="menu-title-link" href="index.php">APP TITLE</a>
  </div>

  <ul class="menu-bar menu-row">
    <li class="menu-item">
      <a class="menu-link" href="index.php">Home</a>
    </li>

    <?php
    if(isset($_SESSION['id'])) {
    ?>

    <li class="menu-item">
      <a class="menu-link" href="disconnect.php">Disconnect</a>
    </li>

    <?php
    }
    else {
    ?>

    <li class="menu-item">
      <a class="menu-link" href="login.php">Log in</a>
    </li>

    <li class="menu-item">
      <a class="menu-link" href="register.php">Register</a>
    </li>
    <?php
    }
    ?>
  </ul>
</nav>
