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
$nosurat=kopkelur."/".date('Y');
$lconf=array('dk'=>$dskl,'nm'=>$desa,'kc'=>$kecamatan,'kb'=>$kabupaten,
			 'wil'=>$dewil,'kp'=>$kepala,'ns'=>$nosurat); 
$s=$_GET['s'];
$n=$_GET['id'];

	$A4 = "
	<table width='100%'>
	  <tr>
	    <td width='80px'>
	      <img src='imgz/wanimemetri_hp.png' width='50px' />
	    </td>
	    <td>
			<div id='kop1'>PEMERINTAH KABUPATEN $ukab</div>
			<div id='kop2'>KECAMATAN $ukec</div>
			<div id='kop3'>$udkl $udes</div>
			<div id='kop4'>$alamat</div>    
	    </td>
	  </tr>
	</table>
	
	<hr style='height:2px; background: #000;'>
	";

	$A5 = "
	<table width='100%'>
	  <tr width='60px'>
	    <td><img src='imgz/wanimemetri_hp.png' width='50px' /></td>
	    <td>
			<div id='kop1-a5'>PEMERINTAH KABUPATEN $ukab</div>
			<div id='kop2-a5'>KECAMATAN $ukec</div>
			<div id='kop3-a5'>$udkl $udes</div>
			<div id='kop4-a5'>$alamat</div>    
	    </td>
	  </tr>
	</table>
	
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
$hariLahir=$surat->ambilHari($data[8]);
$ibu = $pdd->wargaDataSingkat($data[15]);
$bpk = $pdd->wargaDataSingkat($data[17]);
$lpr = $pdd->wargaDataSingkat($data[18]);
$sk1 = $pdd->wargaDataSingkat($data[19]);
$sk2 = $pdd->wargaDataSingkat($data[20]);
list($jbt,$ttd)=$surat->pemaraf($data[1]);
$dok->sk_lahir($lconf,$data,$hariLahir,$ibu,$bpk,$lpr,$sk1,$sk2,$jbt,$ttd);
}

if($s=="wft"){
//surat kematian
$data=$surat->suratPick('sk_wafat',$n);
$namakk=$pdd->KepalaKeluarga($data[3]);
$jnz = $pdd->dataJnz($data[4]);
$ibu = $pdd->wargaDataSingkat($data[11]);
$bpk = $pdd->wargaDataSingkat($data[12]);
$lpr = $pdd->wargaDataSingkat($data[13]);
$sk1 = $pdd->wargaDataSingkat($data[14]);
$sk2 = $pdd->wargaDataSingkat($data[15]);
list($jbt,$ttd)=$surat->pemaraf($data[1]);
$dok->sk_wafat($lconf,$data,$namakk,$jnz,$ibu,$bpk,$lpr,$sk1,$sk2,$jbt,$ttd);
}

if($s=="nkh"){
//surat keterangan nikah
$data  = $surat->suratPick('sk_nikah',$n);
$warga = $pdd->wargaDataSingkat($data[3]);
list($jbt,$ttd)=$surat->pemaraf($data[1]);
$dok->sk_nikah($lconf,$A4,$data,$warga,$jbt,$ttd);
}

if($s=="ush"){
//surat keterangan usaha
$data  = $surat->suratPick('sk_usaha',$n); 
$warga = $pdd->wargaDataSingkat($data[3]);
list($jbt,$ttd)=$surat->pemaraf($data[1]);
$dok->sk_usaha($lconf,$A4,$data,$warga,$jbt,$ttd);
}

if($s=="ket"){
//surat pengantar

$data  = $surat->suratPick('sk_pengantar',$n); 
$warga = $pdd->wargaDataSingkat($data[3]);
list($jbt,$ttd)=$surat->pemaraf($data[1]);
$dok->sk_pengantar($lconf,$A5,$data,$warga,$jbt,$ttd);
}

if($s == "pnd"){
//surat keterangan pindah;
$data  = $surat->suratPick('sk_pindah',$n); 
$warga = $pdd->wargaDataSingkat($data[4]);
$namakk=$pdd->KepalaKeluarga($data[3]);
$pengikut=$pdd->pengikutPindah($data[10]);
list($jbt,$ttd)=$surat->pemaraf($data[1]);
$dok->sk_pindah($lconf,$A4,$data,$warga,$namakk,$pengikut,$jbt,$ttd);
}

if($s == "skm"){
//Surat Siswa Kurang Mampu
$data = $surat->suratPick('sk_kurma1',$n);
$ortu = $pdd->wargaDataSingkat($data[4]);
$anak = $pdd->wargaDataSingkat($data[3]);
list($jbt,$ttd)=$surat->pemaraf($data[1]);
$dok->sk_kurma1($lconf,$A5,$data,$ortu,$anak,$jbt,$ttd);
}

if($s == "wkm"){
//Surat Warga Kurang Mampu
$data  = $surat->suratPick('sk_kurma2',$n);
//print_r($data);
$warga = $pdd->wargaDataSingkat($data[3]);
//print_r($warga);
list($jbt,$ttd)=$surat->pemaraf($data[1]);
$dok->sk_kurma2($lconf,$A5,$data,$warga,$jbt,$ttd);
}


?>
<a href="./" class="noprint">Kembali</a>
</body>
</html>
