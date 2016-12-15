<div class="form-horizontal">
	<div class="form-group">
		<label class="control-label col-sm-4">Tanggal Pemilihan <br />(THUN-BL-TG)</label>
		<div class="col-sm-8">
			<input class="form-control" id="tgpil" placeHolder="YYYY-MM-DD"
			onBlur=tgLahir(this.value)>
		</div>
	</div>
	
	<div class="form-group">
		<label class="control-label col-sm-4">Tanggal Lahir Pemilih Maksimal</label>
		<div class="col-sm-8">
			<input class="form-control" id="tglhr" readOnly>
		</div>
	</div>
	
	<div class="form-group">
		<label class="control-label col-sm-4">RT / RW</label>
		<div class="col-sm-8">
			<select id="rtrw" onChange=dps() class="form-control">
				<option value="">PILIH RT DAN RW</option>
				<option value="01|01">RT 01 RW 01</option>
				<option value="02|01">RT 02 RW 01</option>
				<option value="03|01">RT 03 RW 01</option>
				<option value="04|01">RT 04 RW 01</option>
				
				<option value="01|02">RT 01 RW 02</option>
				<option value="02|02">RT 02 RW 02</option>
				<option value="03|02">RT 03 RW 02</option>
				<option value="04|02">RT 04 RW 02</option>
				
				<option value="01|03">RT 01 RW 03</option>
				<option value="02|03">RT 02 RW 03</option>
				<option value="03|03">RT 03 RW 03</option>
				<option value="04|03">RT 04 RW 03</option>
			</select>
		</div>
	</div>
</div>

<div id="dapem">
</div>
<script>
function tgLahir(tgl)
{
	var hbt = tgl.split("-");
	var thn = hbt[0] - 17;
	document.getElementById("tglhr").value=thn+"-"+hbt[1]+"-"+hbt[2];
}

function dps()
{
	var rtrw = document.getElementById("rtrw").value;
	var tglh = document.getElementById("tglhr").value;
	//var mess = "Daftar Pemilih RT/RW "+rtrw+" Kelahiran dibawah "+tglh;
	//document.getElementById("dapem").innerHTML=mess;
	var url="dapemQuery.php?tw="+rtrw+"&tg="+tglh+"&pg=1";
	loadContent("dapem",url);
}
function nxpage(){
	var tw  = document.getElementById("rtrw").value;
	var tglh = document.getElementById("tglhr").value;
	var pge = document.getElementById("pagno").innerHTML;
	var npg = parseInt(pge)+1;
	var url="dapemQuery.php?tw="+tw+"&tg="+tglh+"&pg="+npg;
	loadContent("dapem",url);
}

function prpage(){
	
	var tglh = document.getElementById("tglhr").value;
	var tw  = document.getElementById("rtrw").value;
	var pge = document.getElementById("pagno").innerHTML;
	var ppg = parseInt(pge)-1;
	var url="dapemQuery.php?tw="+tw+"&tg="+tglh+"&pg="+ppg;
	loadContent("dapem",url);
}
</script>
