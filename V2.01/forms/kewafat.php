<?php
$noa = $dok->nomorBaru('kematian');
?>
			<form role="form" action="surat-sve.php?sk=wft" method="post" class="form-horizontal">
				<input type="hidden" name="no_klas" value="474.3">
				<input type="hidden" name="buku" value="kematian">
				<div class="form-group">
					<label class="col-sm-3" for="nok">Nomor Urut Agenda</label>
					<div class="col-sm-9">
					474.3/<input type="text" class="noa" id="nos" name="nobuku" readonly value="<?php echo sprintf("%04d",$noa); ?>"/>
					<span >/<?php echo kopkelur ."/". date('Y'); ?></span>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3" for="nok">Tanggal</label>
					<div class="col-sm-9">
					<input type="text" class="form-control" id="tgs" name="tgs" value="<?php echo date('Y-m-d'); ?>" />
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3" for="nkk">Nomor Kartu Keluarga</label>
					<div class="col-sm-9">
					<input type="text" class="form-control" id="nkk" name="nkk">
					</div>
				</div>	
				<!--
				<div class="form-group">
					<label class="col-sm-3" for="nkk">Nama Kepala Keluarga</label><div class="col-sm-9">
					<input type="text" class="form-control" id="nkk" name="nkk">
				</div>
				-->		
	
		<!-- data jenazah -->
	<h3>DATA JENAZAH</h3>
		<div class="form-group">
			<label class="col-sm-3" for="jnznik">1. NIK Jenazah:&nbsp; </label>
			<div class="col-sm-9">
			<input type="text" class="form-control" id="jnznik" name="jnznik">
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-3" for="jnzanakke">2. Anak Ke</label>
			<div class="col-sm-9">
			<input type="text" class="form-control" id="jnzanakke" name="jnzanakke">
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-3" for="jnztgl">3. Tanggal Kematian</label>
			<div class="col-sm-9">
			<input type="text" class="form-control" id="jnztgl" name="jnztgl">
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-3" for="jnzjam">4. Pukul</label>
			<div class="col-sm-9">
			<input type="text" class="form-control" id="jnzjam" name="jnzjam">
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-3" for="jnzsebab">5. Sebab Kematian</label>
			<div class="col-sm-9">
			<select class="form-control" id="jnzsebab" name="jnzsebab" >
				<option value="[ 1 ] Sakit/Tua">[ 1 ] Sakit/Tua</option>
				<option value="[ 2 ] Wabah">[ 2 ] Wabah</option>
				<option value="[ 3 ] Kecelakaan">[ 3 ] Kecelakaan</option>
				<option value="[ 4 ] Kriminalitas">[ 4 ] Kriminalitas</option>
				<option value="[ 5 ] Bunuh Diri">[ 5 ] Bunuh Diri</option>
			</select>
			</div>
		</div>
				
		<div class="form-group">
			<label class="col-sm-3" for="jnzterang">6. Yang Menerangkan</label>
			<div class="col-sm-9">
			<select class="form-control" id="jnzterang" name="jnzterang" >
				<option value="[ 1 ] Dokter">[ 1 ] Dokter</option>
				<option value="[ 2 ] Tenaga Kesehatan">[ 2 ] Tenaga Kesehatan</option>
				<option value="[ 3 ] Kepolisian">[ 3 ] Kepolisian</option>
				<option value="[ 4 ] Lainnya">[ 4 ] Lainnya</option>
			</select>
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-3" for="jnztempat">7. Tempat Kematian</label>
			<div class="col-sm-9">
			<input type="text" class="form-control" id="jnztempat" name="jnztempat">
			</div>
		</div>
		<!-- data jenazah -->
		<!-- data Ayah Ibu -->
		<h3>Data Orang Tua Jenazah</h3>
		<div class="form-group">
			<label class="col-sm-3" for="nikibu">NIK Ibu</label>
			<div class="col-sm-9">
			<input type="text" class="form-control" id="nikibu" name="nikibu">
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-3" for="nikayah">NIK Ayah</label>
			<div class="col-sm-9">
			<input type="text" class="form-control" id="nikayah" name="nikayah">
			</div>
		</div>
		
		<!-- data Ayah Ibu -->
		
		<!-- data Pelapor dan Saksi -->
		<h3>Data Pelapor dan Saksi</h3>
		<div class="form-group">
			<label class="col-sm-3" for="nik">NIK Pelapor</label>
			<div class="col-sm-9">
			<input type="text" class="form-control" id="nikpelapor" name="nik">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3" for="niksaksi1">NIK Saksi I</label>
			<div class="col-sm-9">
			<input type="text" class="form-control" id="niksaksi1" name="niksaksi1">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3" for="niksaksi2">NIK Saksi II</label>
			<div class="col-sm-9">
			<input type="text" class="form-control" id="niksaksi2" name="niksaksi2">
			</div>
		</div>
		<?php include "pemaraf.php"; ?>
		<button type="submit" class="btn btn-default">Submit</button>
	</form>
		<!-- data Pelapor dan Saksi -->
