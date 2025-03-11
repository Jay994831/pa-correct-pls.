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
    <h2>Register a Car</h2>
    <h2>Add Car</h2>
    <form action="register.php" method="GET"></form>
    <form method="POST" action="car.php"> 
        <input type="text" name="model" placeholder="Car Model" required> 
        <input type="text" name="brand" placeholder="Car Brand" required>
        <input type="number" name="year" placeholder="Year" required>  
        <input type="number" name="price" placeholder="Price per Day" step="0.01" required>  
        <button type="submit">Add Car</button> 
    </form> 

    <h2>Car List</h2>
    <form method="GET" action="car_list.php"> 
        <button type="submit">View Car List</button>
    </form>

    <h2>Search Model</h2>
    <form method="GET" action="search_car.php">   
        <button type="submit">Search</button>
    </form>

    <h2>Update Car</h2>
    <form method="POST" action="update_car.php"> 
        <input type="number" name="car_id" placeholder="Enter Car Plate number" required> 
        <input type="text" name="model" placeholder="Enter Car Model"> 
        <input type="text" name="brand" placeholder="Enter Car Brand">    
        <button type="submit">Update Car</button> 
    </form>

    <h2>Delete Car</h2>
    <form method="POST" action="delete_car.php"> 
        <input type="brand" name="car_id" placeholder="Enter Car brands to Delete" required> 
        <button type="submit">Delete Car</button>
    </form>

    <h2>Rental Record</h2>
    <form method="POST" action="rental.php"> 
        <button type="submit">Open</button>
    </form>

    <?php $conn->close(); ?> 
</body> 
</html>
