<?php
session_start();
require_once __DIR__ . '/app/config/config.php'; // include database connection

// Initialize variables
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Check user in database
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username LIMIT 1");
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        // Set session
        $_SESSION['user'] = [
            'username' => $user['username'],
            'role' => $user['role'] // 'admin', 'staff', or 'client'
        ];

        // Redirect based on role
        if ($user['role'] === 'admin') {
            header("Location: admin/admin_dashboard.php");
        } elseif ($user['role'] === 'staff') {
            header("Location: staff/staff_dashboard.php");
        } else {
            header("Location: client/client_dashboard.php");
        }
        exit;
    } else {
        $error = "Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>FinView Login</title>
<style>
body { font-family: Arial, sans-serif; background: #f7f9fb; display:flex; justify-content:center; align-items:center; height:100vh; }
.login-container { background:white; padding:30px; border-radius:10px; box-shadow:0 2px 8px rgba(0,0,0,0.1); width:300px; }
input { width:100%; padding:10px; margin:10px 0; border:1px solid #ccc; border-radius:5px; }
button { width:100%; padding:10px; background:#003366; color:white; border:none; border-radius:5px; cursor:pointer; }
button:hover { background:#0055a5; }
.error { color:red; font-size:14px; text-align:center; }
</style>
</head>
<body>

<div class="login-container">
    <h2 style="text-align:center;">Login to FinView</h2>
    <?php if($error) echo "<div class='error'>$error</div>"; ?>
    <form method="POST" action="">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
</div>

</body>
</html>

