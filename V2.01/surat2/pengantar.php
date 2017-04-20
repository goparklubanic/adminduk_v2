<?php
//require_once '../lib/PHPRtfLite.php';
//require_once '../config.php';

// registers PHPRtfLite autoloader (spl)
PHPRtfLite::registerAutoloader();
// rtf document instance
$rtf = new PHPRtfLite();


//paper size A5
// default unit is cm
$rtf->setPaperWidth(16.5);  // in cm
$rtf->setPaperHeight(21.6); // in cm

//set margins
$rtf->setMarginLeft(1.4);
$rtf->setMarginRight(1.4);
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
$table->addRows(4,0.5);
$table->addColumnsList(array(2,11.7));
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
$table->addImageToCell(1, 1, $imageFile, new PHPRtfLite_ParFormat, 1.5, 2);
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
// set background color of cell to red
$cell->setBorder($border);

//nested table
$cell = $table->getCell(4, 2);
$cell->setBorder($border);


//judul surat
$kop =  new PHPRtfLite_ParFormat(PHPRtfLite_ParFormat::TEXT_ALIGN_CENTER);
$section->writeText("<u>SURAT PENGANTAR</u>",$fontdef,$kop);
$section->writeText("Nomor: ".$data[0].'/'.$data[1].'/'.$lconf['ns']."<br />",$fontsml,$kop);


$badan =  new PHPRtfLite_ParFormat(PHPRtfLite_ParFormat::TEXT_ALIGN_JUSTIFY);
$section->writeTExt("Yang bertanda tangan di bawah ini menerangkan bahwa:<br/>",$fontdef,$badan);

//tabel badan
$baket = $section->addTable();
$baket->addRows(10,0.6);
$baket->addColumnsList(array(0.7,5,0.5,7.5));
$baket->setFontForCellRange($fontdef, 1, 1, 10, 3);

//nama
$baket->writeToCell(1,1,'1.');
$baket->writeToCell(1,2,'Nama Lengkap');
$baket->writeToCell(1,3,':');
$baket->writeToCell(1,4,ufirst($warga['nama_lengkap']));
//ttl
$baket->writeToCell(2,1,'2.');
$baket->writeToCell(2,2,'Tempat, tanggal Lahir');
$baket->writeToCell(2,3,':');
$baket->writeToCell(2,4,ufirst($warga['tp_lahir']).', '.$warga['tg_lahir']);
//kewarganegaraan / agama
$baket->writeToCell(3,1,'3.');
$baket->writeToCell(3,2,'Agama');
$baket->writeToCell(3,3,':');
$baket->writeToCell(3,4,ufirst($warga['kewarganegaraan']).'/'.ufirst($warga['agama']));
//status perkawinan
$baket->writeToCell(4,1,'4.');
$baket->writeToCell(4,2,'Status Perkawinan');
$baket->writeToCell(4,3,':');
$baket->writeToCell(4,4,ufirst($warga['st_kawin']));
//pekerjaan
$baket->writeToCell(5,1,'5.');
$baket->writeToCell(5,2,'Pekerjaan');
$baket->writeToCell(5,3,':');
$baket->writeToCell(5,4,ufirst($warga['pekerjaan']));
//alamat
$baket->writeToCell(6,1,'6.');
$baket->writeToCell(6,2,'Tempat Tinggal');
$baket->writeToCell(6,3,':');
$baket->writeToCell(6,4,ufirst(desa).', RT. '.$warga['rt'].' RW. '.$warga['rw']);
//surat bukti diri
$baket->writeToCell(7,1,'7.');
$baket->writeToCell(7,2,'Surat Bukti Diri');
$baket->writeToCell(7,3,':');
$baket->writeToCell(7,4,'NIK  : '. $data['3'].'<br/>No. KK: '.$warga['no_kk']);
//keperluan
$baket->writeToCell(8,1,'8.');
$baket->writeToCell(8,2,'Keperluan');
$baket->writeToCell(8,3,':');
$baket->writeToCell(8,4,ufirst($data['4']));
//mulai berlaku
$baket->writeToCell(9,1,'9.');
$baket->writeToCell(9,2,'Berlaku Mulai');
$baket->writeToCell(9,3,':');
$baket->writeToCell(9,4,$data[5]);
//keterangan lain
$baket->writeToCell(10,1,'10.');
$baket->writeToCell(10,2,'Keterangan');
$baket->writeToCell(10,3,':');
$baket->writeToCell(10,4,ufirst($data[6]));

//penutup surat

$section->writeText("Demikian untuk menjadikan maklum bagi yang berkepentingan.<br/>",$fontdef,$badan);

//penadatangan
$paraf = $section->addTable();
$paraf->addColumnsList(array(4.5,4.5,4.7));
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
////yang bersangkutan
$ybs = $paraf->getCell(2,1);
$ybs->setTextAlignment('center');
$ybs->writeText('Yg Bersangkutan');

////camat
$ybs = $paraf->getCell(2,2);
$ybs->setTextAlignment('center');
$ybs->writeText('Camat '.kecamatan);

////lurah
$ybs = $paraf->getCell(2,3);
$ybs->setTextAlignment('center');
$ybs->writeText($jbt);

//nama penandatangan
////yang bersangkutan
$ybs = $paraf->getCell(4,1);
$ybs->setTextAlignment('center');
$ybs->writeText($warga['nama_lengkap']);

////camat
$ybs = $paraf->getCell(4,2);
$ybs->setTextAlignment('center');
$ybs->writeText('............');

////lurah
$ybs = $paraf->getCell(4,3);
$ybs->setTextAlignment('center');
$ybs->writeText($ttd);

////nip
$ybs = $paraf->getCell(5,3);
$ybs->setTextAlignment('center');
$ybs->writeText($nip);

$rtf->save('./rtf/pengantar.rtf');

echo "
<a href='./rtf/pengantar.rtf'>Unduh Surat</a>
";

function ufirst($word)
{
	return(ucwords(strtolower($word)));
}
?>
