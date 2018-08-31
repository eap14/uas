<?php
function getAllKategori() {
	$query = "SELECT * FROM kategori ORDER BY nm_kategori ASC";
	return result($query);
}

function getKategoriPerId($id) {
	$query = "SELECT * FROM kategori WHERE id_kategori='$id'";
	return result($query);
}

function tambahKategori($kategori){
	$query = "INSERT INTO kategori(nm_kategori) VALUES('$kategori')";
	return run($query);
}

function hapusKategori($id){
	$query = "DELETE FROM kategori WHERE id_kategori='$id'";
	return run($query);
}

function updateKategori($id, $kategori){
	$query = "UPDATE kategori SET nm_kategori='$kategori' WHERE id_kategori='$id'";
	return run($query);
}

function cek_data($nama, $pass){
	$nama = escape($nama);
	$pass = escape($pass);
	// $pass = md5($pass);
	$query = "SELECT * FROM users WHERE username='$nama' AND password='$pass'";
	global $link;

	if($result = mysqli_query($link, $query)){
		if(mysqli_num_rows($result) != 0) return true;
		else return false;
	}
}

function getUserData($username) {
	$username = escape($username);
	$query = "SELECT * FROM users WHERE username='$username'";
	return result($query);
}

//function untuk menambahkan artikel kedalam database
function tambahArtikel($user_id, $judul, $kategori, $isi, $file, $tempat){
	//move_uploaded_file berguna untuk mengupload gambar dari form kedalam folder gambar
	move_uploaded_file($file,$tempat);
	//str_replace berguna untuk mengganti nama ../ menjadi url web kita
	$tempat = str_replace('../', 'http://localhost/websaya/', $tempat);
	$judul  = escape($judul);
	$isi = escape($isi);
	$query  = "INSERT INTO konten (id_user, id_kategori, judul, gambar, isi) VALUES ('$user_id', '$kategori', '$judul', '$tempat', '$isi')";
	return run($query);
}


//function untuk memperbarui artikel database
function updateArtikel($id_konten, $judul, $kategori, $isi, $file, $tempat, $url){
	//jika file kosong maka akan dilakukan upload file
	if(!empty($file)){
		move_uploaded_file($file,$tempat);
		$tempat = str_replace('../', 'http://localhost/websaya/', $tempat);
	} else {
		//jika file gambar masih ada, maka value variabel $tempat sama dengan value dari variabel $url
		$tempat = $url;
	}
	$judul  = escape($judul);
	$isi = escape($isi);
	$query  = "UPDATE konten SET id_kategori='$kategori' , judul='$judul', gambar='$tempat', isi='$isi' WHERE id_konten='$id_konten'";
	return run($query);
}

//menampilkan artikel berdasarkan idnya
function getArtikelPerId($id){
	$query = "SELECT * FROM konten a INNER JOIN kategori b ON a.id_kategori = b.id_kategori WHERE a.id_konten = '$id'";
	return result($query);
}


//menampilkan semua artikel
function getAllArtikel(){
	$query = "SELECT * FROM konten a INNER JOIN users b ON a.id_user = b.id_user INNER JOIN kategori c ON a.id_kategori = c.id_kategori ORDER BY a.date DESC";
	return result($query);
}

//menghapus artikel
function hapusArtikel($id) {
	$query = "DELETE FROM konten WHERE id_konten='$id'";
	return run($query);
}