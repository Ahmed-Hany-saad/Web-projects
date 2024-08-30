<?php
class DailyInspirationsModel {
    private $db;

    public function __construct() {
        // Connect to the database
        require_once '../db_conn.php';
        $this->db = $conn;
    }

    public function getDailyInspirations() {
        // Fetch data from the database
        $query = "SELECT Hadiths, QuranicVerses FROM dailyinspirationscontents ORDER BY RAND() LIMIT 1";
        $result = mysqli_query($this->db, $query);
        $row = mysqli_fetch_assoc($result);

        return $row;
    }
}
