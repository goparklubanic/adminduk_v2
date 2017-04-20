<?php
class aparatur
{
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
	
	function nambah($data){
		$sql = "INSERT INTO apartur 
				SET	nip = ? , nama = ? , username = ? , password = ?
				, jabatan = ?, paraf = ?";
		$qry = $this->setQuery($sql);
		$qry->execute(array($data['nip'],$data['nma'],$data['usr'],
			  md5($data['usr']."_".$data['pwd']), $data['jbt'],$data['paraf']));
		$qry=null;
	}
	
	function ngubah($data){
		$sql = "UPDATE apartur 
				SET	nip = ? , nama = ? , jabatan = ? , paraf = ?
				WHERE id = ?";
		$qry = $this->setQuery($sql);
		$qry->execute(array($data['nip'],$data['nma'], $data['jbt'],$data['paraf'], $data['id']));
		$qry=null;
	}
	
	function ganups($data)
	{
		$sql = "UPDATE apartur 
				SET	username = ? , password = ?
				WHERE id = ?";
		$qry = $this->setQuery($sql);
		$qry->execute(array($data['usr'], md5($data['usr']."_".$data['pwd']), 
				$data['id']));
		$qry=null;
	}
	
	function mbusek($id){
		$sql = "DELETE FROM apartur WHERE id = ?";
		$qry = $this->setQuery($sql);
		$qry->execute(array($id));
		$qry=null;
	}
	
	function nongol(){
		$sql = "SELECT * FROM apartur 
				WHERE nip !='000000000000000' || nama !='Administrator'
				LIMIT 20";
		$qry = $this->setQuery($sql);
		$qry->execute();
		while($rs = $qry->fetch()){
			echo "
			<tr>
			  <td>".$rs['nip']."</td>
			  <td>".$rs['nama']."</td>
			  <td>".$rs['jabatan']."</td>
			  <td>".$rs['username']."</td>
			  <td>
				<a href=javascript:void(0) class='btn btn-info' onClick=apredit($rs[id])>Ubah Data</a>&nbsp;
				<a href=javascript:void(0) class='btn btn-warning' onClick=aprcred($rs[id],'$rs[username]')>Set Sandi</a>&nbsp;
				<a href=javascript:void(0) class='btn btn-danger' onClick=buseksi($rs[id])>Hapus</a>&nbsp;
			  </td>
			</tr>
			";
		}
		$qry=null;
	}
	function deleng($id){
		$sql = "SELECT * FROM apartur WHERE ID = ? LIMIT 1";
		$qry = $this->setQuery($sql);
		$qry->execute(array($id));
		$rs = $qry->fetch();
		return $rs;
	}
	
	function pemaraf()
	{
		$sql = "SELECT nip,jabatan FROM apartur WHERE paraf='1' LIMIT 20";
		$qry = $this->setQuery($sql);
		$qry->execute();
		$prf = array();
		while($rs = $qry->fetch())
		{
			$pemaraf = array("nip"=>$rs['nip'],"jabt"=>$rs['jabatan']);
			array_push($prf,$pemaraf);
		}
		return $prf;
	}
	
	function aparalogin($u,$p)
	{
		$key = md5($u.'_'.$p);
		//echo "$u $p $key";
		$sql = "SELECT nip,nama,jabatan FROM apartur where password = ? LIMIT 1";
		$qry = $this->setQuery($sql);
		$qry->execute(array($key));
		$rs = $qry->fetch();
		if($rs == null){
			return array(0,0,0,0);
		}else{
			return array(1,$rs['nip'],$rs['nama'],$rs['jabatan']);
		}
	}
}
?>
