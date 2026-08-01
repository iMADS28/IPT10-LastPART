<?php

require "helpers/helper-functions.php";

session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration - Step 1 of 3</title>
    <link rel="icon" href="https://phpsandbox.io/assets/img/brand/phpsandbox.png">
    <link rel="stylesheet" href="https://assets.ubuntu.com/v1/vanilla-framework-version-4.15.0.min.css" />
</head>
<body>

<section class="p-section--hero">
  <div class="row--50-50-on-large">
    <div class="col">
      <div class="p-section--shallow">
        <h1>Registration (Step 1/3)</h1>
        <p>Personal Information</p>
      </div>
      <div class="p-section--shallow">

        <form action="step-2.php" method="POST">
          <div class="p-form__group">
            <label for="fullname">Full Name:</label>
            <input type="text" id="fullname" name="fullname" placeholder="e.g. Juan Dela Cruz" required />
          </div>

          <div class="p-form__group">
            <label for="email">Email Address:</label>
            <input type="email" id="email" name="email" placeholder="e.g. juan@example.com" required />
          </div>

          <div class="p-form__group">
            <label for="birthdate">Birthday:</label>
            <input type="date" id="birthdate" name="birthdate" required />
          </div>

          <hr class="is-muted" />
          <button type="submit" class="p-button--positive">Next Step &raquo;</button>
        </form>

      </div>
    </div>
  </div>
</section>

</body>
</html>
