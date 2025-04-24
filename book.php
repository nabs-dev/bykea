<?php include 'db.php'; session_start();
if (!isset($_SESSION['user'])) {
    echo "<script>window.location.href='login.php';</script>"; exit();
}
$pickup = $_POST['pickup'];
$drop = $_POST['drop'];
$type = $_POST['type'];
$user = $_SESSION['user'];
$fare = rand(100, 400);
$conn->query("INSERT INTO bookings (username, type, pickup, dropoff, fare, status) VALUES ('$user', '$type', '$pickup', '$drop', '$fare', 'Pending')");
echo "<script>alert('Booking successful!'); window.location.href='dashboard.php';</script>";
?>
