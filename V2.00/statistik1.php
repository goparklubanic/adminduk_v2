<?php
//require "./lib/statistik.class.inc.php";
//$stt = new statistik();

echo "<div><h2>Data </h2></div>";
echo "<table class='table table-sm'>";
tbhead($rtrw);
//tbloop('Laki-laki','data','kelamin','L','L',$stt);
//tbloop('Perempuan','data','kelamin','P','P',$stt);
//tbloop('Jumlah','subtotal','kelamin','P','P',$stt);
echo "</table>";

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
		$st = $stt->subTotGroup($data,$rt,$rw);
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

function tbhead($rtrw)
{
	echo "<tr>";
	echo "<td rowspan='2'><b>RT/RW</b></td>"
	list($rt,$rw)=explode("-",$rtrw);
	echo "<td colpan='2'>".$rt."/".$rw."</td>";
}



?>
