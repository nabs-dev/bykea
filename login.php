<?php include 'db.php'; session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $u = $_POST['username']; $p = $_POST['password'];
    $res = $conn->query("SELECT * FROM users WHERE username='$u' AND password='$p'");
    if ($res->num_rows > 0) {
        $_SESSION['user'] = $u;
        echo "<script>window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Invalid credentials');</script>";
    }
} ?>
<!DOCTYPE html>
<html><head><title>Login</title>
<style>
    body { font-family: Arial; background: #fee; }
    .box { width: 300px; margin: auto; background: white; padding: 20px; border-radius: 10px; margin-top: 100px; }
    input, button { width: 100%; margin-top: 10px; padding: 10px; border-radius: 5px; border: 1px solid #ccc; }
    button { background: green; color: white; font-weight: bold; }
</style></head><body>
<div class="box">
    <h2>Login</h2>
    <form method="post">
        <input name="username" placeholder="Username" required>
        <input name="password" placeholder="Password" type="password" required>
        <button>Login</button>
    </form>
</div></body></html>
