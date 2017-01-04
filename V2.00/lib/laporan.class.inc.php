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
	
}
