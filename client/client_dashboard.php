<?php
session_start();
require_once '../config/db.php';
require_once '../includes/auth.php';

// Only clients can access
requireClient();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>FinView Client Dashboard</title>
<style>
body { font-family: Arial, sans-serif; background:#f7f9fb; margin:0; padding:0; }
header { background:#003366; color:white; padding:15px; text-align:center; }
.sidebar { width:220px; background:#0055a5; height:100vh; position:fixed; top:0; left:0; padding-top:60px; }
.sidebar a { display:block; color:white; padding:12px 20px; text-decoration:none; margin:2px 0; border-radius:4px; }
.sidebar a:hover { background:#0073e6; }
.content { margin-left:240px; padding:20px; }
.card { background:white; padding:20px; border-radius:10px; margin-bottom:20px; box-shadow:0 2px 5px rgba(0,0,0,0.1); }
.header-top { position:fixed; width:100%; top:0; left:0; background:#003366; color:white; height:60px; line-height:60px; padding-left:240px; box-sizing:border-box; }
</style>
</head>
<body>

<div class="header-top">
    👋 Welcome, <?php echo $_SESSION['user']['username']; ?> | Client
</div>

<div class="sidebar">
    <a href="client_dashboard.php">🏠 Dashboard</a>
    <a href="apply_loan.php">💰 Apply Loan</a>
    <a href="deposit.php">💵 Deposit</a>
    <a href="withdraw.php">💳 Withdraw</a>
    <a href="client_logout.php" style="background:#cc0000;">🚪 Logout</a>
</div>

<div class="content">
    <div class="card">
        <h2>📌 Client Overview</h2>
        <p>View your account balance, submit deposit or withdrawal requests, and apply for loans.</p>
    </div>
</div>

</body>
</html>

