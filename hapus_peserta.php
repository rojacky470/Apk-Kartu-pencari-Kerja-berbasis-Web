<?php
    include ('config/config.php');

    $ids = $_POST['id'];
    $delete = "DELETE from tbl_peserta WHERE id=$ids";
    $query = $conn->query($delete) or die('Gagal hapus');
?>