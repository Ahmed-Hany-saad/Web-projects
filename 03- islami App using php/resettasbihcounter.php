<?php
// Set the database connection details
require_once 'db_conn.php';

// Get the user ID from the session or any other source
session_start();
$user_id = $_SESSION['person']->id; // Change this to the actual user ID
// Get the current value of the tasbih-counter column
$tasbihCounter = $_POST['tasbih_counter'];

// update the tasbih_counter column in the users table
$sql = "UPDATE users SET tasbihcounter = $tasbihCounter WHERE id = $user_id"; // replace '1' with the ID of the user you want to update
if ($conn->query($sql) === TRUE) {
    echo "Tasbih counter updated successfully";
} else {
    echo "Error updating tasbih counter: " . $conn->error;
}
?>
