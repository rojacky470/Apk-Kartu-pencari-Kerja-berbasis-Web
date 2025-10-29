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
                                <h1>Cetak Kartu</h1>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Cetak</a></li>
                                    <li class="breadcrumb-item active">kartu</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>
                <!-- /# row -->
                
                
                <section id="main-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-title mb-2">
                                    <h4>Tabel Cetak Kartu Kuning</h4>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 text-left">
                                        <form action="update_petugas.php" method="POST">
                                        <!-- <form action="" method="POST"> -->
                                           
                                            <?php 
                                                if( !isset($_GET['id']) ){
                                                    header('Location: dashboard.php');
                                                }
                                                $id = $_GET['id'];

                                                
                                                $data = "SELECT * FROM tbl_peserta WHERE id = $id";
                                                
                                                $query = mysqli_query($conn, $data);
                                                $row = mysqli_fetch_array($query);

                                                // jika data yang di-edit tidak ditemukan
                                                if( mysqli_num_rows($query) < 1 ){
                                                    die("data tidak ditemukan...");
                                                }
                                            ?>
                                            <input type="hidden" name="id" id="id" class="form-control input-default" value="<?php echo $row['id']?>" >
                                            <select class="btn btn-cetak" name="id_tanda_tangan" id="id_tanda_tangan">
                                                <option> Pilih </option> 
                                                <?php 
                                                    $data = mysqli_query($conn, "SELECT * FROM tbl_tanda_tangan");
                                                    while ($r=mysqli_fetch_array($data)) {
                                                ?>
                                                    <option value="<?php echo $r['id']; ?>" ><?php echo $r['nama_petugas']; ?></option>
                                                <?php } ?>
                                            </select>
                                            <button 
                                            target="_blank" type="submit" class="btn btn-primary">Cetak</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="bootstrap-data-table-panel mt-3">
                                        <table id="row-select" class="display table table-borderd table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Foto</th>
                                                    <th>Nama</th>
                                                    <th>email</th>
                                                    <th>NIK</th>
                                                    <th>Jenis Kelamin</th>
                                                    
                                                </tr>
                                            </thead>
                                            <?php 
                                                if( !isset($_GET['id']) ){
                                                    header('Location: dashboard.php');
                                                }
                                                $id = $_GET['id'];

                                                
                                                $data = "SELECT * FROM tbl_peserta WHERE id = $id";
                                                
                                                $query = mysqli_query($conn, $data);
                                                $row = mysqli_fetch_assoc($query);

                                                // jika data yang di-edit tidak ditemukan
                                                if( mysqli_num_rows($query) < 1 ){
                                                    die("data tidak ditemukan...");
                                                }
                                            ?>
                                            <tbody>
                                                <tr>
                                                    <td><img class="img-users-view" src="foto_profile/<?php echo $row['foto_profile']; ?>"></td>
                                                   
                                                    <td><?php echo $row['nama']; ?></td>
                                                    <td><?php echo $row['email']; ?></td>
                                                    <td><?php echo $row['nik']; ?></td>
                                                    <td><?php echo $row['jk']; ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    <!-- </div> -->
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
                                <p>2023 © DisnakerKotaCirebon</p>
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

    <script>
        function tombolHapus(id){
            swal({
                title: "Apakah yakin?",
                text: "akan menghapus data ini!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                cancelButtonClass: "btn-danger",
                confirmButtonText: "Ya, Hapus",
                cancelButtonText: "Tidak",
                closeOnConfirm: false,
                closeOnCancel: false
            }, function (isConfirm) {
            if (isConfirm) {
                $.ajax({
                    url: "hapus_peserta.php",
                    type: "POST",
                    data: {
                        id: id
                    },
                    success: function () {
                        swal("Berhasil", "Data sudah dihapus", "success");
                        setTimeout(function(){ window.location.href="peserta.php"; }, 2000);
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        swal("Error deleting!", "Please try again", "error");
                    }
                });
            }else{
                swal("Cancelled", "Di batalkan", "error");
                setTimeout(function(){ window.location.href="peserta.php"; }, 2000);

            }
            });   
        }
    </script>
    
</body>

</html>
<?php if(@$_SESSION['sukses_update']){ ?>
        <script>
            swal("Success", "<?php echo $_SESSION['sukses_update']; ?>", "success", "2000");
            setTimeout(function(){ location.reload(); }, 2000);
        </script>

<?php unset($_SESSION['sukses_update']); } ?>

<?php if(@$_SESSION['sukses_simpan']){ ?>
        <script>
            swal("Success", "<?php echo $_SESSION['sukses_simpan']; ?>", "success", "2000");
            setTimeout(function(){ location.reload(); }, 2000);
        </script>
<?php unset($_SESSION['sukses_simpan']); } ?>
