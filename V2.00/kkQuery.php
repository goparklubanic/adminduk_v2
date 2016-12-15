<?php
require "./lib/penduduk.class.inc.php";
$kk = new penduduk();
list($rt,$rw)=explode("|",$_GET['tw']);
//print_r($_GET);
?>
<!--div class='table-responsive'-->
  <table class='table table-sm' id="kk">
    <thead>
		<tr>
			<th class="umpet">Urut</th>
			<th>Nomor KK<span class="ciut">Nama KK</span></th>
			<th class="umpet">Nama KK</th>
			<th class="umpet">L/P</th>
			<!--th>RT / RW</th-->
			<th>Jml Jiwa</th>
		</tr>
    </thead>
    <tbody>
		<?php
		$kk->kklist($rt,$rw,$_GET['pg']);
		?>
    </tbody>
  </table>
<!--/div-->
<div><center><?php $kk->paging($_GET['pg']); ?></center></div>
