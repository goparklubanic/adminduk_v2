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
<!--data umum surat--> 		
			<form role="form" action="surat-sve.php?sk=lhr" method="post" class="form-horizontal">
				<div class="form-group">
					<label class="col-sm-3" for="nok">Nomor Surat Keterangan</label>
					<div class="col-sm-9">
					<input type="text" class="form-control" id="nok" name="nok">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3" for="nok">Tanggal Surat</label>
					<div class="col-sm-9">
					<input type="text" class="form-control" id="tgs" name="tgs">
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
					<label class="col-sm-3" for="nkk">Nama Kepala Keluarga</label>
					<input type="text" class="form-control" id="nkk" name="nkk">
				</div>
				-->		
<!--data umum surat-->
	
		<!-- data bayi -->
	<h3>DATA BAYI</h3>
		<div class="form-group">
			<label class="col-sm-3" for="bynama">1. Nama:&nbsp; </label>
			<div class="col-sm-9">
			<input type="text" class="form-control" id="bynama" name="bynama">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3" for="bysex">2. Jenis Kelamin:&nbsp;</label>
			<div class="col-sm-9">
			<select class="form-control" id="bysex" name="bysex" >
				<option>[ L ] Laki-laki</option>
				<option>[ P ] Perempuan</option>
			</select>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3" for="bydilahir">3. Tempat Dilahirkan</label>
			<div class="col-sm-9">
			<select class="form-control" id="bydilahir" name="bydilahir" >
				<option>[ 1 ] RS / RB</option>
				<option>[ 2 ] Puskesmas</option>
				<option>[ 3 ] Polindes</option>
				<option>[ 4 ] Rumah</option>
				<option>[ 5 ] Lainnya</option>
			</select>
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-3" for="bykelahir">4. Tempat Kelahiran</label>
			<div class="col-sm-9">
			<input type="text" class="form-control" id="bykelahir" name="bykelahir">
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-3" for="bytgl">5. Tanggal Kelahiran</label>
			<div class="col-sm-9">
			<input type="text" class="form-control" id="bytgl" name="bytgl">
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-3" for="byjam">6. Pukul</label>
			<div class="col-sm-9">
			<input type="text" class="form-control" id="byjam" name="byjam">
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-3" for="byjnlahir">7. Jenis Kelahiran</label>
			<div class="col-sm-9">
			<select class="form-control" id="byjnlahir" name="byjnlahir" >
				<option>[ 1 ] Tunggal</option>
				<option>[ 2 ] Kembar 2</option>
				<option>[ 3 ] Kembar 3</option>
				<option>[ 4 ] Kembar 4</option>
				<option>[ 5 ] Lainnya</option>
			</select>
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-3" for="byanke">8. Anak Ke</label>
			<div class="col-sm-9">
			<input type="text" class="form-control" id="byanke" name="byanke">
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-3" for="bypenolong">9. Penolong</label>
			<div class="col-sm-9">
			<select class="form-control" id="bypenolong" name="bypenolong" >
				<option>[ 1 ] Dokter</option>
				<option>[ 2 ] Bidan / Perawat</option>
				<option>[ 3 ] Dukun</option>
				<option>[ 4 ] Lainnya</option>
			</select>
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-3" for="byberat">10. Berat Bayi</label>
			<div class="col-sm-9">
			<input type="text" class="form-control" id="byberat" name="byberat">
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-3" for="bypanjang">11. Panjang Bayi</label>
			<div class="col-sm-9">
			<input type="text" class="form-control" id="bypanjang" name="bypanjang">
			</div>
		</div>
		<!-- data bayi -->
		
		<!-- data Ayah Ibu -->
		<h3>Data Ibu</h3>
		<div class="form-group">
			<label class="col-sm-3" for="nikibu">NIK Ibu</label>
			<div class="col-sm-9">
			<input type="text" class="form-control" id="nikibu" name="nikibu">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3" for="tgnikah">Tanggal Pencatatan Perkawinan</label>
			<div class="col-sm-9">
			<input type="text" class="form-control" id="tgnikah" name="tgnikah">
			</div>
		</div>
		
		<h3>Data Ayah</h3>
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
			<label class="col-sm-3" for="nikpelapor">NIK Pelapor</label>
			<div class="col-sm-9">
			<input type="text" class="form-control" id="nikpelapor" name="nikpelapor">
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
		<button type="submit" class="btn btn-default">Submit</button>
	</form>
		<!-- data Pelapor dan Saksi -->
		
<!--	
</div>	<!-- end of container div -->
<!--	
</body>

</html>
-->
