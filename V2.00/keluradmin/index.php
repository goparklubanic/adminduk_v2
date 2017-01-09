<?php
	date_default_timezone_set('Asia/Jakarta');
	require_once '../config.php'; 
	require_once '../lib/aparatur.class.inc.php';
	$apr = new aparatur();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>KEPENDUDUKAN <?php echo desa; ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initBootstrap Exampleial-scale=1">
  
  <link rel="stylesheet" href="../lib/bootstrap.min.css">
  <link rel="stylesheet" href="../lib/adminduk.css">
  
  <script src="../lib/jquery.min.js"></script>
  <script src="../lib/bootstrap.min.js"></script>
  <script src="../lib/ajax.js"></script>
  </head>
  <body>
  <div class="container">
	  <div class="row">
	  <table class="table table-sm" id="tblAparatur">
		  <tr>
			  <th colspan="5"><a href=javascript:void(0) onClick=addApar() class="btn btn-success">Tambah Aparatur</a></th>
		  </tr>
		  <tr>
			  <th>NIP</th>
			  <th>NAMA LENGKAP</th>
			  <th>JABATAN</th>
			  <th>USERNAME</th>
			  <th>KONTROL</th>
		  </tr>
  <?php   $apr->nongol();   ?>
	  </table>
	  </div>
	  <div id="frmApartur" class="row">
	  <form class="form-horizontal" action="act.aparatur.php?mod=add" method="POST">
		  <div class="form-group">
			  <label class="col-sm-3">NIP</label>
			  <div class="col-sm-9">
				  <input type="text" name="nip" class='form-control'>
			  </div>
		  </div>
		  
		  <div class="form-group">
			  <label class="col-sm-3">NAMA LENGKAP</label>
			  <div class="col-sm-9">
				  <input type="text" name="nma" class='form-control'>
			  </div>
		  </div>
		  
		  <div class="form-group">
			  <label class="col-sm-3">JABATAN</label>
			  <div class="col-sm-9">
				  <input type="text" name="jbt" class='form-control'>
			  </div>
		  </div>
		  
		  <div class="form-group">
			  <label class="col-sm-3">USERNAME</label>
			  <div class="col-sm-9">
				  <input type="text" name="usr" class='form-control'>
			  </div>
		  </div>
		  
		  <div class="form-group">
			  <label class="col-sm-3">KATA SANDI</label>
			  <div class="col-sm-9">
				  <input type="password" name="pwd" class='form-control'>
			  </div>
		  </div>
		  
		  <div class="form-group">
			  <label class="col-sm-3">ULANGI SANDI</label>
			  <div class="col-sm-9">
				  <input type="password" name="pwd2" onBlur=checkPass() class='form-control'>
			  </div>
		  </div>
		  
		  <div class="form-group">
			  <label class="col-sm-3">PERIKSA DATA !</label>
			  <div class="col-sm-9">
				  <label><input type="checkbox" name="cek1" onChange=showAprSbt()> Data telah diperiksa </label>
			  </div>
		  </div>
		  
		  <div id="aprSbt" style="text-align:right; padding-right:20px">
			  <input type="submit" class="btn btn-primary" value="Simpan">
		  </div>
	  </form>
	  </div>
	  <div id="frmAprEdit" class="row">
	  <form class="form-horizontal" action="act.aparatur.php?mod=edt" method="POST">
		   <div class="form-group">
			  <label class="col-sm-3">UID</label>
			  <div class="col-sm-9">
				  <input type="text" name="uid" id="uide" readOnly class='form-control'>
			  </div>
		  </div>
		  
		  <div class="form-group">
			  <label class="col-sm-3">NIP</label>
			  <div class="col-sm-9">
				  <input type="text" name="nip" id='enip' class='form-control'>
			  </div>
		  </div>
		  
		  <div class="form-group">
			  <label class="col-sm-3">NAMA LENGKAP</label>
			  <div class="col-sm-9">
				  <input type="text" name="nma" id='enma' class='form-control'>
			  </div>
		  </div>
		  
		  <div class="form-group">
			  <label class="col-sm-3">JABATAN</label>
			  <div class="col-sm-9">
				  <input type="text" name="jbt" id='ejbt' class='form-control'>
			  </div>
		  </div>
		  <div style="text-align:right; padding-right:20px">
			  <input type="submit" class="btn btn-primary" value="Simpan">
		  </div>
	  </form>
	  </div>
	  <div id="frmCredens" class="row">
		 <form class="form-horizontal" action="act.aparatur.php?mod=crd" method="POST">
		   <div class="form-group">
			  <label class="col-sm-3">UID</label>
			  <div class="col-sm-9">
				  <input type="text" name="uid" id="uidc" readOnly class='form-control'>
			  </div>
		  </div>
		  <div class="form-group">
			  <label class="col-sm-3">USERNAME</label>
			  <div class="col-sm-9">
				  <input type="text" name="usr" id='cusr' class='form-control'>
			  </div>
		  </div>
		  
		  <div class="form-group">
			  <label class="col-sm-3">KATA SANDI</label>
			  <div class="col-sm-9">
				  <input type="password" name="pwd" id='cpw1' class='form-control'>
			  </div>
		  </div>
		  
		  <div class="form-group">
			  <label class="col-sm-3">ULANGI SANDI</label>
			  <div class="col-sm-9">
				  <input type="password" name="pwd2" id='cpw2' onBlur=checkPass() class='form-control'>
			  </div>
		  </div>
		  <div style="text-align:right; padding-right:20px">
			  <input type="submit" class="btn btn-primary" value="Simpan">
		  </div>
		 </form>
	  </div>
<!-- scrpts -->
	  <script>
		  function checkPass()
		  {
			  var p1 = $("input[name='pwd']").val();
			  var p2 = $("input[name='pwd2']").val();
			  if(p1 != p2){ 
				  alert('Sandi Tidak Sama'); 
				  $("input[name='pwd']").val('');
				  $("input[name='pwd2']").val('');
				  $("input[name='pwd']").focus();
			  }
		  }
		  function showAprSbt()
		  {
			  if( $('#cek1').attr('checked',true) ){
				  $("#aprSbt").show();
			  }
		  }
		  
		  function apredit(id)
		  {
			  //var aprdata;
			  $('#frmAprEdit').show();  
			  $('#tblAparatur').hide(); 
			  $('#uide').val(id);
			  $.getJSON('call.aprdata.php?id='+id,function(data){
					//alert(data.aparatur.nip);
					
					$("#enip").val(data.aparatur.nip);
					$("#enma").val(data.aparatur.nama);
					$("#ejbt").val(data.aparatur.jabatan);
			  });
		  }
		  
		  function aprcred(id,usr)
		  {
			  $('#frmCredens').show();  
			  $('#tblAparatur').hide(); 
			  $('#uidc').val(id);
			  $('#cusr').val(usr);
			  
		  }
		  
		  function addApar()
		  {
			 $('#frmApartur').show();  
			 $('#tblAparatur').hide();  
		  }
		  
		  function buseksi(id)
		  {
			  var bsx = confirm('Data akan dihapus ?');
			  if(bsx == true)
			  {
				  window.location='act.aparatur.php?mod=bsx&id='+id;
			  }
		  }
	  </script>
<!-- scrpts -->
  </div>
  </body>
 </html>
