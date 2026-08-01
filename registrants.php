<?php

require "helpers/helper-functions.php";

// Get all registrations from the CSV file
$registrations = get_all_registrations();
$headers = $registrations['headers'];
$data = $registrations['data'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrants List</title>
    <link rel="icon" href="https://phpsandbox.io/assets/img/brand/phpsandbox.png">
    <link rel="stylesheet" href="https://assets.ubuntu.com/v1/vanilla-framework-version-4.15.0.min.css" />
</head>
<body>

<section class="p-section--hero">
  <div class="row">
    <div class="col-12">
      <div class="p-section--shallow">
        <h1>Registrants List</h1>
        <p>Displaying all registration data from <code>registrations.csv</code></p>
      </div>
      <div class="p-section--shallow">

        <?php if (empty($data)): ?>
          <div class="p-notification--information">
            <div class="p-notification__content">
              <h5 class="p-notification__title">No Records</h5>
              <p class="p-notification__message">No registrations have been recorded yet. <a href="step-1.php">Register now</a>.</p>
            </div>
          </div>
        <?php else: ?>

          <p>Total Registrants: <strong><?php echo count($data); ?></strong></p>

          <table aria-label="Registrants Data Table">
            <thead>
              <tr>
                <th>#</th>
                <?php foreach ($headers as $header): ?>
                  <th><?php echo htmlspecialchars($header); ?></th>
                <?php endforeach; ?>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($data as $index => $row): ?>
                <tr>
                  <td><?php echo $index + 1; ?></td>
                  <?php foreach ($row as $cell): ?>
                    <td><?php echo htmlspecialchars($cell); ?></td>
                  <?php endforeach; ?>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>

        <?php endif; ?>

        <hr class="is-muted" />
        <a class="p-button--positive" href="step-1.php">New Registration</a>
        <a class="p-button" href="index.php">Back to Home</a>

      </div>
    </div>
  </div>
</section>

</body>
</html>
