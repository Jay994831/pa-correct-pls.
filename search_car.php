<?php 
include 'db.php'; 
?>

<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Search Car</title>
</head> 
<body> 
    <h2>Search Car</h2>

    <form method="GET" action="search_car.php"> 
        <input type="text" name="search" placeholder="Enter model or brand" required>
        <button type="submit">Search</button>
    </form>

    <table border="1"> 
        <tr> 
            <th>ID</th> 
            <th>Model</th> 
            <th>Brand</th> 
            <th>Year</th> 
            <th>Price per Day</th>
        </tr> 
        
        <?php 
        if (isset($_GET['search'])) {
            $search = $conn->real_escape_string($_GET['search']);
            $query = "SELECT * FROM cars WHERE model LIKE '%$search%' OR brand LIKE '%$search%'";
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
