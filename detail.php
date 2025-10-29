<?php 
    session_start();
    include('config/config.php'); 
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
                <h1>Detil User</h1>
              </div>
            </div>
          </div>
          <!-- /# column -->
          <div class="col-lg-4 p-l-0 title-margin-left">
            <div class="page-header">
              <div class="page-title">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                    <a href="#">Detil</a>
                  </li>
                  <li class="breadcrumb-item active">user</li>
                </ol>
              </div>
            </div>
          </div>
          <!-- /# column -->
        </div>
        <!-- /# row -->
        <?php
            include ("config/config.php");
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
            <div class="col-md-4">
                <div class="card"> 
                    <div class="card-body box-profile mt-2" >
                        <div class="text-center">
                            <img class="img-users" src="foto_profile/<?php echo $row['foto_profile']; ?>">
                        </div>
                        <div class="text-center mt-2">
                            <h3><?php echo $row['nama']; ?></h3>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-6">
                            <ul class="list-unstyled list-justify"> 
                                <h6>No. Daftar</h6> 
                            </ul>
                        </div>
                        <div class="col-6 text-right">
                            <h6><?php echo $row['no_pendaftaran']; ?></h6>
                        </div>
                        <div class="col-6">
                            <ul class="list-unstyled list-justify"> 
                                <h6>Status</h6> 
                            </ul>
                        </div>
                        <div class="col-6 text-right">
                            <span><?php echo $row['status_kawin']; ?></span>
                        </div>
                    </div>
                      <div class="row mt-2">
                        
                        <?php 
                            $k = $row['status_validasi'];
                            if ($k == 2) {
                              echo '
                              <div class="col-12">
                                <a href="hal.php" class="btn btn-success w-100"><i class="fa fa-thumbs-up"></i> Selamat silahkan cetak kartu</a>
                              </div>';
                            }else if($k == 1){
                              echo'<div class="col-12">
                                <span class="btn btn-info w-100"><i class="fa fa-thumbs-down"></i> Silahkan lengkapi data anda</span>
                              </div>';
                              
                            }
                        ?> 
                        
                        
                      </div>
                    
                </div>
            </div>
            <div class="col-lg-8">
              <div class="card">
                <div class="card-body">
                  <div class="user-profile">
                    
                    <div class="user-profile-name">
                          <?php 
                            $p = $row['status_validasi'];
                            if ($_SESSION['level'] == "user") { ?>
                                <?php if($p == 2) { ?>
                                  <td>
                                      <a href="javascript:void(0)" onclick="cetak(<?php echo $row['id']; ?>)" class="btn btn-secondary btn-sm text-right"><i class="fa fa-print"></i><span> Cetak</span></a>
                                  </td>
                                  <td>
                                      <a href="form_edit_user.php?id=<?php echo $row['id']; ?>" class="btn btn-info btn-sm text-right"><i class="fa fa-edit"></i><span> Edit</span></a>
                                  </td>
                                <?php }else if($p == 1) { ?>
                                  <td>
                                      <a href="form_edit_peserta.php" class="btn btn-secondary btn-sm text-right"><i class="fa fa-edit"></i><span> Lengkapi</span></a>
                                  </td>
                                <?php } ?>
                          <?php } ?>
                    </div><hr>
                    <div class="row">
                      <div class="col-lg-8">
                        <div class="user-profile-name"><?php echo $row['nama']; ?></div>
                        <div class="user-Location">
                          <i class="ti-location-pin"></i> <?php echo $row['alamat']; ?></div>
                        <!-- <div class="user-job-title">buat pekerjaan</div> -->
                        <div class="custom-tab user-profile-tab">
                          <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="1">
                              <div class="contact-information">
                                <div class="birthday-content">
                                  <span class="contact-title">Lahir:</span>
                                  <span class="birth-date"><span>: </span><?php echo $row['tgl_lahir']; ?> </span>
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
                                  <span class="contact-title">Email:</span>
                                  <span class="contact-email"><span>: </span><?php echo $row['email']; ?></span>
                                </div>
                                <div class="gender-content">
                                  <span class="contact-title">Jenis Kelamin:</span>
                                  <span class="gender"><span>: </span><?php echo $row['jk']; ?></span>
                                </div>
                              </div>
                            </div>
                          </div>
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
    

</body>

</html>