<?php
$noa = $dok->nomorBaru('pembangunan');
?>
	<form role="form" action="surat-sve.php?sk=ush" method="post" class="form-horizontal">
		<input type="hidden" name="no_klas" value="510">
		<input type="hidden" name="buku" value="pembangunan">
		<input type="hidden" name="nobuku" value="<?php echo sprintf("%04d",$noa); ?>" >
		<div class="form-group">
			<label for="nok" class="col-sm-3">Nomor Surat Keterangan</label>
			<div class="col-sm-9">
			<?php echo "510/".sprintf("%04d",$noa)."/".kopkelur."/".date('Y'); ?>
			</div>
		</div>
		
		<div class="form-group">
			<label for="nok" class="col-sm-3">Tanggal</label>
			<div class="col-sm-9">
			<input type="text" class="form-control" id="tgs" name="tgs" value="<?php echo date('Y-m-d'); ?>" >
			</div>
		</div>
		<div class="form-group">
			<label for="nik" class="col-sm-3">Nomor Induk Kependudukan</label>
			<div class="col-sm-9">
			<input type="text" class="form-control" id="nik" name="nik">
			</div>
		</div>
		<div class="form-group">
			<label for="jnusaha" class="col-sm-3">Jenis Usaha</label>
			<div class="col-sm-9">
			<input type="text" class="form-control" id="jnusaha" name="jnusaha">
			</div>
		</div>
		<div class="form-group">
			<label for="jnbarang" class="col-sm-3">Jenis Barang Dagangan</label>
			<div class="col-sm-9">
			<input type="text" class="form-control" id="jnbarang" name="jnbarang">
			</div>
		</div>
		<div class="form-group">
			<label for="mulaius" class="col-sm-3">Memulai usaha sejak</label>
			<div class="col-sm-9">
			<input type="text" class="form-control" id="mulaius" name="mulaius">
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
