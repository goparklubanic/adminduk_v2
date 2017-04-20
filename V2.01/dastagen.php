<?php
require_once("lib/surat.class.inc.php");
$dsa = new suratdesa();
$cdk = $dsa->agendaCacahKlas($_GET['nc']);
?>
<div id="cacahDokumen"><h6>Jumlah Surat Diterbitkan: <b><?php echo $cdk; ?></b> dokumen</h6></div>
<table class="table table-sm">
	<tr>
		<th>NOMOR AGENDA</th>
		<th>BUKU AGENDA</th>
		<th>TANGGAL</th>
		<th>PENANDA TANGAN</th>
		<th>PEMOHON</th>
		<th>RT</th>
		<th>RW</th>
		
	</tr>
<?php $dsa->agendaByNoKlas($_GET['nc'],$_GET['pg']); ?>
</table>
