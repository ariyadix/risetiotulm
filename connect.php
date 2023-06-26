<?php 
$serverName = "risetiot.database.windows.net";
$database = "SQLrisetiot";
$uid = "CloudSAb1a46c87";
$pwd = "13Agustus2001";

try {
    $conn = new PDO("sqlsrv:server = $serverName; Database = $database", $uid, $pwd);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected to Azure SQL Database successfully!";
} catch (PDOException $e) {
    echo "Error connecting to Azure SQL Database: " . $e->getMessage();
    die();
}