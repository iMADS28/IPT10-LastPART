<?php

require "helpers/helper-functions.php";

session_start();

// Retrieve POST data from step 3
$program = $_POST['program'];
$agree = $_POST['agree'];

// Store in session
$_SESSION['program'] = $program;
$_SESSION['agree'] = $agree;

// Gather all form data from the session
$form_data = $_SESSION;

// ============================================================
// SAVE REGISTRATION DATA TO CSV FILE USING fputcsv()
// ============================================================
// We chose fputcsv() over fwrite() because:
// 1. fputcsv() automatically formats the data as a proper CSV line
// 2. It handles special characters, commas in fields, and quoting
// 3. It takes an array directly - no need to manually join fields
// 4. It is the recommended PHP function for writing CSV data
// ============================================================

$save_success = save_registration($form_data);

dump_session();

// Destroy the session after saving
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration Complete - Thank You!</title>
    <link rel="icon" href="https://phpsandbox.io/assets/img/brand/phpsandbox.png">
    <link rel="stylesheet" href="https://assets.ubuntu.com/v1/vanilla-framework-version-4.15.0.min.css" />
</head>
<body>

<section class="p-section--hero">
  <div class="row--50-50-on-large">
    <div class="col">
      <div class="p-section--shallow">
        <h1>Thank You!</h1>
        <p>Your registration has been completed successfully.</p>
      </div>
      <div class="p-section--shallow">

        <?php if ($save_success): ?>
          <div class="p-notification--positive">
            <div class="p-notification__content">
              <h5 class="p-notification__title">Success</h5>
              <p class="p-notification__message">Your registration data has been saved to the CSV file.</p>
            </div>
          </div>
        <?php else: ?>
          <div class="p-notification--negative">
            <div class="p-notification__content">
              <h5 class="p-notification__title">Error</h5>
              <p class="p-notification__message">There was an error saving your data. Please try again.</p>
            </div>
          </div>
        <?php endif; ?>

        <hr class="is-muted" />

        <h3>Registration Summary</h3>
        <table>
          <tbody>
            <tr>
              <th>Complete Name</th>
              <td><?php echo htmlspecialchars($form_data['fullname']); ?></td>
            </tr>
            <tr>
              <th>Email Address</th>
              <td><?php echo htmlspecialchars($form_data['email']); ?></td>
            </tr>
            <tr>
              <th>Birthday</th>
              <td><?php echo htmlspecialchars($form_data['birthdate']); ?></td>
            </tr>
            <tr>
              <th>Age</th>
              <td><?php echo calculate_age($form_data['birthdate']); ?></td>
            </tr>
            <tr>
              <th>Sex</th>
              <td><?php echo htmlspecialchars($form_data['sex']); ?></td>
            </tr>
            <tr>
              <th>Contact Number</th>
              <td><?php echo htmlspecialchars($form_data['contact_number']); ?></td>
            </tr>
            <tr>
              <th>Complete Address</th>
              <td><?php echo htmlspecialchars($form_data['address']); ?></td>
            </tr>
            <tr>
              <th>Program</th>
              <td><?php echo htmlspecialchars($form_data['program']); ?></td>
            </tr>
          </tbody>
        </table>

        <hr class="is-muted" />
        <a class="p-button--positive" href="index.php">Register Another</a>
        <a class="p-button" href="registrants.php">View All Registrants</a>

      </div>
    </div>
  </div>
</section>

</body>
</html>
