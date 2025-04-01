<?php
$servername = "db"; // Use the Docker service name for MySQL
$username = "user"; // Match with MYSQL_USER in docker-compose.yml
$password = "password"; // Match with MYSQL_PASSWORD
$database = "email_collector"; // Match with MYSQL_DATABASE

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $stmt = $conn->prepare("INSERT INTO emails (email) VALUES (?)");
        if (!$stmt) {
            die("Prepare failed: " . $conn->error); // Output the error message
        }

        $stmt->bind_param("s", $email);

        if ($stmt->execute()) {
            echo "<p class='message' style='color: green;'>Email saved successfully!</p>";
        } else {
            echo "<p class='message' style='color: red;'>Error saving email: " . $stmt->error . "</p>";
        }

        $stmt->close();
    } else {
        echo "<p class='message' style='color: red;'>Invalid email format.</p>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Collector</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 300px;
        }
        input {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            background-color: #28a745;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #218838;
        }
        .message {
            margin-top: 10px;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Enter Your Email</h2>
        <form action="" method="post">
            <input type="email" name="email" required placeholder="Enter your email">
            <button type="submit">Submit</button>
        </form>
    </div>

</body>
</html>
