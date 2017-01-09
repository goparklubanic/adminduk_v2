<?php
require ("config.php");
include './ssr/reader.php';
require ("./lib/penduduk.class.inc.php");
//$updir = uploadir;
### upload laporan 

$target_file = uploadir."/kkbaru.xls";

if (move_uploaded_file($_FILES["fkk"]["tmp_name"], $target_file)) {
        echo "
        <script>
			alert('File ". basename( $_FILES["fkk"]["name"]). " telah terunggah.');
        </script>";
} else {
        echo "File gagal diunggah";
}
### upload laporan

### spreadsheet reader
$reader=new Spreadsheet_Excel_Reader();
$reader->setUTFEncoder('iconv');
$reader->setOutputEncoding('UTF-8');
$reader->read($target_file);

$pdd = new penduduk();

foreach($reader->sheets as $k=>$data)
{
//	print_r($data);
	$datacell=$data['cells'];
	//print_r($datacell);
	
	foreach($datacell as $bar=>$col)
	{
		if($bar==1){continue;}
		$dapen = array($col[2],$col[3],$col[4],$col[5],$col[6],$col[7],
				$col[8],'',$col[9],$col[11],$col[12],$col[13],$col[14],
				$col[15],$col[16],$col[17],$col[19],$col[18],$col[1],0,
				'BKN RTM');
		$pdd->wargaBaru($dapen);
	}
}
//hapus file laporan
exec('rm -rf '.$target_file);
### spreadsheet reader
echo "
<script>window.location='./?menu=kk&id=$col[1]';</script>
";
?>

		
		
