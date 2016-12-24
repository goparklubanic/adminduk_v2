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
		
		function saveAgenda($klas,$tgl,$nik,$jabatan,$pemaraf)
		{
			$sql = "INSERT INTO agenda 
					SET klasifikasi = ? , tanggal = ? , nik_pemohon = ?, jabt_pemaraf = ? , nama_pemaraf = ?";
			$qry = $this->setQuery($sql);
			$qry->execute(array($klas,$tgl,$nik,$jabatan,$pemaraf));
			$qry=null;
		}
		
		function nomorBaru()
		{
			$sql = "SELECT MAX(nomor) noa FROM agenda";
			$qry = $this->setQuery($sql);
			$qry->execute();
			$rs=$qry->fetch();
			if($rs['noa']==NULL)
			{
				return '0001';
			}else{
				return $rs['noa']+1;
			}
		}
		
		function pemaraf($nok)
		{
			
			$qry = $this->setQuery("SELECT jabt_pemaraf,nama_pemaraf
					FROM agenda WHERE nomor = '$nok'");
			$qry->execute();
			$qry->setFetchMode(PDO::FETCH_NUM);
			$rs=$qry->fetch();
			return $rs;
		}
}
?>
