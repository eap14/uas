<?php

?>
<div id="page-wrapper">
	<div class="container-fluid">

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Data Kategori</h1>
			</div>
		</div>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>#</th>
					<th>Kategori</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$urutan 	  = 1;
				$dataKategori = getAllKategori();
				while($row=mysqli_fetch_assoc($dataKategori)){
				?>
				<tr>
					<td><?=$urutan++;?></td>
					<td><?=$row['nm_kategori'];?></td>
					<td> <a href="<?=$adminurl;?>index.php?p=hapus-kategori&id=<?=$row['id_kategori'];?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a> <a href="<?=$adminurl;?>index.php?p=edit-kategori&id=<?=$row['id_kategori'];?>" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span></a></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>