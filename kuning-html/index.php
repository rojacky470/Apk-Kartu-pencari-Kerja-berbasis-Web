<?php 
    session_start();
    include('../config/config.php'); 
?>

<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="register1.css">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

   <title>Registrasi Kartu Kuning</title>
<!-- library bootstrap, font awasome, sweet alert -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
   
</head>
<body>
<?php $kd = mt_rand(1111, 9999); ?>
    <div class="container">
    <header>
    <img src="../assets/img/public/logodisnaker.png" /><br>
    Pendaftaran Kartu Kuning 
    </header>

        <form action="index.php" method="post" enctype="multipart/form-data">
            <div>
                <div class="details personal">
                    <span class="title">Data Personal</span>
                    
                    <div class="fields">
                    <div class="input-field">
                      <label for="">No. Pendaftaran</label>
                      <input type="text" name="no_pendaftaran" class="form-control input-default " value="<?php echo $kd; ?>" readonly>
                    </div>
                        <div class="input-field">
                            <label>Nama Lengkap</label>
                            <input type="text" name="nama" placeholder="Masukkan nama anda" required>
                        </div>

                        <div class="input-field">
                            <label>Tanggal Lahir</label>
                            <input type="date" name="tgl_lahir" placeholder="Masukkan tanggal lahir anda" required>
                        </div>

                        <div class="input-field">
                            <label>Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" placeholder="Masukkan tempat lahir anda" required>
                        </div>

                        <div class="input-field">
                            <label>Nomor NIK</label>
                            <input type="number" name="nik" placeholder="Masukkan NIK anda" required>
                        </div>

                        <div class="input-field">
                            <label>Email</label>
                            <input type="email" name="email" placeholder="masukkan email anda" required>
                        </div>

                        <div class="input-field">
                            <label>Password</label>
                            <input type="password" name="password" required>
                        </div>

                        <div class="input-field">
                            <label>Nomor HP</label>
                            <input type="number" name="no_telpon" placeholder="Masukkan nomor HP anda" required>
                        </div>

                        <div class="input-field">
                            <label>Jenis Kelamin</label>
                            <select name="jk" required>
                                <option disabled selected>Pilih Jenis Kelamin</option>
                                <option Value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Agama</label>
                            <select name="agama" required>
                                <option disabled selected>Pilih Agama</option>
                                <option Value="Islam">Islam</option>
                                <option Value="Khatolik">Khatolik</option>
                                <option Value="Protestan">Protestan</option>
                                <option Value="Hindu">Hindu</option>
                                <option Value="Hindu">Budha</option>
                                <option Value="Hindu">Lain-lain</option>
                            </select>
                        </div>

                        <div class="input-field">
                        <label>Alamat</label>
                            <input type="textarea" name="alamat" placeholder="Masukkan alamat anda" required>
                        </div>
                        <div class="input-field">
                        <label>Kecamatan</label>
                        <select name="kecamatan" id="kecamatan">
                                                    <option disabled selected> Pilih Kecamatan</option>
                                                <?php 
                                                    $data = mysqli_query($conn, "SELECT * FROM tbl_kec");
                                                    while ($row=mysqli_fetch_array($data)) {
                                                ?>
                                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['nm_kec']; ?></option>
                                                <?php } ?>
                                            </select>
                        </div>
                        <div class="input-field">
                        <label>Kelurahan</label>
                        <select class="" name="kelurahan" id="kelurahan" required>
                    
                        </select>
                        </div>

                        <div class="input-field">
                        <label>Status</label>
                            <select name="status_kawin" required>
                                <option disabled selected>Status Kawin</option>
                                <option Value="Kawin">Kawin</option>
                                <option value="Lajang">Lajang</option>
                                <option value="Duda">Duda</option>
                                <option value="Janda">Janda</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Pendidikan</label>
                            <input type="text" name="pendidikan" placeholder="Masukkan pendidikan anda" required>
                        </div>
                        
                        <div class="input-field">
                        <label>Pas foto (background merah)</label>                    
                            <input type="file" id="foto_profile" name="foto_profile" required>
                            <p class="help-block">
                            <font size="2px" color="red">"Format file jpg/png"</font>
                            </p>
                        </div>
                        <div class="input-field">
                        <label>Foto KTP</label>                    
                            <input type="file" id="foto_ktp" name="foto_ktp" required>
                            <p class="help-block">
                            <font size="2px" color="red">"Format file jpg/png"</font>
                            </p>
                        </div>
                        <div class="input-field">
                        <label>Ijazah Terakhir</label>                    
                            <input type="file" id="foto_ijazah" name="foto_ijazah" placeholder="Format file Jpg/Png/PDF" required>
                            <p class="help-block">
                            <font size="2px" color="red">"Format file jpg/png"</font>
                            </p>
                        </div>

                        <div class="input-field">
                            <label>Jurusan</label>
                            <input type="text" name="jurusan" placeholder="Masukkan jurusan anda" required>
                        </div>
                    </div>
                </div>
                    <button class="sumbit" name="simpan">
                        <span class="btnText" >Submit</span>
                        <i class="uil uil-navigator"></i>
                        </button>
                        <h5 class="col-md-10">Sudah punya akun ? &ensp;<a href="../login.php" type="submit" class="btn btn-warning">Login</a></h5> 
                </div> 
            </div>
