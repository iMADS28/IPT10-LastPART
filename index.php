<?php

require "helpers/helper-functions.php";

session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IPT10 Lab 3 - Registration System</title>
    <link rel="icon" href="https://phpsandbox.io/assets/img/brand/phpsandbox.png">
    <link rel="stylesheet" href="https://assets.ubuntu.com/v1/vanilla-framework-version-4.15.0.min.css" />
</head>
<body>

<section class="p-section--hero">
  <div class="row--50-50-on-large">
    <div class="col">
      <div class="p-section--shallow">
        <h1>
          Laboratory Activity #3<br />File Programming
        </h1>
        <h2>
          Integrative Programming and Technologies
        </h2>
      </div>
      <div class="p-section--shallow">
        <p>This lab combines the concepts from Lab 2a (PHP Sessions & Multi-step Forms) and Lab 2b (CSV File Handling) to create a registration system that saves data to a CSV file.</p>
        <hr class="is-muted" />
        <a class="p-button--positive" href="step-1.php">Start Registration</a>
        <a class="p-button" href="registrants.php">View Registrants</a>
      </div>
    </div>
  </div>
</section>

</body>
</html>
