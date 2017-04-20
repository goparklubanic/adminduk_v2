<?php
require "./lib/penduduk.class.inc.php";
$pdd = new penduduk();
//print_r($_GET);
/*
foreach($_GET AS $fil => $knc){
	echo "\$_GET['$fil'];<br />";
}
*/ 
list($rt,$rw)=explode("|",$_GET['tw']);
$tgl = $_GET['tg'];
?>
<!--div class="table-responsive"-->
<div id="dpil">
	<table class="table table-sm">
		<tr>
			<th class="ngumpet">NO.</th>
			<th name="top">NIK</th>
			<th>Nama Lengkap</th>
			<th>L / P</th>
			<th class="ngumpet">Tempat Lahir</th>
			<th>Tanggal Lahir</th>
		</tr>
<?php
$pdd->dapem($rt,$rw,$tgl,$_GET['pg']);
?>
	</table>
</div>
<div><center><?php $pdd->paging($_GET['pg']); ?></center></div>
