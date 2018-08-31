<?php
$error ='';
$id = $_GET['id'];
if(isset($_POST['submit'])) {
    $kategori = $_POST['kategori'];
    if(!empty($kategori)){
        if(updateKategori($id, $kategori)){
            echo '<script>window.location="'.$adminurl.'index.php?p=data-kategori"</script>';
        } else {
            $error = 'Terjadi kesalahan saat menambah kategori';
        }
    } else {
        $error = 'Kategori harap diisi!';
    }
}

$getKategori = getKategoriPerId($id);
while($row=mysqli_fetch_assoc($getKategori)){
    $gk_nm_kategori = $row['nm_kategori'];
}

?>
<div id="page-wrapper">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Edit Kategori</h1>
            </div>
        </div>

        <form class="form-horizontal" action="" method="post">
          <div class="form-group">
            <label for="kategori">Nama Kategori:</label>
            <input type="text" class="form-control" name="kategori" id="kategori" value="<?=$gk_nm_kategori;?>" placeholder="Masukan nama kategori...">
        </div>
        <div class="checkbox">
            <p><?=$error;?></p>
        </div>
        <div class="form-group">
            <button type="submit" name="submit" class="btn btn-default">Update Kategori</button>
        </div>
    </form> 

</div>
</div>