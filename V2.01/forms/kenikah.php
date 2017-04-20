<?php
$noa = $dok->nomorBaru('nikah');
?>
	<form role="form" action="surat-sve.php?sk=nkh" method="post" class="form-horizontal">
		<input type="hidden" name="buku" value="nikah" />
		<input type="hidden" name="nobuku" value="<?php echo sprintf("%04d",$noa); ?>" />
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
