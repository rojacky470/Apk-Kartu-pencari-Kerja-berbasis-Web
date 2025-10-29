<?php
    session_start();
    include 'config/config.php';
    //ini adalah untuk menghilangkan error undefined index
    // $id = isset($_POST['id']) ? $_POST['id']:'';
    $id = $_POST['id'];
    $id_tanda_tangan = $_POST['id_tanda_tangan'];
    // $status_validasi = $_POST['status_validasi'];

    $update = $conn->query("UPDATE tbl_peserta SET id_tanda_tangan='$id_tanda_tangan', status_validasi='3' WHERE id=$id");
    header( "Location: cetak.php?id={$id}" );

    
    
    

?>