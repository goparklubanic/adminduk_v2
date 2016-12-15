<?php
date_default_timezone_set('Asia/Jakarta');
require_once 'config.php';
require_once './lib/surat.class.inc.php';
require_once './lib/penduduk.class.inc.php';
require_once "./lib/template-surat.php";

$surat = new suratdesa();
$pdd = new penduduk();
$dok = new templatesurat();

$kecamatan=kecamatan;
$dskl = dskl;
$desa = desa;
$kabupaten = kabupaten;
$alamat = alamat;
$telpon = telpon;
$dewil = dewil;
$kepala = kepala;
$ukab=strtoupper(kabupaten);
$ukec=strtoupper(kecamatan);
$udkl=strtoupper(dskl);
$udes=strtoupper(desa);
$lconf=array('dk'=>$dskl,'nm'=>$desa,'kc'=>$kecamatan,'kb'=>$kabupaten,
			 'wil'=>$dewil,'kp'=>$kepala); 
$s=$_GET['s'];
$n=$_GET['id'];

	$A4 = "
	<div id='kop1'>PEMERINTAH KABUPATEN $ukab</div>
	<div id='kop2'>KECAMATAN $ukec</div>
	<div id='kop3'>$udkl $udes</div>
	<div id='kop4'>$alamat</div>
	<hr style='height:2px; background: #000;'>
	";

	$A5 = "
	<div id='kop1-a5'>PEMERINTAH KABUPATEN $ukab</div>
	<div id='kop2-a5'>KECAMATAN $ukec</div>
	<div id='kop3-a5'>$udkl $udes</div>
	<div id='kop4-a5'>$alamat</div>
	<hr style='height:2px; background: #000;'>
	";

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>KEPENDUDUKAN <?php echo desa; ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initBootstrap Exampleial-scale=1">
  
  <link rel="stylesheet" href="./lib/bootstrap.min.css">
  <link rel="stylesheet" href="./lib/adminduk.css">
  <link rel="stylesheet" href="./lib/template.css">
  
  <script src="./lib/jquery.min.js"></script>
  <script src="./lib/bootstrap.min.js"></script>
  <script src="./lib/ajax.js"></script>
  </head>
  <body onLoad=window.print();>
<?php

if($s=="lhr"){
//surat kelahiran//
$data=$surat->suratPick('sk_lahir',$n);
$hariLahir=$surat->ambilHari($data[7]);
$ibu = $pdd->wargaDataSingkat($data[14]);
$bpk = $pdd->wargaDataSingkat($data[16]);
$lpr = $pdd->wargaDataSingkat($data[17]);
$sk1 = $pdd->wargaDataSingkat($data[18]);
$sk2 = $pdd->wargaDataSingkat($data[19]);
$dok->sk_lahir($lconf,$data,$hariLahir,$ibu,$bpk,$lpr,$sk1,$sk2);
}

if($s=="wft"){
//surat kematian
$data=$surat->suratPick('sk_wafat',$n);
$namakk=$pdd->KepalaKeluarga($data[2]);
$jnz = $pdd->dataJnz($data[3]);
$ibu = $pdd->wargaDataSingkat($data[10]);
$bpk = $pdd->wargaDataSingkat($data[11]);
$lpr = $pdd->wargaDataSingkat($data[12]);
$sk1 = $pdd->wargaDataSingkat($data[13]);
$sk2 = $pdd->wargaDataSingkat($data[14]);
$dok->sk_wafat($lconf,$data,$namakk,$jnz,$ibu,$bpk,$lpr,$sk1,$sk2);
}

if($s=="nkh"){
//surat keterangan nikah
$data  = $surat->suratPick('sk_nikah',$n);
$warga = $pdd->wargaDataSingkat($data[2]);
$dok->sk_nikah($lconf,$A4,$data,$warga);
}

if($s=="ush"){
//surat keterangan usaha
$data  = $surat->suratPick('sk_usaha',$n); 
$warga = $pdd->wargaDataSingkat($data[2]);
$dok->sk_usaha($lconf,$A4,$data,$warga);
}

if($s=="ket"){
//surat pengantar

$data  = $surat->suratPick('sk_pengantar',$n); 
$warga = $pdd->wargaDataSingkat($data[2]);
$dok->sk_pengantar($lconf,$A5,$data,$warga);
}

if($s == "pnd"){
//surat keterangan pindah;
$data  = $surat->suratPick('sk_pindah',$n); 
$warga = $pdd->wargaDataSingkat($data[3]);
$namakk=$pdd->KepalaKeluarga($data[2]);
$pengikut=$pdd->pengikutPindah($data[9]);
$dok->sk_pindah($lconf,$A4,$data,$warga,$namakk,$pengikut);
}

if($s == "skm"){
//Surat Siswa Kurang Mampu
$data = $surat->suratPick('sk_kurma1',$n);
$ortu = $pdd->wargaDataSingkat($data[3]);
$anak = $pdd->wargaDataSingkat($data[2]);
$dok->sk_kurma1($lconf,$A5,$data,$ortu,$anak);
}

if($s == "wkm"){
//Surat Warga Kurang Mampu
$data  = $surat->suratPick('sk_kurma2',$n);
$warga = $pdd->wargaDataSingkat($data[2]);
$dok->sk_kurma2($lconf,$A5,$data,$warga);
}


?>
<a href="./" class="noprint">Kembali</a>
</body>
</html>
