<?php 
include 'connect.php';
if (isset($_POST['submit'])) {
    // insert data to database
    $arus_ac_pzem = $_POST['arus_ac_pzem'];
    $tegangan_ac_pzem = $_POST['tegangan_ac_pzem'];
    $arus_dc_ina_max = $_POST['arus_dc_ina_max'];
    $tegangan_dc_ina_max = $_POST['tegangan_dc_ina_max'];
    // add date gmt+8
    $timezone = new DateTimeZone('Asia/Singapore'); // GMT +8 timezone
    $date = new DateTime('now', $timezone);
    $date = $date->format('Y-m-d H:i:s');
    $sql = "INSERT INTO dbo.data_aktual (arus_ac_pzem, tegangan_ac_pzem, arus_dc_ina_max, tegangan_dc_ina_max, waktu) VALUES ('$arus_ac_pzem', '$tegangan_ac_pzem', '$arus_dc_ina_max', '$tegangan_dc_ina_max', '$date')";
    $stmt = $conn->prepare($sql);
    if ($stmt->execute()) {
        echo "New record created successfully";
    }

}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Aktual</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div id="time" class="mx-auto"></div>
        <h2>Tambah Data Aktual</h2>
        <!-- set action to this file -->
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Arus AC Pzem</label>
                <input type="number" step="0.001" class="form-control" placeholder="masukkan angka contoh: 12" name="arus_ac_pzem">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Tegangan AC Pzem</label>
                <input type="number" step="0.001" class="form-control" placeholder="masukkan angka contoh: 12" name="tegangan_ac_pzem">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Arus DC Ina Max</label>
                <input type="number" step="0.001" class="form-control" placeholder="masukkan angka contoh: 12" name="arus_dc_ina_max">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Tegangan DC Ina Max</label>
                <input type="number" step="0.001" class="form-control" placeholder="masukkan angka contoh: 12" name="tegangan_dc_ina_max">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary" name="submit" value="submit">submit</button>
            </div>
        </form>
    </div>
</body>
</html>
