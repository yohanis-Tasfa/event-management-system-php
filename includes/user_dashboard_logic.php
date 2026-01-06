<?php
require 'db.php';
session_start();

// Check if the user is logged in and is a user
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'user') {
    header("Location: loginphp.php");
    exit();
}

// Initialize variables
$events = [];
$scheduledEvents = [];
$user_id = $_SESSION['user_id'];

// Fetch all available events
$eventsQuery = "SELECT id, title, event_location, start_date, end_date, description, event_organizer FROM events ORDER BY start_date ASC";
$eventsResult = mysqli_query($conn, $eventsQuery);
if ($eventsResult) {
    while ($row = mysqli_fetch_assoc($eventsResult)) {
        $events[] = $row;
    }
}

// Fetch scheduled events for the logged-in user
$scheduledEventsQuery = "SELECT e.title, e.description, e.event_location, e.start_date, e.end_date 
                         FROM registrations r 
                         JOIN events e ON r.event_id = e.id 
                         WHERE r.user_id = ?";
$stmt = mysqli_prepare($conn, $scheduledEventsQuery);
mysqli_stmt_bind_param($stmt, "i", $user_id);
mysqli_stmt_execute($stmt);
$scheduledEventsResult = mysqli_stmt_get_result($stmt);
if ($scheduledEventsResult) {
    while ($row = mysqli_fetch_assoc($scheduledEventsResult)) {
        $scheduledEvents[] = $row;
    }
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['event'])) {
    $event_id = $_POST['event'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];

    if (empty($event_id) || empty($email) || empty($phone_number)) {
        $error = "All fields are required.";
    } else {
        // Insert registration into the database
        $query = "INSERT INTO registrations (event_id, user_id, email, phone_number) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "iiss", $event_id, $user_id, $email, $phone_number);
        if (mysqli_stmt_execute($stmt)) {
            header("Location: user_dashboard.php?success=registered");
            exit();
        } else {
            $error = "Failed to register: " . mysqli_stmt_error($stmt);
        }
        mysqli_stmt_close($stmt);
    }
}
?>