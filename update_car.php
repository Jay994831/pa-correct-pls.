<?php 
include 'db.php'; 

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM cars WHERE id = $id";
    $result = $conn->query($query);
    $car = $result->fetch_assoc();
}


    $stmt = $conn->prepare("UPDATE cars SET model=?, brand=?, year=?, price=? WHERE id=?");
    $stmt->bind_param("ssisi", $model, $brand, $year, $price, $id);

    if ($stmt->execute()) {
        echo "<p>Car updated successfully!</p>";
    } else {
        echo "<p>Error: " . $stmt->error . "</p>";
    }

    $stmt->close();

$conn->close();
?>

<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Update Car</title>
</head> 
<body> 
    <h2>Update Car</h2>

    <form method="POST" action="update_car.php"> 
        <input type="hidden" name="id" value="<?php echo $car['id']; ?>">
        <input type="text" name="model" value="<?php echo $car['model']; ?>" required>
        <input type="text" name="brand" value="<?php echo $car['brand']; ?>" required>
        <input type="number" name="year" value="<?php echo $car['year']; ?>" required>
        <input type="number" name="price" value="<?php echo $car['price']; ?>" step="0.01" required>
        <button type="submit">Update Car</button>
    </form>

    <form action="index.php" method="GET">
        <button type="submit">Back to Main Page</button>
    </form>
</body> 
</html>
