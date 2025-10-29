<?php 
    // session_start();
    include ("config/config.php");
    if ($_SESSION['nik'] != true) {
        header ("location:login.php");    
    }
?>
<div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
        <div class="nano">
            <div class="nano-content">
                <ul>
                     <?php 
                        $data = mysqli_query($conn,"SELECT * FROM tbl_peserta WHERE id='$_SESSION[id]'"); 
                        $row = mysqli_fetch_assoc($data);
                    ?>
                       
                    <div class="logo"><a href="dashboard.php">
                        <img class="img-users" src="foto_profile/<?php echo $row['foto_profile']; ?>" ><br>
                        <button class="btn btn-success mt-3"><?php echo $row['nama'] ?></button></a>
                    </div>
                    <li class="label" style="font-size:12px;">SISTEM INFORMASI KARTU KUNING</li>
                    
                    <?php
                        if($_SESSION['level'] == "admin"){ ?>
                            <li><a href="dashboard.php"><i class="ti-home"></i> Dashboard </a></li>
                            <li><a href="peserta.php"><i class="ti-user"></i> Akun User </a></li>
                            <!-- <li><a href="cetak_kartu.php"><i class="ti-layout"></i> Cetak Kartu </a></li> -->
                            
                        <?php } else if($_SESSION['level'] == "user"){ ?>
                            <li><a href="profile.php"><i class="ti-user"></i> Akun Saya </a></li>

                        <?php }
                    ?>
                    
                </ul>
            </div>
        </div>
    </div>
