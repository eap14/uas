<?php
$error = '';
$id = $_GET['id'];
if(isset($_POST['submit'])){
    $user_id  = $_POST['user_id'];
    $judul    = $_POST['judul'];
    $kategori = $_POST['kategori'];
    $isi      = $_POST['isi'];
    $namafile = $_FILES['gambar']['name'];
    $pindah   = $_FILES['gambar']['tmp_name'];
    $folder   = "../gambar/";
    $lokbaru  = $folder.basename($namafile);
    $gagal    = $_FILES['gambar']['error'];
    $url      = $_POST['url'];
    if(!empty(trim($judul)) && !empty(trim($isi))){
        if(updateArtikel($id, $judul, $kategori, $isi, $pindah, $lokbaru, $url)){
             echo '<script>window.location="'.$adminurl.'index.php?p=data-artikel"</script>';
            echo mysqli_error($link);
        } else {
            $error = 'ada masalah saat menambah data'.mysqli_error($link);
        }
 
    }else{
        $error = 'judul dan konten wajib diisi';
    }
 
}
 
// mengambil data artikel berdasarkan ID
$dataArtikelPerId = getArtikelPerId($id);
while($row=mysqli_fetch_assoc($dataArtikelPerId)){
    $da_judul = $row['judul'];
    $da_id_kategori = $row['id_kategori'];
    $da_nm_kategori = $row['nm_kategori'];
    $da_gambar = $row['gambar'];
    $da_isi = $row['isi'];
}
?>
 
<div id="page-wrapper">
    <div class="container-fluid">
 
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tambah Artikel</h1>
            </div>
        </div>
 
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="user_id" value="<?=$userdata['id_user'];?>">
            <div class="form-group">
                <label for="judul">Judul Artikel:</label>
                <input type="text" class="form-control" id="judul" name="judul" value="<?=$da_judul;?>">
            </div>
 
            <div class="form-group">
                <label for="kategori">Kategori:</label>
                <select name="kategori" class="form-control" id="kategori">
                    <option value="<?=$da_id_kategori;?>" selected=""><?=$da_nm_kategori;?></option>
                    <?php
                    $datakategori = TampilkanSemuaKategori();
                    while($row=mysqli_fetch_assoc($datakategori)) {
                        ?>
                        <option value="<?=$row['id_kategori'];?>"><?=$row['nm_kategori'];?></option>
                        <?php } ?>
                    </select>
                </div>
 
                <div class="form-group">
                    <label for="gambar">Gambar:</label>
                    <br><img width="200px" height="200px" src="<?=$da_gambar;?>">
                    <input type="file" class="form-control" id="gambar" name="gambar">
                    <input type="hidden" name="url" value="<?=$da_gambar;?>">
                </div>
 
                <div class="form-group">
                    <label for="isi">Isi:</label>
                    <textarea name="isi" class="form-control" id="isi" placeholder="Isi artikel"><?=$da_isi;?></textarea>
                </div>
                <div class="checkbox">
                    <p><?=$error;?></p>
                </div>
                <button type="submit" name="submit" class="btn btn-default">Edit Artikel</button>
            </form>
 
        </div>
    </div>