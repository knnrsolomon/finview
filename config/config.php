<?php
// Database credentials
$host = 'localhost';
$dbname = 'u733180089_finview_db';
$username = 'u733180089_finview_user';
$password = 'Finview@2025';

// Create PDO database connection
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
