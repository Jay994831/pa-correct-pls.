<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
$result = $conn->query("SELECT rentals.id, cars.model, cars.brand, rentals.renter_name, rentals.start_date, rentals.end_date 
FROM rentals 
JOIN cars ON rentals.car_id = cars.id");

echo "<h2>Rental Records</h2>";
echo "<table border='1'>
<tr>
<th>Car</th>
<th>Renter</th>
<th>Start Date</th>
<th>End Date</th>
<th>Action</th>
</tr>";

while ($row = $result->fetch_assoc()) 
echo "<tr>
<td>{$row['brand']} - {$row['model']}</td>
<td>{$row['renter_name']}</td>
<td>{$row['start_date']}</td>
<td>{$row['end_date']}</td>
<td>
<form method='POST' action='delete_rental.php' onsubmit='return confirm(\"Are you sure?\")'>
<input type='hidden' name='rental_id' value='{$row['id>
<button type='submit'>Delete</button>
</form>
</td>
</tr>";

echo "</table>";

$conn->close();
?>

</body>
</html>
