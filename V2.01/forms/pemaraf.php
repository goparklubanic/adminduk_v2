<?php
require_once("./lib/aparatur.class.inc.php");
$apr = new aparatur();
$pemaraf = $apr->pemaraf();

?>
<div class="form-group">
	<label class="col-sm-3">Penanda tangan</label>
	<div class="col-sm-9">
		<select class="form-control" name="ttd">
		<?php
		for($i = 0 ; $i < count($pemaraf) ; $i++)
		{
			echo "<option value='".$pemaraf[$i]['nip']."'>".$pemaraf[$i]['jabt']."</option>";
		}
		?>
		</select>
	</div>
</div>
