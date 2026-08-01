<?php

require "helpers/helper-functions.php";

session_start();

// Retrieve POST data from step 2
$sex = $_POST['sex'];
$address = $_POST['address'];
$contact_number = $_POST['contact_number'];

// Store in session
$_SESSION['sex'] = $sex;
$_SESSION['address'] = $address;
$_SESSION['contact_number'] = $contact_number;

dump_session();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration - Step 3 of 3</title>
    <link rel="icon" href="https://phpsandbox.io/assets/img/brand/phpsandbox.png">
    <link rel="stylesheet" href="https://assets.ubuntu.com/v1/vanilla-framework-version-4.15.0.min.css" />
</head>
<body>

<section class="p-section--hero">
  <div class="row--50-50-on-large">
    <div class="col">
      <div class="p-section--shallow">
        <h1>Registration (Step 3/3)</h1>
        <p>Academic Program & Agreement</p>
      </div>
      <div class="p-section--shallow">

        <form action="thank-you.php" method="POST">
          <div class="p-form__group">
            <label for="program">Program:</label>
            <select id="program" name="program" required>
              <option value="">-- Select Program --</option>
              <option value="BSIT">BS Information Technology</option>
              <option value="BSCS">BS Computer Science</option>
              <option value="BSIS">BS Information Systems</option>
              <option value="BSCE">BS Computer Engineering</option>
              <option value="BSA">BS Accountancy</option>
              <option value="BSBA">BS Business Administration</option>
              <option value="BSN">BS Nursing</option>
              <option value="BSED">BS Education</option>
            </select>
          </div>

          <div class="p-form__group">
            <label>
              <input type="checkbox" id="agree" name="agree" value="1" required />
              I agree to the terms and conditions
            </label>
          </div>

          <hr class="is-muted" />
          <button type="submit" class="p-button--positive">Submit Registration</button>
        </form>

      </div>
    </div>
  </div>
</section>

</body>
</html>
