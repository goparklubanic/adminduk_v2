<div><h4>FORMULIR PENCARIAN PENDUDUK</h4></div>
<form role='form' class='form-horizontal'>
	<div class="form-group">
		<label class="control-label col-sm-4">Cari Berdasar</label>
		<div class="col-sm-8">
			<select class="form-control" id="filter">
				<option value="nik">NIK</option>
				<option value="nama_lengkap">Nama</option>
				<option value="pekerjaan">Pekerjaan</option>
				<option value="gol_darah">Golongan Darah</option>
				<option value="pendidikan">Pendidikan</option>
				<option value="agama">Agama</option>
			</select>
		</div>
	</div>
	
	<div class="form-group">
		<label class="control-label col-sm-4">RT/RW</label>
		<div class="col-sm-8">
			<select id="rtrw" class="form-control">
				<option value="">Semua Wilayah RT dan RW</option>
				<?php $pdd->slcRtRw(); ?>
			</select>
		</div>
	</div>
	
	<div class="form-group">
		<label class="control-label col-sm-4">Kata Pencarian</label>
		<div class="col-sm-8">
			
			<input type="text" class="form-control" id="kunci">
		</div>
	</div>
	
	<div class="form-group">
		<label class="control-label col-sm-4">Modus Pencarian</label>
		<div class="col-sm-8">
			<span class='col-sm-4'><input type='radio' id="mod0" value="0" name='modus' checked> Menyerupai / Mengandung</span>
			<span class='col-sm-4'><input type='radio' id="mod1" value="1" name='modus'> Sama Persis</span>
		</div>
	</div>
	
	
	<div class="form-group bg-warning">
		<label class="control-label col-sm-4">PERIKSA DATA PENCARIAN !</label>
		<div class="col-sm-8" style="text-align:center;">
			<a href="javascript:void(0)" class="btn btn-primary" onClick=capen()>Cari Penduduk</a>
		</div>
	</div>

</form>
<div class="row">
  <div id="dapen">
  </div>
</div>
<script>
function capen()
{
	if(document.getElementById('mod0').checked == true){
		var mod = 0;
	}else{
		var mod = 1;
	}
	
	var fltr = document.getElementById('filter').value;
	var rtrw = document.getElementById('rtrw').value;
	var data = document.getElementById('kunci').value;
	var url="pddQuery.php?flt="+fltr+"&tw="+rtrw+"&kw="+data+"&m="+mod+"&pg=1";
	loadContent('dapen',url);
}

function nxpage(){
	if(document.getElementById('mod0').checked == true){
		var mod = 0;
	}else{
		var mod = 1;
	}
	var fltr = document.getElementById('filter').value;
	var rtrw = document.getElementById('rtrw').value;
	var data = document.getElementById('kunci').value;
	var pge = document.getElementById("pagno").innerHTML;
	var npg = parseInt(pge)+1;
	var url="pddQuery.php?flt="+fltr+"&tw="+rtrw+"&kw="+data+"&m="+mod+"&pg="+npg;
	loadContent("dapen",url);
}

function prpage(){
	if(document.getElementById('mod0').checked == true){
		var mod = 0;
	}else{
		var mod = 1;
	}
	var fltr = document.getElementById('filter').value;
	var rtrw = document.getElementById('rtrw').value;
	var data = document.getElementById('kunci').value;
	var pge = document.getElementById("pagno").innerHTML;
	var ppg = parseInt(pge)-1;
	var url="pddQuery.php?flt="+fltr+"&tw="+rtrw+"&kw="+data+"&m="+mod+"&pg="+ppg;
	loadContent("dapen",url);
}

</script>
