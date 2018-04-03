<?php
// Insert external framework that you need

// Load advanced_configuration.php if you need to insert specific host / database name / username / password
require 'Classes/configuration.php';
?>

<?php include 'Components/head.php'; ?>
    <title>NAME OF YOUR APP</title>

    <!-- Insert stylesheets you need -->
    <link rel="stylesheet" href="/CSS/overall.css" />
    <link rel="stylesheet" href="/CSS/nav.css" />
  </head>

  <body>
    <header>
      <?php include 'Components/nav.php'; ?>
    </header>
  </body>
</html>
