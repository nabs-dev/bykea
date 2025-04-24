<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Bykea Clone - Book Now</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #E6FDED;
      margin: 0;
      padding: 0;
    }
    .container {
      width: 100%;
      max-width: 400px;
      margin: 80px auto;
      background-color: #fff;
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    h2 {
      text-align: center;
      color: #04650B;
      margin-bottom: 20px;
    }
    input, select, button {
      width: 100%;
      padding: 12px 15px;
      margin-top: 10px;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 16px;
    }
    button {
      background-color: #04650B;
      color: #fff;
      border: none;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }
    button:hover {
      background-color: #035a0a;
    }
    #fare {
      margin-top: 15px;
      font-weight: bold;
      color: #DF9F27;
      text-align: center;
    }
    .nav {
      text-align: center;
      margin-top: 20px;
    }
    .nav a {
      text-decoration: none;
      color: #04650B;
      margin: 0 10px;
      font-weight: bold;
    }
    .nav a:hover {
      text-decoration: underline;
    }
  </style>
  <script>
    function redirect(page) {
      window.location.href = page;
    }
    function calculateFare() {
      let distance = Math.floor(Math.random() * 15) + 1;
      document.getElementById("fare").innerText = "Estimated Fare: Rs. " + (distance * 30);
    }
  </script>
</head>
<body onload="calculateFare()">
  <div class="container">
    <h2>Book a Ride or Delivery</h2>
    <form action="book.php" method="POST">
      <input type="text" name="pickup" placeholder="Pickup Location" required>
      <input type="text" name="drop" placeholder="Drop-off Location" required>
      <select name="type" required>
        <option value="ride">Ride</option>
        <option value="delivery">Delivery</option>
      </select>
      <div id="fare"></div>
      <button type="submit">Book Now</button>
    </form>
    <div class="nav">
      <a href="#" onclick="redirect('signup.php')">Sign Up</a> |
      <a href="#" onclick="redirect('login.php')">Log In</a> |
      <a href="#" onclick="redirect('dashboard.php')">Dashboard</a>
    </div>
  </div>
</body>
</html>
