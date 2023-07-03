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
    <title>Riset ULM</title>

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
                <a href="data-table.php">
                        <button class="btn btn-danger">Tampilan Tabel</button>
                    </a>
                </div>
            </div>
        </nav>
    </header>

    <!-- Content -->
    <main class="mt-3">
        <div class="container">
           
            <div class="row mb-3 align-items-stretch">
                <div class="col mb-3 mb-sm-0">
                    <div class="card bg-primary text-white h-100">
                        <div class="card-body">
                            <h5 class="card-title">Sensor INA219 (Tegangan)</h5>
                            <canvas id="tegangan_ina" style="max-height: 320px;"></canvas>
                            <select name="tegangan_ina_filter" class="form-control">
                                <!-- option default disabled -->
                                <option value="">Semua Data</option>
                                <option value="7"> 7 Data Terakhir</option>
                                <option value="14">14 Data Terakhir</option>
                                <option value="30">30 Data Terakhir</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col mb-3 mb-sm-0">
                    <div class="card bg-warning text-white h-100">
                        <div class="card-body">
                            <h5 class="card-title">Sensor INA219 (Arus)</h5>
                            <canvas id="ina_arus" style="max-height: 320px;"></canvas>
                            <select name="arus_ina_filter" class="form-control">
                                <!-- option default disabled -->
                                 <option value="">Semua Data</option>
                                <option value="7"> 7 Data Terakhir</option>
                                <option value="14">14 Data Terakhir</option>
                                <option value="30">30 Data Terakhir</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-3 align-items-stretch">
                <div class="col mb-3 mb-sm-0">
                    <div class="card bg-primary text-white h-100">
                        <div class="card-body">
                            <h5 class="card-title">Sensor MAX471 (Tegangan)</h5>
                            <canvas id="max_tegangan" style="max-height: 320px;"></canvas>
                            <select name="max_tegangan_filter" class="form-control">
                                <!-- option default disabled -->
                                 <option value="">Semua Data</option>
                                <option value="7"> 7 Data Terakhir</option>
                                <option value="14">14 Data Terakhir</option>
                                <option value="30">30 Data Terakhir</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col mb-3 mb-sm-0">
                    <div class="card bg-warning text-white h-100">
                        <div class="card-body">
                            <h5 class="card-title">Sensor MAX471 (Arus)</h5>
                            <canvas id="max_arus" style="max-height: 320px;"></canvas>
                            <select name="max_arus_filter"  class="form-control">
                                <!-- option default disabled -->
                                <option value="">Semua Data</option>
                                <option value="7"> 7 Data Terakhir</option>
                                <option value="14">14 Data Terakhir</option>
                                <option value="30">30 Data Terakhir</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row align-items-stretch">
                <div class="col mb-3 mb-sm-0">
                    <div class="card bg-primary text-white h-100">
                        <div class="card-body">
                            <h5 class="card-title">Sensor PZEM-004T (Tegangan)</h5>
                            <canvas id="pzem_tegangan" style="max-height: 320px;"></canvas>
                            <select name="pzem_tegangan_filter" class="form-control">
                                <!-- option default disabled -->
                               <option value="">Semua Data</option>
                                <option value="7"> 7 Data Terakhir</option>
                                <option value="14">14 Data Terakhir</option>
                                <option value="30">30 Data Terakhir</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col mb-3 mb-sm-0">
                    <div class="card bg-warning text-white h-100">
                        <div class="card-body">
                            <h5 class="card-title">Sensor PZEM-004T (Arus)</h5>
                            <canvas id="pzem_arus" style="max-height: 320px;"></canvas>
                            <select name="pzem_arus_filter" class="form-control">
                                <!-- option default disabled -->
                               <option value="">Semua Data</option>
                                <option value="7"> 7 Data Terakhir</option>
                                <option value="14">14 Data Terakhir</option>
                                <option value="30">30 Data Terakhir</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5 table-responsive">
                <table id="resume" class="table align-middle" width="100%"></table>   
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


    <!-- Google Maps JavaScript API -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAtlqVUt-HzvavwqmiRlwTV0SJp3prHiGE&callback=initMap" async defer></script>
    <!-- Include Chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Time Script -->
    <script>
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

        // create chart for every canvas
        const tegangan_ina_chart = new Chart(document.getElementById("tegangan_ina").getContext('2d'), {
            type: 'line',
            data: {
                labels: [],
                datasets: [{
                    label: "Data Lokasi 2",
                    data: [],
                    borderColor: 'red',
                    backgroundColor: 'white',
                    borderWidth: 2,
                },
                {
                    label: "Data Aktual",
                    data: [],
                    borderColor: 'blue',
                    backgroundColor: 'white',
                    borderWidth: 2,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                interaction: {
                    mode: 'index',
                    intersect: false,
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        suggestedMin: 0,
                        suggestedMax: 55,
                        stepSize: 5,
                        title: {
                            display: true,
                            text: 'Tegangan (V)'
                        },
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Waktu'
                        },
                    }
                }
            }
        });

        const arus_ina_chart = new Chart(document.getElementById("ina_arus").getContext('2d'), {
            type: 'line',
            data: {
                labels: [],
                datasets: [{
                    label: "Data Lokasi 2",
                    data: [],
                    borderColor: 'red',
                    backgroundColor: 'white',
                    borderWidth: 2,
                },
                {
                    label: "Data Aktual",
                    data: [],
                    borderColor: 'blue',
                    backgroundColor: 'white',
                    borderWidth: 2,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                interaction: {
                    mode: 'index',
                    intersect: false,
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        suggestedMin: 0,
                        suggestedMax: 55,
                        stepSize: 5,
                        title: {
                            display: true,
                            text: 'Arus (A)'
                        },
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Waktu'
                        },
                    }
                }
            }
        });

        const pzem_tegangan_chart = new Chart(document.getElementById("pzem_tegangan").getContext('2d'), {
            type: 'line',
            data: {
                labels: [],
                datasets: [{
                    label: "Data Lokasi 2",
                    data: [],
                    borderColor: 'red',
                    backgroundColor: 'white',
                    borderWidth: 2,
                },
                {
                    label: "Data Aktual",
                    data: [],
                    borderColor: 'blue',
                    backgroundColor: 'white',
                    borderWidth: 2,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                interaction: {
                    mode: 'index',
                    intersect: false,
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        suggestedMin: 0,
                        suggestedMax: 55,
                        stepSize: 5,
                        title: {
                            display: true,
                            text: 'Tegangan (V)'
                        },
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Waktu'
                        },
                    }
                }
            }
        });

        const pzem_arus_chart = new Chart(document.getElementById("pzem_arus").getContext('2d'), {
            type: 'line',
            data: {
                labels: [],
                datasets: [{
                    label: "Data Lokasi 2",
                    data: [],
                    borderColor: 'red',
                    backgroundColor: 'white',
                    borderWidth: 2,
                },
                {
                    label: "Data Aktual",
                    data: [],
                    borderColor: 'blue',
                    backgroundColor: 'white',
                    borderWidth: 2,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                interaction: {
                    mode: 'index',
                    intersect: false,
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        suggestedMin: 0,
                        suggestedMax: 55,
                        stepSize: 5,
                        title: {
                            display: true,
                            text: 'Arus (A)'
                        },
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Waktu'
                        },
                    }
                }
            }
        });

        const max_tegangan_chart = new Chart(document.getElementById("max_tegangan").getContext('2d'), {
            type: 'line',
            data: {
                labels: [],
                datasets: [{
                    label: "Data Lokasi 2",
                    data: [],
                    borderColor: 'red',
                    backgroundColor: 'white',
                    borderWidth: 2,
                },
                {
                    label: "Data Aktual",
                    data: [],
                    borderColor: 'blue',
                    backgroundColor: 'white',
                    borderWidth: 2,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                interaction: {
                    mode: 'index',
                    intersect: false,
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        suggestedMin: 0,
                        suggestedMax: 55,
                        stepSize: 5,
                        title: {
                            display: true,
                            text: 'Tegangan (V)'
                        },
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Waktu'
                        },
                    }
                }
            }
        });

        const max_arus_chart = new Chart(document.getElementById("max_arus").getContext('2d'), {
            type: 'line',
            data: {
                labels: [],
                datasets: [{
                    label: "Data Lokasi 2",
                    data: [],
                    borderColor: 'red',
                    backgroundColor: 'white',
                    borderWidth: 2,
                },
                {
                    label: "Data Aktual",
                    data: [],
                    borderColor: 'blue',
                    backgroundColor: 'white',
                    borderWidth: 2,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                interaction: {
                    mode: 'index',
                    intersect: false,
                },
                scales: {
                    y: {
                        beginAtZero: false,
                        suggestedMin: 0,
                        suggestedMax: 55,
                        stepSize: 5,
                        title: {
                            display: true,
                            text: 'Arus (A)'
                        },
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Waktu'
                        },
                    }
                }
            }
        });


        // create function to update chart and give data to chart
        function updateChart(chart, label, data1, data2) {
            chart.data.labels = label
            chart.data.datasets[0].data = data1;
            chart.data.datasets[1].data = data2;
            chart.update();
        }



        $.ajax({
            url: "https://voltagecurrent.azurewebsites.net/getdata.php",
            method: "GET",
            cors: true,
            success: function(data) {
                data = JSON.parse(data);
                let data_lokasi2 = data.lokasi2;
                let data_aktual = data.data_aktual;
                
                 arus_ina = data_lokasi2.map(function(e) {
                    return parseFloat(e.arus_ina);
                });
                 arus_dc_ina_max = data_aktual.map(function(e) {
                    return parseFloat(e.arus_dc_ina_max);
                });
                 arus_max = data_lokasi2.map(function(e) {
                    return parseFloat(e.arus_max);
                });

                 arus_pzem = data_lokasi2.map(function(e) {
                    return parseFloat(e.arus_pzem);
                });
                 arus_ac_pzem = data_aktual.map(function(e) {
                    return parseFloat(e.arus_ac_pzem);
                });

                 tegangan_pzem = data_lokasi2.map(function(e) {
                    return parseFloat(e.tegangan_pzem);
                });
                 tegangan_ac_pzem = data_aktual.map(function(e) {
                    return parseFloat(e.tegangan_ac_pzem);
                });

                tegangan_ina = data_lokasi2.map(function(e) {
                    return parseFloat(e.tegangan_ina);
                });

                 tegangan_max = data_lokasi2.map(function(e) {
                    return parseFloat(e.tegangan_max);
                });
                 tegangan_dc_ina_max = data_aktual.map(function(e) {
                    return parseFloat(e.tegangan_dc_ina_max);
                });

                 waktu = data_lokasi2.map(function(e) {
                //    merge year, month, day, hour
                    return e.year + "-" + e.month + "-" + e.day + " " + e.hour + ":00";
                });
               

                // create chart
                updateChart(tegangan_ina_chart, waktu, tegangan_ina, tegangan_dc_ina_max);
                updateChart(arus_ina_chart, waktu, arus_ina, arus_dc_ina_max);
                updateChart(pzem_arus_chart, waktu, arus_pzem, arus_ac_pzem);
                updateChart(pzem_tegangan_chart, waktu, tegangan_pzem, tegangan_ac_pzem);
                updateChart(max_arus_chart, waktu, arus_max, arus_dc_ina_max);
                updateChart(max_tegangan_chart, waktu, tegangan_max, tegangan_dc_ina_max);


            },
            error: function(data) {
                console.log(data);
            }
        });

        // add filter function when select tag with id max471_tegangan is changed
        // then update the chart data
        $('select[name="max_tegangan_filter"]').change(e=>{
            let value = e.target.value;
            filterChartData(max_tegangan_chart ,value, tegangan_max, tegangan_dc_ina_max, waktu);
        })

        $('select[name="pzem_tegangan_filter"]').change(e=>{
            let value = e.target.value;
            filterChartData(pzem_tegangan_chart ,value, tegangan_pzem, tegangan_ac_pzem, waktu);
        })

        $('select[name="pzem_arus_filter"]').change(e=>{
            let value = e.target.value;
            filterChartData(pzem_arus_chart, value, arus_pzem, arus_ac_pzem, waktu);
        })

        $('select[name="max_arus_filter"]').change(e=>{
            let value = e.target.value;
            filterChartData(max_arus_chart, value, arus_max, arus_dc_ina_max, waktu);
        })

        $('select[name="tegangan_ina_filter"]').change(e=>{
            let value = e.target.value;
            filterChartData(tegangan_ina_chart, value, tegangan_ina, tegangan_dc_ina_max, waktu);
        })

        $('select[name="arus_ina_filter"]').change(e=>{
            let value = e.target.value;
            filterChartData(arus_ina_chart, value, arus_ina, arus_dc_ina_max, waktu);
        })

        function filterChartData(chart, value, data1, data2, waktufilter) {
            // filter data so the data onnly contain latest data
            data1filter = data1.filter((e,i)=>{
                return i >= data1.length - value;
            })
            
            data2filter = data2.filter((e,i)=>{
                return i >= data2.length - value;
            })

            waktufilter = waktufilter.filter((e,i)=>{
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
