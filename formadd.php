<?php
require_once "config.php";
require_once "class.pegawai.php";
$peg = new pegawai($conn);

if(isset($_POST['add']))
{
	
	$idpeg =$_POST['idpeg'];
	$namepeg =$_POST['namepeg'];
	$alamat =$_POST['alamat'];
	$tglpeg =$_POST['tglpeg'];

	if($peg->create($idpeg,$namepeg,$alamat,$tglpeg))
	{
		header('location:index.php?success');
	}else{
		header('location:index.php?failure');
	}
}




?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Simple OOP CRUD</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bs.min.css">
    <link rel="stylesheet" href="css/datepicker.css">
    <style>
    	body{
    		padding-top: 3em;
    	}
    </style>	
</head>
<body>
	<div class="container">
	<div class="col-md-6">
		<form action="" method="POST">
			<div class="form-group">
				<label for="idpeg">ID Pegawai</label>
				<input type="text" id="idpeg" name="idpeg" class="form-control">
			</div>
			<div class="form-group">
				<label for="nmpeg">Nama Pegawai</label>
				<input type="text" id="nmpeg"  name="namepeg" class="form-control">
			</div>
			<div class="form-group">
				<label for="almtpeg">Alamat Pegawai</label>
				<textarea required class="form-control" id="almtpeg" rows="3" name="alamat"></textarea>
			</div>
			<div class="form-group">
				<label for="tglpeg">Tanggal Lahir Pegawai</label>
				<div class="input-group date" data-provide="datepicker" data-date-format="yyyy-mm-dd" id="datepicker">
                <input type='text' class="form-control" name="tglpeg" >
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
	<script type="text/javascript">
        $(function () {
            $('#datepicker').datepicker({
               format: 'dd/mm/yyyy',
    			startDate: '-3d'
            });
        });
    </script>
    <script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
</body>
</html>