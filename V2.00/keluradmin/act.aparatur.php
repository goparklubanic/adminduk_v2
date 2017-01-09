<?php
require_once "../lib/aparatur.class.inc.php";
$apr = new aparatur();
if($_GET['mod'] == 'add')
{
	$data = array('nip'=>$_POST['nip'],'nma'=>$_POST['nma'],
			'jbt'=>$_POST['jbt'],'usr'=>$_POST['usr'],
			'pwd'=>$_POST['pwd']);
			
	$apr->nambah($data);
	echo "
	<script>
	alert('Data aparatur berhasil ditambahkan');
	</script>
	";
}

if($_GET['mod'] == 'edt')
{
	$data = array('nip'=>$_POST['nip'],'nma'=>$_POST['nma'],
			'jbt'=>$_POST['jbt'],'id'=>$_POST['uid']);
	$apr->ngubah($data);
	
	echo "
	<script>
	alert('Data aparatur berhasil dimutakhirkan');
	</script>
	";
	
}

if($_GET['mod'] == 'crd')
{
	$data = array('usr'=>$_POST['usr'],'pwd'=>$_POST['pwd'],
			'id'=>$_POST['uid']);
	$apr->ganups($data);
	
	echo "
	<script>
	alert('Data user dan sandi berhasil dimutakhirkan');
	</script>
	";
	
}

if($_GET['mod']=='bsx')
{
	$apr->mbusek($_GET['id']);
	
	echo "
	<script>
	alert('Data aparatur berhasil dihapus');
	</script>
	";
}

echo "<script>window.location='./';</script>";
?>
