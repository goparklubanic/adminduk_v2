<?php
session_start();
//error_reporting(0);
if(!isset($_SESSION['user'])){header("Location:./login/");} 
	date_default_timezone_set('Asia/Jakarta');
	require_once 'config.php'; 
	require_once './lib/penduduk.class.inc.php';
	require_once './lib/statistik.class.inc.php';
	require_once './lib/forms.inc.php';
	require_once("./lib/surat.class.inc.php");
	
	$frm = new formulir();
	$pdd = new penduduk();
	$stt = new statistik();
	$dok = new suratdesa();
	$noa = $dok->nomorBaru();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>KEPENDUDUKAN <?php echo desa; ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initBootstrap Exampleial-scale=1">
  
  <link rel="stylesheet" href="./lib/bootstrap.min.css">
  <link rel="stylesheet" href="./lib/adminduk.css">
  
  <script src="./lib/jquery.min.js"></script>
  <script src="./lib/bootstrap.min.js"></script>
  <script src="./lib/ajax.js"></script>
  </head>
  <body>
	<div class="container-fluid">
	  <!-- header -->
	  <div class="page-header" id="ph">
		<h4>PEMERINTAH KABUPATEN BANJARNEGARA</h2>
		<h3><?php echo "KECAMAMATAN ".strtoupper(kecamatan); ?></h3>
	    <h2><?php echo strtoupper(dskl)." ".strtoupper(desa); ?></h3>
	    <!--h4>ADMINISRASI KEPENDUDUKAN</h4-->
	  </div>
	  <div class="row">
		<!-- left menu / pills -->
		<div class="col-sm-3">
			
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
	  <a class="navbar-brand" href="./" id="adminduk">Administrasi Kependudukan</a>
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-pills .nav-stacked">
        <li class="active"><a href="./">BERANDA</a></li>
        <li><a href="./?menu=capen">PENCARIAN</a></li>
        <li><a href="./?menu=kk">KEPALA KELUARGA</a></li> 
        <li><a href="./?menu=form">PENDUDUK BARU</a></li> 
        
        <li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" href="#">MUTASI
				<span class="caret"></span>
			</a>
			<ul class="dropdown-menu">
			<li><a href="./?menu=surat&sk=wafat">Meninggal</a></li>
			<li><a href="./?menu=surat&sk=pindah">Warga Pindah</a></li>
			<li><a href="./?menu=form">Warga Datang</a></li> 
    </ul>
  </li>
        
        
        <li><a href="./?menu=statistik">STATISTIK</a></li>  
        <li><a href="./?menu=daftpilih">DAFTAR PEMILIH</a></li>
        <li><a href="./?menu=ekswarga">PERNAH JADI WARGA</a></li>
      </ul>
      <ul class="nav navbar-pills .nav-stacked">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign In</a></li>
        <li><a href="./login/"><span class="glyphicon glyphicon-log-in"></span> Log Out</a></li>
      </ul>
    </div>
  </div>
</nav>			
			
		  
		</div>
		<!-- main content -->
		<div class="col-sm-9" id="maincon">
		<?php 
		if(!isset($_GET['menu']))
		{include "surat-warga.php";}
		else
		{
			switch($_GET['menu']){
				
				case 'capen'     : include "capen.php"; 	break;
				case 'form'      : $frm->kk("penduduk.act.php?inp"); 	break;
				case 'statistik' : include "statistik.php";	break;
				case 'umur'      : include "pokumur.php";	break;
				case 'urai'      : include "detilduk.php";	break;
				case 'upd'       : 
						$dapen=$pdd->pilih($_GET['id']);
						$frm->kk("penduduk.act.php?upd",$dapen);	break;
				case 'daftpilih' : include "wapil.php"  ;	break;
				case 'kk'        : include "daftar-kk.php";	break;
				case 'surat'     : include "formsurat.php"; 	break;
				case 'laporan'   : include "laporan.php"; break;
				case 'stagen'    : include "stagenda.php"; break;
				case 'ekswarga'  : include "ekswarga.php"; break;
				
			}
		}
		?>
		</div>
	  </div>
	  <!-- footer section -->
	  <div class="panel panel-default">
		  <div class="panel-footer">
			  <p>Developed By Komunitas Linux Banjarnegara</p>
			  <p>&copy;2016</p>
		  </div>
	  </div>
	</div>
  </body>
 </html>
