<?php
echo "<h3>KELOMPOK UMUR</h3>";
?>
<div id='ruarea'>
<select class='form-control' id="pokumur" onChange=cariusia(this.value)>
	<option value="">Pilih Kelompok Usia</option>
	<option value="0,1">Bayi (0 - 1 tahun)</option>
	<option value="1,3">Batita (1 - 3 tahun)</option>
	<option value="3,5">Balita (3 - 5 tahun)</option>
	<option value="5,10">Anak-anak(5 - 10 tahun)</option>
	<option value="10,14">Pra Remaja (10 - 14 tahun)</option>
	<option value="14,19">Remaja (14 - 19 tahun)</option>
	<option value="19,45">Usia Produktif (19 - 45 tahun)</option>
	<option value="45,59">Pra Lanjut Usia (45 - 59 tahun)</option>
	<option value="59,69">Usia Lanjut(50 - 59 tahun)</option>
	<option value="69,70">Pra Usila Resti(59 - 70 tahun)</option>
	<option value="70,200">Usila Resti (70+)</option>
</select>
<div id='ketru'><b>Keterangan:</b>&nbsp;Rentang usia x - y dibaca mulau usia lebih atau sama dengan x hingga kurang dari y (x >= usia > y) </div>
<div class="form-group">
	<label>Rentang usia tertentu</label>
	<div>
	<input class="col-sm-2 ru" type="number" min=0 max=200 id = "ru1">
	<input class="col-sm-2 ru" type="number" min=0 max=200 id = "ru2">
	<button class='btn btn-primary' id='rut' onClick=setru()>Cari</button>
	</div>
</div>
</div> <!-- ruarea -->
<div>
<div id="pokusia">

</div>
<button class='btn btn-primary col-sm-2' onClick=showRuarea()>Ganti Rentang Umur</button>
</div>

<script>
	function setru()
	{
		var f = document.getElementById('ru1').value;
		var t = document.getElementById('ru2').value;
		var ku=f+','+t;
		cariusia(ku);
	}
	function cariusia(ku)
	{
		document.getElementById('ruarea').style.display='none';
		var url ="usiaQuery.php?ku="+ku;
		loadContent("pokusia",url);
	}
	
	function showRuarea()
	{
		location.reload();
	}
</script>
