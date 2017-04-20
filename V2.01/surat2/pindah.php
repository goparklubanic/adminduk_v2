<?php
//require_once '../lib/PHPRtfLite.php';
//require_once '../config.php';

// registers PHPRtfLite autoloader (spl)
PHPRtfLite::registerAutoloader();
// rtf document instance
$rtf = new PHPRtfLite();


//paper size A4
// default unit is cm
$rtf->setPaperWidth(21.6);  // in cm
$rtf->setPaperHeight(29.7); // in cm

//set margins
$rtf->setMarginLeft(2);
$rtf->setMarginRight(2);
$rtf->setMarginTop(1.3);
$rtf->setMarginBottom(1.5);

//set fonts
$font = new PHPRtfLite_Font(12, 'Arial', '#000000', '#FFFFFF');


// kop = tabel 1 baris x 2 kolom
// lebar kolom 1: 3cm kolom 2: 9.5
$section = $rtf->addSection();
$fontdef = new PHPRtfLite_Font(12, 'Times New Roman', '#000');
$fontsml = new PHPRtfLite_Font(10, 'Times New Roman', '#000');
$table = $section->addTable();
$table->addRows(4,0.6);
$table->addColumnsList(array(3,14.6));
//MERGER CELL
$table->mergeCellRange(1, 1, 4, 1);
$table->setFontForCellRange($fontdef, 1, 2, 4, 2);
$border = new PHPRtfLite_Border(
    $rtf,                                       // PHPRtfLite instance
    new PHPRtfLite_Border_Format(0, '#00FF00'), // left border: 2pt, green color
    new PHPRtfLite_Border_Format(0, '#FFFF00'), // top border: 1pt, yellow color
    new PHPRtfLite_Border_Format(0, '#FF0000'), // right border: 2pt, red color
    new PHPRtfLite_Border_Format(2, '#000000')  // bottom border: 1pt, blue color
);


// adding image to cell row 1 and column 1 image size 2.1 x 2.8
$imageFile = './imgz/wanimemetri.png';
$table->addImageToCell(1, 1, $imageFile, new PHPRtfLite_ParFormat, 1.8, 2.4);
//cell content
$cell = $table->getCell(1, 2);
$cell->setTextAlignment('center');
$cell->writeText('PEMERINTAH KABUPATEN BANJARNEGARA');

$cell = $table->getCell(2, 2);
$cell->setTextAlignment('center');
$cell->writeText('KECAMATAN '.strtoupper(kecamatan));

$cell = $table->getCell(3, 2);
$cell->setTextAlignment('center');
$cell->writeText('<b>'.strtoupper(dskl).' '.strtoupper(desa).'</b>');

$cell = $table->getCell(4, 2);
$cell->setTextAlignment('center');
$cell->setFont($fontsml);
$cell->writeText(alamat.' Telp. '.telpon);

//border
$cell = $table->getCell(1, 1);
$cell->setBorder($border);
$cell = $table->getCell(4, 2);
$cell->setBorder($border);


//judul surat
$kop =  new PHPRtfLite_ParFormat(PHPRtfLite_ParFormat::TEXT_ALIGN_CENTER);
$section->writeText("<u>SURAT KETERANGAN PINDAH</u>",$fontdef,$kop);
$section->writeText("Nomor: ".$data[0]."/".$data[1]."/".$lconf['ns']."<br />",$fontdef,$kop);

$section->writeText("<br/>");
$badan =  new PHPRtfLite_ParFormat(PHPRtfLite_ParFormat::TEXT_ALIGN_JUSTIFY);
$badan->setSpaceAfter(3);
$section->writeTExt("<b>DATA DAERAH ASAL</b>",$fontdef,$badan);

//tabel warga
$asal = $section->addTable();
$asal->addRows(5,0.6);
$asal->addColumnsList(array(7,0.6,9));
$asal->setFontForCellRange($fontdef, 1, 1, 4, 3);

///nomorkk
$asal->writeToCell(1,1,'NOMOR KK');
$asal->writeToCell(1,2,':');
$asal->writeToCell(1,3,$data[3]);
///namakk
$asal->writeToCell(2,1,'NAMA KEPALA KELUARGA');
$asal->writeToCell(2,2,':');
$asal->writeToCell(2,3,ufirst($namakk));
///alamat
$asal->writeToCell(3,1,'ALAMAT SESUAI KK');
$asal->writeToCell(3,2,':');
$asal->writeToCell(3,3,ufirst(desa).', RT. '.$warga['rt'].' RW. '.$warga['rw']);
///nik pemohon
$asal->writeToCell(4,1,'NIK PEMOHON');
$asal->writeToCell(4,2,':');
$asal->writeToCell(4,3,$data[4]);
///nama pemohon
$asal->writeToCell(5,1,'NAMA PEMOHON');
$asal->writeToCell(5,2,':');
$asal->writeToCell(5,3,ufirst($warga['nama_lengkap']));


//DATA KEPINDAHAN
$section->writeText("<b>DATA KEPINDAHAN</b>",$fontdef,$badan);
$tuju = $section->addTable();
$tuju->addRows(5,0.6);
$tuju->addColumnsList(array(7,0.6,9));
$tuju->setFontForCellRange($fontdef, 1, 1, 4, 3);

