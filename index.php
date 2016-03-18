<?php
 require_once "header.php";
 require_once "config.php";
 require_once "class.pegawai.php";
 $peg = new pegawai($conn);

if(isset($_GET['rt']))
{
	echo $_GET['rt'];
}
 if(isset($_GET['remove']))
 {
 	$idmd5 = $_GET['remove'];
 	echo $idmd5 . "<br>";
 	foreach ($peg->getAllData() as $jf) {
 		if ($idmd5 == md5($jf->id_peg))
 		{
 			$peg->removeOne($jf->id_peg);
 		} 	
 	}
 }
 if(isset($_GET['inserted']))
 {
 	echo "
 	<div class='container'>
 	
 	<div class='alert alert-success col-md-12'>
 	<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
  	<strong>Success!</strong> Data Telah Di Insert
	</div>
	</div> ";
 }else if (isset($_GET['removed']))
 {
 	echo "
 	<div class='container'>
 	
	<div class='alert alert-warning col-md-12 '>
	<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
  	<strong>Success!</strong>Data Telah Di hapus
  	</div>
	</div> ";
 }else if (isset($_GET['updated'])){
 	echo "
 	<div class='container'>
 	
	<div class='alert alert-success col-md-12 '>
	<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
  	<strong>Success!</strong>Data Telah Di Update
  	</div>
	</div> ";
 }
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
					<td><a href="editform.php?idpeg=<?= $jf->id_peg; ?>"><span class="glyphicon glyphicon-edit" id="edit"></span></a><label for="edit">Edit</label> </td>
					<td><a href="index.php?remove=<?php echo md5($jf->id_peg); ?>"><span class="glyphicon glyphicon-remove"></span></a></td>
				</tr>
				<?php } ?>
			</table>
		</div>
	</div>
</div>

<?php include "footer.php";