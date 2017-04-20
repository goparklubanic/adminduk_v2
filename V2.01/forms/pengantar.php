	<!--form role="form" action="surat/keterangan-pdf.php" method="post"-->
	<form role="form" action="surat-sve.php?sk=ket" method="post" class="form-horizontal">
		<?php 
		include "clasiffirat.php"; 
		?>
		<!--div class="form-group">
			<label class="col-sm-3" for="nos">Nomor Surat Pengantar</label>
			<div class="col-sm-9">
			<input type="text" size='4' id="nobuku" name="nobuku">
			</div>
		</div-->
		
		<div class="form-group">
			<label class="col-sm-3" for="nos">Tanggal</label>
			<div class="col-sm-9">
			<input type="text" class="form-control" id="tgs" name="tgs" value="<?php echo date('Y-m-d'); ?>" >
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3" for="nik">Surat Bukti Diri / No. NIK</label>
			<div class="col-sm-9">
			<input type="text" class="form-control" id="nik" name="nik">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3" for="keperluan">Keperluan</label>
			<div class="col-sm-9">
			<input type="text" class="form-control" id="keperluan" name="keperluan">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3" for="berlaku">Berlaku Mulai</label>
			<div class="col-sm-9">
			<input type="text" class="form-control" id="berlaku" name="berlaku" value="<?php echo date('Y-m-d'); ?>" >
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3" for="ketlain">Keterangan Lain</label>
			<div class="col-sm-9">
			<textarea class="form-control" id="ketlain" name="ketlain" cols="3">Yang bersangkutan benar-benar warga <?php echo dskl.' '.desa; ?></textarea>
			</div>
		</div>
		<?php include "pemaraf.php"; ?>
		<button type="submit" class="btn btn-default">Submit</button>
	</form>
<!-- </div>	<!-- end of container div -->
<!--
</body>

</html>
-->
