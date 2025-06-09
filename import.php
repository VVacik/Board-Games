<?php

// Database connection parameters
$servername = "localhost";
$username = "s171275";
$password = "mywMwBZsql";
$database = "s171275";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "This migration was already done.";

// SQL file path
// $sql_file = "./s171275.sql";

// // Read SQL file content
// $sql_content = file_get_contents($sql_file);

// // Execute SQL commands
// if ($conn->multi_query($sql_content) === TRUE) {
//     echo "SQL file executed successfully";
// } else {
//     echo "Error executing SQL file: " . $conn->error;
// }

// // Close connection
// $conn->close();

?>
