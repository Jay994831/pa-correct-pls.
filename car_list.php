<?php 
include 'db.php'; 
?>

<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Car List</title>
</head> 
<body> 
    <h2>Car List</h2>

    <table border="1"> 
        <tr> 
            <th>ID</th> 
            <th>Model</th> 
            <th>Brand</th> 
            <th>Year</th> 
            <th>Price per Day</th>
        </tr> 
        
        <?php 
        $query = "SELECT * FROM cars";
        $result = $conn->query($query);

        if ($result->num_rows > 0) { 
            while ($row = $result->fetch_assoc()) { 
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['model'] . "</td>";
                echo "<td>" . $row['brand'] . "</td>";
                echo "<td>" . $row['year'] . "</td>";
                echo "<td>" . $row['price'] . "</td>";
                echo "</tr>";
            } 
        } else { 
            echo "<tr><td colspan='5'>No cars found.</td></tr>";
        } 
        ?> 
    </table>

    <form action="index.php" method="GET">
        <button type="submit">Back to Main Page</button>
    </form>

    <?php 
    $conn->close(); 
    ?> 
</body> 
</html>