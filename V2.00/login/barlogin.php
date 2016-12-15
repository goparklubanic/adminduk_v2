<?php session_start(); ?>
<!--
<!DOCTYPE html>
<html lang="en">
<head>
  <title>PUSTAKA-CANDIWULAN</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="../lib/cawul.css">
  <script src="../bootstrap/jquery.min.js"></script>
  <script src="../bootstrap/bootstrap.min.js"></script>
  <script src="../lib/candiwulan.js"></script>
</head>
<body>
	<div class='container'>
-->
<?php
$_SESSION['user']='user pencoba';
echo "
<script>window.location='../';</script>
";
/*
print_r($_POST);
$hashed = md5('semampir_*_Ban74rnegaR@');
$encripted= hash("sha256",$hashed,false);
echo "<br/>".$encripted;
echo "<br/>".strlen($encripted);
*/ 
//require "../lib/admin.class.inc.php";
//$login = new admin();
//$dl = $login->admlogin($_POST['pusuid'],$_POST['puspwd']);
//echo "<pre>";print_r($dl);echo "</pre>";
/*
if($dl['exst']=="1"){
	$_SESSION['uid'] = $dl['data']['idAdmin'];
	$_SESSION['usr'] = $dl['data']['username'];
	$_SESSION['rln'] = $dl['data']['namaLengkap'];
	$_SESSION['uml'] = $dl['data']['email'];
	echo "
	<div class='alert alert-success'>
	Selamat datang: ".$dl['data']['namaLengkap']." [ ".$dl['data']['username']." ]
	</div>
	<div>
	  <a href='../pusadmin/' class='btn btn-success'>Lanjut</a>
	</div>	
	";
}else{
	echo "
	<div class='alert alert-danger'>Login tidak berhasil, silakan <a href='./'>login</a>kembali.</div>
	";	
}
*/ 
?>
<!--
	</div>
</body>
</html>
-->
