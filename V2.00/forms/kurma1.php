	<form role="form" action="surat-sve.php?sk=skm" method="post" class='form-horizontal'>
		<input type="hidden" name="no_klas" value="400">
		<input type="hidden" name="nos" value="<?php echo sprintf("%04d",$noa);?>">
		<div class="form-group">
			<label for="nok" class="col-sm-3">Nomor Surat Keterangan</label>
			<div class="col-sm-9">
				400/<?php echo sprintf("%04d",$noa)."/".kopkelur."/".date('Y'); ?>
			</div>
		</div>
		<div class="form-group">
			<label for="nos" class="col-sm-3">Tanggal</label>
			<div class='col-sm-9'>
			<input type="text" class="form-control" id="tgs" name="tgs" value="<?php echo date('Y-m-d'); ?>" >
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3" for="nikortu">NIK Orang Tua</label>
			<div class='col-sm-9'>
			<input type="text" class="form-control" id="nik" name="nik">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3" for="nikanak">NIK Anak</label>
			<div class='col-sm-9'>
			<input type="text" class="form-control" id="nikanak" name="nikanak">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3" for="sekolah">Sekolah Anak</label>
			<div class='col-sm-9'>
			<input type="sekolah" class="form-control" id="sekolah" name="sekolah">
			</div>
		</div>
		<?php include "pemaraf.php"; ?>
		<button type="submit" class="btn btn-default">Submit</button>
	</form>
