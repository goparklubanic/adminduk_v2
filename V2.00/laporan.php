<?php
require_once "./lib/laporan.class.inc.php";
$lpr=new laporan();

$id = $_GET['id'];
$lap = $lpr->laporanPick($id);
//$dtl = json_decode($lap['dataLap']) ;
//echo $lap['dataLap'];
$test1 = explode(",",$lap['dataLap']);
//echo "<pre>";
//print_r($test1);
//echo "<br/>";
$dalap=json_decode($lap['dataLap'],1);
//print_r($dalap);
//echo "</pre>";
if($lap['jenisLap']=="kelahiran")
{

    echo '
    <table class="table table-sm">
    <tr><td width="200">Nama Bayi</td><td width="5">:</td><td>'.$dalap['namaBayi'].'</td></tr>
    <tr><td>Jenis Kelamin</td><td width="5">:</td><td>'.$dalap['jkelamin'].'</td></tr>
    <tr><td>Anak Ke</td><td width="5">:</td><td>'.$dalap['bayiKe'].'</td></tr>
    <tr><td>Tempat Lahir</td><td width="5">:</td><td>'.$dalap['lahirDi'].'</td></tr>
    <tr><td>Lahir di Kabupaten</td><td width="5">:</td><td>'.$dalap['lahirKota'].'</td></tr>
    <tr><td>Lahir tanggal</td><td width="5">:</td><td>'.$dalap['lahirTgl'].'</td></tr>
    <tr><td>Pada jam</td><td width="5">:</td><td>'.$dalap['lahirJam'].'</td></tr>
    <tr><td>Panjang Bayi</td><td width="5">:</td><td>'.$dalap['panjangBayi'].' cm</td></tr>
    <tr><td>Berat Bayi</td><td width="5">:</td><td>'.$dalap['beratBayi'].'</td></tr>
    <tr><td>Penolong Kelahiran</td><td width="5">:</td><td>'.$dalap['penolong'].'</td></tr>
    <tr><td>NIK Ayah</td><td width="5">:</td><td>'.$dalap['nikBapak'].'</td></tr>
    <tr><td>NIK Ibu</td><td width="5">:</td><td>'.$dalap['nikIbu'].'</td></tr>
    <tr><td>Nomor KK</td><td width="5">:</td><td>'.$dalap['nomorKK'].'</td></tr>
    </table>
    ';
	echo '
	<form role="form" action="surat-sve.php?sk=lhr" method="post" class="form-horizontal">
		<input type="hidden" name="no_klas" value="474.1">
		<div class="form-group">
			<label class="col-sm-3" for="nok">Nomor Urut Agenda</label>
			<div class="col-sm-9">
			474.1/<input type="text" class="noa" id="nos" name="nos" readonly value="'.sprintf('%04d',$noa).'"/>
			<span >/ '.kopkelur .'/'. date('Y').'</span>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3" for="nok">Tanggal Surat</label>
			<div class="col-sm-9">
			<input type="text" class="form-control" id="tgs" name="tgs" value="'.date('Y-m-d').'"/>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3" for="tgnikah">Tanggal Pencatatan Nikah</label>
			<div class="col-sm-9">
				<input type="date" name="tgnikah" class="form-control">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3" for="nikpelapor">NIK Pelapor</label>
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
		<input type="hidden" name="nkk" value="'.$dalap['nomorKK'].'">
		<input type="hidden" name="nikayah" value="'.$dalap['nikBapak'].'">
		<input type="hidden" name="nikibu" value="'.$dalap['nikIbu'].'">
		<input type="hidden" name="byanke" value="'.$dalap['bayiKe'].'">
		<input type="hidden" name="bynama" value="'.$dalap['namaBayi'].'">
		<input type="hidden" name="byberat" value="'.$dalap['beratBayi'].'">
		<input type="hidden" name="bypanjang" value="'.$dalap['panjangBayi'].'">
		<input type="hidden" name="bysex" value="'.$dalap['jkelamin'].'">
		<input type="hidden" name="bydilahir" value="'.$dalap['lahirDi'].'">
		<input type="hidden" name="bytgl" value="'.$dalap['lahirTgl'].'">
		<input type="hidden" name="byjam" value="'.$dalap['lahirJam'].'">
		<input type="hidden" name="bykelahir" value="'.$dalap['lahirKota'].'">
		<input type="hidden" name="byjnlahir" value="'.$dalap['lahirJenis'].'">
		<input type="hidden" name="bypenolong" value="'.$dalap['penolong'].'">
		';
	include "./forms/pemaraf.php";
	echo '	
	<input type="submit" class="btn btn-default" value="PROSES">
	</form>
	';
}
if($lap['jenisLap']=="kematian")
{
    echo '
    <table class="table table-sm">
    <tr><td width="200">NIK Jenazah</td><td width="5">:</td><td>'.$dalap['nik'].'</td></tr>
    <tr><td>Anak Ke</td><td>:</td><td>'.$dalap['anakke'].'</td></tr>
    <tr><td>Meninggal tanggal</td><td>:</td><td>'.$dalap['tanggal'].'</td></tr>
    <tr><td>Pada jam</td><td>:</td><td>'.$dalap['jam'].'</td></tr>
    <tr><td>Penyebab</td><td>:</td><td>'.$dalap['sebab'].'</td></tr>
    <tr><td>Tempat Meninggal</td><td>:</td><td>'.$dalap['tempat'].'</td></tr>
    <tr><td>Yang menerangkan</td><td>:</td><td>'.$dalap['penerang'].'</td></tr>
    <tr><td>Nomor KK</td><td>:</td><td>'.$dalap['nomorKK'].'</td></tr>
    </table>
    ';
	echo '
	<form role="form" action="surat-sve.php?sk=lhr" method="post" class="form-horizontal">
		<input type="hidden" name="no_klas" value="474.3">
		<div class="form-group">
			<label class="col-sm-3" for="nok">Nomor Urut Agenda</label>
			<div class="col-sm-9">
			474.3/<input type="text" class="noa" id="nos" name="nos" readonly value="'.sprintf('%04d',$noa).'"/>
			<span >/ '.kopkelur .'/'. date('Y').'</span>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3" for="nok">Tanggal Surat</label>
			<div class="col-sm-9">
			<input type="text" class="form-control" id="tgs" name="tgs" value="'.date('Y-m-d').'"/>
			</div>
		</div>
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
		
		<!-- data Pelapor dan Saksi -->
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
		<input type="hidden" name="nkk" value="'.$dalap['nomorKK'].'">
		<input type="hidden" name="jnznik" value="'.$dalap['nik'].'">
		<input type="hidden" name="jnzanakke" value="'.$dalap['anakke'].'">
		<input type="hidden" name="jnztgl" value="'.$dalap['tanggal'].'">
		<input type="hidden" name="jnzjam" value="'.$dalap['jam'].'">
		<input type="hidden" name="jnzsebab" value="'.$dalap['sebab'].'">
		<input type="hidden" name="jnztempat" value="'.$dalap['tempat'].'">
		<input type="hidden" name="jnzterang" value="'.$dalap['penerang'].'">
		
	';
	
	include "./forms/pemaraf.php";
	echo '	
	<input type="submit" class="btn btn-default" value="PROSES">
	</form>
	';
}
if($lap['jenisLap']=="kepindahan")
{
    echo '
    <table class="table table-sm">
      <tr><td width="200">Nomor KK</td><td width="5">:</td><td>'.$dalap['nomorKK'].'</td></tr>
      <tr><td>NIK Pemohon</td><td width="5">:</td><td>'.$dalap['nik'].'</td></tr>
      <tr><td>Alasan Pindah</td><td width="5">:</td><td>'.$dalap['alasan'].'</td></tr>
      <tr><td>Alamat Tujuan</td><td width="5">:</td><td>'.$dalap['tujuan'].'</td></tr>
      <tr><td>Jenis Kepindahan</td><td width="5">:</td><td>'.$dalap['jenis'].'</td></tr>
      <tr><td>Status KK Pindah</td><td width="5">:</td><td>'.$dalap['kkpindah'].'</td></tr>
      <tr><td>Status KK Tinggal</td><td width="5">:</td><td>'.$dalap['kktetap'].'</td></tr>
      <tr><td>Anggota yang Pindah</td><td width="5">:</td><td>'.$dalap['pengikut'].'</td></tr>
    </table>
    ';
	echo '
	<form role="form" action="surat-sve.php?sk=pnd" method="post" class="form-horizontal">
		<input type="hidden" name="no_klas" value="474.2">
		<div class="form-group">
			<label class="col-sm-3" for="nok">Nomor Urut Agenda</label>
			<div class="col-sm-9">
			474.2/<input type="text" class="noa" id="nos" name="nos" readonly value="'.sprintf('%04d',$noa).'"/>
			<span >/ '.kopkelur .'/'. date('Y').'</span>
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-3" for="nok">Tanggal</label>
			<div class="col-sm-9">
			<input type="text" class="form-control" id="tgs" name="tgs" value="'.date('Y-m-d').'"/>
			</div>
		</div>
	';
	include "./forms/pemaraf.php";
	echo '
	<input type="submit" class="btn btn-default" value="PROSES">
	</form>
	';
}
?>
