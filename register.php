<?php
// Replace the database connection details with your own
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "naziasuleman";

// Create a PDO database connection
$dsn = "mysql:host=$host;dbname=$dbName;charset=utf8mb4";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    $pdo = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    // Prepare and execute the SQL query
    $sql = "INSERT INTO register (name, gender, email, address) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$name, $gender, $email, $address]);

    // Redirect the user to a success page or display a success message
    header("Location: success.html");
    exit();
}
?>
