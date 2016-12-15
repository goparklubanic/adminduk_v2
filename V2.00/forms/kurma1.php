<!--
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Pengantar</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 1.24.1" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../lib/bootstrap.min.css">
	<script src="../lib/jquery.min.js"></script>
	<script src="../lib/bootstrap.min.js"></script>
</head>

<body>
<div class="container">
-->

	<form role="form" action="surat-sve.php?sk=skm" method="post">
		<div class="form-group">
			<label for="nok">Nomor Surat Keterangan</label>
			<input type="text" class="form-control" id="nok" name="nok">
		</div>
		<div class="form-group">
			<label for="nos">Tanggal</label>
			<input type="text" class="form-control" id="tgs" name="tgs" value="<?php echo date('Y-m-d'); ?>" >
		</div>
		<div class="form-group">
			<label for="nikortu">NIK Orang Tua</label>
			<input type="text" class="form-control" id="nikortu" name="nikortu">
		</div>
		<div class="form-group">
			<label for="nikanak">NIK Anak</label>
			<input type="text" class="form-control" id="nikanak" name="nikanak">
		</div>
		<div class="form-group">
			<label for="sekolah">Sekolah Anak</label>
			<input type="sekolah" class="form-control" id="sekolah" name="sekolah">
		</div>
		<button type="submit" class="btn btn-default">Submit</button>
	</form>
<!--	
</div>	<!-- end of container div -->
<!--
</body>

</html>
-->
