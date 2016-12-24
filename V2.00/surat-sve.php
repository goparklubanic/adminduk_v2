<pre>
<?php
/*
echo "\$_GET['sk']=".$_GET['sk']. "<br />* ";
echo "\$datask=";
$i=1;
foreach($_POST AS $el=>$ni)
{
	echo "\$_POST['".$el."']=".$ni."<br/>";
	if($i < count($_POST)){echo ", ";}
	$i++;
}
*/

require_once("./lib/surat.class.inc.php");
require_once("./lib/penduduk.class.inc.php");
$surat = new suratdesa();
$pendd = new penduduk();
$sk=$_GET['sk'];

if($sk=="ket"){
	$datask=array($_POST['no_klas'],$_POST['nos'],$_POST['tgs'], $_POST['nik'],
	$_POST['keperluan'], $_POST['berlaku'],$_POST['ketlain']);
	
	$surat->pengantarAdd($datask);
}

if($sk=="skm"){
	$datask=array($_POST['no_klas'], $_POST['nos'], $_POST['tgs'], 
	$_POST['nikanak'], $_POST['nik'], $_POST['sekolah']);
	
	$surat->kurma1Add($datask);
}

if($sk=="wkm"){
	$datask=array($_POST['no_klas'], $_POST['nos'], $_POST['tgs'], 
	$_POST['nik']);
	
	$surat->kurma2Add($datask);
}

if($sk=="lhr"){
	$datask=array($_POST['no_klas'], $_POST['nos'], $_POST['tgs'],$_POST['nkk'], $_POST['bynama'], 
	$_POST['bysex'], $_POST['bydilahir'], $_POST['bykelahir'], 
	$_POST['bytgl'], $_POST['byjam'], $_POST['byjnlahir'], $_POST['byanke'], 
	$_POST['bypenolong'], $_POST['byberat'], $_POST['bypanjang'], 
	$_POST['nikibu'], $_POST['tgnikah'], $_POST['nikayah'], 
	$_POST['nik'], $_POST['niksaksi1'], $_POST['niksaksi2']);
	
	$surat->lahirAdd($datask);
}

if($sk=="wft"){
	
	$datask=array($_POST['no_klas'],$_POST['nos'], $_POST['tgs'],$_POST['nkk'], 
	$_POST['jnznik'],$_POST['jnzanakke'], $_POST['jnztgl'], $_POST['jnzjam'], 
	$_POST['jnzsebab'], $_POST['jnzterang'], $_POST['jnztempat'], 
	$_POST['nikibu'], $_POST['nikayah'], $_POST['nik'],  
	$_POST['niksaksi1'], $_POST['niksaksi2']);
	
	$surat->wafatAdd($datask);
	$pendd->wargaMutasi($_POST['jnznik'],"meninggal");
	
}

if($sk=="pnd"){
	$datask=array($_POST['no_klas'],$_POST['nos'], $_POST['tgs'], 
	$_POST['nkk'], $_POST['nik'], $_POST['alasan'],  $_POST['alamat'], 
	$_POST['jenis'], $_POST['sttkkpindah'],  $_POST['sttkktetap'], 
	$_POST['kelpindah']);
	
	$surat->pindahAdd($datask);
	$pendd->wargaMutasi($_POST['nik'],"pindah");
	
	$ikpind = explode(",",$_POST['kelpindah']);
	if(!empty($_POST['kelpindah']))
	{
		$i=0 ;
		while($i < count($ikpind))
		{
			$pendd->wargaMutasi($ikpind[$i],"pindah");
			$i++;
		}
	}
}

if($sk=="nkh"){
	$datask=array($_POST['no_klas'], $_POST['nos'], $_POST['tgs'], $_POST['nik']);
	$surat->nikahAdd($datask);
}

if($sk=="ush"){
	$datask=array($_POST['no_klas'], $_POST['nos'], $_POST['tgs'], $_POST['nik'], 
	$_POST['jnusaha'], $_POST['jnbarang'], $_POST['mulaius']);
	
	$surat->usahaAdd($datask);
}

list($jabatan,$pemaraf)=explode(":",$_POST['ttd']);
$surat->saveAgenda($_POST['no_klas'],$_POST['tgs'],$_POST['nik'],
				   $jabatan,$pemaraf);

//lanjut ke cetak
echo "
<script>
	window.location='cetak.php?s=".$sk."&id=".$_POST['nos']."';
</script>
";

?>
</pre>
