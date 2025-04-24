<?php include 'db.php'; if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $u = $_POST['username']; $p = $_POST['password'];
    $conn->query("INSERT INTO users (username, password) VALUES ('$u', '$p')");
    echo "<script>window.location.href='login.php';</script>";
} ?>
<!DOCTYPE html>
<html><head><title>Signup</title>
<style>
    body { font-family: Arial; background: #eef; }
    .box { width: 300px; margin: auto; background: white; padding: 20px; border-radius: 10px; margin-top: 100px; }
    input, button { width: 100%; margin-top: 10px; padding: 10px; border-radius: 5px; border: 1px solid #ccc; }
    button { background: dodgerblue; color: white; font-weight: bold; }
</style></head><body>
<div class="box">
    <h2>Sign Up</h2>
    <form method="post">
        <input name="username" placeholder="Username" required>
        <input name="password" placeholder="Password" type="password" required>
        <button>Register</button>
    </form>
</div></body></html>
