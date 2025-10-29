<?php

$serverName = "localhost";
$username   = "root";
$pass       = "";
$db         = "kartu_kuning";

$conn = mysqli_connect($serverName, $username, $pass, $db );

if (!$conn) {
    echo "Koneksi gagal: " . mysqli_connect_error();
}
mysqli_select_db($conn,"kartu_kuning");
// else {

//     echo "Koneksi berhasil";
// }
?>