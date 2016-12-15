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
	<form role="form" action="surat-sve.php?sk=pnd" method="post" class="form-horzontal">
		<div class="form-group">
			<label class="col-sm-3"  for="nok">Nomor Surat Keterangan</label>
			<div class="col-sm-9">
			<input type="text" class="form-control" id="nok" name="nok">
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-3"  for="nok">Tanggal</label>
			<div class="col-sm-9">
			<input type="text" class="form-control" id="tgs" name="tgs" value="<?php echo date('Y-m-d'); ?>">
			</div>
		</div>
		
	<h3>Data Daerah Asal</h3>		
		<div class="form-group">
			<label class="col-sm-3"  for="nik">Nomor Kartu Keluarga</label>
			<div class="col-sm-9">
			<input type="text" class="form-control" id="nkk" name="nkk">
			</div>
		</div>	
		<div class="form-group">
			<label class="col-sm-3"  for="nik">NIK Pemohon</label>
			<div class="col-sm-9">
			<input type="text" class="form-control" id="nik" name="nik">
			</div>
		</div>
		
	<h3>Data Kepindahan</h3>
		<div class="form-group">
			<label class="col-sm-3"  for="alasan">1. Alasan Pindah</label>
			<div class="col-sm-9">
			<select class="form-control" id="alasan" name="alasan" >
				<option>[ 1 ] Pekerjaan</option>
				<option>[ 2 ] Pendidikan</option>
				<option>[ 3 ] Keamanan</option>
				<option>[ 4 ] Kesehatan</option>
				<option>[ 5 ] Perumahan</option>
				<option>[ 6 ] Keluarga</option>
				<option>[ 7 ] Lainnya</option>
			</select>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3"  for="alamat">2. Alamat Tujuan Pindah</label>
			<div class="col-sm-9">
			<textarea class="form-control" id="alamat" rows="4" name="alamat">RT: RW:  KAMPUNG:
DESA/KELURAHAN:  KECAMATAN:
KABUPATEN: PROVINSI:
KODE POS: TELP: 
</textarea>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3"  for="jenis">3. Jenis Kepindahan</label>
			<div class="col-sm-9">
			<select class="form-control" id="jenis" name="jenis" >
				<option>[ 1 ] Keluarga</option>
				<option>[ 2 ] Keluarga dan Seluruh Anggota</option>
				<option>[ 3 ] Keluarga dan Sebagian Anggota</option>
				<option>[ 4 ] Anggota Keluarga</option>
			</select>
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-3"  for="sttkkpindah">4. Status KK Pindah</label>
			<div class="col-sm-9">
			<select class="form-control" id="sttkkpindah" name="sttkkpindah">
				<option>[ 1 ] Numpang KK</option>
				<option>[ 2 ] Membuat KK Baru</option>
				<option>[ 3 ] Nomor KK Tetap</option>
			</select>
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-3"  for="sttkktetap">5. Status KK Menetap</label>
			<div class="col-sm-9">
			<select class="form-control" id="sttkktetap" name="sttkktetap">
				<option>[ 1 ] Numpang KK</option>
				<option>[ 2 ] Membuat KK Baru</option>
				<option>[ 3 ] Nomor KK Tetap</option>
			</select>
		</div>
		<div class="form-group">
			<label class="col-sm-3"  for="nikkelpindah">6. NIK Keluarga yang pindah</label>
			<div class="col-sm-9">
			<textarea class="form-control" id="kelpindah" rows="4" name="kelpindah"></textarea>
			</div>
		</div>
		<button type="submit" class="btn btn-default">Submit</button>
	</form>
<!--	
</div>	<!-- end of container div -->
<!--	
</body>

</html>
-->
