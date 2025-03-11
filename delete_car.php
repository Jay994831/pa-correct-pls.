<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<a href="index.php"><h1>back boss</h1></a>
<form action="delete.php" method="POST">
    <h1>Delete Car</h1>
    <input type="text" name="car_id" id="car_id" placeholder="Enter car ID to delete" required>
    <br><br>
    <button type="submit" name="delete">Delete</button>
</form>

<?php
include 'db.php'; // Ensure this file contains the correct database connection variables

// Check if the connection is established
$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . htmlspecialchars($conn->connect_error));
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    $car_id = htmlspecialchars(trim($_POST['car_id'])); // Sanitize input

    $stmt = $conn->prepare("DELETE FROM add_car WHERE id = ?");
    if ($stmt === false) {
        die("Error preparing statement: " . htmlspecialchars($conn->error));
    }

    $stmt->bind_param("i", $car_id);
    if ($stmt->execute()) {
        if ($stmt->affected_rows > 0) {
            echo "<p>Car with ID '" . htmlspecialchars($car_id) . "' has been deleted successfully.</p>";
        } else {
            echo "<p>No car found with the ID: " . htmlspecialchars($car_id) . "</p>";
        }
    } else {
        echo "<p>Error deleting car: " . htmlspecialchars($stmt->error) . "</p>";
    }

    $stmt->close();
}

$conn->close();
?>
</body>
</html>
