<?php
require_once "config.php";
require_once "class.pegawai.php";
$peg = new pegawai($conn);
$date = date('d-m-Y');
if(isset($_POST['add']))
{
	
	$namepeg =$_POST['namepeg'];
	$alamat =$_POST['alamat'];
	$tglpeg =$_POST['tglpeg'];
	$idpeg = $peg->generateId($date);
	if($peg->create($idpeg,$namepeg,$alamat,$tglpeg))
	{
		header('location:index.php?inserted');
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
				<input type="text" id="nmpeg"  name="namepeg" class="form-control" required>
			</div>
			<div class="form-group">
				<label for="almtpeg">Alamat Pegawai</label>
				<textarea required class="form-control" id="almtpeg" rows="3" name="alamat"></textarea>
			</div>
			<div class="form-group">
				<label for="tglpeg">Tanggal Lahir Pegawai</label>
				<div class="input-group date" data-provide="datepicker" data-date-format="yyyy-mm-dd" id="datepicker">
                <input type='text' class="form-control" name="tglpeg" required >
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar">
                    </span>
                </span>
            </div>
			</div>

			<button class="btn btn-primary" type="submit" name="add">Tambah Data</button>
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
