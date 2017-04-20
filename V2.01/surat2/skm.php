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
$section->writeText("<u>SURAT KETERANGAN TIDAK MAMPU</u>",$fontdef,$kop);
$section->writeText("Nomor: ".$data[0].'/'.$data[1].'/'.$lconf['ns']."<br />",$fontdef,$kop);

$section->writeText("<br/><br/>");
$badan =  new PHPRtfLite_ParFormat(PHPRtfLite_ParFormat::TEXT_ALIGN_JUSTIFY);
$badan->setSpaceAfter(5);
$section->writeTExt("Yang bertanda tangan di bawah ini ".kepala." ".dskl." ".desa." Kecamatan ".kecamatan." Kabupaten Banjarnegara dengan ini menyatakan bahwa:",$fontdef,$badan);

//tabel orang tua 17 cm
$dtot = $section->addTable();
$dtot->addRows(4,0.6);
$dtot->addColumnsList(array(6,0.6,10));
$dtot->setFontForCellRange($fontdef, 1, 1, 4, 3);

//nama
$dtot->writeToCell(1,1,'Nama Lengkap');
$dtot->writeToCell(1,2,':');
$dtot->writeToCell(1,3,ufirst($ortu['nama_lengkap']));
//ttl
$dtot->writeToCell(2,1,'Tempat, tanggal Lahir');
$dtot->writeToCell(2,2,':');
$dtot->writeToCell(2,3,ufirst($ortu['tp_lahir']).', '.$ortu['tg_lahir']);
//pekerjaan
$dtot->writeToCell(3,1,'Pekerjaan');
$dtot->writeToCell(3,2,':');
$dtot->writeToCell(3,3,ufirst($ortu['pekerjaan']));
//alamat
$dtot->writeToCell(4,1,'Tempat Tinggal');
$dtot->writeToCell(4,2,':');
$dtot->writeToCell(4,3,ufirst(desa).', RT. '.$ortu['rt'].' RW. '.$ortu['rw']);

//anak
$section->writeTExt("Adalah Orang Tua/Wali dari:",$fontdef,$badan);

//tabel anak lebar 17 cm
$dtan = $section->addTable();
$dtan->addRows(4,0.6);
$dtan->addColumnsList(array(6,0.6,10));
$dtan->setFontForCellRange($fontdef, 1, 1, 4, 3);
//nama
$dtan->writeToCell(1,1,'Nama Lengkap');
$dtan->writeToCell(1,2,':');
$dtan->writeToCell(1,3,ufirst($anak['nama_lengkap']));
//ttl
$dtan->writeToCell(2,1,'Tempat Tanggal Lahir');
$dtan->writeToCell(2,2,':');
$dtan->writeToCell(2,3,ufirst($anak['tp_lahir'].', '.$anak['tg_lahir']));
//alamat
$dtan->writeToCell(3,1,'Alamat');
$dtan->writeToCell(3,2,':');
$dtan->writeToCell(3,3,ufirst(desa).', RT. '.$anak['rt'].' RW. '.$anak['rw']);
//sekolah
$dtan->writeToCell(4,1,'Sekoah');
$dtan->writeToCell(4,2,':');
$dtan->writeToCell(4,3,ufirst($data[5]));
//penutup surat

$section->writeText("Orang tua tersebut di atas benar-benar <b><u>Keluarga Kurang Mampu</u></b> sesuai data yang ada di tempat kami.",$fontdef,$badan);
$section->writeText("Demikian Surat Keterangan Tidak mampu ini dibuat atas dasar yang sebenarnya dan agar dapat dipergunakan sebagaimana mestinya. Kepada yang berkepentingan untuk menjadikan periksa.",$fontdef,$badan);
$section->writeText("<br/><br/>");
//penadatangan 17 cm
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

$rtf->save('./rtf/skm.rtf');

echo "
<a href='./rtf/skm.rtf'>Unduh Surat</a>
";

function ufirst($word)
{
	return(ucwords(strtolower($word)));
}
?>
