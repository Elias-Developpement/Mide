<?php
// Insert external framework that you need

// Load advanced_configuration.php if you need to insert specific host / database name / username / password
require 'Classes/advanced_configuration.php';
$configuration = new AdvancedConfiguration("localhost", "mide", "root", "root");
?>

<?php include 'Components/head.php'; ?>
    <title>NAME OF YOUR APP</title>

    <!-- Insert stylesheets you need -->
    <link rel="stylesheet" href="/CSS/overall.css" />
    <link rel="stylesheet" href="/CSS/nav.css" />
    <link rel="stylesheet" href="/CSS/section.css">
    <link rel="stylesheet" href="/CSS/footer.css">
  </head>

  <body>
    <header>
      <?php include 'Components/nav.php'; ?>
    </header>

    <section>
      <?php include 'Components/section.php'; ?>
    </section>

    <?php include 'Components/footer.php'; ?>
  </body>
</html>
