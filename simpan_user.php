
<?php
    include 'config/config.php';
    //proses penyimpanan foto profile/foto_profile
    // if (isset ($_POST['simpan'])){
    $nama_file = $_FILES['foto_profile']['name'];
    $ukuran_file = $_FILES['foto_profile']['size'];
    $tipe_file = $_FILES['foto_profile']['type'];
    $tmp_file = $_FILES['foto_profile']['tmp_name'];
    
    $file_ktp = $_FILES['foto_ktp']['name'];
    $ukuran_file = $_FILES['foto_ktp']['size'];
    $tipe_file = $_FILES['foto_ktp']['type'];
    $tmp_file_ktp = $_FILES['foto_ktp']['tmp_name'];
    $path_ktp = "foto_ktp/".$file_ktp;
    $move = move_uploaded_file($tmp_file_ktp, $path_ktp);

    $file_ijazah = $_FILES['foto_ijazah']['name'];
    $ukuran_file = $_FILES['foto_ijazah']['size'];
    $tipe_file = $_FILES['foto_ijazah']['type'];
    $path_ijazah = "foto_ijazah/".$file_ijazah;
    $tmp_file_ijazah = $_FILES['foto_ijazah']['tmp_name'];
    $pindah = move_uploaded_file($tmp_file_ijazah, $path_ijazah);


    $path = "foto_profile/".$nama_file;

    if($tipe_file == "image/jpeg" || $tipe_file == "image/png"){ 
        if($ukuran_file <= 1000000){ 
            //memindahkan lokasi gambar dari tempat asal ke dalam folder website(pasfoto)
            //memiliki 2 parameter yang harus diisi, yaitu parameter tempat asal gambar dan paramter tempat tujuan gambar
            if(move_uploaded_file($tmp_file, $path)){ 

      $nama = $_POST['nama'];
      $nik = $_POST['nik'];
      $alamat = $_POST['alamat'];
      $kec = $_POST['kecamatan'];
      $kel = $_POST['kelurahan'];
      $pw = ($_POST['password']);
      $pw = md5($pw);
      $email = $_POST['email'];
      $jk = $_POST['jk'];
      $no_pendaftaran = $_POST['no_pendaftaran'];
      $tempat_lahir = $_POST['tempat_lahir'];
      $t_lahir = $_POST['tgl_lahir'];
      $no_tlp = $_POST['no_telpon'];
      $status = $_POST['status_kawin'];
      $pendidikan = $_POST['pendidikan'];
      $jurusan = $_POST['jurusan'];
      $agama = $_POST['agama'];
      //$foto = $_POST['foto_profile'];

      $q = $conn->query("INSERT INTO tbl_peserta (nama, nik, alamat, kecamatan, kelurahan, password, email, jk, no_pendaftaran, tgl_lahir,
      tempat_lahir, no_telpon, status_kawin, pendidikan, jurusan, agama, foto_profile, foto_ktp, foto_ijazah, status_validasi, level ) 
      VALUES ('$nama', '$nik', '$alamat', '$kec', '$kel',  '$pw', '$email', '$jk', '$no_pendaftaran', '$tempat_lahir', '$t_lahir', '$no_tlp', '$status', '$pendidikan', '$jurusan', '$agama', '$nama_file', '$file_ktp', '$file_ijazah', '1', 'user')");
    
    
      
      if ($q) {
      $_SESSION["sukses_simpan"] = 'Simpan Data Berhasil';
      header("location:peserta.php");
        // pesan jika data tersimpan
       // echo "<script>alert('Tambah User Berhasil'); window.location.href='peserta.php'</script>";
      } else {
        // pesan jika data gagal disimpan
        echo "<script>alert('Registrasi Gagal'); window.location.href='peserta.php'</script>";
      }
    }
 } else{
        //jika ukuran gambar lebih besar dari 1MB maka akan memunculkan pesan seperti di bawah ini
        echo "<script>alert('Maaf, Ukuran gambar yang diupload tidak boleh lebih dari 1MB'); window.location.href='index.php'</script>";
      }
    }else{
      //jika tipe gambar yang diupload bukan jpg atau png maka akan memunculkan pesan seperti di bawah ini
      echo "<script>alert('Maaf, Tipe gambar yang diupload harus JPG / JPEG / PNG.'); window.location.href='index.php'</script>";
    }?>
      <?php
//}
    //}
    ?>
     