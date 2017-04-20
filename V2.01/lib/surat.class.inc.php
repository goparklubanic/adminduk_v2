<?php
class suratdesa
{
		function koneksi(){include "koneksi.inc.php"; return $conn; }
		function setQuery($sql) {
			$tcon = $this->koneksi();
			$tqry = $tcon->prepare($sql);
			return $tqry;
		}
	
		function kurma1Add($data){
			$qry = $this->setQuery("INSERT INTO sk_kurma1
					SET	no_klas = ? , nomor = ? , tanggal = ? , 
					nik_anak = ? , nik_kklg = ? , sekolah = ?  ");
			$qry->execute($data);
			$qry->closeCursor();
		}
		
		function kurma2Add($data){
			$qry = $this->setQuery("INSERT INTO sk_kurma2
					SET	no_klas = ?, nomor = ? ,tanggal = ? ,nik = ?");
			$qry->execute($data);
			$qry->closeCursor();
		}
		
		function nikahAdd($data){
			$qry = $this->setQuery("INSERT INTO sk_nikah
					SET	no_klas = ? , nomor = ? , tanggal = ? , nik = ?");
			$qry->execute($data);
			$qry->closeCursor();
		}
		
		function pengantarAdd($data){
			$qry = $this->setQuery("INSERT INTO sk_pengantar
					SET	no_klas = ? , nomor = ? ,  tanggal = ? ,  nik = ? ,  
						keperluan = ? ,  mulai = ? ,  ketlain = ?");
			$qry->execute($data);
			$qry->closeCursor();
		}
		
		function usahaAdd($data){
			
			$qry = $this->setQuery("INSERT INTO sk_usaha
					SET	no_klas= ? , nomor = ? ,  tanggal = ? ,  nik = ? ,  jenis = ? ,  
						barang = ? ,  mulai = ?  ");
			$qry->execute($data);
			$qry->closeCursor();
		}
		
		function lahirAdd($data){ 
			$qry = $this->setQuery("INSERT INTO sk_lahir
					SET	no_klas= ? , nomor = ? , tanggal = ? , kk_nomor = ? , 
						bayi_nama = ? ,  bayi_kelamin = ? ,  
						bayi_lahir_tempat = ? ,  bayi_lahir_kota = ? ,  
						bayi_lahir_tanggal  = ? , bayi_lahir_pukul = ? ,  
						bayi_lahir_jenis = ? ,  bayi_anak_ke = ? , 
						bayi_penolong = ? ,  bayi_berat = ? ,  
						bayi_panjang = ? ,  ibu_nik = ? , ibu_tanggal_nikah = ? ,  
						ayah_nik = ? ,  pelapor_nik = ? ,  saksi1_nik = ? , 
						saksi2_nik = ? ");
						
			$qry->execute($data);
			$qry->closeCursor();
		}
		
		function pindahAdd($data){
			$qry = $this->setQuery("INSERT INTO sk_pindah
					SET	no_klas = ? , nomor = ? ,  tanggal = ? ,  kk_nomor = ? ,  
						nik_pemohon = ? ,  pindah_alasan = ? , pindah_tujuan = ? ,  
						pindah_jenis = ? ,  status_kk_pindah = ? , 
						status_kk_mnetap = ? ,  nik_keluarga_pindah = ? ");
			$qry->execute($data);
			$qry->closeCursor();
		}
		
		function wafatAdd($data){
			
			$qry = $this->setQuery("INSERT INTO sk_wafat
					SET	no_klas = ? , nomor = ? ,  tanggal = ? ,  kk_nomor = ? ,  jnz_nik = ? ,  
						jnz_anakke = ? ,  jnz_tgl = ? , jnz_jam = ? ,  
						jnz_sebab = ? ,  jnz_penerang = ? ,  jnz_tempat= ?, ibu_nik = ? ,  
						ayah_nik = ? , pelapor_nik = ? ,  saksi1_nik = ? , 
						 saksi2_nik = ?");
			$qry->execute($data);
			$qry->closeCursor();
		}
		
		function suratPick($sk='sk_lahir',$nomor="LHR001")
		{
			$sql = "SELECT * FROM $sk WHERE nomor= ? LIMIT 1";	
			$qry = $this->setQuery($sql);
			$qry->execute(array($nomor));
			$qry->setFetchMode(PDO::FETCH_NUM);
			$rs = $qry->fetch();
			return $rs;	
		}
		
		function ambilHari($tgl)
		{
			list($y,$m,$d)=explode("-",$tgl);
			$cdate = mktime(0,0,0,$m,$y,$d);
			$ndate = date('N',$cdate);
			switch($ndate)
			{
				case '1' : $nh = 'Minggu'; break;
				case '2' : $nh = 'Senin'; break;
				case '3' : $nh = 'Selasa'; break;
				case '4' : $nh = 'Rabu'; break;
				case '5' : $nh = 'Kamis'; break;
				case '6' : $nh = 'Jumat'; break;
				case '7' : $nh = 'Sabtu'; break;
			}
			return ("$nh, $d / $m /$y");
		}
		
		function saveAgenda($klas,$tgl,$nik,$nip,$sk,$buku,$nobuku)
		{
			$prf = $this->namaJabt($nip);
			
			
			$sql = "INSERT INTO agenda 
					SET klasifikasi = ? , tanggal = ? , nik_pemohon = ?, 
						jabt_pemaraf = ? , nama_pemaraf = ? , 
						nip = ? , sktab = ? , buku = ? , Nobuku = ? ";
			$qry = $this->setQuery($sql);
			$qry->execute(array($klas,$tgl,$nik,$prf['jabatan'],$prf['nama'],$nip,$sk,$buku,$nobuku));
			 
			$qry=null;
		}
		
		function namaJabt($nip)
		{
			$sql = "SELECT nama,jabatan from apartur WHERE nip = ? LIMIT 1";
			$qry = $this->setQuery($sql);
			$qry->execute(array($nip));
			$rs=$qry->fetch();
			return $rs;
		}
		
		function nomorBaru($buku)
		{
			$sql = "SELECT MAX(Nobuku) nobuku FROM agenda WHERE buku = '$buku' ";
			$qry = $this->setQuery($sql);
			$qry->execute();
			$rs=$qry->fetch();
			if($rs['nobuku']==NULL)
			{
				return '0001';
			}else{
				return $rs['nobuku']+1;
			}
		}
		
		function pemaraf($nok,$kep,$desa)
		{
			
			$qry = $this->setQuery("SELECT nip,jabt_pemaraf,nama_pemaraf
					FROM agenda WHERE nomor = '$nok'");
			$qry->execute();
			$qry->setFetchMode(PDO::FETCH_NUM);
			$rs=$qry->fetch();
			$ujab = strtoupper($rs[1]);
			
			if($ujab =='LURAH' || $ujab =='KADES' || $ujab =='KEPALA DESA'){
				return array($rs[0],$rs[1].' '.$desa,$rs[2]);
			}else{
				return array($rs[0],"a.n $kep $desa<br />".$rs[1],$rs[2]);
			}
			
		}
		
		function agendaByNoKlas($nc,$page=1)
		{
			$start = ($page - 1) * 20;
			$sql = "SELECT  nomor,tanggal, nama_lengkap, nama_pemaraf, rt,rw, sktab,Nobuku,buku
					FROM agenda, penduduk
					WHERE penduduk.nik=agenda.nik_pemohon && klasifikasi= ? 
					LIMIT $start,20";
			$qry = $this->setQuery($sql);
			$qry->execute(array($nc));
			while($rs = $qry->fetch())
			{
				//$sk=$this->kamusSk($rs['sktab']);
				echo "
				<tr>
				  <td>
				    <a href='cetak.php?s=".$rs['sktab']."&id=".$rs['nomor']."'>".sprintf("%04d",$rs['Nobuku'])."</a></td>
				  <td>".strtoupper($rs['buku'])."</td>
				  <td>".$rs['tanggal']."</td>
				  <td>".$rs['nama_pemaraf']."</td>
				  <td>".$rs['nama_lengkap'].", [ ".$rs['rt']." / ".$rs['rw']."]</td>
				  <td>".$rs['rt']."</td>
				  <td>".$rs['rw']."</td>
				</tr>
				";
			}
		}
		
		function agendaCacahKlas($nc)
		{
			$sql = "SELECT COUNT(klasifikasi) cacah FROM agenda
					WHERE klasifikasi= ?";
			$qry = $this->setQuery($sql);
			$qry->execute(array($nc));
			$rs = $qry->fetch();
			return($rs['cacah']);
		}	
				
		function serviceHistory($idxPdd)
		{
			$sql = "SELECT nomor,klasifikasi,tanggal,sktab FROM agenda 
					WHERE nik_pemohon = (SELECT nik FROM penduduk 
					WHERE idxPdd= ? LIMIT 1)";
					
			$qry = $this->setQuery($sql);
			$qry->execute(array($idxPdd));
			while ($rs = $qry->fetch())
			{
				$jensu = $this->kamusSkTab($rs['sktab']);
				echo "
				<tr>
				  <td>".$rs['klasifikasi']."/".$rs['nomor']."/".kopkelur."/".date('Y')."</td>
				  <td>".$rs['tanggal']."</td>
				  <td>".$jensu."</td>
				</tr>
				";
			}
		}
		
		function kamusSkTab($sktab)
		{
			switch($sktab){
				case 'ket': $jensu = 'Keterangan / Pengantar'; break;
				case 'skm': $jensu = 'Surat Ket. Warga Tidak Mampu'; break;
				case 'wkm': $jensu = 'Surat Ket. Siswa Tidak Mampu'; break;
				case 'lhr': $jensu = 'Surat Ket. Kelahiran'; break;
				case 'wft': $jensu = 'Surat Ket. Kematian'; break;
				case 'pnd': $jensu = 'Surat Ket. Pindah'; break;
				case 'ush': $jensu = 'Surat Ket. Usaha'; break;
			}
			return $jensu;
		}

}
?>
