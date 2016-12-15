<?php
if(!isset($_GET['id']))
{
?>
<center>
	<h3>Daftar Kepala Keluarga</h3>
</center>
<form role="form" class="form-horizontal">
	<div class="form-group">
		<label class="control-label col-sm-4">Pilih RT DAN RW</label>
		<div class="col-sm-8">
			<select class="form-control" id="rtrw" onChange=kklist(this.value)>
				<option value="" selected>Pilih RT / RW</option>
				<option value="01|01">RT 01 RW 01</option>
				<option value="02|01">RT 02 RW 01</option>
				<option value="03|01">RT 03 RW 01</option>
				<option value="04|01">RT 04 RW 01</option>
				
				<option value="01|02">RT 01 RW 02</option>
				<option value="02|02">RT 02 RW 02</option>
				<option value="03|02">RT 03 RW 02</option>
				<option value="04|02">RT 04 RW 02</option>
				
				<option value="01|03">RT 01 RW 03</option>
				<option value="02|03">RT 02 RW 03</option>
				<option value="03|03">RT 03 RW 03</option>
				<option value="04|03">RT 04 RW 03</option>
			</select>
		</div>
	</div>
</form>

<div id="daftKK">

</div>
<?php
}
else
{
	echo "<h4>Detil KK Nomor ".$_GET['id']."</h4>";
	echo "
	<table class='table table-sm'>
	<thead>
	  <tr>
	    <th>NIK<span class='ciut'>NAMA</span></th>
	    <th class='slempit'>NAMA</th>
	    <th class='slempit'>Tempat dan<br/>Tanggal Lahir</th>
	    <th>Status Hubungan</th>
	  </tr>
	</thead>
	<tbody>
	";
	$pdd->daftarKK($_GET['id']);
	echo "
	</tbody>
	</table>
	
	";
}
?>
<!--
<div><center><?php #$pdd->paging(); ?></center></div>
-->
<script>
function kklist(tw)
{
	var url="kkQuery.php?tw="+tw+"&pg=1";
	loadContent("daftKK",url);
}

function nxpage(){
	var tw  = document.getElementById("rtrw").value;
	var pge = document.getElementById("pagno").innerHTML;
	var npg = parseInt(pge)+1;
	var url="kkQuery.php?tw="+tw+"&pg="+npg;
	loadContent("daftKK",url);
}

function prpage(){
	var tw  = document.getElementById("rtrw").value;
	var pge = document.getElementById("pagno").innerHTML;
	var ppg = parseInt(pge)-1;
	var url="kkQuery.php?tw="+tw+"&pg="+ppg;
	loadContent("daftKK",url);
}
</script>