//alasan
$tuju->writeToCell(1,1,'Alasan Kepindahan');
$tuju->writeToCell(1,2,':');
$tuju->writeToCell(1,3,$data[5]);
//tujuan
$tuju->writeToCell(2,1,'Alamat Tujuan Pindah');
$tuju->writeToCell(2,2,':');
$tuju->writeToCell(2,3,$data[6]);
//jenis
$tuju->writeToCell(3,1,'Jenis Kepindahan');
$tuju->writeToCell(3,2,':');
$tuju->writeToCell(3,3,$data[7]);
//kkpindah
$tuju->writeToCell(4,1,'Status KK Bagi Yang Tidak Pindah');
$tuju->writeToCell(4,2,':');
$tuju->writeToCell(4,3,$data[8]);
//kktinggal
$tuju->writeToCell(5,1,'Status KK Bagi Yang Pindah');
$tuju->writeToCell(5,2,':');
$tuju->writeToCell(5,3,$data[9]);
//PENGIKUT
$section->writeTExt("<b>ANGGOTA KELUARGA YANG IKUT</b>",$fontdef,$badan);

$ikut = $section->addTable();
$ikut->addRows(5,0.6);
$ikut->addColumnsList(array(1,4,6,6));
$ikut->setFontForCellRange($fontdef, 1, 1, 4, 3);

$ikut->writeToCell(1,1,'<b>No.</b>');
$ikut->writeToCell(1,2,'<b>N I K</b>');
$ikut->writeToCell(1,3,'<b>Nama</b>');
$ikut->writeToCell(1,4,'<b>Hubungan dengan Keluarga</b>');

$td=$ikut->getCell(1,1);
$td->setTextAlignment('center');
$td=$ikut->getCell(1,2);
$td->setTextAlignment('center');
$td=$ikut->getCell(1,3);
$td->setTextAlignment('center');
$td=$ikut->getCell(1,4);
$td->setTextAlignment('center');

//thborder
$thborder= new PHPRtfLite_Border(
    $rtf,                                       // PHPRtfLite instance
    new PHPRtfLite_Border_Format(1, '#00000'), // left   border: 1pt, black color
    new PHPRtfLite_Border_Format(1, '#00000'), // top    border: 1pt, black color
    new PHPRtfLite_Border_Format(1, '#00000'), // right  border: 1pt, black color
    new PHPRtfLite_Border_Format(1, '#00000') // bottom border: 1pt, black color
);

//tdborder
$tdborder= new PHPRtfLite_Border(
    $rtf,                                       // PHPRtfLite instance
    new PHPRtfLite_Border_Format(1, '#00000'), // left   border: 1pt, black color
    new PHPRtfLite_Border_Format(1, '#00000'), // top    border: 1pt, black color
    new PHPRtfLite_Border_Format(1, '#00000'), // right  border: 1pt, black color
    new PHPRtfLite_Border_Format(1, '#00000') // bottom border: 1pt, black color
);
//table header border
$ikut->setBorderForCellRange($thborder, 1, 1, 1, 4);

for($i =0 ; $i < count($pengikut) ; $i++)
{
	$brs = $i+2;
	$ikut->writeToCell($brs,1,$pengikut[$i][0]);
	$ikut->writeToCell($brs,2,$pengikut[$i][1]);
	$ikut->writeToCell($brs,3,$pengikut[$i][2]);
	$ikut->writeToCell($brs,4,$pengikut[$i][3]);
}
//table data border
$ikut->setBorderForCellRange($tdborder, 2, 1, $brs, 4);

//penadatangan
$paraf = $section->addTable();
$paraf->addColumnsList(array(5.5,5.5,6));
$paraf->addRow(0.6);	//tanggal surat
$paraf->addRow(0.6);	//kop pemaraf
$paraf->addRow(2.4);	//ruang paraf
$paraf->addRow(0.6);	//nama pemaraf
$paraf->addRow(0.6);	//nip  pejabat

//tanggal surat
$tgs = $paraf->getCell(1,3);
$tgs->setTextAlignment('center');
$tgs->writeText(desa.', '.$data['2']);

//nama penandatangan
/*
///yang bersangkutan
$ybs = $paraf->getCell(2,1);
$ybs->setTextAlignment('center');
$ybs->writeText('Yg Bersangkutan');

////camat
$ybs = $paraf->getCell(2,2);
$ybs->setTextAlignment('center');
$ybs->writeText('Camat '.kecamatan);
*/

////lurah
$ybs = $paraf->getCell(2,3);
$ybs->setTextAlignment('center');
$ybs->writeText($jbt);

//nama penandatangan
/*
////yang bersangkutan
$ybs = $paraf->getCell(4,1);
$ybs->setTextAlignment('center');
$ybs->writeText($warga['nama_lengkap']);

////camat
$ybs = $paraf->getCell(4,2);
$ybs->setTextAlignment('center');
$ybs->writeText('............');
*/
////lurah
$ybs = $paraf->getCell(4,3);
$ybs->setTextAlignment('center');
$ybs->writeText($ttd);

////nip
$ybs = $paraf->getCell(5,3);
$ybs->setTextAlignment('center');
$ybs->writeText($nip);

$rtf->save('./rtf/pindah.rtf');

echo "
<a href='./rtf/pindah.rtf'>Unduh Surat</a>
";

function ufirst($word)
{
	return(ucwords(strtolower($word)));
}
?>
