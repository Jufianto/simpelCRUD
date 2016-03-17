<?php
 require_once "header.php";
 require_once "config.php";
 require_once "class.pegawai.php";
 $peg = new pegawai($conn);
 ?>
<div class="container">
	<div class="row">
		<div class="col-md-10">
			<div class="container">
				<a href="formadd.php" class="btn btn-info"><span class="glyphicon glyphicon-plus"></span>Tambah</a> 
			</div>
			<div class="clearfix"></div><br>
			<table class="table table-bordered table-responsive">
				<tr>
					<th>No</th>
					<th>Id Pegawai</th>
					<th>Nama Pegawai</th>
					<th>Alamat Pegwai</th>
					<th>Tanggal Lahir</th>
					<th colspan="2">Action</th>
				</tr>
				<?php 
				$no =1;
				foreach ($peg->getAllData() as $jf) {
				?>	
				
				<tr>
					<td><?= $no++; ?></td>
					<td><?= $jf->id_peg ?></td>
					<td><?= $jf->nm_peg ?></td>
					<td><?= $jf->alamat ?></td>
					<td><?= $jf->birthdate ?></td>
					<td>Edit</td>
					<td>Delete</td>
				</tr>
				<?php } ?>
			</table>
		</div>
	</div>
</div>

<?php include "footer.php";