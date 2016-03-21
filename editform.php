<?php
require_once "config.php";			/* Include file config.php*/
require_once "class.pegawai.php";
$peg = new pegawai($conn);			/* Make Class pegawai as Object to be access */
$date = date('d-m-Y'); 				/* Get data on php with format day - month - years*/
$idpeg = $_GET['idpeg'];			/* Get id pegawai from link url send */
$jfData = $peg->getOneData($idpeg);	/* Get One Data*/
if(isset($_POST['edit']))			/* If button edit was click or submit*/
{
	
	$namepeg =$_POST['namepeg'];	/* Take data by POST send */
	$alamat =$_POST['alamat'];
	$tglpeg =$_POST['tglpeg'];
	
	if($peg->edit($idpeg,$namepeg,$alamat,$tglpeg)) /* If edit succsess */
	{
		header('location:index.php?updated');
	}else{
		header('location:index.php?failure');
	}
}




?>
<?php include "header.php"; ?>
	<div class="container">
	<div class="row">
	<div class="col-md-6">
		<form action="" method="POST">
			<!-- <div class="form-group">
				<label for="idpeg">ID Pegawai</label>
				<input type="text" id="idpeg" name="idpeg" class="form-control">
			</div> -->
			<div class="form-group">
				<label for="nmpeg">Nama Pegawai</label>
				<input type="text" id="nmpeg"  name="namepeg" class="form-control" value="<?= $jfData->nm_peg; ?>" required>
			</div>
			<div class="form-group">
				<label for="almtpeg">Alamat Pegawai</label>
				<textarea required class="form-control" id="almtpeg" rows="3" name="alamat"> <?= $jfData->alamat;?></textarea>
			</div>
			<div class="form-group">
				<label for="tglpeg">Tanggal Lahir Pegawai</label>
				<div class="input-group date" data-provide="datepicker" data-date-format="yyyy-mm-dd" id="datepicker">
                <input type='text' class="form-control" name="tglpeg" required value="<?= $jfData->birthdate;?> ">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar">
                    </span>
                </span>
            </div>
			</div>

			<button class="btn btn-primary" type="submit" name="edit">Simpan</button>
			<button class="btn btn-default" type="reset">Reset</button>


		</form>
	</div>
	<div class="col-md-6">
		<div class="panel panel-default panel-primary">
			<div class="panel-heading"><h5>Nice Word</h5></div>
			<div class="panel-body">
				Hidup itu seperti naik sepeda, agar tetap seimbang, kau harus terus bergerak 
			</div>
			<div class="panel-footer"><i>Albert Einstein</i></div>
		</div>
	</div>
	</div>
		


	</div>
<?php include "footer.php";
