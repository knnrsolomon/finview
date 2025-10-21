<?php
session_start();
include 'db.php';

// Check login
function login($username, $password) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user;
        return true;
    }
    return false;
}

// Check if admin
function requireAdmin() {
    if(!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'admin') {
        header("Location: ../index.php");
        exit();
    }
}

// Check if staff
function requireStaff() {
    if(!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'staff') {
        header("Location: ../index.php");
        exit();
    }
}

// Check if client
function requireClient() {
    if(!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'client') {
        header("Location: ../index.php");
        exit();
    }
}

// Logout
function logout() {
    session_destroy();
    header("Location: ../index.php");
    exit();
}
?>
