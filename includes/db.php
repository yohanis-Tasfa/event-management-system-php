<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'event_management';

// Create connection
$conn = mysqli_connect($host, $username, $password);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "CREATE DATABASE IF NOT EXISTS $database;";
if (!mysqli_query($conn, $sql)) {
    die("Database creation failed: " . mysqli_error($conn));
}

mysqli_select_db($conn, $database);

$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    phone_number VARCHAR(15),
    role ENUM('admin', 'user') NOT NULL DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);";
if (!mysqli_query($conn, $sql)) {
    die("Users table creation failed: " . mysqli_error($conn));
}

$sql = "CREATE TABLE IF NOT EXISTS events (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    event_location VARCHAR(255),
    start_date DATETIME,
    end_date DATETIME,
    event_organizer VARCHAR(100),
    admin_id INT,
    FOREIGN KEY (admin_id) REFERENCES users(id) ON DELETE SET NULL
);";
if (!mysqli_query($conn, $sql)) {
    die("Events table creation failed: " . mysqli_error($conn));
}

$sql = "CREATE TABLE IF NOT EXISTS registrations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    event_id INT,
    user_id INT,
    email VARCHAR(100),
    phone_number VARCHAR(15),
    registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (event_id) REFERENCES events(id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);";
if (!mysqli_query($conn, $sql)) {
    die("Registrations table creation failed: " . mysqli_error($conn));
}

$sql = "CREATE TABLE IF NOT EXISTS notifications (
    id INT AUTO_INCREMENT PRIMARY KEY,
    event_id INT NOT NULL,
    message TEXT NOT NULL,
    sent_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (event_id) REFERENCES events(id) ON DELETE CASCADE
);";
if (!mysqli_query($conn, $sql)) {
    die("Notifications table creation failed: " . mysqli_error($conn));
}
?>