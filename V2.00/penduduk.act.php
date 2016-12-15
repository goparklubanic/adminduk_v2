<pre>
<?php
require "./lib/penduduk.class.inc.php";
$pdd = new penduduk();
/*
print_r($_GET);
foreach($_POST AS $que => $ans){
	echo "\$_POST['$que'],";
}
*/
if(isset($_GET['inp']))
{
	$dapen = array ($_POST['nik'],$_POST['nama_lengkap'],$_POST['kelamin'],
			$_POST['shk'],$_POST['tp_lahir'],$_POST['tg_lahir'],
			$_POST['st_kawin'],$_POST['kd'],$_POST['agama'],$_POST['gol_darah'],
			$_POST['pendidikan'],$_POST['pekerjaan'],$_POST['nik_ayah'],
			$_POST['nik_ibu'],$_POST['no_akte_lahir'],$_POST['dusun'],
			$_POST['rW'],$_POST['rt'],$_POST['no_kk'],$_POST['haji'],
			$_POST['rtm']);
			
	$pdd->wargaBaru($dapen);
	
}

if(isset($_GET['upd']))
{
	//print_r($_POST);
	$dapen = array ($_POST['nik'],$_POST['nama_lengkap'],$_POST['kelamin'],
			$_POST['shk'],$_POST['tp_lahir'],$_POST['tg_lahir'],
			$_POST['st_kawin'],$_POST['kd'],$_POST['agama'],$_POST['gol_darah'],
			$_POST['pendidikan'],$_POST['pekerjaan'],$_POST['nik_ayah'],
			$_POST['nik_ibu'],$_POST['no_akte_lahir'],$_POST['dusun'],
			$_POST['rw'],$_POST['rt'],$_POST['no_kk'],$_POST['haji'],
			$_POST['rtm'],$_POST['idxPdd']);
	$pdd->wargaUpdate($dapen);
}

if(isset($_GET['rmv']))
{
	$pdd->wargaHapus($_GET['id']);
}

echo "<script>
alert('Proses Berhasil'); window.location='./menu.php?capen';
</script>";
 
?>

</pre>

