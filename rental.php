<?php 
include 'db.php'; 
?>

<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Car Rental System</title>
</head> 
<body> 
    <h2>Register a Rental</h2>

    <form method="POST" action="rental.php"> 
        <label>Select Car:</label>
        <select name="car_id" required>
            <?php
            $result = $conn->query("SELECT id, model, brand FROM cars");
            while ($row = $result->fetch_assoc()) {
                echo "<option value='{$row['id']}'>{$row['brand']} - {$row['model']}</option>";
            }
            ?>
        </select>

        <input type="text" name="renter_name" placeholder="Renter Name" required> 
        <input type="date" name="start_date" required>  
        <input type="date" name="end_date" required>  
        <button type="submit">Register Rental</button> 
    </form> 

    <form action="rental_list.php" method="GET">
        <button type="submit">View Rental Records</button>
    </form>

    <form action="index.php" method="GET">
        <button type="submit">Back to Main Page</button>
    </form>

    <?php 
    if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
        $car_id = $_POST['car_id']; 
        $renter_name = $_POST['renter_name']; 
        $start_date = $_POST['start_date']; 
        $end_date = $_POST['end_date']; 

        // Use prepared statements to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO rentals (car_id, renter_name, start_date, end_date) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("isss", $car_id, $renter_name, $start_date, $end_date);

        if ($stmt->execute()) { 
            echo "<p>Rental registered successfully!</p>"; 
        } else { 
            echo "<p>Error: " . $stmt->error . "</p>"; 
        }

        $stmt->close();
    } 
    $conn->close(); 
    ?> 
</body> 
</html>
