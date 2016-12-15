<?php
class formulir
{
	function koneksi()
	{
		include "koneksi.inc.php";
		return $conn;
	}
	
	function kk($ap,$val=array())
	{
		echo "
		<form role='form' action='".$ap."' method='POST' class='form-horizontal'>
		<input type='hidden' name='idxPdd' value='".$val['idxPdd']."' />
			<div class='form-group'>
				<label class='control-label col-sm-4'>NOMOR INDUK KEPENDUDUKAN</label>
				<div class='col-sm-6'>";
					$this->textbox('nik','nik','',$val['nik']);
		echo "
				</div>
			</div>
			
			<div class='form-group'>
				<label class='control-label col-sm-4'>NAMA LENGKAP</label>
				<div class='col-sm-6'>";
					$this->textbox('nama','nama_lengkap','',$val['nama_lengkap']);
		echo "
				</div>
			</div>
			
			<div class='form-group'>
				<label class='control-label col-sm-4'>JENIS KELAMIN</label>
				<div class='col-sm-6'>";
				$this->radiobox('kelamin',"L|Laki-laki|checked:P|Perempuan|");
		echo "	</div>
				<div class='col-sm-2'>".$val['kelamin']."</div>
			</div>
			
			<div class='form-group'>
				<label class='control-label col-sm-4'>STATUS HUBUNGAN KELUARGA</label>
				<div class='col-sm-6'>";
				$shk = $this->optData('shk','checked');
				//echo $shk;
				$this->select("shk",$shk);
		echo "	</div>
				<div class='col-sm-2'>".$val['shk']."</div>
			</div>
			
			<div class='form-group'>
				<label class='control-label col-sm-4'>TEMPAT  LAHIR DAN TANGGAL LAHIR</label>
				<div class='col-sm-4'>";
				$this->textbox('tp_lahir','tp_lahir','',$val['tp_lahir']);
		echo"
				</div>
				<div class='col-sm-2'>";
				$this->datebox('tg_lahir','tg_lahir','',$val['tg_lahir'],'TTTT-BB-HH');
		echo"
				</div>
				<div class='col-sm-2'>".$val['tp_lahir'].", ".$val['tg_lahir']."</div>
			</div>
					
			<div class='form-group'>
				<label class='control-label col-sm-4'>STATUS PERKAWINAN</label>
				<div class='col-sm-6'>";
				$stk = $this->optData('st_kawin','selected');
				$this->select('st_kawin',$stk);
		echo "	</div>
				<div class='col-sm-2'>".$val['st_kawin']."</div>
			</div>
			
			<div class='form-group'>
				<label class='control-label col-sm-4'>KD</label>
				<div class='col-sm-6'>";
					$this->textbox('kd','kd','',$val['kd']);
		echo "</div>
			</div>
			
			<div class='form-group'>
				<label class='control-label col-sm-4'>AGAMA</label>
				<div class='col-sm-6'>&nbsp;&nbsp;";
				$agm = "islam|ISLAM|checked:buddha|BUDDHA|:hindu|HINDU|:katholik|KATHOLIK|:konghucu|KONG HU CHU|:kristen|KRISTEN|:
						lainnya|Lainnya|";
				//echo $shk;
				$this->radiobox("agama",$agm);
		echo "	</div>
				<div class='col-sm-2'>".$val['agama']."</div>
			</div>
			
			<div class='form-group'>
				<label class='control-label col-sm-4'>GOLONGAN DARAH</label>
				<div class='col-sm-6'>";
				$gd = "TT|Tidak Tahu|checked:A|A|:AB|AB|:B|B|:O|O|";
				$this->radiobox("gol_darah",$gd);
		echo "	</div>
				<div class='col-sm-2'>".$val['gol_darah']."</div>
			</div>
			
			<div class='form-group'>
				<label class='control-label col-sm-4'>PENDIDIKAN TERAKHIR</label>
				<div class='col-sm-6'>";
				$pdd = $this->optData('pendidikan','selected');
				$this->select('pendidikan',$pdd);
		echo "	</div>
				<div class='col-sm-2'>".$val['pendidikan']."</div>
			</div>
			
			<div class='form-group'>
				<label class='control-label col-sm-4'>PEKERJAAN</label>
				<div class='col-sm-6'>";
				$pkj = $this->optData('pekerjaan','selected');
				$this->select('pekerjaan',$pkj);
		echo "	</div>
				<div class='col-sm-2'>".$val['pekerjaan']."</div>
			</div>
			
			<div class='form-group'>
				<label class='control-label col-sm-4'>NAMA / NIK AYAH</label>
				<div class='col-sm-6'>";
					$this->textbox('nik_ayah','nik_ayah','',$val['nik_ayah']);
		echo "
				</div>
			</div>
			
			<div class='form-group'>
				<label class='control-label col-sm-4'>NAMA / NIK IBU</label>
				<div class='col-sm-6'>";
					$this->textbox('nik_ibu','nik_ibu','',$val['nik_ibu']);
		echo "
				</div>
			</div>
			
			<div class='form-group'>
				<label class='control-label col-sm-4'>NO. AKTE KELAHIRAN</label>
				<div class='col-sm-6'>";
					$this->textbox('akte','no_akte_lahir','',$val['no_akte_lahir']);
		echo "
				</div>
			</div>
			<div class='form-group'>
				<label class='control-label col-sm-4'>ALAMAT</label>
				<div class='col-sm-4'>";
				$this->textbox('dusun','dusun','',$val['dusun'],'Dusun');	
		echo "	</div>
				<div class='col-sm-1'>";
				$this->textbox('rt','rt','',$val['rt'],'RT');	
		echo "	</div>
				<div class='col-sm-1'>";
				$this->textbox('rW','rW','',$val['rw'],'RW');	
		echo "	</div>
			</div>
			<div class='form-group'>
				<label class='control-label col-sm-4'>NOMOR KARTU KELUARGA</label>
				<div class='col-sm-6'>";
					$this->textbox('no_kk','no_kk','',$val['no_kk']);
		echo "
				</div>
			</div>
			
			<div class='form-group'>
				<label class='control-label col-sm-4'>HAJI</label>
				<div class='col-sm-6'>";
					$this->textbox('haji','haji','',$val['haji']);
		echo "
				</div>
			</div>
			
			<div class='form-group'>
				<label class='control-label col-sm-4'>RUMAH TANGGA MISKIN</label>
				<div class='col-sm-6'>";
				$gd = "BKN RTM|Bukan RTM|checked:RTM|RTM";
				
				$this->radiobox("rtm",$gd);
		echo "	</div>
				<div class='col-sm-2'>".$val['rtm']."</div>
			</div>
			
			<div class='form-group'>
				<label class='control-label col-sm-4'>PERIKSA DATA !</label>
				<div class='col-sm-8'>
					<input type='submit' class = 'btn btn-success' value='Simpan'>
				</div>
			</div>
			
		</form>
		";
		
	}
	
		
	function textbox($id,$nm,$onEvent,$tbv="",$ph="")
	{
		echo "<input type='text' class='form-control' id='".$id."' 
		name='".$nm."' ".$onEvent." value='".$tbv."' placeholder='".$ph."' >";
	}
	
