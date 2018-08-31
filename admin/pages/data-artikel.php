<?php

?>
<div id="page-wrapper">
	<div class="container-fluid">

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Data Artikel</h1>
			</div>
		</div>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>#</th>
					<th>Judul</th>
					<th>Kategori</th>
					<th>Tanggal</th>
					<th>Author</th>
					<th>Gambar</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$urutan 	 = 1;
				$dataArtikel = getAllArtikel();
				while($row=mysqli_fetch_assoc($dataArtikel)){
				?>
				<tr>
					<td><?=$urutan++;?></td>
					<td><?=$row['judul'];?></td>
					<td><?=$row['nm_kategori'];?></td>
					<td><?=$row['date'];?></td>
					<td><?=$row['username'];?></td>
					<td><img height="100px" width="100px" src="<?=$row['gambar'];?>"></td>
					<td> <a href="<?=$adminurl;?>index.php?p=hapus-artikel&id=<?=$row['id_konten'];?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a> <a href="<?=$adminurl;?>index.php?p=edit-artikel&id=<?=$row['id_konten'];?>" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span></a></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>