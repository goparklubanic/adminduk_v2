<?php
include "menustatis.html";
if(!isset($_GET['st'])){echo "<script>window.location='./menu.php?statistik&st=st_kawin';</script>";}
$info = $stt->distCol($_GET['st']);
echo "<div><h2>DATA "; echo kamus($_GET['st']); echo "</h2></div>";
for($i=0 ; $i < count($info) ; $i++)
{
	retabling($_GET['st'],$info[$i],$stt);
}

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
function retabling($data,$status,$stt){
if($status==''){$jt = "Tanpa Keterangan"; }else{$jt = $status; }
echo "<h3>".$jt."</h3>";
echo "<table class='table table-sm' style='background: #333;'>";
tbloop('RT/RW','head','','','','');
tbloop('Laki-laki','data',$data,'L',$status,$stt);
tbloop('Perempuan','data',$data,'P',$status,$stt);
tbloop('Jumlah','subtotal',$data,'',$status,$stt);
echo "</table>";
}

function tbloop($lbkiri,$func,$data,$lp,$key,$stt){
$rtrw=array("01-01","02-01","03-01","04-01",
			"01-02","02-02","03-02","04-02",
			"01-03","02-03","03-03","04-03");
echo "
<tr>
	<th>".$lbkiri."</th>
";
$j=0;
for($tw = 0; $tw < 12 ; $tw++){
	list($rt,$rw)=explode("-",$rtrw[$tw]);
	if($func == 'head'){ 
		tbhead($rt,$rw); $lbkanan="<b>JUMLAH</b>";
	}elseif($func == 'subtotal'){
		$st = $stt->subTotGroup($data,$rt,$rw,$key);
		echo "<td align='right'>".number_format($st,0,',','.')."</td>";
		$j+=$st;
		$lbkanan=$j;
	}else{
	$d=$stt->sttdata($data,$rt,$rw,$lp,$key);
	echo "<td align='right'>".number_format($d,0,',','.')."</td>";
	$j+=$d;
	$lbkanan=$j;
	}
}

echo "
	<td align='right'>".$lbkanan."</td>
</tr>";
}

function tbhead($rt,$rw)
{
	echo "<td>".$rt."/".$rw."</td>";
}

?>
