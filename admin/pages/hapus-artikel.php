<?php
$id = $_GET['id'];

// mengambil url gambar pada tabel konten
$getUrl = getArtikelPerId($id);
while($row=mysqli_fetch_assoc($getUrl)) {
	$urlgambar = $row['gambar'];
}

if(hapusArtikel($id)){
	//jika proses hapus konten berhasil, maka dilanjutkan dengan hapus file gambar dari folder gambar
	$urlgambar = '../gambar/'.basename($urlgambar);
	if(unlink($urlgambar)) {
		echo '<script>window.location="'.$adminurl.'index.php?p=data-artikel"</script>';
	} else {
		echo "Gagal hapus gambar dari folder gambar";
	}
} else {
	echo "Terjadi kesalahan saat menghapus data";
}