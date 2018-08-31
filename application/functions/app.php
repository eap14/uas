<?php

function TampilkanSemuaKategori() {
	$query = "SELECT * FROM kategori ORDER BY nm_kategori ASC";
	return result($query);
}

function TampilkanArtikelPerId($id) {
	$query = "SELECT a.*, b.nm_kategori, c.username FROM konten a INNER JOIN kategori b ON a.id_kategori = b.id_kategori INNER JOIN users c ON a.id_user = c.id_user WHERE a.id_konten='$id'";
	return result($query);
}

function TampilkanSemuaArtikel() {
	$query = "SELECT * FROM konten ORDER BY id_konten DESC";
	return result($query);
}

function TampilkanSemuaArtikelByKategori($id) {
	$query = "SELECT * FROM konten WHERE id_kategori='$id' ORDER BY id_konten DESC";
	return result($query);
}

function result($query){
	global $link;
	if ($result = mysqli_query($link, $query) or die('gagal menampilkan data')){
		return $result;
	}
}

function run($query){
	global $link;

	if(mysqli_query($link, $query)) return true;
	else return false;
}

function excerpt($string){
	$string = substr($string, 0, 350);
	return $string . "...";
}

function escape($data){
	global $link;
	return mysqli_real_escape_string($link, $data);
}

?>