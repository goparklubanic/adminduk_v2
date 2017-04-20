<?php
$noa = $dok->nomorBaru('kemasyarakatan');
?>
	<form role="form" action="surat-sve.php?sk=wkm" method="post" class="form-horizontal">
		<input type="hidden" name="no_klas" value="400">
		<input type="hidden" name="buku" value="kemasyarakatan">
		<input type="hidden" name="nobuku" value="<?php echo sprintf("%04d",$noa);?>">
		<div class="form-group">
			<label for="nok" class="col-sm-3">Nomor Surat Keterangan</label>
			<div class="col-sm-9">400/<?php echo sprintf("%04d",$noa)."/".kopkelur."/".date('Y'); ?></div>
		</div>
		<div class="form-group">
			<label for="tgs" class="col-sm-3">Tanggal</label>
			<div class="col-sm-9">
			<input type="text" class="form-control" id="tgs" name="tgs" value="<?php echo date('Y-m-d'); ?>" >
			</div>
		</div>
		<div class="form-group">
			<label for="nikortu" class="col-sm-3">Nomor Induk Kependudukan</label>
			<div class="col-sm-9">
			<input type="text" class="form-control" id="nikortu" name="nik">
			</div>
		</div>
		<?php include "pemaraf.php"; ?>
		<button type="submit" class="btn btn-default">Submit</button>
	</form>
