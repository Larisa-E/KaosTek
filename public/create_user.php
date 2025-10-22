<?php
require_once __DIR__ . '/../src/db.php';
// db connection
$conn = get_db();

// function to add a user
function addUser($conn, $username, $password)
{
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param('ss', $username, $hashedPassword);

    if ($stmt->execute()) {
        echo "User '$username' created successfully.<br>";
    } else {
        echo "Error creating user '$username': " . $stmt->error . "<br>";
    }

    $stmt->close();
}

// Add users (example). Change passwords after first login.
addUser($conn, 'lale', '12345');
addUser($conn, 'peter', '12345');

// Close the connection
$conn->close();
