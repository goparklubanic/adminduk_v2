<span class='col-sm-4'>
<select name='buku' id='buku' class='form-control' onChange=nomorAkhir(this.value)>
  <option>Pilih Buku Agenda</option>
  <option>skck</option>
  <option>kematian</option>
  <option>kelahiran</option>
  <option>pindah datang</option>
  <option>pindah keluar</option>
  <option>nikah</option>
  <option>kemasyarakatan</option>
  <option>pembangunan</option>
  <option>kemasyarakatan</option>
  <option>pemerintahan</option>
</select>
</span>
<script>
function nomorAkhir(buku)
{
	$.ajax({url:"lastAgeNumber.php?buku="+buku, success: function(result){
		$("input[name='nobuku']").val(result);
	}});
}
</script>
