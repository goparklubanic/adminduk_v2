<?php
class laporan{
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
	
	function laporanPick($nl)
	{
		$sql = "SELECT jenisLap, dataLap FROM laporan WHERE id = ?";
		$qry = $this->setQuery($sql);
		$qry->execute(array($nl));
		$rs = $qry->fetch();
		return $rs;
	}
	
	function laporanList($ty)
	{
		echo "
		<table class='table table-sm'>
		<tr>
		  <th>Nomor Laporan</th>
		  <th>Jenis Laporan</th>
		</tr>
		";
		$sql = "SELECT id,jenisLap FROM laporan
				WHERE jenisLap = ?
				ORDER BY id DESC limit 20";
		$qry = $this->setQuery($sql);
		$qry->execute(array($ty));
		while($rs = $qry->fetch())
		{
			echo "
			<tr>
			  <td><a href='./?menu=laporan&id=".$rs['id']."'>".sprintf("%04d",$rs['id'])."</a></td>
			  <td>".strtoupper($rs['jenisLap'])."</td>
			</tr>
			";	
		}
		echo "</table>";
	}
	
	function pengantarList()
	{
		echo "
		<table class='table table-sm'>
		<tr>
		  <th>Nomor Laporan</th>
		  <th>Jenis Laporan</th>
		</tr>
		";
		$sql = "SELECT id FROM pengantar
				ORDER BY id DESC limit 20";
		$qry = $this->setQuery($sql);
		$qry->execute();
		while($rs = $qry->fetch())
		{
			echo "
			<tr>
			  <td><a href='./?menu=pengantar&id=".$rs['id']."'>".sprintf("%04d",$rs['id'])."</a></td>
			  <td>PENGANTAR</td>
			</tr>
			";	
		}
		echo "</table>";
	}
	
	function pengantarPick($np)
	{
		$sql = "SELECT referensi FROM pengantar WHERE id = ?";
		$qry = $this->setQuery($sql);
		$qry->execute(array($np));
		$rs = $qry->fetch();
		return $rs;
	}
	
}
