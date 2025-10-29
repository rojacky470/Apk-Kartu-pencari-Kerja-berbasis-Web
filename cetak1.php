<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="assets/css/lib/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
  <script src="assets/js/lib/jquery.min.js"></script>
  <style>@media print{@page {size: landscape}}</style>
  <title>Document</title>
</head>
<body style="background-color:white">
  <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
           <?php 
                include("config/config.php");
                if( !isset($_GET['id']) ){
                    // header('Location: peserta.php');
                }
                $id = $_GET['id'];

                
                $data = "SELECT a.*, b.nama_petugas FROM tbl_peserta a LEFT JOIN tbl_tanda_tangan b 
                on b.id=a.id_tanda_tangan WHERE a.id = $id";
                // SELECT a.*, b.nama_petugas FROM tbl_peserta a LEFT JOIN tbl_tanda_tangan b 
                // on b.id=a.id_tanda_tangan 
                
                $query = mysqli_query($conn, $data);
                $row = mysqli_fetch_array($query);

                // jika data yang di-edit tidak ditemukan
                if( mysqli_num_rows($query) < 1 ){
                    die("data tidak ditemukan...");
                }
            ?>
            <div class="row">
                <div class="col-md-6">
                    <div class="text-left">Pendidikan Formal</div>
                </div>
                <div class="col-md-6">
                    <div class="text-right" style="font-weight:bold;">AK1</div>
                </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                  <div class="row">
                      <div class="text-left" style="padding-left:5px;">SMK</div>
                      <div class="text-left" style="padding-left:50px;"><?php echo $row['pendidikan']; ?></div>
                      <div class="text-left" style="padding-left:100px;">TH 2023</div>
                  </div>
              </div>
              <div class="col-md-8">
                  <div class="text-center">DINAS TENAGA KERJA</div>
                  <div class="text-center">PEMERINTAH DAERAH KOTA CIREBON</div>
                  <div class="text-center">Jl. Dr. Cipto Mangukusumo No.123 45131 Telp: 0231203622</div>
                  <div class="text-center border border-dark">KARTU TANDA BUKTI PENDAFTARAN PENCARI KERJA</div>
                  <br>
                  <div class="row">
                    <p style="padding-left:80px; margin-bottom:1px;">No. Pendaftaran Pencari Kerja</p>
                      <div class="text-left" style="padding-left:101px;"><span style="padding-left:10px;">:</span> <?php echo $row['no_pendaftaran']; ?></div>
                  </div>
                  <div class="row">
                      <p style="padding-left:80px">No. Induk Kependudukan</p>
                      <div style="padding-left:132px;"><span style="padding-left:10px;">:</span> <?php echo $row['nik']; ?></div>
                  </div>
              </div>
              <div class="col-md-5">
                  <div class="text-left">
                      <span style="font-size=30px; text-decoration:underline;">.................................</span>
                  </div>
                  <div class="text-left mt-2">
                      <span style="margin-top:2px;">KETERAMPILAN</span>
                      <span style="padding-left:100px;">PENGANTAR KERJA</span>
                      <span style="padding-left:150px;">Pas Photo</span><br>
                      <span>Tata Busana</span><br><br><br><br><br>
                      <span style="padding-left:210px;"><?php echo $row['nama_petugas']; ?>  <span style="padding-left:50px;">
                        TD Pencari Kerja</span></span>
                  </div>  
              </div>
              <div class="col-md-2">
                  <div class="text-left">
                      <div style="padding-left:50px;">Nama Lengkap</div>
                  </div>
                  <div class="text-left">
                      <div style="padding-left:50px;">Tempat Tgl / Lahir</div>
                  </div>
                  <div class="text-left">
                      <div style="padding-left:50px;">Jenis Kelamin</div>
                  </div>
                  <div class="text-left">
                      <div style="padding-left:50px;">Status</div>
                  </div>
                  <div class="text-left">
                      <div style="padding-left:50px;">Alamat</div>
                  </div>
                  <div class="text-left">
                      <div style="padding-left:50px;">No. Telepon</div>
                  </div>
                  <div class="text-left">
                      <div style="padding-left:50px;">Berlaku s.d.</div>
                  </div>
              </div>
              <div class="col-md-4">
                  <div class="text-left">
                      <div style=""><span style="">:</span> <?php echo $row['nama']; ?></div>
                  </div>
                  <div class="text-left">
                      <div style=""><span>:</span> <?php echo $row['tempat_lahir']; ?>, <?php echo $row['tgl_lahir']; ?></div>
                  </div>
                  <div class="text-left">
                      <div style=""><span>:</span> <?php echo $row['jk']; ?></div>
                  </div>
                  <div class="text-left">
                      <div style=""><span>:</span> <?php echo $row['status_kawin']; ?></div>
                  </div>
                  <div class="text-left">
                      <div style=""><span>:</span> <?php echo $row['alamat']; ?></div>
                  </div>
                  <div class="text-left">
                      <div style=""><span>:</span> <?php echo $row['no_telpon']; ?></div>
                  </div>
                  <div class="text-left">
                      <div style=""><span>:</span> 23-08-203</div>
                  </div>
              </div>
          </div>
        </div>
      </div>
  </div>
  <script>
        window.print();
    </script>
</body>
</html>