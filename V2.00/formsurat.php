<div class='row'>
	<div class='col-sm-10'>
	<?php
		switch($_GET['sk']){
			case 'pengantar': 	include ("forms/pengantar.php"); break;
			case 'siswakm'	:	include ("forms/kurma1.php"); break;
			case 'wargakm'	:	include ("forms/kurma2.php"); break;
			case 'lahir'	:	include ("forms/kelahir.php"); break;
			case 'wafat'	:	include ("forms/kewafat.php"); break;
			case 'pindah'	:	include ("forms/kepindah.php"); break;
			case 'nikah'	:	include ("forms/kenikah.php"); break;
			case 'usaha'	:	include ("forms/ketusaha.php"); break;
			default 		:	include ("forms/pengantar.php"); break;
		}
	
	?>
	</div>
	
	<div class='col-sm-2'>
		<?php #include "menusurat.php"; ?>
	</div>
</div>
