<div style='display:block; margin-bottom:10px; height: 70px;'>
<?php
echo "<center><h3>Statistik Agenda Surat Pelayanan</h3></center>";
include "forms/clasiffirat.php";
?>
</div>
<div id="dastagen">
</div>
<div style="text-align:center;">
  <button id="staprev" style="width:150px;">Sebelumnya</button>
  <span style="display: inline-block; width: 100px; padding: 0 30 0 30" id="stahal">1</span>
  <button id="stanext" style="width:150px;">Berikutnya</button>
</div>

<!-- scripts -->
<script>
$(document).ready(function(){
	
	$("#no_klas").change(function(){
		var nc  = $("#no_klas").val();
		var url = "dastagen.php?nc="+nc+"&pg=1";
		loadContent("dastagen",url);
	});
	
	$("#staprev").click(function(){
		var nc  = $("#no_klas").val();
		var ha = parseInt($("#stahal").html());
		var hs = ha - 1;
		if(ha >1){
			var url = "dastagen.php?nc="+nc+"&pg="+hs;
			loadContent("dastagen",url);
			$("#stahal").html(hs);
		}else{
			var url = "dastagen.php?nc="+nc+"&pg=1";
			loadContent("dastagen",url);
			$("#stahal").html(1);
		}
		
		
	});
	
	$("#stanext").click(function(){
		var nc  = $("#no_klas").val();
		var ha = parseInt($("#stahal").html());
		var hb = ha + 1;
		var url= "dastagen.php?nc="+nc+"&pg="+hb;
		loadContent("dastagen",url);
		$("#stahal").html(hb);
	});
});
</script>
<!-- scripts -->
<!--


-->
