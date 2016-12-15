<hr />

<?php
list($um,$ut)=explode(",",$_GET['ku']);
echo "<h3>Kelompok Umur ".$um." Tahun s.d ".$ut." Tahun</h3>";
$ku = new pokumur();
echo "<table class='table table-sm'>
		<thead>
		  <tr>
		    <th>RT / RW</th>
		    <th>L</th>
		    <th>P</th>
		    <th>JML</th>
		  </tr>
		</thead>
	 ";
echo "<tr><td class ='rekap' colspan='4'>REKAP PER RT</td></tr>";
$ku->rowtt($um,$ut);
echo "<tr><td  class ='rekap'colspan='4'>REKAP PER RW</td></tr>";
$ku->rowrw($um,$ut);
echo "<tr><td  class ='rekap'colspan='4'>JUMLAH TOTAL</td></tr>";
$ku->rowds($um,$ut);
echo "</table>";

class pokumur
{
	function koneksi()
	{
		include "./lib/koneksi.inc.php";
		return $conn;
	}
	
	function setQuery($sql)
	{
		$conn = $this->koneksi();
		$tqry = $conn->prepare($sql);
		return $tqry;
	}
	
	function rowtt($m,$t)
	{
		$qry = $this->setQuery("SELECT DISTINCT(CONCAT(rt,rw)),rt,rw
				FROM view_penduduk WHERE rt !=0 && rw !=0 ORDER BY rw,rt");
		$qry->execute();
		while($rs = $qry->fetch())
		{
			$ul=$this->klumur($m,$t,'L',$rs['rt'],'=',$rs['rw'],"=");
			$up=$this->klumur($m,$t,'P',$rs['rt'],'=',$rs['rw'],"=");
			$jm=$ul+$up;
			echo "
			<tr>
				<td>RT. ".$rs['rt']." RW. ".$rs['rw']."</td>
				<td align='right'>".$ul."</td>
				<td align='right'>".$up."</td>
				<td align='right'>".$jm."</td>
			</tr>
			";
		}
	}
	
	function rowrw($m,$t)
	{
		$qry = $this->setQuery("SELECT DISTINCT(rw) AS rw
				FROM view_penduduk WHERE rt !=0 && rw !=0
				ORDER BY rw");
		$qry->execute();
		while($rs = $qry->fetch())
		{
			$ul=$this->klumur($m,$t,'L','%','LIKE',$rs['rw'],"=");
			$up=$this->klumur($m,$t,'P','%','LIKE',$rs['rw'],"=");
			$jm=$ul+$up;
			echo "
			<tr>
				<td>RW. ".$rs['rw']."</td>
				<td align='right'>".$ul."</td>
				<td align='right'>".$up."</td>
				<td align='right'>".$jm."</td>
			</tr>
			";
		}
	}
	
	
	function rowds($m,$t)
	{
		$ul=$this->klumur($m,$t,'L','%','LIKE','%',"LIKE");
		$up=$this->klumur($m,$t,'P','%','LIKE','%',"LIKE");
		$jm=$ul+$up;
		echo "
		<tr>
			<td>TOTAL</td>
			<td align='right'>".$ul."</td>
			<td align='right'>".$up."</td>
			<td align='right'>".$jm."</td>
		</tr>
		";
	}
	
	function klumur($m,$t,$s,$rt,$ort,$rw,$orw)
	{
		$qry=$this->setQuery("SELECT COUNT(umur) AS umur FROM view_klpumur
			WHERE umur >= ? && umur < ? && kelamin = ? && rt $ort ? && 
			rw $orw ? && rt != 0 && rw != 0");
		$qry->execute(array($m,$t,$s,$rt,$rw));
		$rs = $qry->fetch();
		return $rs['umur'];
		$qry->closeCursor();
	}
}
?>
