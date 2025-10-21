<?php
include 'config/db.php';
include 'includes/auth.php';
$message = '';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $_POST['username'];
    $password = $_POST['password'];
    if(login($username, $password)){
        $role = $_SESSION['user']['role'];
        if($role=='admin') header("Location: admin/admin_dashboard.php");
        if($role=='staff') header("Location: staff/staff_dashboard.php");
        if($role=='client') header("Location: client/client_dashboard.php");
    } else {
        $message = "Invalid username or password";
    }
}
?>
<!DOCTYPE html>
<html>
<head><title>FinView Login</title></head>
<body>
<h2>Login to FinView</h2>
<form method="post">
    <input type="text" name="username" placeholder="Username" required/><br/><br/>
    <input type="password" name="password" placeholder="Password" required/><br/><br/>
    <button type="submit">Login</button>
</form>
<p style="color:red;"><?php echo $message; ?></p>
</body>
</html>

