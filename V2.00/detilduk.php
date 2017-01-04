<?php
$dapen=$pdd->pilih($_GET['id']);
//print_r($dapen);
echo "<div  id='tilduk' class='form-horizontal'>";
echo "
<div class='form-group tilduk'> 
	<label class='col-sm-6'>NIK</label>
	<div class='col-sm-6'>".$dapen['nik']."</div>
</div>
<div class='form-group tilduk'>
	<label class='col-sm-6'>NAMA LENGKAP</label>
	<div class='col-sm-6'>".$dapen['nama_lengkap']."</div>
</div>
<div class='form-group tilduk'>
	<label class='col-sm-6'>JENIS KELAMIN</label>
	<div class='col-sm-6'>".$dapen['kelamin']."</div>
</div>
<div class='form-group tilduk'>
	<label class='col-sm-6'>STATUS HUBUNGAN KELUARGA</label>
	<div class='col-sm-6'>".$dapen['shk']."</div>
</div>
<div class='form-group tilduk'>
	<label class='col-sm-6'>TEMPAT DAN TANGGAL LAHIR</label>
	<div class='col-sm-6'>".$dapen['tp_lahir'].",".$dapen['tg_lahir']."</div>
</div>
<div class='form-group tilduk'>
	<label class='col-sm-6'>STATUS PERKAWINAN</label>
	<div class='col-sm-6'>".$dapen['st_kawin']."</div>
</div>
<div class='form-group tilduk'>
	<label class='col-sm-6'>AGAMA</label>
	<div class='col-sm-6'>".$dapen['agama']."</div>
</div>
<div class='form-group tilduk'>
	<label class='col-sm-6'>GOL DARAH</label>
	<div class='col-sm-6'>".$dapen['gol_darah']."</div>
</div>
<div class='form-group tilduk'>
	<label class='col-sm-6'>PENDIDIKAN</label>
	<div class='col-sm-6'>".$dapen['pendidikan']."</div>
</div>
<div class='form-group tilduk'> 
	<label class='col-sm-6'>PEKERJAAN</label>
	<div class='col-sm-6'>".$dapen['pekerjaan']."</div>
</div>
<div class='form-group tilduk'> 
	<label class='col-sm-6'>NIK / NAMA AYAH</label>
	<div class='col-sm-6'>".$dapen['nik_ayah']."</div>
</div>
<div class='form-group tilduk'> 
	<label class='col-sm-6'>NIK / NAMA IBU</label>
	<div class='col-sm-6'>".$dapen['nik_ibu']."</div>
</div>
<div class='form-group tilduk'> 
	<label class='col-sm-6'>NO. AKTE LAHIR</label>
	<div class='col-sm-6'>".$dapen['no_akte_lahir']."</div>
</div>
<div class='form-group tilduk'> 
	<label class='col-sm-6'>ALAMAT</label>
	<div class='col-sm-6'>".$dapen['dusun']." RT. ".sprintf("%03d",$dapen['rt'])." RW. ".sprintf("%03d",$dapen['rw'])."</div>
</div>
<div class='form-group tilduk'> 
	<label class='col-sm-6'>NO. KK</label>
	<div class='col-sm-6'><a href=./?menu=kk&id=".$dapen['no_kk'].">".$dapen['no_kk']."</a></div>
</div>
<div class='form-group tilduk'> 
	<label class='col-sm-6'>HAJI</label>
	<div class='col-sm-6'>".$dapen['haji']." Kali</div>
</div>
<div class='form-group tilduk'> 
	<label class='col-sm-6'>RTM</label>
	<div class='col-sm-6'>".$dapen['rtm']."</div>
</div>
<div class='form-group tilduk'> 
	<label class='col-sm-6'>Tindakan</label>
	<div class='col-sm-6'>
		<a class='tinduk' href='.?menu=upd&id=".$dapen['idxPdd']."'>EdiT</a>
		<a class='tinduk' href='penduduk.act.php?rmv&id=".$dapen['idxPdd']."'>HapuS</a>
	</div>
</div>
";
echo "</div>";
echo "
	<div><h4>Riwayat Layanan Surat</h4></div>
	<table class='table table-sm'>
	  <tr>
	    <th>Nomor Surat</th>
	    <th>Tanggal</th>
	    <th>Jenis Surat</th>
	  </tr>
";
$srh = $dok->serviceHistory($_GET['id']);
echo "
	</table>
";
?>
