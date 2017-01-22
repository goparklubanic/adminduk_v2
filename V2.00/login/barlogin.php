<?php session_start(); 

require_once('../lib/aparatur.class.inc.php');
$apr = new aparatur();
$login=$apr->aparalogin($_POST['katuid'],$_POST['katpwd']);
#print_r($login);

if($login[0]==0)
{
	echo "
	<script>
	alert('Nama Pengguna atau Sandi Tidak Sesuai');
	window.location='./';
	</script>";
	
}else{
	$_SESSION['user']=$login[2];
	if($login['2']=='Administrator')
	{
		$nxp="../keluradmin/";
	}else{
		$nxp="../";
	}
	
	echo "
	<script>
		window.location='".$nxp."';
	</script>
	";
}
 
?>
