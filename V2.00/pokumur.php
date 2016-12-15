<?php
echo "<h3>KELOMPOK UMUR</h3>";
?>
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
	<option value="59,69">Usia Lanjut(45 - 59 tahun)</option>
	<option value="69,70">Usila Resti 1(59 - 70 tahun)</option>
	<option value="70,200">Pra Lanjut Usia (70+)</option>
</select>


<div id="pokusia">

</div>
<script>
	function cariusia(ku)
	{
		var url ="usiaQuery.php?ku="+ku;
		loadContent("pokusia",url);
	}
</script>
