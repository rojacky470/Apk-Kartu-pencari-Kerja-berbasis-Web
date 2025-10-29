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
                                <h1>Akun User</h1>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Akun</a></li>
                                    <li class="breadcrumb-item active">user</li>
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
                                <div class="card-title">
                                    <h4>Tabel Akun User</h4>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <form action="" method="GET">                
                                            <input type="text" class="sr-input"  name="kata_cari" placeholder="Cari..." 
                                            value="<?php if(isset($_POST['kata_cari'])) { echo $_POST['kata_cari']; } ?>" />
                                        </form>
                                    </div>
                                    <div class="col-md-8 text-right">
                                        <td>
                                            <a href="form_add_user.php" type="button" class="btn btn-success sm">Tambah</a>
                                            <a href="print.php" target="_blank" type="button" class="btn btn-primary">Print</a>   
                                        </td>
                                        
                                        
                                    </div>
                                </div>
                                <div class="bootstrap-data-table-panel mt-3">
                                    <!-- <div class="table-responsive"> -->
                                    <!-- <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> -->
                                    <!-- <table id="example" class="display" style="width:100%"> -->
                                        <table id="row-select" class="display table table-borderd table-hover">
                                            <thead>
                                                <tr>
                                                    <th style="text-align:center;">Foto</th>
                                                    <th>Nama</th>
                                                    <th>email</th>
                                                    <th style="text-align:center;">NIK</th>
                                                    <th>Jenis Kelamin</th>
                                                    <th style="text-align:left;">Status Data</th>
                                                    <th style="text-align:center;">Aksi</th>
                                                    
                                                </tr>
                                            </thead>
                                            <?php 
                                            if(isset($_GET['kata_cari'])){
                                                $cari = $_GET['kata_cari'];
                                                $data = mysqli_query($conn,"SELECT * FROM tbl_peserta WHERE nama like '%".$cari."%' 
                                                OR nik like '%".$cari."%' AND level NOT IN('user') like '%".$cari."%' ");             
                                            }else{
                                                $data = mysqli_query($conn,"SELECT * FROM tbl_peserta limit 10");       
                                            }
                                            $no = 1;
                                            while($row = mysqli_fetch_array($data)){
                                            ?>
                                            <tbody>
                                                <tr>
                                                    <td><img class="img-users-view" src="foto_profile/<?php echo $row['foto_profile']; ?>"></td>
                                                    <td><?php echo $row['nama']; ?></td>
                                                    <td><?php echo $row['email']; ?></td>
                                                    <td><?php echo $row['nik']; ?></td>
                                                    <td><?php echo $row['jk']; ?></td>
                                                    <?php if ($row['status_validasi'] == 1) { ?>
                                                        <td><span class="badge badge-danger pull-center m-t-6">Belum Valid</span></td>
                                                    <?php } else if ($row['status_validasi'] == 2) { ?>
                                                        <td><span class="badge badge-info pull-center m-t-6">Sudah Valid</span></td>
                                                    <?php } else if($row['status_validasi'] == 3) { ?> 
                                                        <td><span class="badge badge-success pull-center m-t-6">Sudah Cetak Kartu</span></td>

                                                    <?php } ?>
                                                    
                                                    <td>
                                                        <a class="btn btn-secondary" href="cetak_kartu.php?id=<?php echo $row['id']; ?>" 
                                                        title="Cetak"><i class="fa fa-print"></i></a>
                                                        <!-- <a class="btn btn-warning" href="detail.php?id=<?php //echo $row['id']; ?>" 
                                                        title="Detail"><i class="fa fa-eye"></i></a> -->
                                                        <a class="btn btn-info" href="form_edit_user.php?id=<?php echo $row['id']; ?>" 
                                                        title="Edit"><i class="fa fa-edit"></i></a>
                                                        <button class="btn btn-danger" onclick="tombolHapus(<?php echo $row['id']; ?>)"
                                                title="Delete"><i class="fa fa-trash"></i></button>
                                                        
                                                    </td>
                                                </tr>
                                                <?php } ?>
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

<!-- alert cetak error  krn sudah pernah cetak-->
<?php if(@$_SESSION['sudah_cetak']){ ?>
    <script>
        swal("Error", "<?php echo $_SESSION['sudah_cetak']; ?>", "error", "2000");
    </script>
<?php unset($_SESSION['sudah_cetak']); } ?>

<!-- alert lert cetak error  krn data belum lengkap -->
<?php if(@$_SESSION['belum_lengkap']){ ?>
    <script>
        swal("Error", "<?php echo $_SESSION['belum_lengkap']; ?>", "error", "2000");
    </script>
<?php unset($_SESSION['belum_lengkap']); } ?>