</div>
</div>
</div>
                    </div>
                </div> 
            </div>
        </form>
    </div>

    <script src="script.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 
	<script type="text/javascript">
		$('#kecamatan').change(function() { 
			var kecamatan = $(this).val(); 
			$.ajax({
				type: 'POST', 
				url: 'ajax_kelurahan.php', 
				data: 'id=' + kecamatan, 
				success: function(response) { 
					$('#kelurahan').html(response); 
				}
			});
		});
 
	</script>

<!-- script swal -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>

    <?php
    include '../config/config.php';
    //proses penyimpanan foto profile/foto_profile
    if (isset ($_POST['simpan'])){
    $nama_file = $_FILES['foto_profile']['name'];
    $ukuran_file = $_FILES['foto_profile']['size'];
    $tipe_file = $_FILES['foto_profile']['type'];
    $tmp_file = $_FILES['foto_profile']['tmp_name'];
    
    $file_ktp = $_FILES['foto_ktp']['name'];
    $ukuran_file = $_FILES['foto_ktp']['size'];
    $tipe_file = $_FILES['foto_ktp']['type'];
    $tmp_file_ktp = $_FILES['foto_ktp']['tmp_name'];
    $path_ktp = "../foto_ktp/".$file_ktp;
    $move = move_uploaded_file($tmp_file_ktp, $path_ktp);

    $file_ijazah = $_FILES['foto_ijazah']['name'];
    $ukuran_file = $_FILES['foto_ijazah']['size'];
    $tipe_file = $_FILES['foto_ijazah']['type'];
    $path_ijazah = "../foto_ijazah/".$file_ijazah;
    $tmp_file_ijazah = $_FILES['foto_ijazah']['tmp_name'];
    $pindah = move_uploaded_file($tmp_file_ijazah, $path_ijazah);


    $path = "../foto_profile/".$nama_file;

    if($tipe_file == "image/jpeg" || $tipe_file == "image/png"){ 
        if($ukuran_file <= 1000000){ 
            //memindahkan lokasi gambar dari tempat asal ke dalam folder website(pasfoto)
            //memiliki 2 parameter yang harus diisi, yaitu parameter tempat asal gambar dan paramter tempat tujuan gambar
            if(move_uploaded_file($tmp_file, $path)){ 

      $nama = $_POST['nama'];
      $nik = $_POST['nik'];
      $alamat = $_POST['alamat'];
      $kec = $_POST['kecamatan'];
      $kel = $_POST['kelurahan'];
      $pw = $_POST['password'];
      $pw = md5($pw);
      $email = $_POST['email'];
      $jk = $_POST['jk'];
      $agama = $_POST['agama'];
      $no_pendaftaran = $_POST['no_pendaftaran'];
      $t_lahir = $_POST['tgl_lahir'];
      $tmpt_lahir = $_POST['tempat_lahir'];
      $no_tlp = $_POST['no_telpon'];
      $status = $_POST['status_kawin'];
      $pendidikan = $_POST['pendidikan'];
      $jurusan = $_POST['jurusan'];
      //$foto = $_POST['foto_profile'];

      $q = $conn->query("INSERT INTO tbl_peserta (nama, nik, alamat, kecamatan, kelurahan, password, email, jk, no_pendaftaran,
      tgl_lahir, tempat_lahir, pendidikan, jurusan, no_telpon, status_kawin, agama, foto_profile, foto_ktp, foto_ijazah, status_validasi, level) 
      VALUES ('$nama', '$nik', '$alamat', '$kec', '$kel',  '$pw', '$email', '$jk', '$no_pendaftaran', '$t_lahir', '$tmpt_lahir', '$pendidikan', '$jurusan', '$no_tlp', '$status', '$agama', '$nama_file', '$file_ktp', '$file_ijazah', '1', 'user')");
    if ($q) {
        //echo "<script>swal('Selamat! Registrasi berhasil, silahkan login untuk melanjutkan'); window.location.href='../login.php'</script>";
        // pesan jika data tersimpan
        echo "<script>alert('Selamat! Registrasi berhasil, silahkan login untuk melanjutkan'); window.location.href='../login.php'</script>";
      } else {
        // pesan jika data gagal disimpan
        echo "<script>alert('Registrasi Gagal'); window.location.href='index.php'</script>";
      }
    }
 } else{
        //jika ukuran gambar lebih besar dari 1MB maka akan memunculkan pesan seperti di bawah ini
        echo "<script>alert('Maaf, Ukuran gambar yang diupload tidak boleh lebih dari 1MB'); window.location.href='index.php'</script>";
      }
    }else{
      //jika tipe gambar yang diupload bukan jpg atau png maka akan memunculkan pesan seperti di bawah ini
      echo "<script>alert('Maaf, Tipe gambar yang diupload harus JPG / JPEG / PNG.'); window.location.href='index.php'</script>";
    }?>
      <?php
}
    ?>
</body>
</html>