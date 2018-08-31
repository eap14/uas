<?php
	// Menghilangkan warning error
	error_reporting(0);
	// Masukkan koneksi
	
	// Ambil data id artikel
	$id  = $_GET['detail'];
	// Query untuk mengambil data komentar sesuai id artikel
	$sql = "SELECT * FROM konten WHERE id_konten = '$id' ";
	$que = mysqli_query($sql);
	// Tampilkan komentar
	while ($res = mysqli_fetch_array($que)) { ?>
	
	<p><?php echo $res['nama']; ?></p>
	<p><?php echo $res['email']; ?></p>
	<p><?php echo $res['tanggal']; ?></p>
	<p><?php echo $res['isi_komentar']; ?></p>

<?php } ?>
<br>
<br>
<br>
<form method="post">
	<input type="text" name="nama" placeholder="Masukkan Nama"> <br>
	<input type="text" name="email" placeholder="Masukkan Email"> <br>
	<textarea name="isi" rows="10" placeholder="Masukkan Isi Komentar Anda"></textarea> <br>
	<input type="submit" name="btnkomen">
</form>
<?php
	// Jika tombol submit di klik
	if (isset($_POST['btnkomen'])) {
		// Ambil data nama dari input yang ber-name 'nama'
		$nama = $_POST['nama'];
		$email = $_POST['email'];
		// Ambil data isi dari yang ber-name 'isi'
		$isi  = $_POST['isi'];
		// Tanggal sekarang (Sesuai tanggal di komputer)
		$tgl  = date("d-m-Y");
		// Simpan data ke database
		$sql  = "INSERT INTO komentar VALUES ('', '$id', '$nama', '$email', '$tgl', '$isi')";
		$que  = mysql_query($sql);
		// Tampilkan pemberitahuan
		echo "Sukses";
		// Refresh halaman dengan durasi 1 detik
		echo "<meta http-equiv='refresh' content='1;url=detail.php?detail=".$id."'>";
	}
?>