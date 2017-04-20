<?php
class kk
{
	function getConnected()
	{
		require("koneksi.inc.php");
		//$sqlconn=dbconn();
		return($conn);
	}
	
	function testConn()
	{
		$sql="SELECT pdd_nik FROM penduduk ";
		$dbc=$this->getConnected();
		$qry=$dbc->prepare($sql);
		$qry->execute();
		while($rs=$qry->fetch()){
			echo $rs[0]; echo "<br />";
		}
	}
	
	function getPendAttrib($nik){
		$sql="SELECT * FROM penduduk WHERE nik=? LIMIT 1";
		$dbc=$this->getConnected();
		$qry=$dbc->prepare($sql);
		$qry->execute(array($nik));
		$qry->setFetchMode(PDO::FETCH_ASSOC);
		$rs=$qry->fetch();
		return($rs);
	}
	
	function getWargaAttrib($nik){
		$anak=$this->getPendAttrib($nik);
		$emak=$this->getPendAttrib($anak['nik_ibu']);
		$bpak=$this->getPendAttrib($anak['nik_ayah']);
		
		return array("anak"=>$anak,"emak"=>$emak,"bpak"=>$bpak);
	}
	
	function getAlamat($nkk){
		$sql="SELECT rt,rw FROM penduduk WHERE no_kk=? LIMIT 1";
		$dbc=$this->getConnected();
		$qry=$dbc->prepare($sql);
		$qry->execute(array($nkk));
		$qry->setFetchMode(PDO::FETCH_ASSOC);
		$rs=$qry->fetch();
		return($rs['rtrw']);
	}
	
	function getKarkel($nkk)
	{
		$sql="SELECT * FROM penduduk WHERE no_kk= ? && shk ='Kepala Keluarga' LIMIT 1";
		$dbc=$this->getConnected();
		$qry=$dbc->prepare($sql);
		$qry->execute(array($nkk));
		$rs=$qry->fetch();
		return($rs);
	}
	
	function kkdummy()
	{
		$th=array("NIK","NAMA","KELAMIN","TEMPAT LAHIR","TANGGAL LAHIR","AGAMA","PENDIDIKAN","PEKERJAAN","STATUS PERKAWINAN","STATUS HUB. KELUARGA","KEWARGANEGARAAN","NO.  PASPOR","NO. KITAPS","NIK AYAH","NIK IBU","NOMOR KK");
		$wh=array(150,200,100,75,75,100,100,150,150,150,100,100,100,150,150,150);
		$tw=0;
		for($w=0;$w<count($th);$w++){$tw+=$wh[$w];}
		echo "<table width='".$tw."px'>";
		echo "<tr>";
		for($h=0;$h<count($th);$h++)
		{
			echo "<th width='".$tdw."px'>".$th[$h]."</th>";
		}
		echo "</tr>";
		
		$sql="SELECT * FROM penduduk ORDER BY nik";
		$dbc=$this->getConnected();
		$qry=$dbc->prepare($sql);
		$qry->execute();
		$qry->setFetchMode(PDO::FETCH_NUM);
		
		while($rs=$qry->fetch())
		{
			echo "<tr>";
			for($c=0;$c<count($rs);$c++)
			{
				echo "<td>".$rs[$c]."</td>";
			}
			echo "</tr>";
		}
		echo "</table>";
	}
	
}
?>
