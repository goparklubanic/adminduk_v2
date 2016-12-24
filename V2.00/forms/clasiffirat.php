<div class="form-group">
  <label class="col-sm-3">Nomor Klasifikasi</label>
  <div class="col-sm-9">
   <select name="no_klas" class="form-control">
	<option value='11.1'>11.1 - GEDUNG KANTOR/TERMASUK INSTALASI PRASARANA FISIK PAMONG /KANTOR DINAS</option>
	<option value='60'>60 - ORGANISASI</option>
	<option value='300'>300 - KEAMANAN/KETERTIBAN</option>
	<option value='400'>400 - KESEJAHTERAAN RAKYAT</option>
	<option value='422.2'>422.2 - PENDAFTARAN, MAPRAM, PERPELONCOAN, OSPEK, TAHUN PELAJARAN</option>
	<option value='422.5'>422.5 - BEASISWA</option>
	<option value='443.32'>443.32 - IMUNISASI</option>
	<option value='470'>470 - KEPENDUDUKAN</option>
	<option value='474'>474 - PENDAFTARAN PENDUDUK</option>
	<option value='474.1'>474.1 - KELAHIRAN </option>
	<option value='474.11'>474.11 - ADOPSI</option>
	<option value='474.2'>474.2 - PERKAWINAN / PERCERAIAN / RUJUK</option>
	<option value='474.3'>474.3 - KEMATIAN</option>
	<option value='474.4'>474.4 - KARTU PENDUDUK</option>
	<option value='474.5'>474.5 - KARTU KELUARGA</option>
	<option value='510'>510 - PERDAGANGAN</option>
	<option value='510.4'>510.4 - PERIZINAN</option>
	<option value='522.411'>522.411 - KEHUTANAN KAYU</option>
	<option value='545'>545 - ANEKA TAMBANG / BAHAN GALIAN</option>
	<option value='594'>594 - PENDAFTARAN TANAH</option>
	<option value='594.1'>594.1 - PENGUKURAN /PEMETAAN</option>
	<option value='594.2'>594.2 - DANA PENGUKURAN ( PERMEN AGRARIA NO. 6/1960)</option>
	<option value='594.3'>594.3 - SERTIFIKAT</option>
	<option value='594.4'>594.4 - PEJABAT PEMBUAT AKTE TANAH</option>
	<option value='857'>857 - CUTI ALASAN LAIN</option>
	<option value='900'>900 - KEUANGAN</option>
	<option value='970'>970 - PENDAPATAN</option>
   </select>
  </div>
</div>
<div class="form-group">
	<label class='col-sm-3'>Nomor Agenda</label>
	<div class='col-sm-9'>
		<input type='text' class='col-sm-2' name='nos' Readonly value="<?php echo sprintf("%04d",$noa); ?>"/><span class='col-sm-10'>/Kel.Smpr/<?php echo date('Y'); ?></span>
	</div>
</div>
