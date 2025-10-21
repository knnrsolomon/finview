<?php
$files = [
    'config/db.php' => "<?php
\$host = 'localhost';
\$dbname = 'finview_db';
\$username = 'root';
\$password = '';

try {
    \$conn = new PDO(\"mysql:host=\$host;dbname=\$dbname\", \$username, \$password);
    \$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException \$e) {
    die(\"Database connection failed: \" . \$e->getMessage());
}
?>",

    'includes/header.php' => "<!DOCTYPE html>
<html lang='en'>
<head>
<meta charset='UTF-8'>
<title>FinView</title>
<link rel='stylesheet' href='../css/style.css'>
</head>
<body>
<header>
<h1>FinView Financial Dashboard</h1>
</header>",

    'includes/footer.php' => "<footer>
<p>© <?php echo date('Y'); ?> FinView. All rights reserved.</p>
</footer>
<script src='../js/script.js'></script>
</body>
</html>",

    'public/index.php' => "<?php
include_once '../includes/header.php';
include_once '../config/db.php';
?>
<h2 style='text-align:center; margin-top:20%; color: green;'>🚀 FinView App Ready to Start!</h2>
<?php include_once '../includes/footer.php'; ?>
",

    'css/style.css' => "/* Add your CSS here */",
    'js/script.js' => "// Add your JS here",
    'README.md' => "# FinView

A PHP financial app starter project.",
    '.gitignore' => "/vendor/
/node_modules/
.env
*.log"
];

foreach($files as $path => $content){
    if(!file_exists($path)){
        file_put_contents($path, $content);
        echo "Created: $path\n";
    } else {
        echo "Skipped (already exists): $path\n";
    }
}

echo "\n✅ Starter files are ready!\n";
?>

