<?php
error_reporting(0);
require "./lib/penduduk.class.inc.php";
$pdd = new penduduk();
//print_r($_GET);
/*
foreach($_GET AS $fil => $knc){
	//echo "\$_GET['$fil'];<br />";
	echo '&'.$fil.'='.$knc;
}
*/
$fltr=$_GET['flt'];
list($rt,$rw)=explode("|",$_GET['tw']);
$rt=$rt."%";
$rw=$rw."%";

if($_GET['m'] == 0){
	$keyw="%".$_GET['kw']."%";
}else{
	$keyw=$_GET['kw'];
}
 
?>
<div class="table-responsive">
	<table class="table table-sm">
		<tr>
			<td>Urut</td>
			<td>NIK</td>
			<td>Nama Lengkap</td>
			<td>L / P</td>
			<td>RT / RW</td>
			<td>pekerjaan</td>
			<td>Agama</td>
			<td>Pendidikan</td>
		</tr>
<?php
$pdd->capen($fltr,$rt,$rw,$keyw,$_GET['m'],$_GET['pg']);
?>
	</table>
</div>
<div><center><?php $pdd->paging($_GET['pg']); ?></center></div>
