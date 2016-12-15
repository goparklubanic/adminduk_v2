<?php
include "menustatis.html";
if(!isset($_GET['st'])){echo "<script>window.location='./?menu=statistik&st=st_kawin';</script>";}
$info = $stt->distCol($_GET['st']);
echo "<div><h2>DATA "; echo kamus($_GET['st']); echo "</h2></div>";

echo "<select id='stareq' onChange=staliat('".$_GET['st']."',this.value) class='form-control'>";
for($tr = 0 ; $tr < count($info) ; $tr++)
{
	
	if($info[$tr]==""){
		echo "<option value=''>TANPA KETERANGAN</option>";
	}else{
		echo "<option value='".$info[$tr]."'>".strtoupper($info[$tr])."</option>";
	}
	
}
echo "</select>";
?>
<div id="stadata">
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
	</tbody>
	</table>
</div>
<?php
function kamus($st){
	switch($st){
		case 'st_kawin' 	: echo "STATUS PERKAWINAN"; 	break;
		case 'agama'		: echo "PEMELUK AGAMA"; 		break;
		case 'pendidikan'	: echo "PENDIDIKAN"; 			break;
		case 'pekerjaan'	: echo "PEKERJAAN"; 			break;
		case 'gol_darah'	: echo "GOL. DARAH"; 			break;
		case 'shk'			: echo "HUBUNGAN KELUARGA"; 	break;
		case 'haji'			: echo "PEMELUK AGAMA"; 		break;
		case 'rtm'			: echo "RMH TANGGA MISKIN"; 	break;
		case 'kelamin'		: echo "JENIS KELAMIN"; 		break;
	}
}

?>

<script>
	function staliat(col,data){
		var url="sttQuery.php?c="+col+"&d="+data;
		loadContent('stadata',url);
	}
</script>
