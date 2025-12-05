<?php
// Include the connection script
include('connection.php');

// Check if the connection is successful
if ($conn) {
    echo "Database connection successful!";
} else {
    echo "Database connection failed!";
}

// Optionally, close the connection after testing
$conn->close();
?>
