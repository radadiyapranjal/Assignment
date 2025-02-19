<?php
include '../includes/config.php';
$trips = $conn->query("SELECT * FROM trips");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Trip Booking</title>
</head>
<body>
    <h1>Available Trips</h1>
    <ul>
        <?php while ($trip = $trips->fetch_assoc()) { ?>
            <li><?php echo $trip['name']; ?> - $<?php echo $trip['price']; ?>
                <a href="book_trip.php?trip_id=<?php echo $trip['id']; ?>">Book Now</a>
            </li>
        <?php } ?>
    </ul>
</body>
</html>