<?php

/**
 * Helper Functions for Lab 3
 * Combines lab2a (sessions) and lab2b (CSV file handling) concepts
 */

// Path to the registrations CSV file
define('REGISTRATIONS_FILE_PATH', __DIR__ . '/../registrations.csv');

/**
 * Dumps the current session data for debugging purposes
 */
function dump_session()
{
    ?>
    <div class="p-card">
        <h3>Session Data</h3>
        <p class="p-card__content">
            <pre><?php print_r($_SESSION); ?></pre>
        </p>
    </div>
    <?php
}

/**
 * Calculates age from a given birthdate string
 * @param string $birthdate Date in Y-m-d format
 * @return int Age in years
 */
function calculate_age($birthdate)
{
    $birth = new DateTime($birthdate);
    $today = new DateTime('today');
    $age = $birth->diff($today)->y;
    return $age;
}

/**
 * Saves a registration record to the CSV file using fputcsv()
 * 
 * We chose fputcsv() over fwrite() because:
 * 1. fputcsv() automatically handles CSV formatting (proper quoting, escaping commas within fields)
 * 2. It accepts an array and converts it to a properly formatted CSV line
 * 3. It is more reliable and less error-prone than manually building CSV strings with fwrite()
 * 4. It follows PHP best practices for CSV file generation
 * 
 * @param array $data Associative array of registration data
 * @return bool True if write was successful
 */
function save_registration($data)
{
    $file_path = REGISTRATIONS_FILE_PATH;

    // Check if file is empty (no header yet)
    $file_exists = file_exists($file_path) && filesize($file_path) > 0;

    // Open file in append mode
    $file_handler = fopen($file_path, 'a');

    if ($file_handler === false) {
        return false;
    }

    // Write header row if this is the first entry
    if (!$file_exists) {
        $headers = [
            'Complete Name',
            'Birthday',
            'Age',
            'Contact Number',
            'Sex',
            'Program',
            'Complete Address',
            'Email Address'
        ];
        fputcsv($file_handler, $headers);
    }

    // Calculate age from birthdate
    $age = calculate_age($data['birthdate']);

    // Prepare the row data
    $row = [
        $data['fullname'],
        $data['birthdate'],
        $age,
        $data['contact_number'],
        $data['sex'],
        $data['program'],
        $data['address'],
        $data['email']
    ];

    // Write the data row using fputcsv()
    $result = fputcsv($file_handler, $row);

    fclose($file_handler);

    return $result !== false;
}

/**
 * Reads all registration data from the CSV file
 * @return array Associative array with 'headers' and 'data' keys
 */
function get_all_registrations()
{
    $file_path = REGISTRATIONS_FILE_PATH;

    if (!file_exists($file_path) || filesize($file_path) == 0) {
        return [
            'headers' => [],
            'data' => []
        ];
    }

    $file_handler = fopen($file_path, 'r');

    $data = [];
    $headers = [];
    $row_count = 0;

    while (!feof($file_handler)) {
        $row = fgetcsv($file_handler, 1024);
        if (!empty($row)) {
            if ($row_count == 0) {
                $headers = $row;
            } else {
                array_push($data, $row);
            }
        }
        $row_count++;
    }

    fclose($file_handler);

    return [
        'headers' => $headers,
        'data' => $data
    ];
}
