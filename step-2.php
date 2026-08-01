<?php

require "helpers/helper-functions.php";

session_start();

// Retrieve POST data from step 1
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$birthdate = $_POST['birthdate'];

// Store in session
$_SESSION['fullname'] = $fullname;
$_SESSION['email'] = $email;
$_SESSION['birthdate'] = $birthdate;

dump_session();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration - Step 2 of 3</title>
    <link rel="icon" href="https://phpsandbox.io/assets/img/brand/phpsandbox.png">
    <link rel="stylesheet" href="https://assets.ubuntu.com/v1/vanilla-framework-version-4.15.0.min.css" />
</head>
<body>

<section class="p-section--hero">
  <div class="row--50-50-on-large">
    <div class="col">
      <div class="p-section--shallow">
        <h1>Registration (Step 2/3)</h1>
        <p>Contact & Personal Details</p>
      </div>
      <div class="p-section--shallow">

        <form action="step-3.php" method="POST">
          <div class="p-form__group">
            <label for="sex">Sex:</label>
            <select id="sex" name="sex" required>
              <option value="">-- Select --</option>
              <option value="Male">Male</option>
              <option value="Female">Female</option>
            </select>
          </div>

          <div class="p-form__group">
            <label for="address">Complete Address:</label>
            <textarea id="address" name="address" rows="3" placeholder="e.g. 123 Main St, Barangay, City, Province" required></textarea>
          </div>

          <div class="p-form__group">
            <label for="contact_number">Contact Number:</label>
            <input type="text" id="contact_number" name="contact_number" placeholder="e.g. 09171234567" required />
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