	function datebox($id,$nm,$onEvent,$tbv="",$ph="")
	{
		echo "<input type='date' class='form-control' id='".$id."' 
		name='".$nm."' ".$onEvent." value='".$tbv."' placeholder='".$ph."' >";
	}
	
	function radiobox($rN,$pairs)
	{
		$rO = explode(":",$pairs);
		
		for($i=0 ; $i < count($rO) ;  $i++)
		{
			list($rV,$rL,$sLC)=explode("|",$rO[$i]);
			echo "<label  class='radio-inline col-md-2'><input type='radio' name='".$rN."' value='".$rV."' ".$sLC.">".$rL."</label>";
		}
	}
	
	function select($sN,$pairs)
	{
		echo "<select class='form-control' name='".$sN."'>";
		$rO = explode(":",$pairs);
		for($i=0 ; $i < count($rO) ;  $i++)
		{
			list($rV,$rL,$sLC)=explode("|",$rO[$i]);
			echo "<option value='".$rV."' ".$sLC.">".$rL."</option>";
		}
		echo "</select>";
	}
	
	function optData($field,$ctrl)
	{
		$con = $this->koneksi();
		$qry = $con->prepare("select distinct($field) as shk from penduduk where $field !='' order by $field;");
		$qry->execute();
		$shk="";
		$dlm=0;
		while($rs = $qry->fetch())
		{
			if($dlm>0){$dm = ":"; $chk="";}else{ $dm=""; $chk=$ctrl;}
			$shk.=$dm.$rs['shk']."|".$rs['shk']."|".$chk;
			$dlm ++;
		}
		
		return $shk;
	}
	
	
}
?>
