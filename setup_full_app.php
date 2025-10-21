<?php
$folders = [
    'admin', 'staff', 'client', 'config', 'includes', 
    'scripts', 'public', 'css', 'js'
];

// 1️⃣ Create folders
foreach ($folders as $folder) {
    if (!is_dir($folder)) {
        mkdir($folder, 0755, true);
        echo "Folder created: $folder\n";
    } else {
        echo "Folder exists: $folder\n";
    }
}

// 2️⃣ Create common files
$common_files = [
    'index.php' => "<?php echo '<h2 style=\"text-align:center; margin-top:20%; color:green;\">🚀 FinView App Ready!</h2>'; ?>",
    'config/db.php' => "<?php
\$host='localhost';
\$dbname='u733180089_finview_db';
\$username='u733180089_finview_user';
\$password='Finview@2025';
try {
  \$pdo = new PDO(\"mysql:host=\$host;dbname=\$dbname\", \$username, \$password);
  \$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException \$e) {
  die('Database connection failed: ' . \$e->getMessage());
}
?>",
    'includes/header.php' => "<!DOCTYPE html>\n<html>\n<head>\n<title>FinView</title>\n</head>\n<body>\n<header><h2>FinView Header</h2></header>\n",
    'includes/footer.php' => "<footer><p>© 2025 FinView. All rights reserved.</p></footer>\n</body>\n</html>",
];

foreach ($common_files as $file => $content) {
    if (!file_exists($file)) {
        file_put_contents($file, $content);
        echo "File created: $file\n";
    } else {
        echo "File exists: $file\n";
    }
}

// 3️⃣ Create Admin Pages
$admin_pages = [
    'admin/admin_dashboard.php',
    'admin/manage_clients.php',
    'admin/manage_staff.php',
    'admin/manage_loans.php',
    'admin/generate_report.php',
    'admin/settings.php',
    'admin/logout.php'
];
foreach ($admin_pages as $file) {
    if (!file_exists($file)) {
        file_put_contents($file, "<?php
session_start();
include '../config/db.php';
include '../includes/header.php';
echo '<h2>$file — Admin Page</h2>';
include '../includes/footer.php';
?>");
        echo "Admin page created: $file\n";
    }
}

// 4️⃣ Create Staff Pages
$staff_pages = [
    'staff/staff_dashboard.php',
    'staff/submit_deposit.php',
    'staff/submit_withdrawal.php',
    'staff/submit_loan_application.php',
    'staff/staff_logout.php'
];
foreach ($staff_pages as $file) {
    if (!file_exists($file)) {
        file_put_contents($file, "<?php
session_start();
include '../config/db.php';
include '../includes/header.php';
echo '<h2>$file — Staff Page</h2>';
include '../includes/footer.php';
?>");
        echo "Staff page created: $file\n";
    }
}

// 5️⃣ Create Client Pages
$client_pages = [
    'client/client_dashboard.php',
    'client/apply_loan.php',
    'client/deposit.php',
    'client/withdraw.php',
    'client/client_logout.php'
];
foreach ($client_pages as $file) {
    if (!file_exists($file)) {
        file_put_contents($file, "<?php
session_start();
include '../config/db.php';
include '../includes/header.php';
echo '<h2>$file — Client Page</h2>';
include '../includes/footer.php';
?>");
        echo "Client page created: $file\n";
    }
}

echo "\n✅ All folders and starter pages created! You can now run the app.\n";
?>
