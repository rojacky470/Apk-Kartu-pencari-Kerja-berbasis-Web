<?php 
    session_start();
    include('config/config.php'); 
    
?>

<!DOCTYPE html>
<html lang="en">

<!-- head -->
<?php include('backend/main/head.php'); ?>

<link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">
<!-- head -->

<!--  library boostrap, sweetalert, dan fontawesome -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">


<body>
    <!-- sidebar -->
    <?php include('backend/main/sidebar.php'); ?>
    <!-- sidebar -->

    <!-- header -->
    <?php include('backend/main/header.php'); ?>
    <!-- header -->

    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>Form Tambah Peserta</h1>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Peserta</a></li>
                                    <li class="breadcrumb-item active">Peserta</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>
                <!-- /# row -->
                <?php $kd = mt_rand(1111, 9999); ?>
                <section id="main-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="simpan_user.php" method="POSt" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Nama Lengkap</label>
                                            <input type="text" name="nama" class="form-control input-default " placeholder="isi nama lengkap"required>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Password</label>
                                            <input type="password" name="password" class="form-control input-default " placeholder="isi password"required>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="text" name="email" class="form-control input-default " placeholder="isi email"required>
                                        </div>
                                        <div class="form-group">
                                            <label for="">NIK</label>
                                            <input type="text" name="nik" class="form-control input-default " placeholder="isi nik"required>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Jenis Kelamin</label>
                                            <select class="form-control" name="jk" id="">
                                                <option value="L"required>Laki-laki</option>
                                                <option value="P"required>Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Tempat Lahir</label>
                                            <input type="text" name="tempat_lahir" class="form-control input-default" placeholder="isi tempat lahir" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Tanggal Lahir</label>
                                            <input type="date" name="tgl_lahir" class="form-control input-default " placeholder="isi tanggal lahir" required> 
                                        </div>
                                        <div class="form-group">
                                            <label for="">Alamat</label>
                                            <textarea name="alamat" class="form-control input-default "required></textarea>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="form-label" for="customFile">Foto Profil</label>
                                            <input type="file" class="form-control"  name="foto_profile" id="foto_profile">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="customFile">Foto Ktp</label>
                                            <input type="file" name="foto_ktp" id="foto_ktp" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">No. Pendaftaran</label>
                                            <input type="text" name="no_pendaftaran" class="form-control input-default " value="<?php echo $kd; ?>" readonly>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="">Kecamatan</label>
                                            <select class="form-control" name="kecamatan" id="kecamatan">
                                            <option disabled selected> Pilih Kecamatan</option>
                                                        <?php 
                                                            $data = mysqli_query($conn, "SELECT * FROM tbl_kec");
                                                            while ($row=mysqli_fetch_array($data)) {
                                                        ?>
                                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['nm_kec']; ?></option>
                                                    <?php } ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="">Kelurahan</label>
                                            <select class="form-control" name="kelurahan" id="kelurahan" required>
                    
                                            </select>
                                        </div>
                                        <!-- <div class="form-group">
                                            <label for="">Kecamatan</label>
                                            <textarea name="kecamatan" class="form-control input-default "required></textarea>
                                        </div> -->
                                        
                                        <div class="form-group">
                                            <label for="">Pendidikan</label>
                                            <input type="text" name="pendidikan" class="form-control input-default " placeholder="isi pendidikan" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Jurusan</label>
                                            <input type="text" name="jurusan" class="form-control input-default " placeholder="isi jurusan" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Nomor Telepon / WA</label>
                                            <input type="text" name="no_telpon" class="form-control input-default " placeholder="isi no telepon" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Agama</label>
                                            <select class="form-control" name="agama"required id="">
                                                <option value="Islam">Islam</option>
                                                <option value="Kristen">Kristen</option>
                                                <option value="Hindu">Hindu</option>
                                                <option value="Budha">Budha</option>
                                            </select>
                                            <!-- <input type="text" name="agama" class="form-control input-default " placeholder="isi agama"> -->
                                        </div>
                                        <div class="form-group">
                                            <label for="">Status Kawin</label>
                                            <select class="form-control" name="status_kawin" id="">
                                                <option value="Kawin"required>Kawin</option>
                                                <option value="Lajang"required>Lajang</option>
                                                <option value="Janda"required>Janda</option>
                                                <option value="Duda"required>Duda</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Level</label>
                                            <select class="form-control" name="level" id="">
                                                <option value="user"required>User</option>
                                                <option value="admin"required>Admin</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="customFile">Foto Ijazah</label>
                                            <input type="file" name="foto_ijazah" id="foto_ijazah" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="peserta.php" type="submit" class="btn btn-warning">Kembali</a>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                    
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="footer">
                                <p>2018 © DisnakerKotaCirebon</p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <!-- footer -->

    <script type="text/javascript">
		$('#kecamatan').change(function() { 
			var kecamatan = $(this).val(); 
			$.ajax({
				type: 'POST', 
				url: 'kuning-html/ajax_kelurahan.php', 
				data: 'id=' + kecamatan, 
				success: function(response) { 
					$('#kelurahan').html(response); 
				}
			});
		});
	</script>

   
</body>

</html>