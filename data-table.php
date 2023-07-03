<?php

//Silahkan hapus file default.php dari folder public_html sebelum Anda mengupload file website Anda
// include_once dirname(__FILE__) . '/get_mins.php';

date_default_timezone_set('Asia/Makassar');
$waktu = date('H:i:s');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riset ULM - Data tabel</title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.datatables.net/plug-ins/1.13.4/sorting/date-eu.js"></script>
    <script src="https://cdn.datatables.net/plug-ins/1.13.4/sorting/date-euro.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/luxon@3.3.0/build/global/luxon.min.js"></script>
    <script src="https://cdn.datatables.net/plug-ins/1.13.4/sorting/datetime-luxon.js"></script>
    

    <!-- Firebase SDK -->
    <!-- <script src="https://www.gstatic.com/firebasejs/8.6.1/firebase.js"></script> -->

    <!-- <script src="https://www.gstatic.com/firebasejs/9.0.2/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.0.2/firebase-database.js"></script> -->

    <!-- datatables css -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        header {
            position: sticky;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
        }

        .navbar {
            background-image: linear-gradient(to bottom, #FFA500, #FFFF00);
        }

        .navbar-nav {
            margin: auto;
        }

        #time {
            margin-right: auto;
        }

        .subscribe-btn {
            margin-left: auto;
        }

        #time {
            color: white;
            display: inline-block;
            padding: 5px;
            background-color: rgba(0, 0, 0, 0.2);
            border-radius: 5px;
        }

        h3 {
            color: black;
        }

        .map {
            height: 300px;
            width: 100%;
        }

        .center {
            width: 8%;
            text-align: center;
        }

        canvas {
            background-color: white;
        }

        /* add spin loader  */
    </style>
</head>

