<?php 
session_start();
session_unset();
session_destroy();
error_reporting(0); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>ADMINISTRASI KEPENDUDUKAN</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../lib/bootstrap.min.css">
  <link rel="stylesheet" href="../lib/adminduk.css">
  <script src="../lib/jquery.min.js"></script>
  <script src="../lib/bootstrap.min.js"></script>
  

</head>
<body>
<div id="loginWrapper">
	<div id="knock">
		<img src="../../imgs/knocking1.png" />
	</div>
	<div>
		<form role="form" id="lgform" action="barlogin.php" method="POST">
			<div class="form-group">
				<label class="loginlabel">ID PENGGUNA</label>
				<input class="form-control" name="katuid" value="semampir">
			</div>
			
			<div class="form-group">
				<label class="loginlabel">KATA SANDI</label>
				<input type="password" class="form-control" name="katpwd" value="Ban74rnegaR@">
			</div>
			
			<div class="form-group">
				<input type="submit" class="btn btn-danger form-control" value="LOGIN">
			</div>
			
		</form>
	</div>
	<div id="lg-result"></div>
</div>	

<div class="footer">
	<span>&copy;2016 Komunitas Linux Banjarnegara</span>
</div>
</body>
</html>
