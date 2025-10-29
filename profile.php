<?php 
    session_start();
    include ('config/config.php'); 
?>
<!DOCTYPE html>
<html lang="en">

<?php include('backend/main/head.php'); ?>

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
                <h1>Akun Saya</h1>
              </div>
            </div>
          </div>
          <!-- /# column -->
          <div class="col-lg-4 p-l-0 title-margin-left">
            <div class="page-header">
              <div class="page-title">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                    <a href="#">Akun</a>
                  </li>
                  <li class="breadcrumb-item active">akun</li>
                </ol>
              </div>
            </div>
          </div>
          <!-- /# column -->
        </div>
        <!-- /# row -->
       
        <section id="main-content">
        <div class="row mt-2">        
          <?php 
              $k = $row['status_validasi'];
              if ($k == 2) {
                echo '
                <div class="col-12">
                  <div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <strong>Selamat...!</strong> Data anda sudah valid, silahkan membawa berkas ke disnaker kota cirebon.
                  </div>
                </div>';
              }else if($k == 1){
                echo'
                <div class="col-12">
                  <div class="alert alert-danger alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <strong>Peringatan..!</strong> Mohon lengkapi data anda dengan klik selengkapnya.
                  </div>
                </div>';
                
              }
          ?> 
        </div>
        <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                  <div class="col-md-12 text-right">
                  <?php 
                    if ($_SESSION['level'] == "user") { ?>
                          <td>
                              <a href="form_edit_user.php?id=<?php echo $row['id']; ?>" class="btn btn-info btn-sm text-right"><i class="fa fa-edit"></i><span> Selengkapnya</span></a>
                              <!-- <a href="cetak_profile.php"> Print Profile</a> -->
                            </td>
                          <td>
                              <a href="cetak_profile.php" target="_blank" class="btn btn-secondary btn-sm text-right"><i class="fa fa-print"></i><span> Cetak Data</span></a>
                          </td>
                  <?php } ?>
                  </div>
                    
                  <div class="row">
                    <div class="col-md-2">
                      <div class="text-center">
                          <img class="img-users" src="foto_profile/<?php echo $row['foto_profile']; ?>">
                      </div>
                    </div>
                    <div class="col-md-10">
                        <div class="text-left">
                            <h2 style="font-weight:bold; font-size=30px;"><?php echo $row['nama']; ?></h2>
                        </div>
                        <div class="text-left">
                            <p><?php echo $row['alamat']; ?></p>
                        </div>
                        <div class="text-left mb-10">
                            <p><?php echo $row['email']; ?></p>
                        </div>
                    </div>

                  </div><hr>
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="custom-tab user-profile-tab">
                        <div class="tab-content">
                          <div role="tabpanel" class="tab-pane active" id="1">
                            <div class="contact-information">
                              <div class="birthday-content">
                                <span class="contact-title">Nomor Pendaftaran:</span>
                                <span class="birth-date"><span>: </span><?php echo $row['no_pendaftaran']; ?> </span>
                              </div>
                              <div class="birthday-content">
                                <span class="contact-title">Nomor KTP:</span>
                                <span class="birth-date"><span>: </span><?php echo $row['nik']; ?> </span>
                              </div>
                              <div class="birthday-content">
                                <span class="contact-title">Tempat & Tanggal, Lahir:</span>
                                <span class="birth-date"><span>: </span><?php echo $row['tempat_lahir']; ?>, <?php echo date('d F Y', strtotime($row['tgl_lahir']));   ?> </span>
                              </div>
                              <div class="phone-content">
                                <span class="contact-title">No.Telepon</span>
                                <span class="phone-number"><span>: </span><?php echo $row['no_telpon']; ?></span>
                              </div>
                              <div class="address-content">
                                <span class="contact-title">Address</span>
                                <span class="mail-address"><span>: </span><?php echo $row['alamat']; ?></span>
                              </div>
                              <div class="email-content">
                                <span class="contact-title">Email</span>
                                <span class="contact-email"><span>: </span><?php echo $row['email']; ?></span>
                              </div>
                              <div class="gender-content">
                                <span class="contact-title">Jenis Kelamin</span>
                                <span class="gender"><span>: </span><?php echo $row['jk']; ?></span>
                              </div>
                              <div class="gender-content">
                                <span class="contact-title">Agama</span>
                                <span class="gender"><span>: </span><?php echo $row['agama']; ?></span>
                              </div>
                              <div class="gender-content">
                                <span class="contact-title">Pendidikan</span>
                                <span class="gender"><span>: </span><?php echo $row['pendidikan']; ?></span>
                              </div>
                              <div class="gender-content">
                                <span class="contact-title">Jurusan</span>
                                <span class="gender"><span>: </span><?php echo $row['jurusan']; ?></span>
                              </div>
                              <div class="gender-content">
                                <span class="contact-title">Status Pernikahan</span>
                                <span class="gender"><span>: </span><?php echo $row['status_kawin']; ?></span>
                              </div>
                            </div>
                          </div>
                      <!-- <div class="tab-content"> -->
                      <!-- </div> -->
                        </div>
                      </div>
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <div class="row">
            <div class="col-lg-12">
              <div class="footer">
              <p>2023 © DisnakerKotaCirebon</p>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
  <?php include('backend/main/footer.php') ?>
  <?php if(@$_SESSION['sukses_update']){ ?>
    <script>
        swal("Success", "<?php echo $_SESSION['sukses_update']; ?>", "success", "2000");
        setTimeout(function(){ location.reload(); }, 2000);
    </script>
  <?php unset($_SESSION['sukses_update']); } ?>
</body>

</html>
