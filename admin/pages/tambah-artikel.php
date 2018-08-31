<?php
$error = '';
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

    if(!empty(trim($judul)) && !empty(trim($isi))){
        if(tambahArtikel($user_id, $judul, $kategori, $isi, $pindah, $lokbaru)){
            echo '<script>window.location="'.$adminurl.'index.php?p=data-artikel"</script>';
        } else {
            $error = 'ada masalah saat menambah data'.mysqli_error($link);
        }

    }else{
        $error = 'judul dan konten wajib diisi';
    }

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
                <input type="text" class="form-control" id="judul" name="judul">
            </div>

            <div class="form-group">
                <label for="kategori">Kategori:</label>
                <select name="kategori" class="form-control" id="kategori">
                    <option value="" selected="">--Pilih Kategori--</option>
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
                    <input type="file" class="form-control" id="gambar" name="gambar">
                </div>

                <div class="form-group">
                    <label for="isi">Isi:</label>
                    <textarea name="isi" class="form-control" id="isi" placeholder="Isi artikel"></textarea>
                </div>
                <div class="checkbox">
                    <p><?=$error;?></p>
                </div>
                <button type="submit" name="submit" class="btn btn-default">Tambah Artikel</button>
            </form> 

        </div>
    </div>