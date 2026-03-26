<?php
// process_reservation.php

// Set headers for JSON response
header('Content-Type: application/json');

// Initialize response array
$response = array('success' => false, 'message' => '');

// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $date = trim($_POST['date'] ?? '');
    $time = trim($_POST['time'] ?? '');
    $guests = trim($_POST['guests'] ?? '');
    $message = trim($_POST['message'] ?? '');

    // Validate required fields
    $errors = array();

    if (empty($name)) {
        $errors[] = 'Name is required';
    }

    if (empty($email)) {
        $errors[] = 'Email is required';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Invalid email format';
    }

    if (empty($phone)) {
        $errors[] = 'Phone number is required';
    }

    if (empty($date)) {
        $errors[] = 'Date is required';
    } elseif (strtotime($date) < strtotime('today')) {
        $errors[] = 'Date cannot be in the past';
    }

    if (empty($time)) {
        $errors[] = 'Time is required';
    }

    if (empty($guests)) {
        $errors[] = 'Number of guests is required';
    }

    // If no errors, save the reservation
    if (empty($errors)) {
        // Create reservation data
        $reservation = array(
            'id' => uniqid('res_', true),
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'date' => $date,
            'time' => $time,
            'guests' => $guests,
            'message' => $message,
            'timestamp' => date('Y-m-d H:i:s'),
            'status' => 'pending'
        );

        // Load existing reservations
        $reservations_file = 'reservations.json';
        $reservations = array();

        if (file_exists($reservations_file)) {
            $json_content = file_get_contents($reservations_file);
            if ($json_content !== false) {
                $reservations = json_decode($json_content, true);
                if ($reservations === null) {
                    $reservations = array();
                }
            }
        }

        // Add new reservation
        $reservations[] = $reservation;

        // Save to file
        if (file_put_contents($reservations_file, json_encode($reservations, JSON_PRETTY_PRINT))) {
            $response['success'] = true;
            $response['message'] = 'Your reservation has been submitted successfully! We\'ll contact you soon.';
        } else {
            $response['message'] = 'Error saving reservation. Please try again.';
        }
    } else {
        $response['message'] = 'Please correct the following errors: ' . implode(', ', $errors);
    }
} else {
    $response['message'] = 'Invalid request method';
}

// Return JSON response
echo json_encode($response);
?>