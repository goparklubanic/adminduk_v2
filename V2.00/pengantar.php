<?php

require_once "./lib/laporan.class.inc.php";
$lpr=new laporan();
$id = $_GET['id'];
	
	$lap = $lpr->pengantarPick($id);
	//$dtl = json_decode($lap['dataLap']) ;
	//echo $lap['dataLap'];
	$test1 = explode(",",$lap['referensi']);
	//echo "<pre>";
	//print_r($test1);
	//echo "<br/>";
	$dalap=json_decode($lap['referensi'],1);
	//print_r($dalap);
	//echo "</pre>";

    echo '
    <form role="form" action="surat-sve.php?sk=ket" method="post" class="form-horizontal"> ';
		include "./forms/clasiffirat.php";
	echo '	
		<div class="form-group">
			<label class="col-sm-3" for="nos">Tanggal</label>
			<div class="col-sm-9">
			<input type="text" class="form-control" id="tgs" name="tgs" value="'.date('Y-m-d').'" >
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3" for="nik">Surat Bukti Diri / No. NIK</label>
			<div class="col-sm-9">
			<input type="text" class="form-control" id="nik" name="nik" value="'.$dalap['nomorKTP'].'" readOnly >
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3" for="keperluan">Keperluan</label>
			<div class="col-sm-9">
			<input type="text" class="form-control" id="keperluan" name="keperluan" value="'.$dalap['keperluan'].'" readOnly >
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3" for="berlaku">Berlaku Mulai</label>
			<div class="col-sm-9">
			<input type="text" class="form-control" id="berlaku" name="berlaku" value="'.date('Y-m-d').'" >
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3" for="ketlain">Keterangan Lain</label>
			<div class="col-sm-9">
			<textarea class="form-control" id="ketlain" name="ketlain" cols="3">'.$dalap['catatan'].'</textarea>
			</div>
		</div>';
		include "./forms/pemaraf.php";
	echo '	
		<button type="submit" class="btn btn-default">Submit</button>
	</form>
	';
	
?>
