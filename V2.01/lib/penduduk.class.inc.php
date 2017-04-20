<?php
class penduduk
{
	function koneksi (){
		include "koneksi.inc.php";
		return $conn;
	}
	
	function setQuery($sql)
	{
		$conn = $this->koneksi();
		$tqry = $conn->prepare($sql);
		return $tqry;
	}
	
	function pilih($pddId)
	{
		$qry = $this->setQuery("SELECT * FROM view_penduduk WHERE idxPdd = ? LIMIT 1");
		$qry->execute(array($pddId));
		$rs = $qry->fetch();
		return $rs;
	}
	
	function capen($fil,$rt,$rw,$kew,$op=0,$m)
	{
		//echo "$fil , $rt, $rw, $kew , $op , $m";
		if($op=='1'){ $op ='='; }else{ $op ='LIKE'; }
		$mu=($m-1) * 25;
		$qry = $this->setQuery("SELECT nik,nama_lengkap,kelamin,rt,rw,
				pekerjaan,agama,pendidikan,idxPdd
				FROM view_penduduk WHERE rt LIKE ? && rw LIKE ? && $fil $op ? 
				ORDER BY nama_lengkap LIMIT $mu,25");
		$qry->execute(array($rt,$rw,$kew));
		$urut=($m * 25)-24;
		while($rs = $qry->fetch())
		{
			echo "
			<tr>
				<td>".$urut."</td>
				<td>".$rs['nik']."</td>
				<td><a class ='hilite' href='./?menu=urai&id=".$rs['idxPdd']."'>".$rs['nama_lengkap']."</a></td>
				<td>".$rs['kelamin']."</td>
				<td>".$rs['rt']."/".$rs['rw']."</td>
				<td>".$rs['pekerjaan']."</td>
				<td>".$rs['agama']."</td>
				<td>".$rs['pendidikan']."</td>
			</tr>
			";
			$urut++;
		}
	}
	
	function wargaBaru($dapen)
	{
		$sql = "
		INSERT INTO penduduk SET
		nik = ? , nama_lengkap  = ? , kelamin = ? , shk = ? , tp_lahir = ? ,
		tg_lahir = ? , st_kawin = ? , kd = ? , agama = ? , gol_darah = ? ,
		pendidikan = ? , pekerjaan = ? , nik_ayah = ? , nik_ibu = ? ,
		no_akte_lahir = ? , dusun = ? , rw = ? , rt = ? , no_kk = ? ,
		haji = ? , rtm  = ? , mutasi = ? , tglmutasi = ?
		";
		
		$qry = $this->setQuery($sql); $qry->execute($dapen);
		$qry->closeCursor();
	}
	
	function wargaUpdate($dapen)
	{
		$sql = "
		UPDATE penduduk SET
		nik = ? , nama_lengkap  = ? , kelamin = ? , shk = ? , tp_lahir = ? ,
		tg_lahir = ? , st_kawin = ? , kd = ? , agama = ? , gol_darah = ? ,
		pendidikan = ? , pekerjaan = ? , nik_ayah = ? , nik_ibu = ? ,
		no_akte_lahir = ? , dusun = ? , rw = ? , rt = ? , no_kk = ? ,
		haji = ? , rtm  = ? WHERE idxPdd = ?
		";
		$qry = $this->setQuery($sql); $qry->execute($dapen);
		$qry->closeCursor();
	}
	
	function wargaHapus($id)
	{
		$qry = $this->setQuery("DELETE FROM penduduk WHERE idxPdd = ?"); 
		$qry->execute(array($id));
		$qry->closeCursor();
	}
	
	function wargaDataSingkat($nik)
	{
		$qry = $this->setQuery("SELECT nama_lengkap,tg_lahir,pekerjaan,
				dusun,rt,rw,kewarganegaraan,kelamin,tp_lahir, agama, st_kawin,
				no_kk
				FROM penduduk 
				WHERE nik = ? LIMIT 1");
		$qry->execute(array($nik));
		$rs=$qry->fetch();
		return($rs);
	}
	
	
	function wargaMutasi($nik,$status,$tgl)
	{
		 $qry = $this->setQuery("UPDATE penduduk SET mutasi = ?, tglMutasi = ?
				WHERE nik = ?");
		 $qry->execute(array($status,$tgl,$nik));
		 $qry->closeCursor();
	}
	
	function dapem($rt,$rw,$tgl,$m)
	{
		$mu = ($m-1) * 25;
		$qry = $this->setQuery("SELECT nik,nama_lengkap,kelamin,tp_lahir,tg_lahir
				FROM view_penduduk WHERE rt = ? && rw = ? && tg_lahir <= ?
				ORDER BY nama_lengkap LIMIT $mu,25");
		$qry->execute(array($rt,$rw,$tgl));
		$urut=($m * 25) - 24;
		while($rs = $qry->fetch())
		{
			echo "
			<tr>
				<td class='ngumpet'>".$urut."</td>
				<td>".$rs['nik']."</td>
				<td>".$rs['nama_lengkap']."</td>
				<td>".$rs['kelamin']."</td>
				<td class='ngumpet'>".$rs['tp_lahir']."</td>
				<td>".$rs['tg_lahir']."</td>
			</tr>
			";
			$urut++;
		}
		
	}
	
	function kklist($rt,$rw,$m){
		
		$mu=($m-1)*25;
	
		$qry = $this->setQuery("SELECT no_kk,nama_lengkap,kelamin,rt,rw
				FROM view_penduduk WHERE shk = 'KEPALA KELUARGA' && rt = ? && rw = ?
				&& no_kk !='' ORDER BY kelamin,nama_lengkap LIMIT $mu,25");
		
		$qry->execute(array($rt,$rw));
		$urut = ($m * 25)-24;
		while($rs = $qry->fetch())
		{
			$akk = $this->anggotaKK($rs['no_kk']);
			echo "
			<tr>
				<td align='right'  class='umpet'>".$urut.".</td>
				<td><a href='./?menu=kk&id=".$rs['no_kk']."'>".$rs['no_kk']."</a><span class='ciut'>".$rs['nama_lengkap']."</span></td>
				<td class='umpet'>".$rs['nama_lengkap']."</td>
				<td class='umpet'>".$rs['kelamin']."</td>
				<!--td>".$rs['rt']."/".$rs['rw']."</td-->
				<td align='right'>".$akk." jiwa</td>
			</tr>
			";
			$urut++;
		}
		$qry->closeCursor();
	}
	
	function anggotaKK($nokk)
	{
		$qry = $this->setQuery("SELECT COUNT(no_kk) AS akk FROM view_penduduk
				WHERE no_kk = ? ");
		$qry->execute(array($nokk));
		$rs = $qry->fetch();
		return $rs['akk'];
		$qry->closeCursor();
	}
	
	function daftarKK($nokk)
	{
		$qry = $this->setQuery("SELECT nik, nama_lengkap, shk, tp_lahir, tg_lahir
				FROM view_penduduk WHERE no_kk = ? ");
		$qry->execute(array($nokk));
		while($rs = $qry->fetch())
		{
			echo "
			<tr>
			  <td>".$rs['nik']."<span class='ciut'>".$rs['nama_lengkap']."</span></td>
			  <td class='slempit'>".$rs['nama_lengkap']."</td>
			  <td class='slempit'>".$rs['tp_lahir'].",<br/>".$rs['tg_lahir']."</td>
			  <td>".$rs['shk']."</td>
			</tr>
			";
		}
	}
	
	function KepalaKeluarga($nokk)
	{
		
		$qry = $this->setQuery("SELECT nama_lengkap FROM penduduk 
				WHERE shk='Kepala Keluarga' && no_kk = ?");
		$qry->execute(array($nokk));
		$rs=$qry->fetch();
		return ($rs['nama_lengkap']);
		
	}
	
	function dataJnz($nik)
	{
		$qry = $this->setQuery("SELECT nama_lengkap,kelamin,tp_lahir,
				tg_lahir,agama,pekerjaan,dusun,rt,rw 
				FROM penduduk 
				WHERE nik= ?
				LIMIT 1");
		$qry->execute(array($nik));
		$rs=$qry->fetch();
		return $rs;
	}
	
	function pengikutPindah($niks)
	{
		$nik=explode(",",$niks);
		$pengikut=array();
		for($i=0 ; $i < count($nik) ; $i ++)
		{
			$urt=$i+1;
			$akk = $this->pickNamaShk($nik[$i]);
			$kki = array($urt,$nik[$i],$akk['nama_lengkap'],$akk['shk']);
			array_push($pengikut,$kki);
			/*
			$pengikut=$pengikut."
			<tr>
			<td>".$urt."</td>
			<td>".$nik[$i]."</td>
			<td>".$akk['nama_lengkap']."</td>
			<td>".$akk['shk']."</td>
			</tr>
			";
			*/ 
		}
		
		return $pengikut;
	}
	
	function pickNamaShk($nik)
	{
		$qry = $this->setQuery("SELECT nama_lengkap, shk FROM penduduk
				WHERE nik = ?");
		$qry->execute(array($nik));
		$rs=$qry->fetch();
		return $rs;
	}
	
	function ekswarga()
	{
		$qry = $this->setQuery("SELECT nik,nama_lengkap,mutasi,tglMutasi 
				FROM penduduk 
				WHERE 	rt !=0 && rw !=0 && 
						(mutasi = 'pindah' || mutasi = 'meninggal')
				LIMIT 20");
						
		$qry->execute();
		while($rs = $qry->fetch())
		{
			$dokmut = $this->dokMutasi($rs['mutasi'],$rs['nik']);
			echo "
			<tr>
			  <td>".$rs['nik']."</td>
			  <td>".$rs['nama_lengkap']."</td>
			  <td>".$rs['mutasi']."</td>
			  <td>".$rs['tglMutasi']."</td>
			  <td>".$dokmut."</td>
			</tr>
			";
		}
	}
	
	function dokMutasi($mut,$nik)
	{
		//return("$mut/$nik");
		if($mut == 'pindah')
		{
			$sql = "SELECT no_klas,nomor,tanggal FROM sk_pindah
					WHERE nik_pemohon = ? OR nik_keluarga_pindah LIKE ?
					LIMIT 1";
			$qry = $this->setQuery($sql);
			$qry->execute(array($nik,"%".$nik."%"));
			$rs=$qry->fetch();
			return($rs['no_klas']." / ".$rs['nomor']." / Tgl. ".$rs['tanggal']);
		}
		
		if($mut == 'meninggal')
		{
			$sql = "SELECT no_klas,nomor,tanggal FROM sk_wafat
					WHERE jnz_nik = ?
					LIMIT 1";
			$qry = $this->setQuery($sql);
			$qry->execute(array($nik));
			$rs=$qry->fetch();
			return($rs['no_klas']." / ".$rs['nomor']." / Tgl. ".$rs['tanggal']);
		}
	}
	
	function paging($m=0)
	{
		if($m==0)
		{
			echo "
			<a class='btn btn-info'> <= </a>
			<span id='pagno'>1</span>
			<a href='#top' class='btn btn-info' onClick=nxpage()> => </a>
			";
		}else{
			echo "
			<a href='#top' class='btn btn-info' onClick=prpage()> <= </a>
			<span id='pagno'>".$m."</span>
			<a href='#top' class='btn btn-info' onClick=nxpage()> => </a>
			";
		}
	}
	
	function slcRtRw()
	{
		$qry=$this->setQuery("SELECT DISTINCT(CONCAT(rt,'|',rw)) rtrw, rt, rw 
			FROM penduduk ORDER BY rw,rt");
		$qry->execute();
		while($rs = $qry->fetch())
		{
			if($rs['rt']==null || $rs['rw']==null){continue;}
			echo "<option value='".$rs['rtrw']."'>RT. ".sprintf("%02d",$rs['rt'])." RW. ".sprintf("%02d",$rs['rw'])."</option>";
		}
	}
}
?>
