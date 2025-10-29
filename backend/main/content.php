<?php

include 'config/config.php';

// mengambil data peserta
$data_peserta = mysqli_query($conn,"SELECT * FROM tbl_peserta where level='user'");
$peserta_tidak_valid = mysqli_query($conn,"SELECT * FROM tbl_peserta where level='user' and status_validasi='1'");
$peserta_valid = mysqli_query($conn,"SELECT * FROM tbl_peserta where level='user' and status_validasi='2'");
$peserta_sudah_cetak = mysqli_query($conn,"SELECT * FROM tbl_peserta where level='user' and status_validasi='3'");
$male = mysqli_query($conn,"SELECT status_validasi,jk FROM tbl_peserta where level='user' and status_validasi='3' and jk='Laki-laki'");
$female = mysqli_query($conn,"SELECT status_validasi,jk FROM tbl_peserta where level='user' and status_validasi='3' and jk='Perempuan'");
$laki = mysqli_query($conn,"SELECT status_validasi,jk FROM tbl_peserta where level='user' and status_validasi='2' and jk='Laki-laki'");
$cewe = mysqli_query($conn,"SELECT status_validasi,jk FROM tbl_peserta where level='user' and status_validasi='2' and jk='Perempuan'");

// menghitung data peserta
$total_peserta = mysqli_num_rows($data_peserta);
$total_valid = mysqli_num_rows($peserta_valid);
$total_peserta_belum_valid = mysqli_num_rows($peserta_tidak_valid);
$total_cetak_kartu = mysqli_num_rows($peserta_sudah_cetak);
$lk = mysqli_num_rows($male);
$pr = mysqli_num_rows($female);
$l = mysqli_num_rows($laki);
$p = mysqli_num_rows($cewe);
// print_r($jenis_kelamin);die();

$total = mysqli_query($conn,"SELECT * FROM tbl_peserta where status_validasi='2' ");


?>

<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="stat-widget-one">
                <div class="stat-icon dib"><i class="ti-user color-success border-success"></i>
                </div>
                <div class="stat-content dib">
                    <div class="stat-text">Total Peserta</div>
                    <div class="stat-digit"><?php echo $total_peserta ?></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="stat-widget-one">
                <div class="stat-icon dib"><i class="ti-user color-primary border-primary"></i>
                </div>
                <div class="stat-content dib">
                    <div class="stat-text">Total Peserta Belum Valid</div>
                    <div class="stat-digit"><?php echo $total_peserta_belum_valid ?></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="stat-widget-one">
                <div class="stat-icon dib"><i class="ti-user color-danger border-danger"></i>
                </div>
                <div class="stat-content dib">
                    <div class="stat-text">Total Peserta Valid</div>
                    <div class="stat-digit"><?php echo $total_valid ?></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="stat-widget-one">
                <div class="stat-icon dib"><i class="ti-user color-danger border-danger"></i>
                </div>
                <div class="stat-content dib">
                    <div class="stat-text">Total Peserta Sudah Cetak Kartu</div>
                    <div class="stat-digit"><?php echo $total_cetak_kartu ?></div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-title">
                <h4>Grafik kartu kuning yang sudah dicetak dan belum dicetak</h4>

            </div>
            <div class="card-body">
                <!-- <canvas id="myChart"></canvas> -->
                <canvas id="myChart"></canvas>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
     var ctx = document.getElementById("myChart");
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Laki-laki','Perempuan', 'Laki-laki', 'Perempuan'],
                    // labels: ['bs','as'],
                    datasets: [{
                            label: 'Grafik Pembuatan Kartu Kuning',
                            // data: [12, 19, 3, 5, 2, 3],
                            data: [<?php echo $lk ?>, <?php echo $pr ?>, <?php echo $l ?>, <?php echo $p ?>],
                            // data: <?php //echo json_encode($peserta_valid_orno_json1) ?>,
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255,99,132,1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1
                        }]
                },
                options: {
                    scales: {
                        yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                    }
                }
            });
</script>