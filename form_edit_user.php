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
                                <h1>Form Edit Peserta</h1>
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
                <?php
                                    
                    // kalau tidak ada id di query string
                    if( !isset($_GET['id']) ){
                        header('Location: dashboard.php');
                    }

                    //ambil id dari query string
                    $id = $_GET['id'];

                    
                    $edit = "SELECT * FROM tbl_peserta WHERE id = $id";
                    // print_r($edit);
                    
                    $query = mysqli_query($conn, $edit);
                    $row = mysqli_fetch_assoc($query);

                    // jika data yang di-edit tidak ditemukan
                    if( mysqli_num_rows($query) < 1 ){
                        die("data tidak ditemukan...");
                    }
                ?>
                <section id="main-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                    <div class="card-body">
                                        <form action="update.php" method="POST" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Nama Lengkap</label>
                                                        <input type="hidden" name="id" id="id" class="form-control input-default" value="<?php echo $row['id']?>" >
                                                        <input type="text" name="nama" id="name" class="form-control input-default" value="<?php echo $row['nama']?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Email</label>
                                                        <input type="email" name="email" class="form-control input-default " value="<?php echo $row['email']?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">NIK</label>
                                                        <input type="text" name="nik" class="form-control input-default " value="<?php echo $row['nik']?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Jenis Kelamin</label>
                                                        <?php $dt = $row['jk']; ?>
                                                        <select class="form-control" name="jk" id="exampleFormControlSelect1">
                                                            <option <?php echo ($dt == 'Laki-laki') ? "selected": "" ?>>Laki-laki</option>
                                                            <option <?php echo ($dt == 'Perempuan') ? "selected": "" ?>>Perempuan</option>
                                                        </select>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label class="form-label" for="customFile">Foto Profil</label>
                                                        <input type="text" class="form-control" value="<?php echo $row['foto_profile']; ?>">
                                                        <input type="file" class="form-control"  name="foto_profile" id="foto_profile" value="<?php echo $row['foto_profile']; ?>">
                                                        
                                                        <div class="text-left mt-2">
                                                            <img class="img-upload-users" src="foto_profile/<?php echo $row['foto_profile']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label" for="customFile">Foto Ktp</label>
                                                        <input type="text" value="<?php echo $row['foto_ktp']; ?>" class="form-control">
                                                        <input type="file" name="foto_ktp" id="foto_ktp" class="form-control">
                                                        <div class="text-left mt-2">
                                                            <img class="img-upload-users" src="foto_ktp/<?php echo $row['foto_ktp']; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">No. Pendaftaran</label>
                                                        <input type="text" name="no_pendaftaran" class="form-control input-default " value="<?php echo $row['no_pendaftaran']; ?>" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Tanggal Lahir</label>
                                                        <input type="date" name="tgl_lahir" class="form-control input-default " value="<?php echo $row['tgl_lahir']; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Nomor Telepon / WA</label>
                                                        <input type="text" name="no_telpon" class="form-control input-default " value="<?php echo $row['no_telpon']; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Agama</label>
                                                        <?php $dt = $row['agama']; ?>
                                                        <select class="form-control" name="agama" id="exampleFormControlSelect1">
                                                            <option <?php echo ($dt == 'Islam') ? "selected": "" ?>>Islam</option>
                                                            <option <?php echo ($dt == 'Kristen') ? "selected": "" ?>>Kristen</option>
                                                            <option <?php echo ($dt == 'Hindu') ? "selected": "" ?>>Hindu</option>
                                                            <option <?php echo ($dt == 'Budha') ? "selected": "" ?>>Budha</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Alamat</label>
                                                        <input type="textarea" name="alamat" class="form-control" value="<?php echo $row['alamat']; ?>"></textarea>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="">Kecamatan</label>
                                                        <select class="form-control" name="kecamatan" id="kecamatan">
                                                        <?php 
                                                            //ambil kecamatan
                                                            $data = mysqli_query($conn, "SELECT * FROM tbl_kec");
                                                            while ($dat=mysqli_fetch_array($data)) {
                                                                if ($row['kecamatan']==$dat['id']) {
                                                                    $select="selected";
                                                                   }else{
                                                                    $select= $dat['id'];
                                                                   }
                                                                   echo "<option $select value= $select>".$dat['nm_kec']."</option>";
                                                                }
                                                        ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Kelurahan</label>
                                                        <select class="form-control" name="kelurahan" id="kelurahan" required>
                                                        <?php 
                                                            //auto complete berdasrkan data kecamatan yg dipilih
                                                            $data = mysqli_query($conn, "SELECT * FROM tbl_kel");
                                                            while ($dat=mysqli_fetch_array($data)) {
                                                                if ($row['kelurahan']==$dat['id']) {
                                                                    $select="selected";
                                                                   }else{
                                                                    $select= $dat['id'];
                                                                   }
                                                                   echo "<option $select value= $select>".$dat['nm_kel']."</option>";
                                                                }
                                                        ?>
                                                    </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <?php $dt = $row['status_kawin']; ?>
                                                        <label for="">Status Kawin</label>
                                                        <select class="form-control" name="status_kawin" id="exampleFormControlSelect1">
                                                            <option <?php echo ($dt == 'Kawin') ? "selected": "" ?>>Kawin</option>
                                                            <option <?php echo ($dt == 'Lajang') ? "selected": "" ?>>Lajang</option>
                                                            <option <?php echo ($dt == 'Duda') ? "selected": "" ?>>Duda</option>
                                                            <option <?php echo ($dt == 'Janda') ? "selected": "" ?>>Janda</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label" for="customFile">Foto Ijazah</label>
                                                        <input type="type" value="<?php echo $row['foto_ijazah']; ?>" class="form-control">
                                                        <input type="file" name="foto_ijazah" id="foto_ijazah" class="form-control">
                                                        <div class="text-left mt-2">
                                                            <img class="img-upload-users" src="foto_ijazah/<?php echo $row['foto_ijazah']; ?>">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <?php $dt = $row['status_validasi']; ?>
                                                        <?php if ($_SESSION['level'] == 'admin') { ?>
                                                        <label for="">Status Validasi</label>
                                                        <select class="form-control" name="status_validasi" id="exampleFormControlSelect1">
                                                            <option <?php echo ($dt == '1') ? "selected": "" ?> value="1">Belum Valid</option>
                                                            <option <?php echo ($dt == '2') ? "selected": "" ?> value="2">Sudah Valid</option>
                                                            <option <?php echo ($dt == '3') ? "selected": "" ?> value="3">Sudah Cetak</option>
                                                        </select>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <div class="col-md-12"> -->
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                <?php 
                                                if($_SESSION['level'] == "admin"){ ?>
                                                <a href="peserta.php" type="submit" class="btn btn-warning">Kembali</a>
                                                <?php } elseif ($_SESSION['level'] == "user") { ?>
                                                    <a href="profile.php" type="submit" class="btn btn-warning">Kembali</a>
                                                <?php }?>
                                            <!-- </div> -->
                                            
                                            
                                        </form>
                                    </div>
                            </div>
                            <!-- /# card -->
                        </div>
                        <!-- /# column -->
                    </div>
                    
                    
                    <!-- /# row -->

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
    <?php include('backend/main/footer.php') ?>
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