<?php 
    include ("config/config.php");
    session_start();
    if ($_SESSION['nik'] != true) {
        header ("location:login.php");    
    }
?>


<!DOCTYPE html>
<html lang="en">
    
<!-- head -->
<?php include('backend/main/head.php'); ?>
<!-- head -->

<body>

    <!-- sidebar -->
    <?php 
    include('backend/main/sidebar.php'); 
    ?>
    <!-- sidebar -->

    <!-- header -->
    <?php include('backend/main/header.php'); ?>
    <!-- header -->


    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <!-- navbar -->

                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>Hello, <span>Welcome Here</span></h1>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Home</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>
                <!-- navbar -->
                
                
                <!-- <div class="alert alert-primary alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Hai <?php //echo $_SESSION['username']; ?></strong> Anda telah login sebagai <?php //echo $_SESSION['level']; ?></b>.
                </div> -->
                

                <section id="main-content.php">
                    <!-- content -->
                    <?php include('backend/main/content.php'); ?>
                    
                    <!-- content -->
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
    <?php include('backend/main/footer.php'); ?>
    <?php if(@$_SESSION['success']){ ?>
        <script>
            swal("Selamat", "<?php echo $_SESSION['success']; ?>", "success", "2000");
        </script>
    <!-- unset session agar sweet alert tidak muncul lagi saat di refresh -->
    <?php unset($_SESSION['success']); } ?>
</body>

</html>