<body>
    <!-- Header -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <!-- <button class="navbar-toggler" type="button" style="margin-right:13%;" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button> -->
                <a class="navbar-brand navbar-toggler" href="#">
                    <img src="logoULM.png" alt="Logo" width="50" height="50">
                </a>
                <!-- <a class="navbar-brand" href="#">
                    <img src="logoULM.png" alt="Logo" width="50" height="50">
                </a> -->
                <div id="time" class="mx-auto"></div>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mx-auto">
                        <a class="navbar-brand" href="#">
                            <img src="logoULM.png" alt="Logo" width="50" height="50">
                        </a>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="#">Link 1</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link 2</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link 3</a>
                        </li> -->
                    </ul>
                </div>
                <div class="subscribe-btn">
                    <a href="index.php">
                        <button class="btn btn-danger">Tampilan Chart</button>
                    </a>
                </div>
            </div>
        </nav>
    </header>

    <!-- Content -->
    <main class="mt-3">
        <div class="container">
            <div class="row mt-5 table-responsive">
                <h3>Tabel Data Aktual</h3>
                <table id="resume" class="table align-middle" width="100%"></table>
            </div>

            <div class="row mt-5 table-responsive">
                <h3>Tabel Data Sensor</h3>
                <table id="sensor" class="table align-middle" width="100%"></table>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col">
                    <hr>
                    <p>&copy; 2023 Tim Riset, Universitas Lambung Mangkurat</p>
                </div>
            </div>
        </div>
    </footer>


    <!-- Include Chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Time Script -->
    <script>
        $(document).ready(function() {
            // format by datetime like this 19/6/2023, 09.17.15
            $.fn.dataTable.luxon('dd/MM/yyyy, HH:mm:ss');
        });
        var tegangan_ina, arus_ina, tegangan_max, arus_max, tegangan_pzem, arus_pzem;
        var arus_dc_ina_max, arus_ac_pzem, tegangan_ac_pzem, tegangan_dc_ina_max;
        var waktu;

        var today = new Date();
        var year = today.getFullYear();
        var month = ('0' + (today.getMonth() + 1)).slice(-2); // Menambahkan 0 di depan jika bulan kurang dari 10
        var day = ('0' + today.getDate()).slice(-2); // Menambahkan 0 di depan jika tanggal kurang dari 10
        var hours = today.getHours().toString().padStart(2, '0');;
        var minutes = today.getMinutes().toString().padStart(2, '0');;
        var seconds = today.getSeconds().toString().padStart(2, '0');;

        var hari = year + '-' + month + '-' + day;
        var jam = hours + ':' + minutes + ':' + seconds;

        // Get the element where the time will be displayed
        const timeElement = document.getElementById("time");

        // Function to update the time every second
        function updateTime() {
            const date = new Date();
            const options = {
                timeZone: "Asia/Makassar",
                hour12: false
            };
            const timeString = date.toLocaleTimeString("en-US", options);
            timeElement.textContent = timeString;
        }

        // Call updateTime() every second
        setInterval(updateTime, 1000);

        // create tables datatables
        function createTables(dataSet) {

            var table = $("#resume").DataTable({
                // add dropdown filter to datatable based on waktu
                initComplete: function() {
                    this.api().columns(0).every(function() {
                        var column = this;
                        var select = $('<select class="form-select form-select-sm"><option value="">semua data</option></select>')
                        select.appendTo('#resume').on('change', function() {
                            var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()
                            );
                            column.
                            search(val ? this.value.replace(/,/g, ", ") : '', true, false)
                                .draw();
                        });

                        // add every date
                        let date = column.data().map(function(d, j) {
                            return d.split(", ")[0];
                        });
                        date.unique().sort().each(function(d, j) {
                            let waktuKini = d.split(", ")[0];
                            select.append('<option value="' + waktuKini + '">' + waktuKini + '</option>')
                        });
                    });
                },
                lengthChange: false,
                data: dataSet,
                columns: [{
                        title: "Tanggal",
                        data: "waktu"
                    },
                    {
                        title: "arus_ac_pzem",
                        data: "arus_ac_pzem"
                    },
                    {
                        title: "tegangan_ac_pzem)",
                        data: "tegangan_ac_pzem"
                    },
                    {
                        title: "arus_dc_ina_max",
                        data: "arus_dc_ina_max"
                    },
                    {
                        title: "tegangan_dc_ina_max",
                        data: "tegangan_dc_ina_max"
                    },

                ],
                dom: 'Bfrtip',
                buttons: ['copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5', 'print'],
            });
            // table.buttons().container().appendTo("#example_wrapper .col-md-6:eq(0)");
        }

        function createTableSensor(dataset) {
            let tableSensor = $('#sensor').DataTable({
                // add dropdown filter to datatable based on waktu
                initComplete: function() {
                    this.api().columns(0).every(function() {
                        var column = this;
                        var select = $('<select class="form-select form-select-sm"><option value="">semua data</option></select>')
                        select.appendTo('#sensor').on('change', function() {
                            var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()
                            );
                            column.
                            search(val ? this.value.replace(/,/g, ", ") : '', true, false)
                                .draw();
                        });

                        // add every date
                        let date = column.data().map(function(d, j) {
                            return d.split(", ")[0];
                        });
                        date.unique().sort().each(function(d, j) {
                            let waktuKini = d.split(", ")[0];
                            select.append('<option value="' + waktuKini + '">' + waktuKini + '</option>')
                        });
                    });
                },
                lengthChange: false,
                data: dataset,
                columns: [{
                        title: "Tanggal",
                        data: "waktu"
                    },
                    {
                        title: "INA219 (Tegangan)",
                        data: "tegangan_ina"
                    },
                    {
                        title: "INA219 (Arus)",
                        data: "arus_ina"
                    },
                    {
                        title: "MAX471 (Tegangan)",
                        data: "tegangan_max"
                    },
                    {
                        title: "MAX471 (Arus)",
                        data: "arus_max"
                    },
                    {
                        title: "PZEM-004T (Tegangan)",
                        data: "tegangan_pzem"
                    },
                    {
                        title: "PZEM-004T (Arus)",
                        data: "arus_pzem"
                    }
                ],
                order: [
                    [0, "desc"]
                ],
                dom: 'Bfrtip',
                buttons: ['copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5', 'print'],
            });
            // table.buttons().container().appendTo("#example_wrapper .col-md-6:eq(0)");
        }



        $.ajax({
            url: "https://voltagecurrent.azurewebsites.net/getalldata.php",
            method: "GET",
            cors: true,
            success: function(data) {
                data = JSON.parse(data);
                let data_aktual = data.data_aktual;
                let data_lokasi2 = data.lokasi2;

                // i want to create variable that only used for createTables data
                // the variables should contain all data from data variable but the time is GMT+8
                let table_data = data.data_aktual.map(function(e) {
                    // return waktu as GMT+8
                    let waktu = new Date(e.waktu)
                    // waktu = waktu.setTime(waktu.getTime() + (8 * 60 * 60 * 1000))
                    waktu = new Date(waktu).toLocaleDateString('id-ID', {
                        // timeZone: "Asia/Makassar",
                        hour12: false,
                        hour: "numeric",
                        minute: "numeric",
                        second: "numeric"
                    })
                    return {
                        waktu: waktu,
                        // parse all data to get 3 decimal and change dot to comma as separator
                        // arus_ac_pzem tegangan_ac_pzem arus_dc_ina_max tegangan_dc_ina_max
                        arus_ac_pzem: parseFloat(e.arus_ac_pzem).toFixed(3).replace(".", ","),
                        tegangan_ac_pzem: parseFloat(e.tegangan_ac_pzem).toFixed(3).replace(".", ","),
                        arus_dc_ina_max: parseFloat(e.arus_dc_ina_max).toFixed(3).replace(".", ","),
                        tegangan_dc_ina_max: parseFloat(e.tegangan_dc_ina_max).toFixed(3).replace(".", ","),

                    }
                });

                let table_data_lokasi2 = data.lokasi2.map(function(e) {
                    // return waktu as GMT+8
                    let waktu = new Date(e.waktu)
                    // format with luxon like this 'dd/MM/yyyy, HH:mm:ss'
                    waktu = luxon.DateTime.fromJSDate(waktu).toFormat('dd/MM/yyyy, HH:mm:ss');
                    return {
                        waktu: waktu,
                        // parse all data to get 3 decimal and change dot to comma as separator
                        tegangan_ina: parseFloat(e.tegangan_ina).toFixed(3).replace(".", ","),
                        arus_ina: parseFloat(e.arus_ina).toFixed(3).replace(".", ","),
                        tegangan_pzem: parseFloat(e.tegangan_pzem).toFixed(3).replace(".", ","),
                        arus_pzem: parseFloat(e.arus_pzem).toFixed(3).replace(".", ","),
                        tegangan_max: parseFloat(e.tegangan_max).toFixed(3).replace(".", ","),
                        arus_max: parseFloat(e.arus_max).toFixed(3).replace(".", ","),

                    }
                });

                // create table
                createTables(table_data);
                createTableSensor(table_data_lokasi2);


            },
            error: function(data) {
                console.log(data);
            }
        });

        // add filter function when select tag with id max471_tegangan is changed
        // then update the chart data
        $('select[name="max_tegangan_filter"]').change(e => {
            let value = e.target.value;
            filterChartData(max_tegangan_chart, value, tegangan_max, tegangan_dc_ina_max, waktu);
        })

        $('select[name="pzem_tegangan_filter"]').change(e => {
            let value = e.target.value;
            filterChartData(pzem_tegangan_chart, value, tegangan_pzem, tegangan_ac_pzem, waktu);
        })

        $('select[name="pzem_arus_filter"]').change(e => {
            let value = e.target.value;
            filterChartData(pzem_arus_chart, value, arus_pzem, arus_ac_pzem, waktu);
        })

        $('select[name="max_arus_filter"]').change(e => {
            let value = e.target.value;
            filterChartData(max_arus_chart, value, arus_max, arus_dc_ina_max, waktu);
        })

        $('select[name="tegangan_ina_filter"]').change(e => {
            let value = e.target.value;
            filterChartData(tegangan_ina_chart, value, tegangan_ina, tegangan_dc_ina_max, waktu);
        })

        $('select[name="arus_ina_filter"]').change(e => {
            let value = e.target.value;
            filterChartData(arus_ina_chart, value, arus_ina, arus_dc_ina_max, waktu);
        })

        function filterChartData(chart, value, data1, data2, waktufilter) {
            // filter data so the data onnly contain latest data
            data1filter = data1.filter((e, i) => {
                return i >= data1.length - value;
            })

            data2filter = data2.filter((e, i) => {
                return i >= data2.length - value;
            })

            waktufilter = waktufilter.filter((e, i) => {
                return i >= waktufilter.length - value;
            })

            if (value == 0) {
                // if value is 0 then show all data
                updateChart(chart, waktu, data1, data2);
            } else {
                // else show data based on value
                updateChart(chart, waktufilter, data1filter, data2filter);
            }
        }
    </script>
</body>

</html>