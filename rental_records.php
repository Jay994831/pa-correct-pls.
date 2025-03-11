<?php
include 'db.php'; // Database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $car_id = $_POST['car_id'];
    $customer_name = $_POST['customer_name'];
    $rental_date = $_POST['rental_date'];
    $return_date = $_POST['return_date'];
    $total_cost = $_POST['total_cost'];

    $sql = "INSERT INTO rentals (car_id, customer_name, rental_date, return_date, total_cost) 
            VALUES (?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isssd", $car_id, $customer_name, $rental_date, $return_date, $total_cost);

    if ($stmt->execute()) {
        echo "Rental record added successfully!";
    } else {
        echo "Error: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<form method="POST" action="">
    <label>Car ID:</label>
    <input type="number" name="car_id" required><br>
    
    <label>Customer Name:</label>
    <input type="text" name="customer_name" required><br>
    
    <label>Rental Date:</label>
    <input type="date" name="rental_date" required><br>
    
    <label>Return Date:</label>
    <input type="date" name="return_date" required><br>
    
    <label>Total Cost:</label>
    <input type="number" step="0.01" name="total_cost" required><br>
    
    <button type="submit">Add Rental</button>
</form>
