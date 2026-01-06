<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $phone_number = trim($_POST['phone_number']);
    // Default to 'user admin' role if not specified
    $role = isset($_POST['role']) ? $_POST['role'] : 'user admin';

    $errors = [];

    if (empty($username)) {
        $errors['username'] = "Username is required.";
    }

    if (empty($email)) {
        $errors['email'] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format.";
    }

    if (empty($password)) {
        $errors['password'] = "Password is required.";
    } elseif (strlen($password) < 8) {
        $errors['password'] = "Password must be at least 8 characters.";
    }

    if (empty($phone_number)) {
        $errors['phone_number'] = "Phone number is required.";
    } elseif (!preg_match("/^\d{10,15}$/", $phone_number)) {
        $errors['phone_number'] = "Invalid phone number.";
    }

    if (empty($errors)) {
        try {
 
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $query = "INSERT INTO users (username, email, password, phone_number, role) 
                      VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($query);

            if (!$stmt) {
                throw new Exception("SQL prepare error: " . $conn->error);
            }
            $stmt->bind_param("sssss", $username, $email, $hashed_password, $phone_number, $role);
            if (!$stmt->execute()) {
                throw new Exception("SQL execute error: " . $stmt->error);
            }
            
            // Use proper PHP redirect
            header('Location: ../loginphp.php?success=registered');
            exit();
        } catch (Exception $e) {
        
            echo "Error: " . $e->getMessage();
        } finally {
            // Close the statement
            if (isset($stmt)) {
                $stmt->close();
            }
        }
    } else {
        // Redirect back to the registration form with errors
        $errorString = http_build_query($errors);
        header('Location: ../Interface_register.php?' . $errorString);
        exit();
    }
}
?>