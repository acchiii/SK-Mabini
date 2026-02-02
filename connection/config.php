<?php
// DATABASE CONNECTION

$host = "localhost";       // your database host
$user = "root";            // your MySQL username (default is root in XAMPP)
$pass = "";                // your MySQL password (leave empty if none)
$db   = "sk_mabini";       // your database name
$RECAPTCHA_SITE_KEY = '6LdZEPsrAAAAADNtVZVgkUYousYYSa0Jmu8f3J-x';
$RECAPTCHA_SECRET_KEY = '6LdZEPsrAAAAAEXcYbuZXSr8H-lDVcC6A7HBGoBk';

// Create connection
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
?>
