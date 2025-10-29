<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Document peserta @disnakerkotacirebon</title>
</head>
<body>

 <table id="row-select" class="display table table-borderd table-hover">
<thead>
<?php 
	include 'config/config.php';
	?>
 <table border="1">
        <thead>
       <tr>
                 <th>Nama</th>
                 <th>email</th>
                 <th>NIK</th>
                 <th>Jenis Kelamin</th>
                 </tr>
</thead>

<?php 
$query = mysqli_query($conn, "SELECT * FROM tbl_peserta");
while($row=mysqli_fetch_array($query)){
?>
<tbody>
<tr>
<td><?php echo $row['nama']; ?></td>
<td><?php echo $row['email']; ?></td>
<td><?php echo $row['nik']; ?></td>
 <td><?php echo $row['jk']; ?></td>
</td>
            </tr>
        </tbody>
            <?php 
        }
        ?>
    </table>
 
	<script>
		window.print();
	</script>
</body>
</html> 