<?php
$lstAgn = new agenda();
$nomorAkhir=$lstAgn->lastNumber($_GET['buku']);
echo $nomorAkhir;

/* *** kelas agenda *** */
class agenda
{
	function trx($sql)
	{
		include("./lib/koneksi.inc.php");
		$qry = $conn->prepare($sql);
		return $qry;
	}
	
	function lastNumber($buku)
	{
		$sql = "SELECT MAX(Nobuku) as Nobuku FROM agenda
				WHERE buku = ? ";
		$qry = $this->trx($sql);
		$qry->execute(array($buku));
		$rs = $qry->fetch();
		$ln = $rs['Nobuku'] + 1;
		return(sprintf("%04d",$ln));
	}
}
/* *** kelas agenda *** */
?>
