<?php
    session_start();
    include 'config/config.php';

    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $nik = $_POST['nik'];
    $jk = $_POST['jk'];
    $no_pendaftaran = $_POST['no_pendaftaran'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $no_telpon = $_POST['no_telpon'];
    $alamat = $_POST['alamat'];
    $kec = $_POST['kecamatan'];
    $kel = $_POST['kelurahan'];
    $agama = $_POST['agama'];
    $status_kawin = $_POST['status_kawin'];
    $status_validasi = $_POST['status_validasi'];
    // $id_tanda_tangan = $_POST['id_tanda_tangan'];


    $path_profile = @$_FILES['foto_profile']['tmp_name'];
    $target_profile = 'foto_profile/';
    $nama_file_profile = @$_FILES['foto_profile']['name'];
    $pindah = move_uploaded_file($path_profile, $target_profile.$nama_file_profile);

    $path_ktp = $_FILES['foto_ktp']['tmp_name'];
    $target_ktp = 'foto_ktp/';
    $nama_file_ktp = $_FILES['foto_ktp']['name'];
    $pindah = move_uploaded_file($path_ktp, $target_ktp.$nama_file_ktp);

    $path_ijazah = $_FILES['foto_ijazah']['tmp_name'];
    $target_ijazah = 'foto_ijazah/';
    $nama_file_ijazah = $_FILES['foto_ijazah']['name'];
    $pindah = move_uploaded_file($path_ijazah, $target_ijazah.$nama_file_ijazah);

    if(!empty($path_profile) && !empty($path_ktp) && !empty($path_ijazah)){

        $id = $_POST['id'];
        $edit = "SELECT * FROM tbl_peserta WHERE id = $id";
        // print_r($edit);
        
        $query = mysqli_query($conn, $edit);
        $row = mysqli_fetch_assoc($query);
        
        $profile= $row['foto_profile'];
            if (file_exists("foto_profile/".$profile)){
            unlink("foto_profile/".$profile);
            // var_dump(unlink("foto_profile/$foto"));die();
        }

        $ktp= $row['foto_ktp'];
            if (file_exists("foto_ktp/".$ktp)){
            unlink("foto_ktp/".$ktp);
        }

        $ijazah = $row['foto_ijazah'];
            if (file_exists("foto_ijazah/".$ijazah)){
            unlink("foto_ijazah/".$ijazah);
        }

            $update = $conn->query("UPDATE tbl_peserta SET nama='$nama', email='$email', nik='$nik', jk='$jk', 
                      no_pendaftaran='$no_pendaftaran', tgl_lahir='$tgl_lahir', no_telpon='$no_telpon', alamat='$alamat', kecamatan='$kec', kelurahan='$kel', agama='$agama', status_kawin='$status_kawin', 
                      status_validasi='$status_validasi', foto_profile='$nama_file_profile', 
                      foto_ktp='$nama_file_ktp', foto_ijazah='$nama_file_ijazah' WHERE id=$id");

            $_SESSION["sukses_update"] = 'Data berhasil diupdate';
            
            if ($_SESSION['level'] == 'admin') {
                header  ("location:peserta.php");
            }else if($_SESSION['level'] == 'user'){
                header  ("location:profile.php");
            }
                

    }else if(empty($path_profile)){
        $update = $conn->query("UPDATE tbl_peserta SET nama='$nama', email='$email', nik='$nik', jk='$jk', 
                  no_pendaftaran='$no_pendaftaran', tgl_lahir='$tgl_lahir', no_telpon='$no_telpon', alamat='$alamat', kecamatan='$kec', kelurahan='$kel', agama='$agama', status_kawin='$status_kawin', 
                  status_validasi='$status_validasi' WHERE id=$id");

        $_SESSION["sukses_update"] = 'Data berhasil diupdate';
        if ($_SESSION['level'] == 'admin') {
            header  ("location:peserta.php");
        }else if($_SESSION['level'] == 'user'){
            header  ("location:profile.php");
        }
    }
    // else{
    //     $update = $conn->query("UPDATE tbl_peserta SET nama='$nama', email='$email', nik='$nik', jk='$jk', 
    //               no_pendaftaran='$no_pendaftaran', tgl_lahir='$tgl_lahir', no_telpon='$no_telpon', alamat='$alamat', agama='$agama', status_kawin='$status_kawin', 
    //               status_validasi='$status_validasi', $id_tanda_tangan = 'id_tanda_tangan' WHERE id=$id");

    //     $_SESSION["sukses_update"] = 'Data berhasil diupdate';
    //     if ($_SESSION['level'] == 'admin') {
    //         header  ("location:peserta.php");
    //     }
    // }

    

    
 
?>