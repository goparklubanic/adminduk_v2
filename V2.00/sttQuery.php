<?php
require "./lib/statistik.class.inc.php";
$stt = new statistik();

//print_r($_GET);
echo "<h3>".$_GET['d']."</h3>";
?>
	<table class='table table-sm'>
	<thead>
		<tr>
			<th>RT/RW</th>
			<th>LAKI-LAKI</th>
			<th>PEREMPUAN</th>
			<th>JUMLAH</th>
		</tr>
	</thead>
	<tbody>
	<tr><td class ='rekap' colspan='4'><b>REKAP PER RT</b></tr>
	<?php
	if($_GET['c']=='kelamin'){
		$stt->kelRtRw();
		echo "<tr><td class ='rekap' colspan='4'><b>REKAP PER RW</b></tr>";
		$stt->kelRw();
		echo "<tr><td class ='rekap' colspan='4'><b>JUMLAH KESELURUHAN</b></tr>";
		$stt->kelDesa();
	}else{
		$stt->pilrtrw($_GET['c'],$_GET['d']);
		echo "<tr><td class ='rekap' colspan='4'><b>REKAP PER RW</b></tr>";
		$stt->pilrw($_GET['c'],$_GET['d']);
		echo "<tr><td class ='rekap' colspan='4'><b>JUMLAH KESELURUHAN</b></tr>";
		$stt->pildesa($_GET['c'],$_GET['d']);
	}
	?>
	</tbody>
	</table>
</div>
