<?php
$servername = "db";
$username = "user";
$password = "password";
$database = "email_collector";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Read emails from the file
$emails = file('emails.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

foreach ($emails as $email) {
    $email = trim($email);
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $stmt = $conn->prepare("INSERT IGNORE INTO emails (email) VALUES (?)");
        if ($stmt) {
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->close();
        } else {
            echo "Error preparing statement: " . $conn->error . "\n";
        }
    } else {
        echo "Invalid email format: $email\n";
    }
}

$conn->close();
echo "Emails inserted successfully!";
?>