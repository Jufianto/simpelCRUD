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
		<form action="">
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
				<div class="input-group date" data-provide="datepicker" data-date-format="dd/mm/yyyy" id="datepicker">
                <input type='text' class="form-control" />
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar">
                    </span>
                </span>
            </div>
			</div>

			<button class="btn btn-primary" type="submit">Tambah Data</button>
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