<?php
date_default_timezone_set('Africa/Cairo');

// Connect to the database
require_once '../db_conn.php';

$query = "SELECT Hadiths, QuranicVerses FROM dailyinspirationscontents ORDER BY RAND() LIMIT 1";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$data = array('hadith' => $row['Hadiths'], 'verse' => $row['QuranicVerses']);
header('Content-Type: application/json');
echo json_encode($data);
?>