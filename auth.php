<?php 
session_start();
include ("config/config.php"); 

$username = $_POST['nik'];
$password = $_POST['password'];
$id       = $_POST['id'];

$login = mysqli_query($conn,"SELECT * FROM tbl_peserta where nik='$username' OR password='$password' AND id='$id' ");
$cekLogin = mysqli_num_rows($login);
// var_dump($data);
if ($cekLogin > 0){
    $data = mysqli_fetch_assoc($login);

    if ($data['level'] == "admin") {

      $_SESSION['nik'] = $username;
      $_SESSION['id'] = $data['id'];
      $hak = $_SESSION['level'] = "admin";
      header("location:dashboard.php");
      $_SESSION["success"] = "Anda berhasil login sebagai $hak ";


    }else if($data['level'] == "user"){
      $_SESSION['nik'] = $username;
      $_SESSION['id'] = $data['id'];
      $hak = $_SESSION['level'] = "user";
      header("location:profile.php");
      $_SESSION["success"] = "Anda berhasil login sebagai $hak";

    }else{
        
        header("location:login.php");
    }
}else if($username =='' || $password ==''){
  header('location:login.php?error=2');
}else{
  header('location:login.php?error=1');

}


?>