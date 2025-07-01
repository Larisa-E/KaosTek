<?php
// db connection
$conn = new mysqli('localhost', 'root', '', 'KaosTekDB');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

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

// Add users
addUser($conn, 'lale', '12345');
addUser($conn, 'peter', '12345');

// Close the connection
$conn->close();
