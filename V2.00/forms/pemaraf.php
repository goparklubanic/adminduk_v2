<?php
require_once("./lib/aparatur.class.inc.php");
$apr = new aparatur();
$pemaraf = $apr->pemaraf();
/*
$pemaraf=array(	array("jabt"=>"Kepala Kelurahan","nama"=>"Mr. Abcde"),
				array("jabt"=>"Sekretaris Kelurahan","nama"=>"Mr. Fghij"),
				array("jabt"=>"Kasi 1","nama"=>"Mr. Klmno"),
				array("jabt"=>"Kasi 2","nama"=>"Mr. Pqrst"),
				array("jabt"=>"Kasi 3","nama"=>"Mr. Uvwxy"),
				array("jabt"=>"Kasi 4","nama"=>"Mrs. Zabcd"),
				array("jabt"=>"Kasi 5","nama"=>"Mrs. Efghi")
				);

echo "<pre>";
print_r($pemaraf);
echo "</pre>";
*/ 
?>
<div class="form-group">
	<label class="col-sm-3">Penanda tangan</label>
	<div class="col-sm-9">
		<select class="form-control" name="ttd">
		<?php
		for($i = 0 ; $i < count($pemaraf) ; $i++)
		{
			echo "<option value='".$pemaraf[$i]['jabt'].":".$pemaraf[$i]['nama']."'>".$pemaraf[$i]['jabt']." - ".$pemaraf[$i]['nama']."</option>";
		}
		?>
		</select>
	</div>
</div>
