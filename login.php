<?php session_start(); ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Focus Admin: Widget</title>

    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">

    <!-- Styles -->
    <link href="assets/css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/lib/themify-icons.css" rel="stylesheet">
    <link href="assets/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/lib/helper.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/dist/sweetalert.css">
    <script src="assets/dist/sweetalert.min.js"></script>
	<script src="assets/dist/sweetalert.js"></script>
</head>

<body id="log">

    <div class="unix-login">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="login-content">
                        <!-- <div class="login-logo">
                           <span>Halaman Login</span>
                        </div> -->
                        
                        <div class="login-form" id="log-form">
                            <h4>Silahkan Login</h4>
                            <form action="auth.php" method="POST">
                                <div class="form-group">
                                    <label>Nik</label>
                                    <input type="text" name="nik" class="form-control" id="loggedin" placeholder="Nik">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control" id="loggedin" placeholder="Password">
                                </div>
                                <!-- <button type="button" class="btn btn-default btn-rounded m-b-10">Default</button> -->
                                    <!-- <input type="submit" name="login" value="Login" class="btn btn-block bg-pink waves-effect"> -->
                                <button type="submit" class="btn btn-primary btn-rounded m-b-30 m-t-30 bg-pink waves-effect">Login</button>
                            
                                <div class="register-link m-t-15 text-center">
                                    <p>Belum punya akun ? <a href="kuning-html/index.php"> Klik daftar</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        if(isset($_GET['error'])){
        $ad = ($_GET['error']);
        if($ad==1){
            echo'
            <script>
            swal("Login Gagal", "username atau password salah", "error");
            </script>';
        }else if ($ad==2) {
            echo'
            <script> 
            swal("Login Gagal", "masukan username dan password", "error");
            </script>';
        }else{
            echo '';
        }
        }
    ?>
</body>

</html>



