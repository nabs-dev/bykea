<?php
include 'db.php'; 
session_start();
if (!isset($_SESSION['user'])) { 
    echo "<script>window.location.href='login.php';</script>"; 
    exit(); 
}
$user = $_SESSION['user'];
$res = $conn->query("SELECT * FROM bookings WHERE username='$user' ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        
        .container {
            width: 100%;
            max-width: 960px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 40px;
            margin-top: 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
        }

        .header h2 {
            font-size: 24px;
            color: #333;
        }

        .logout a {
            font-size: 16px;
            color: #ff3333;
            text-decoration: none;
            font-weight: bold;
            border: 2px solid #ff3333;
            padding: 8px 20px;
            border-radius: 5px;
            transition: 0.3s ease;
        }

        .logout a:hover {
            background-color: #ff3333;
            color: white;
        }

        h3 {
            font-size: 20px;
            margin-bottom: 20px;
            color: #555;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            padding: 12px 15px;
            text-align: center;
            border: 1px solid #ddd;
            font-size: 16px;
            color: #444;
        }

        th {
            background-color: #f1f1f1;
            color: #333;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #e9e9e9;
        }

        .bookings-container {
            overflow-x: auto;
        }

        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }

            .header h2 {
                font-size: 20px;
            }

            th, td {
                font-size: 14px;
                padding: 10px;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="header">
            <h2>Welcome, <?= htmlspecialchars($user) ?></h2>
            <div class="logout">
                <a href="logout.php">Logout</a>
            </div>
        </div>

        <h3>Your Bookings</h3>
        
        <div class="bookings-container">
            <table>
                <thead>
                    <tr>
                        <th>Type</th>
                        <th>Pickup</th>
                        <th>Drop-off</th>
                        <th>Fare</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $res->fetch_assoc()): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['type']) ?></td>
                            <td><?= htmlspecialchars($row['pickup']) ?></td>
                            <td><?= htmlspecialchars($row['dropoff']) ?></td>
                            <td>Rs. <?= htmlspecialchars($row['fare']) ?></td>
                            <td><?= htmlspecialchars($row['status']) ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
