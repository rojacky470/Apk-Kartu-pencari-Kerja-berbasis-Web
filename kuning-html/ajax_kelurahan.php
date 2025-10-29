<?php 
include("../config/config.php");
$kecamatan = $_POST['id'];
$tampil=mysqli_query($conn,"SELECT * FROM tbl_kel WHERE id_kec='$kecamatan'");
$jml=mysqli_num_rows($tampil);
 
if($jml > 0){    
    while($r=mysqli_fetch_array($tampil)){
        ?>
        <option value="<?php echo $r['id'] ?>"><?php echo $r['nm_kel'] ?></option>
        <?php        
    }
}else{
    echo "<option selected>- Data Wilayah Tidak Ada, Pilih Yang Lain -</option>";
}
 
?>