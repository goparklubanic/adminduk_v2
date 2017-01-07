<?php
class statistik{
	function koneksi()
	{
		include "koneksi.inc.php";
		return $conn;
	}
	
	function setQuery($sql){
		$conn = $this->koneksi();
		$tqry = $conn->prepare($sql);
		return $tqry;
	}
	
	function pilrtrw($col,$data)
	{
		$qry = $this->setQuery("SELECT distinct(concat(rt,'/',rw)) AS rtrw,
				rt,rw
				FROM penduduk WHERE rt != 0 && rw !=0 
				ORDER BY rw,rt");
		$qry->execute();
		while($rs = $qry->fetch())
		{
			$stt_l=$this->sttdata($col,$rs['rt'],$rs['rw'],'L',$data);
			$stt_p=$this->sttdata($col,$rs['rt'],$rs['rw'],'P',$data);
			$sttlp=$stt_l+$stt_p;
			echo "
			<tr>
				<td> RT. ".$rs['rt']." RW. ".$rs['rw']."</td>
				<td align='right'>".$stt_l."</td>
				<td align='right'>".$stt_p."</td>
				<td align='right'>".$sttlp."</td>
			</tr>
			";
		}
		$qry->closeCursor();
	}
	
	function sttdata($col,$rt,$rw,$kelamin,$data){
		$sql = "SELECT count($col) AS data FROM penduduk 
				WHERE 	rt = ? && rw = ? && kelamin = ? &&
						$col = ?";
		//echo $sql;
		$qry=$this->setQuery($sql);
		$qry->execute(array($rt,$rw,$kelamin,$data));
		$rs = $qry->fetch();
		return $rs['data'];
		//echo number_format($rs['data'],0,',','.');
		$qry->closeCursor();
	}
	
	
	function pilrw($col,$data)
	{
		$qry = $this->setQuery("SELECT distinct(rw) AS rw
				FROM penduduk WHERE rw !=0 
				ORDER BY rw");
		$qry->execute();
		while($rs = $qry->fetch())
		{
			$stt_l=$this->sttrw($col,$rs['rw'],'L',$data);
			$stt_p=$this->sttrw($col,$rs['rw'],'P',$data);
			$sttlp=$stt_l+$stt_p;
			echo "
			<tr>
				<td>RW. ".$rs['rw']."</td>
				<td align='right'>".$stt_l."</td>
				<td align='right'>".$stt_p."</td>
				<td align='right'>".$sttlp."</td>
			</tr>
			";
		}
		$qry->closeCursor();
	}
	
	function sttrw($col,$rw,$kelamin,$data){
		$sql = "SELECT count($col) AS data FROM penduduk 
				WHERE 	rw = ? && kelamin = ? && 
						$col = ? && rt !=0";
		
		$qry=$this->setQuery($sql);
		$qry->execute(array($rw,$kelamin,$data));
		$rs = $qry->fetch();
		return $rs['data'];
		//echo number_format($rs['data'],0,',','.');
		$qry->closeCursor();
	}
	
	function pildesa($col,$data)
	{
		$stt_l=$this->sttdesa($col,'L',$data);
		$stt_p=$this->sttdesa($col,'P',$data);
		$sttlp=$stt_l+$stt_p;
		
		echo "
		<tr>
			<td>Total</td>
			<td align='right'>".$stt_l."</td>
			<td align='right'>".$stt_p."</td>
			<td align='right'>".$sttlp."</td>
		</tr>
		";
		
	}
	function sttdesa($col,$kelamin,$data){
		$sql = "SELECT count($col) AS data FROM penduduk 
				WHERE 	kelamin= ? && $col = ? && rt != 0 
						&& rw !=0 ";
		
		$qry=$this->setQuery($sql);
		$qry->execute(array($kelamin,$data));
		$rs = $qry->fetch();
		return $rs['data'];
		//echo number_format($rs['data'],0,',','.');
		$qry->closeCursor();
	}
	
	function subTotPdd($col,$rt,$rw)
	{
		$sql = "SELECT count($col) AS data FROM penduduk 
				WHERE 	rt = ? && rw = ? ";
		$qry=$this->setQuery($sql);
		$qry->execute(array($rt,$rw));
		$rs = $qry->fetch();
		return $rs['data'];
		$qry->closeCursor();
	}
	
	function distCol($col)
	{
		$cols=array();
		$qry = $this->setQuery("SELECT DISTINCT($col) AS col 
				FROM penduduk ORDER BY $col");
		$qry->execute();
		while($rs = $qry->fetch())
		{
			array_push($cols,$rs['col']);
		}
		
		return $cols;
	}
	
	function pokumur($mu,$su,$lp,$rt,$rw)
	{
		$qry = $this->setQuery("SELECT count(umur) AS pokumur 
				FROM view_klpumur 
				WHERE 	umur >= ? && umur < ? && rt=? && 
						rw=? && kelamin = ?");
		$qry -> execute(array($mu,$su,$rt,$rw,$lp));
		$rs = $qry->fetch(); return $rs['pokumur'];
	}
	
	function subTotUmur($mu,$su,$rt,$rw)
	{
		$qry = $this->setQuery("SELECT count(umur) AS pokumur 
				FROM view_klpumur 
				WHERE 	umur >= ? && umur < ? && rt=? && 
						rw=? ");
		$qry -> execute(array($mu,$su,$rt,$rw));
		$rs = $qry->fetch(); return $rs['pokumur'];
	}
	
	//fungsi kelamin //
	function jmKelPerRt($s,$t,$w)
	{
		$qry = $this->setQuery("SELECT COUNT(kelamin) kelamin 
				FROM view_penduduk 
				WHERE	kelamin = ? && rt = ? && rw = ?");
		$qry->execute(array($s,$t,$w));
		$rs = $qry->fetch();
		return $rs['kelamin'];
		$qry->closeCursor();
	}
	
	function jmKelPerRw($s,$w)
	{
		$qry = $this->setQuery("SELECT COUNT(kelamin) kelamin 
				FROM view_penduduk 
				WHERE	kelamin = ? && rw = ? && rt !=0");
		$qry->execute(array($s,$w));
		$rs = $qry->fetch();
		return $rs['kelamin'];
		$qry->closeCursor();
	}
	
	function jmKelPerDesa($s)
	{
		$qry = $this->setQuery("SELECT COUNT(kelamin) kelamin 
				FROM view_penduduk 
				WHERE	kelamin = ? && rt !=0 && rw !=0");
		$qry->execute(array($s));
		$rs = $qry->fetch();
		return $rs['kelamin'];
		$qry->closeCursor();
	}
	
	function kelRtRw()
	{
		$qry = $this->setQuery("SELECT distinct(concat(rt,'/',rw)) AS rtrw,
				rt,rw
				FROM penduduk WHERE rt != 0 && rw !=0 
				ORDER BY rw,rt");
		$qry->execute();
		while($rs = $qry->fetch())
		{
			
			$jmL = $this->jmKelPerRt('L',$rs['rt'],$rs['rw']);
			$jmP = $this->jmKelPerRt('P',$rs['rt'],$rs['rw']);
			$jmT = $jmL + $jmP;
			
			echo "
			<tr>
				<td> RT. ".$rs['rt']." RW. ".$rs['rw']."</td>
				<td align='right'>".$jmL."</td>
				<td align='right'>".$jmP."</td>
				<td align='right'>".$jmT."</td>
			</tr>
			";
		}
		$qry->closeCursor();
	}
	
	function kelRw()
	{
		$qry = $this->setQuery("SELECT distinct(rw) AS rw
				FROM penduduk WHERE rw != 0
				ORDER BY rw");
		$qry->execute();
		while($rs = $qry->fetch())
		{
			$jmL = $this->jmKelPerRw('L',$rs['rw']);
			$jmP = $this->jmKelPerRw('P',$rs['rw']);
			$jmT = $jmL + $jmP;
			echo "
			<tr>
				<td>RW. ".$rs['rw']."</td>
				<td align='right'>".$jmL."</td>
				<td align='right'>".$jmP."</td>
				<td align='right'>".$jmT."</td>
			</tr>
			";
		}
		$qry->closeCursor();
	}
	
	function kelDesa()
	{
		
			$jmL = $this->jmKelPerDesa('L');
			$jmP = $this->jmKelPerDesa('P');
			$jmT = $jmL + $jmP;
			echo "
			<tr>
				<td>Jumlah total</td>
				<td align='right'>".$jmL."</td>
				<td align='right'>".$jmP."</td>
				<td align='right'>".$jmT."</td>
			</tr>
			";
	}
	//fungsi kelamin //
}
?>
