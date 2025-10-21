<?php
// List of folders to create
$folders = [
    'config', 'includes', 'public', 'admin', 'staff', 'client', 'scripts', 'css', 'js'
];

// Create folders
foreach ($folders as $folder) {
    if (!is_dir($folder)) {
        mkdir($folder, 0755, true);
        echo "Created folder: $folder\n";
    } else {
        echo "Skipped existing folder: $folder\n";
    }
}

// List of files to create with starter content
$files = [
    'config/db.php' => "<?php\n\$host='localhost';\$dbname='finview_db';\$username='root';\$password='';\ntry{\n\$conn=new PDO(\"mysql:host=\$host;dbname=\$dbname\",\$username,\$password);\n\$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);\n}catch(PDOException \$e){die('DB Connection failed: '.\$e->getMessage());}\n?>",

    'includes/header.php' => "<!DOCTYPE html>\n<html lang='en'>\n<head>\n<meta charset='UTF-8'>\n<title>FinView</title>\n<link rel='stylesheet' href='../css/style.css'>\n</head>\n<body>\n<header><h1>FinView App</h1></header>",

    'includes/footer.php' => "<footer>\n<p>© <?php echo date('Y'); ?> FinView</p>\n</footer>\n<script src='../js/script.js'></script>\n</body>\n</html>",

    'public/index.php' => "<?php\ninclude_once '../includes/header.php';\ninclude_once '../config/db.php';\n?>\n<h2 style='text-align:center; margin-top:20%; color:green;'>🚀 FinView App Ready!</h2>\n<?php include_once '../includes/footer.php'; ?>",

    // Admin pages
    'admin/admin_dashboard.php' => "<?php include_once '../includes/header.php'; ?><h2>Admin Dashboard</h2><?php include_once '../includes/footer.php'; ?>",
    'admin/manage_clients.php' => "<?php include_once '../includes/header.php'; ?><h2>Manage Clients</h2><?php include_once '../includes/footer.php'; ?>",
    'admin/manage_staff.php' => "<?php include_once '../includes/header.php'; ?><h2>Manage Staff</h2><?php include_once '../includes/footer.php'; ?>",
    'admin/manage_loans.php' => "<?php include_once '../includes/header.php'; ?><h2>Manage Loans</h2><?php include_once '../includes/footer.php'; ?>",
    'admin/settings.php' => "<?php include_once '../includes/header.php'; ?><h2>Admin Settings</h2><?php include_once '../includes/footer.php'; ?>",

    // Staff pages
    'staff/staff_dashboard.php' => "<?php include_once '../includes/header.php'; ?><h2>Staff Dashboard</h2><?php include_once '../includes/footer.php'; ?>",
    'staff/apply_loan.php' => "<?php include_once '../includes/header.php'; ?><h2>Apply Loan</h2><?php include_once '../includes/footer.php'; ?>",
    'staff/approve_deposit.php' => "<?php include_once '../includes/header.php'; ?><h2>Approve Deposit</h2><?php include_once '../includes/footer.php'; ?>",
    'staff/approve_loan.php' => "<?php include_once '../includes/header.php'; ?><h2>Approve Loan</h2><?php include_once '../includes/footer.php'; ?>",

    // Client pages
    'client/client_dashboard.php' => "<?php include_once '../includes/header.php'; ?><h2>Client Dashboard</h2><?php include_once '../includes/footer.php'; ?>",
    'client/apply_loan.php' => "<?php include_once '../includes/header.php'; ?><h2>Apply Loan</h2><?php include_once '../includes/footer.php'; ?>",
    'client/deposit.php' => "<?php include_once '../includes/header.php'; ?><h2>Deposit</h2><?php include_once '../includes/footer.php'; ?>",
    'client/withdraw.php' => "<?php include_once '../includes/header.php'; ?><h2>Withdraw</h2><?php include_once '../includes/footer.php'; ?>",
    'client/view_statement.php' => "<?php include_once '../includes/header.php'; ?><h2>View Statement</h2><?php include_once '../includes/footer.php'; ?>",

    // Scripts
    'scripts/deposit_process.php' => "<?php // Handle deposit ?>",
    'scripts/loan_process.php' => "<?php // Handle loan ?>",
    'scripts/withdraw_process.php' => "<?php // Handle withdraw ?>",
    'scripts/settings_update.php' => "<?php // Handle settings update ?>",

    // CSS and JS
    'css/style.css' => "/* Add your styles here */",
    'js/script.js' => "// Add your JS here",

    // Project files
    'README.md' => "# FinView\nA PHP financial app starter project.",
    '.gitignore' => "/vendor/\n/node_modules/\n.env\n*.log"
];

// Create files
foreach ($files as $path => $content) {
    if (!file_exists($path)) {
        file_put_contents($path, $content);
        echo "Created file: $path\n";
    } else {
        echo "Skipped existing file: $path\n";
    }
}

echo "\n✅ Full FinView scaffold created!\n";
?>
