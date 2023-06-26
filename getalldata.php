<?php 
include 'connect.php';

$SQL_LOKASI2 = "SELECT * FROM dbo.Lokasi_2";
$SQL_DATA_AKTUAL = "SELECT * FROM dbo.data_aktual";

$stmt_lokasi2 = $conn->prepare($SQL_LOKASI2);
$stmt_lokasi2->execute();
$result_lokasi2 = $stmt_lokasi2->fetchAll(PDO::FETCH_ASSOC);

$stmt_data_aktual = $conn->prepare($SQL_DATA_AKTUAL);
$stmt_data_aktual->execute();
$result_data_aktual = $stmt_data_aktual->fetchAll(PDO::FETCH_ASSOC);

$hasil_semua = [
    'lokasi2' => $result_lokasi2,
    'data_aktual' => $result_data_aktual
];

echo json_encode($hasil_semua);

?>