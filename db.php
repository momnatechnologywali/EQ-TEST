<?php
$servername = "localhost"; // Adjust if your database host is different (e.g., for remote DB)
$username = "uws1gwyttyg2r";
$password = "k1tdlhq4qpsf";
$dbname = "dbjlvbbwznozjk";
 
// Create connection with error handling (pro-level: using prepared statements readiness and charset)
$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8mb4"); // Ensure proper encoding for text
 
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
