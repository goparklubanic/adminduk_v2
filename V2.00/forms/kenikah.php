<!--
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>PINDAH</title>
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
	<form role="form" action="surat-sve.php?sk=nkh" method="post" class="form-horizontal">
		<input type="hidden" name="nos" value="<?php echo sprintf("%04d",$noa); ?>" />
		<input type="hidden" name="no_klas" value="474.2" />
		<div class="form-group">
			<label for="nok" class="col-sm-3">Nomor Surat Keterangan</label>
			<div class="col-sm-9">
			<span>474.2/<?php echo sprintf("%04d",$noa)."/".kopkelur."/".date('Y'); ?></span>
			</div>
		</div>
		
		<div class="form-group">
			<label for="nok" class="col-sm-3">Tanggal</label>
			<div class="col-sm-9">
			<input type="text" class="form-control" id="tgs" name="tgs" value="<?php echo date('Y-m-d'); ?>">
			</div>
		</div>
		
		<div class="form-group">
			<label for="nik" class="col-sm-3">Nomor Induk Kependudukan</label>
			<div class="col-sm-9">
			<input type="text" class="form-control" id="nik" name="nik">
			</div>
		</div>
		<?php include "pemaraf.php"; ?>		
		<button type="submit" class="btn btn-default">Submit</button>
	</form>
<!--	
</div>	<!-- end of container div -->
<!--	
</body>

</html>
-->
