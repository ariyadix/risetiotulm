<?php 
include 'connect.php';

$SQL_LOKASI2 = "SELECT 
MAX(tegangan_ina) AS tegangan_ina,
MAX(arus_ina) AS arus_ina,
MAX(tegangan_max) AS tegangan_max,
MAX(arus_max) AS arus_max,
MAX(tegangan_pzem) AS tegangan_pzem,
MAX(arus_pzem) as arus_pzem,
DATEPART(YEAR, waktu) AS year,
DATEPART(MONTH, waktu) AS month,
DATEPART(DAY, waktu) AS day,
DATEPART(HOUR, waktu) AS hour
FROM 
[dbo].[Lokasi_2]
GROUP BY 
DATEPART(YEAR, waktu),
DATEPART(MONTH, waktu),
DATEPART(DAY, waktu),
DATEPART(HOUR, waktu)
ORDER BY 
year, month, day, hour";
$SQL_DATA_AKTUAL = "SELECT * FROM dbo.data_aktual ORDER BY waktu ASC";

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