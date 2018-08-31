<?php
$id = $_GET['id'];

if(hapusKategori($id)){
	echo '<script>window.location="'.$adminurl.'index.php?p=data-kategori"</script>';
} else {
	echo "Terjadi kesalahan saat menghapus data";
}