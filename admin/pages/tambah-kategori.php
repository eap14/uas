<?php
//membuat variabel untuk menyimpan pesan error
$error ='';
if(isset($_POST['submit'])) {
    $kategori = $_POST['kategori'];
    if(!empty($kategori)){
        if(tambahKategori($kategori)){
            echo '<script>window.location="'.$adminurl.'index.php?p=data-kategori"</script>';
        } else {
            $error = 'Terjadi kesalahan saat menambah kategori';
        }
    } else {
        $error = 'Kategori harap diisi!';
    }
}
?>
<div id="page-wrapper">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tambah Kategori</h1>
            </div>
        </div>

        <form class="form-horizontal" action="" method="post">
          <div class="form-group">
            <label class="control-label col-sm-2" for="kategori">Nama Kategori:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="kategori" id="kategori" placeholder="Masukan nama kategori...">
          </div>
      </div>
      <div class="checkbox">
        <p><?=$error;?></p>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" name="submit" class="btn btn-default">Tambah Kategori</button>
        </div>
    </div>
</form> 

</div>
</div>