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
	<!--form role="form" action="surat/keterangan-pdf.php" method="post"-->
	<form role="form" action="surat-sve.php?sk=ket" method="post">
		<div class="form-group">
			<label for="nos">Nomor Surat Pengantar</label>
			<input type="text" class="form-control" id="nos" name="nos">
		</div>
		
		<div class="form-group">
			<label for="nos">Tanggal</label>
			<input type="text" class="form-control" id="tgs" name="tgs" value="<?php echo date('Y-m-d'); ?>" >
		</div>
		<div class="form-group">
			<label for="nik">Surat Bukti Diri / No. NIK</label>
			<input type="text" class="form-control" id="nik" name="nik">
		</div>
		<div class="form-group">
			<label for="keperluan">Keperluan</label>
			<input type="text" class="form-control" id="keperluan" name="keperluan">
		</div>
		<div class="form-group">
			<label for="berlaku">Berlaku Mulai</label>
			<input type="text" class="form-control" id="berlaku" name="berlaku" value="<?php echo date('Y-m-d'); ?>" >
		</div>
		<div class="form-group">
			<label for="ketlain">Keterangan Lain</label>
			<textarea class="form-control" id="ketlain" name="ketlain" cols="3"></textarea>
		</div>
		<button type="submit" class="btn btn-default">Submit</button>
	</form>
<!-- </div>	<!-- end of container div -->
<!--
</body>

</html>
-->
