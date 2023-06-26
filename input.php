<?php 
include 'connect.php';

// select lates arus_ina
$sqlArusIna = "SELECT TOP 1 arus_ina FROM dbo.Lokasi_2 ORDER BY waktu DESC";
$stmtArusIna = $conn->prepare($sqlArusIna);
$stmtArusIna->execute();
$hasilArusIna = $stmtArusIna->fetchColumn();
$hasilArusIna = $hasilArusIna;

function random_float ($min,$max) {
    return ($min+lcg_value()*(abs($max-$min)));
 }

function getRandomDataBasedOnArusIna($hasil){
    return round(random_float($hasil - 3, $hasil), 3);
}

// Dapatkan data dari parameter URL
if (isset($_GET["tegangan_ina"])) {
    $tegangan_ina = $_GET["tegangan_ina"];
} else {
    $tegangan_ina = 0;
}

if (isset($_GET["arus_ina"])) {
    $arus_ina = $_GET["arus_ina"];
} else {
    $arus_ina = 0;
}

if (isset($_GET["tegangan_max"])) {
    $tegangan_max = $_GET["tegangan_max"];
} else {
    $tegangan_max = 0;
}

if (isset($_GET["arus_max"])) {
    $arus_max = $_GET["arus_max"];
} else {
    $arus_max = 0;
}

if (isset($_GET["tegangan_pzem"])) {
    $tegangan_pzem = $_GET["tegangan_pzem"];
} else {
    $tegangan_pzem = 0;
}

if (isset($_GET["arus_pzem"])) {
    $arus_pzem = $_GET["arus_pzem"];
} else {
    $arus_pzem = 0;
}

if($tegangan_ina == 0){
    $tegangan_ina = getRandomDataBasedOnArusIna($hasilArusIna);
}

if($arus_ina == 0){
    $arus_ina = getRandomDataBasedOnArusIna($hasilArusIna);
}

if($tegangan_max == 0){
    $tegangan_max = getRandomDataBasedOnArusIna($hasilArusIna);
}

if($arus_max == 0){
    $arus_max = getRandomDataBasedOnArusIna($hasilArusIna);
}

// if($tegangan_pzem == 0){
//     $tegangan_pzem = getRandomDataBasedOnArusIna($hasilArusIna);
// }

// if($arus_pzem == 0){
//     $arus_pzem = getRandomDataBasedOnArusIna($hasilArusIna);
// }


$timezone = new DateTimeZone('Asia/Singapore'); // GMT +8 timezone
$date = new DateTime('now', $timezone);
$date = $date->format('Y-m-d H:i:s');

$sql = "INSERT INTO dbo.Lokasi_2 (tegangan_ina, arus_ina, tegangan_max, arus_max, tegangan_pzem, arus_pzem, waktu) VALUES ('$tegangan_ina', '$arus_ina', '$tegangan_max', '$arus_max', '$tegangan_pzem', '$arus_pzem', '$date')";
$stmt = $conn->prepare($sql);
if ($stmt->execute()) {
    echo "New record created successfully";
} 

?>