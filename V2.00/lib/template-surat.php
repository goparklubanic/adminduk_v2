<?php
class templatesurat
{


function sk_lahir($ad,$data,$hari,$ibu,$bpk,$lpr,$sk1,$sk2){
$lhr=<<<EOLhr
	<table width='100%' class='tbl-kop'>
		<tr><td width='300'>Pemerintah $ad[dk]</td><td>:&nbsp;$ad[nm]</td></tr>
		<tr><td>Kecamatan</td><td> :&nbsp;$ad[kc]</td></tr>
		<tr><td>Kabupaten / Kota</td><td> :&nbsp;$ad[kb]</td></tr>
		<tr><td>Kode Wilayah</td><td>:&nbsp;$ad[wil]</td></tr>
	</table>
		
	<div class="pokoksurat">
	<span class='ps1'>SURAT KETERANGAN LAHIR</span><br />
	<span class='ps2'>Nomor: $data[0]</span>
	</div>
	
	<div class="badansurat">
		<table width='100%'>
		<tr>
			<td>
			<b>BAYI / ANAK</b>
			<table>
				<tr><td class='kiri'>1. Nama</td><td>: $data[3]</td></tr>
				<tr><td class='kiri'>2. Jenis Kelamin</td><td>: $data[4] </td></tr>
				<tr><td class='kiri'>3. Tempat Dilahirkan</td><td>: $data[5]</td></tr>
				<tr><td class='kiri'>4. Tempat Kelahiran</td><td>: $data[6]</td></tr>
				<tr><td class='kiri'>5. Hari / Tanggal</td><td>: $hariLahir</td></tr>
				<tr><td class='kiri'>6. Pukul</td><td>: $data[8]</td></tr>
				<tr><td class='kiri'>7. Jenis Kelahiran</td><td>: $data[9]</td></tr>
				<tr><td class='kiri'>8. Anak Ke</td><td>: $data[10]</td></tr>
				<tr><td class='kiri'>9. Penolong</td><td>: $data[11]</td></tr>
				<tr><td class='kiri'>10. Berat Bayi</td><td>: $data[12] Kg</td></tr>
				<tr><td class='kiri'>11. Panjang Bayi</td><td>: $data[13] cm</td></tr>
			</table>
			</td>
		</tr>
		<tr>
			<td>
			<b>IBU</b>
			<table>
				<tr><td class='kiri'>1. NIK</td><td>: $data[14]</td></tr>
				<tr><td class='kiri'>2. Nama Lengkap</td><td>: $ibu[nama_lengkap]</td></tr>
				<tr><td class='kiri'>3. Tanggal lahir / umur</td><td>: $ibu[tg_lahir]</td></tr>
				<tr><td class='kiri'>4. Pekerjaan</td><td>: $ibu[pekerjaan]</td></tr>
				<tr><td class='kiri'>5. Alamat</td><td>: $ibu[dusun], RT. $ibu[rt] RW $ibu[rw] $ad[nm]</td></tr>
				<tr><td class='kiri'>6. Kewarganegaraan</td><td>: $ibu[kewarganegaraan]</td></tr>
				<tr><td class='kiri'>7. Kebangsaan</td><td>: $ibu[kewarganegaraan]</td></tr>
				<tr><td class='kiri'>8. Tanggal Penc. Perkawinan</td><td>: $data[15]</td></tr>
			</table>
			</td>
		</tr>
		<tr>
			<td>
			<b>AYAH</b>
			<table>
				<tr><td class='kiri'>1. NIK</td><td>: $data[16] </td></tr>
				<tr><td class='kiri'>2. Nama Lengkap</td><td>: $bpk[nama_lengkap]</td></tr>
				<tr><td class='kiri'>3. Tanggal lahir / umur</td><td>: $bpk[tg_lahir]</td></tr>
				<tr><td class='kiri'>4. Pekerjaan</td><td>: $bpk[pekerjaan]</td></tr>
				<tr><td class='kiri'>5. Alamat</td><td>: $bpk[dusun], RT.  $bpk[rt]  RW  $bpk[rw] $ad[nm]</td></tr>
				<tr><td class='kiri'>6. Kewarganegaraan</td><td>: $bpk[kewarganegaraan]</td></tr>
				<tr><td class='kiri'>7. Kebangsaan</td><td>: $bpk[kewarganegaraan]</td></tr>
			</table>
			</td>
		</tr>
		<tr>
			<td>
			<b>PELAPOR</b>
			<table>
				<tr><td class='kiri'>1. NIK</td><td>: $data[17]</td></tr>
				<tr><td class='kiri'>2. Nama Lengkap</td><td>: $lpr[nama_lengkap]</td></tr>
				<tr><td class='kiri'>3. Tanggal lahir / umur</td><td>: $lpr[tg_lahir]</td></tr>
				<tr><td class='kiri'>4. Pekerjaan</td><td>: $lpr[pekerjaan]</td></tr>
				<tr><td class='kiri'>5. Alamat</td><td>: $lpr[dusun], RT. $lpr[rt] RW. $lpr[rw] $ad[nm]</td></tr>
			</table>
			</td>
		</tr>
		<tr>
			<td>
			<b>SAKSI I</b>
			<table>
				<tr><td class='kiri'>1. NIK</td><td>: $data[18]</td></tr>
				<tr><td class='kiri'>2. Nama Lengkap</td><td>: $sk1[nama_lengkap]</td></tr>
				<tr><td class='kiri'>3. Tanggal lahir / umur</td><td>: $sk1[tg_lahir]</td></tr>
				<tr><td class='kiri'>4. Pekerjaan</td><td>: $sk1[pekerjaan]</td></tr>
				<tr><td class='kiri'>5. Alamat</td><td>: $sk1[dusun], RT. $sk1[rt] RW. $sk1[rw] $ad[nm]</td></tr>
			</table>
			</td>
		</tr>
		<tr>
			<td>
			<b>SAKSI II</b>
			<table>
				<tr><td class='kiri'>1. NIK</td><td>: $data[19]</td></tr>
				<tr><td class='kiri'>2. Nama Lengkap</td><td>: $sk2[nama_lengkap]</td></tr>
				<tr><td class='kiri'>3. Tanggal lahir / umur</td><td>: $sk2[tg_lahir]</td></tr>
				<tr><td class='kiri'>4. Pekerjaan</td><td>: $sk2[pekerjaan]</td></tr>
				<tr><td class='kiri'>5. Alamat</td><td>: $sk2[dusun], RT. $sk2[rt] RW. $sk2[rw] $ad[nm]</td></tr>
			</table>
			</td>
		</tr>
		</table>
	</div>
	<div class='paraf'>
	<table width='100%'>
	<tr>
		<th width='33%'>&nbsp;</th>
		<th width='33%'>&nbsp;</th>
		<th width='33%'>$ad[dk] $ad[nm], Tgl.....<br />Kepala $ad[dk]</th>
	</tr>
	<tr>
		<td>&nbsp;<br /><br /><br />&nbsp;</td>
		<td>&nbsp;<br /><br /><br />&nbsp;</td>
		<td>&nbsp;<br /><br /><br />$ad[kp]</td>
	</tr>
	</table>
	</div>

EOLhr;
echo $lhr;

}

function sk_wafat($ad,$data,$namakk,$jnz,$ibu,$bpk,$lpr,$sk1,$sk2){
$wft = <<<EOWft

<table width='100%' class='tbl-kop'>
		<tr><td width='300'>Pemerintah $ad[dk]</td><td>:&nbsp;$ad[nm]</td></tr>
		<tr><td>Kecamatan</td><td> :&nbsp;$ad[kc]</td></tr>
		<tr><td>Kabupaten / Kota</td><td> :&nbsp;$ad[kb]</td></tr>
		<tr><td>Kode Wilayah</td><td>:&nbsp;$ad[wil]</td></tr>
	</table>
		
	<div class="pokoksurat">
	<span class='ps1'>SURAT KETERANGAN KEMATIAN</span><br />
	<span class='ps2'>Nomor: $data[0]</span>
	</div>
<div class="badansurat">
<table width="650">
  <tr>
    <td width="245">Nama Kepala Keluarga</td>
    <td width="5">:</td>
    <td width="400">&nbsp;$namakk</td>
  </tr>
  <tr>
    <td>Nomor Kartu Keluarga</td>
    <td>:</td>
    <td>&nbsp;$data[2]</td>
  </tr>
</table>
<table width="650" border="0" cellspacing="0" cellpadding="1">
	
	<!-- jenazah -->
	<tr class="tr-judul">
		<td colspan="3">JENAZAH</td>
	</tr>
	<tr>
		<td width="245">1. N I K</td>
		<td width="5">:</td>
		<td width="400">&nbsp;$data[3]</td>
	</tr>
	<tr>
		<td width="245">2. Nama Lengkap</td>
		<td width="5">:</td>
		<td width="400">&nbsp;$jnz[nama_lengkap]</td>
	</tr>
	<tr>
		<td width="245">3. Jenis Kelamin</td>
		<td width="5">:</td>
		<td width="400">&nbsp;$jnz[kelamin]</td>
	</tr>
	<tr>
		<td width="245">4. Tanggal Lahir / Umur</td>
		<td width="5">:</td>
		<td width="400">&nbsp;$jnz[tg_lahir]</td>
	</tr>
	<tr>
		<td width="245">5. Tempat Lahir</td>
		<td width="5">:</td>
		<td width="400">&nbsp;$jnz[tp_lahir]</td>
	</tr>
	<tr>
		<td width="245">6. Agama</td>
		<td width="5">:</td>
		<td width="400">&nbsp;$jnz[agama]</td>
	</tr>
	<tr>
		<td width="245">7. Pekerjaan</td>
		<td width="5">:</td>
		<td width="400">&nbsp;$jnz[pekerjaan]</td>
	</tr>
	<tr>
		<td width="245">8. Alamat</td>
		<td width="5">:</td>
		<td width="400">&nbsp;$jnz[dusun], RT. $jnz[rt] RW. $jnz[rw] $ad[dk] $ad[nm]</td>
	</tr>
	<tr>
		<td width="245">9. Anak Ke</td>
		<td width="5">:</td>
		<td width="400">&nbsp;$data[4]</td>
	</tr>
	<tr>
		<td width="245">10. Tanggal Kematian</td>
		<td width="5">:</td>
		<td width="400">&nbsp;$data[5]</td>
	</tr>
	<tr>
		<td width="245">11. Pukul</td>
		<td width="5">:</td>
		<td width="400">&nbsp;$data[6]</td>
	</tr>
	<tr>
		<td width="245">12. Penyebab Kematian</td>
		<td width="5">:</td>
		<td width="400">&nbsp;$data[7]</td>
	</tr>
	<tr>
		<td width="245">13. Tempat Kematian</td>
		<td width="5">:</td>
		<td width="400">&nbsp;$data[9]</td>
	</tr>
	<tr>
		<td width="245">14. Yang Menerangkan</td>
		<td width="5">:</td>
		<td width="400">&nbsp;$data[8]</td>
	</tr>

	<!-- Ayah --NIK, NAMA, TGL LAHIR PKERJAAN ALAMAT -->
	<tr class="tr-judul">
		<td colspan="3">A Y A H</td>
	</tr>
	<tr>
		<td width="245">1. N I K</td>
		<td width="5">:</td>
		<td width="400">&nbsp;$data[11]</td>
	</tr>
	<tr>
		<td width="245">2. Nama Lengkap</td>
		<td width="5">:</td>
		<td width="400">&nbsp;$bpk[nama_lengkap]</td>
	</tr>
	<tr>
		<td width="245">3. Tanggal Lahir / Umur</td>
		<td width="5">:</td>
		<td width="400">&nbsp;$bpk[tg_lahir]</td>
	</tr>
	<tr>
		<td width="245">4. Pekerjaan</td>
		<td width="5">:</td>
		<td width="400">&nbsp;$bpk[pekerjaan]</td>
	</tr>
	<tr>
		<td width="245">5. Alamat</td>
		<td width="5">:</td>
		<td width="400">&nbsp;$bpk[dusun], RT. $bpk[rt] RW. $bpk[rw], $ad[dk] $ad[nm]</td>
	</tr>
	
	<!-- ibu -->
	<tr class="tr-judul">
		<td colspan="3">I B U</td>
	</tr>
	<tr>
		<td width="245">1. N I K</td>
		<td width="5">:</td>
		<td width="400">&nbsp;$data[10]</td>
	</tr>
	<tr>
		<td width="245">2. Nama Lengkap</td>
		<td width="5">:</td>
		<td width="400">&nbsp;$ibu[nama_lengkap]</td>
	</tr>
	<tr>
		<td width="245">3. Tanggal Lahir / Umur</td>
		<td width="5">:</td>
		<td width="400">&nbsp;$ibu[tg_lahir]</td>
	</tr>
	<tr>
		<td width="245">4. Pekerjaan</td>
		<td width="5">:</td>
		<td width="400">&nbsp;$ibu[pekerjaan]</td>
	</tr>
	<tr>
		<td width="245">5. Alamat</td>
		<td width="5">:</td>
		<td width="400">&nbsp;$ibu[dusun], RT. $ibu[rt] RW. $ibu[rw], $ad[dk] $ad[nm]</td>
	</tr>
	
	<!-- pelapor -->
	<tr class="tr-judul">
		<td colspan="3">PELAPOR</td>
	</tr>
	<tr>
		<td width="245">1. N I K</td>
		<td width="5">:</td>
		<td width="400">&nbsp;$data[12]</td>
	</tr>
	<tr>
		<td width="245">2. Nama Lengkap</td>
		<td width="5">:</td>
		<td width="400">&nbsp;$lpr[nama_lengkap]</td>
	</tr>
	<tr>
		<td width="245">3. Tanggal Lahir / Umur</td>
		<td width="5">:</td>
		<td width="400">&nbsp;$lpr[tg_lahir]</td>
	</tr>
	<tr>
		<td width="245">4. Pekerjaan</td>
		<td width="5">:</td>
		<td width="400">&nbsp;$lpr[pekerjaan]</td>
	</tr>
	<tr>
		<td width="245">5. Alamat</td>
		<td width="5">:</td>
		<td width="400">&nbsp;$lpr[dusun], RT. $lpr[rt] RW. $lpr[rw], $ad[dk] $ad[nm]</td>
	</tr>

	<!-- saksi 1 -->
	<tr class="tr-judul">
		<td colspan="3">SAKSI I</td>
	</tr>
	<tr>
		<td width="245">1. N I K</td>
		<td width="5">:</td>
		<td width="400">&nbsp;$data[13]</td>
	</tr>
	<tr>
		<td width="245">2. Nama Lengkap</td>
		<td width="5">:</td>
		<td width="400">&nbsp;$sk1[nama_lengkap]</td>
	</tr>
	<tr>
		<td width="245">3. Tanggal Lahir / Umur</td>
		<td width="5">:</td>
		<td width="400">&nbsp;$sk1[tg_lahir]</td>
	</tr>
	<tr>
		<td width="245">4. Pekerjaan</td>
		<td width="5">:</td>
		<td width="400">&nbsp;$sk1[pekerjaan]</td>
	</tr>
	<tr>
		<td width="245">5. Alamat</td>
		<td width="5">:</td>
		<td width="400">&nbsp;$sk1[dusun], RT. $sk1[rt] RW. $sk1[rw], $ad[dk] $ad[nm]</td>
	</tr>
	<tr>

	<!-- saksi 2 -->
	<tr class="tr-judul">
		<td colspan="3">SAKSI II</td>
	</tr>
	<tr>
		<td width="245">1. N I K</td>
		<td width="5">:</td>
		<td width="400">$data[14]</td>
	</tr>
	<tr>
		<td width="245">2. Nama Lengkap</td>
		<td width="5">:</td>
		<td width="400">&nbsp;$sk2[nama_lengkap]</td>
	</tr>
	<tr>
		<td width="245">3. Tanggal Lahir / Umur</td>
		<td width="5">:</td>
		<td width="400">&nbsp;$sk2[tg_lahir]</td>
	</tr>
	<tr>
		<td width="245">4. Pekerjaan</td>
		<td width="5">:</td>
		<td width="400">&nbsp;$sk2[pekerjaan]</td>
	</tr>
	<tr>
		<td width="245">5. Alamat</td>
		<td width="5">:</td>
		<td width="400">&nbsp;$sk2[dusun], RT. $sk2[rt] RW. $sk2[rw], $ad[dk] $ad[nm]</td>
	</tr>

</table>
</div>
	</div>
	<div class='paraf'>
	<table width='100%'>
	<tr>
		<th width='33%'>&nbsp;</th>
		<th width='33%'>&nbsp;</th>
		<th width='33%'>$ad[dk] $ad[nm], $data[1]<br />Kepala $ad[dk]</th>
	</tr>
	<tr>
		<td>&nbsp;<br /><br />&nbsp;</td>
		<td>&nbsp;<br /><br />&nbsp;</td>
		<td>&nbsp;<br /><br />$ad[kp]</td>
	</tr>
	</table>
	</div>
EOWft;
echo $wft;
}

function sk_nikah($ad,$kop,$data,$warga){
$nkh = <<<EONkh
$kop

	<br/>
	<div class="pokoksurat">
	<span class='ps1'>SURAT KETERANGAN STATUS PERNIKAHAN</span><br />
	<span class='ps2'>Nomor: $data[0]</span>
	</div>
	<div class="badansurat12">
	<p>Yang beranda tangan di bawah ini Kepala $ad[dk] $ad[nm] Kecamatan $ad[kc] Kabupaten Banjarnegara, menerangkan bahwa:</p>
		<table width="700" cellspacing="0" cellpadding="4">
		<tr>
			<td width="50">&nbsp;</td>
			<td width="250">Nama</td>
			<td width="400">: $warga[nama_lengkap]</td>
		</tr>
		<tr>
			<td width="50">&nbsp;</td>
			<td>Tempat dan Tanggal Lahir</td><td>: $warga[tp_lahir], $warga[tg_lahir]</td>
		</tr>
		<tr>
			<td width="50">&nbsp;</td>
			<td>Jenis Kelamin</td><td>: $warga[kelamin]</td>
		</tr>
		<tr>
			<td width="50">&nbsp;</td>
			<td>Warga Negara</td><td>: $warga[kewarganegaraan]</td>
		</tr>
		<tr>
			<td width="50">&nbsp;</td>
			<td>Agama</td><td>: $warga[agama]</td>
		</tr>
		<tr>
			<td width="50">&nbsp;</td>
			<td>Alamat</td><td>: $warga[dusun], $warga[rt] / $warga[rw]  </td>
		</tr>
		</table>
		<p>Yang bersangkutan di atas adalah penduduk Desa Singamerta Kecamatan Sigaluh dan masih berstatus <b><u> $warga[st_kawin]</u></b>.<br/>
		Demikian surat pernyataan ini dibuat dengan sebenar-benarnya dan dapat digunakan sebagaimana mestinya.</p>
	</div>
	<div class='paraf'>
	<table width='100%'>
	<tr>
		<th width='33%'>&nbsp;</th>
		<th width='33%'>&nbsp;</th>
		<th width='33%'>$ad[nm], $data[1]<br />Kepala $ad[dk]</th>
	</tr>
	<tr>
		<td>&nbsp;<br /><br /><br />&nbsp;</td>
		<td>&nbsp;<br /><br /><br />&nbsp;</td>
		<td>&nbsp;<br /><br /><br />Kepalane</td>
	</tr>
	</table>
	</div>

EONkh;
echo $nkh;
}

function sk_usaha($ad,$kop,$data,$warga){
$ush = <<<EOUsh
$kop
	<div class="pokoksurat">
	<span class='ps1'>SURAT KETERANGAN USAHA</span><br />
	<span class='ps2'>Nomor: $data[0]</span>
	</div>
	
	<div class="badansurat12">
	<p>Yang bertanda tangan di bawa ini Kepala Desa Singamerta Kecamatan Sigaluh Kabupaten Banjarnegara dengan ini menyatakan bahwa:</p>

	<table width="700" cellspacing="0" cellpadding="4">
	<tr>
		<td width="50">&nbsp;</td>
		<td width="250">Nama</td>
		<td width="400">: $warga[nama_lengkap]</td>
	</tr>
	<tr>
		<td width="50">&nbsp;</td>
		<td>Tempat Tanggal Lahir</td>
		<td>: $warga[tp_lahir], $warga[tg_lahir]</td>
	</tr>
	<tr>
		<td width="50">&nbsp;</td>
		<td>Alamat</td>
		<td>: $warga[dusun], RT. $warga[rt] / RW. $warga[rw]<br />
		&nbsp;&nbsp;$ad[dk] $ad[nm]
		</td>
	</tr>
	</table>
	
		<p>Orang tersebut di atas memiliki usaha:</p>
	<table width="700" cellspacing="0" cellpadding="4">
	<tr>
		<td width="50">&nbsp;</td>
		<td width="250">Jenis usaha</td>
		<td width="400">: $data[3]</td>
	</tr>
	<tr>
		<td width="50">&nbsp;</td>
		<td>Jenis Barang Dagangan</td><td>: $data[4] </td>
	</tr>
	<tr>
		<td width="50">&nbsp;</td>
		<td>Mulai Usaha</td><td>: Tahun $data[5]</td>
	</tr>
	</table>
	<p>Demikian Surat Keterangan ini dibuat atas dasar yang sebenarnya dan agar dapat dipergunakan sebagaimana mestinya. Kepada yang berkepentingan untuk menjadikan periksa.</p>
	</div>
	<br/>
	<div class='paraf'>
	<table width='100%'>
	<tr>
		<th width='33%'>&nbsp;</th>
		<th width='33%'>&nbsp;</th>
		<th width='33%'>$ad[nm], $data[1]<br />Kepala $ad[dk]</th>
	</tr>
	<tr>
		<td>&nbsp;<br /><br /><br />&nbsp;</td>
		<td>&nbsp;<br /><br /><br />&nbsp;</td>
		<td>&nbsp;<br /><br /><br />Kepalane</td>
	</tr>
	</table>
	</div>
EOUsh;
echo $ush;
}

function sk_pengantar($ad,$kop,$data,$warga){
$ket=<<<EOKet
$kop
<div class="pokoksurat">
	<span class='ps1'>SURAT PENGANTAR</span><br />
	<span class='ps2'>Nomor: $data[0]</span>
	</div>
	
	<div class="badansurat-a5">
	<p>Yang bertanda tangan di bawah ini menerangkan bahwa:</p>
	
	<table border="0" width="100%" cellpadding="5" cellspacing="0" class="table-a5">
	<tr>
		<td valign="top" width="5%">&nbsp;</td><td valign="top" width="5%">1.</td><td valign="top" width="30%">Nama</td><td valign="top" width="55%">: $warga[nama_lengkap]</td>
	</tr>
	<tr>
		<td valign="top" width="5%">&nbsp;</td><td valign="top">2.</td><td valign="top">Tempat dan Tanggal Lahir</td><td valign="top">: $warga[tp_lahir],$warga[tg_lahir]</td>
	</tr>
	<tr>
		<td valign="top" width="5%">&nbsp;</td><td valign="top">3.</td><td valign="top">Kewarganegaraan / Agama</td><td valign="top">: $warga[kewarganegaraan] / $warga[agama]</td>
	</tr>
	<tr>
		<td valign="top" width="5%">&nbsp;</td><td valign="top">4.</td><td valign="top">Status Kawin</td><td valign="top">: $warga[st_kawin]</td>
	</tr>
	<tr>
		<td valign="top" width="5%">&nbsp;</td><td valign="top">5.</td><td valign="top">Pekerjaan</td><td valign="top">: $warga[pekerjaan]</td>
	</tr>
	<tr>
		<td valign="top" width="5%">&nbsp;</td>
		<td valign="top">6.</td>
		<td valign="top">Tempat Tinggal</td>
		<td valign="top">:&nbsp;$warga[dusun], RT. $warga[rt] / RW. $warga[rw]<br/>
		&nbsp;&nbsp;$ad[dk] $ad[nm]
		</td>
	</tr>
	<tr>
		<td valign="top" width="5%">&nbsp;</td><td valign="top">7.</td><td valign="top">Surat Bukti Diri</td><td valign="top">: NIK: $data[2] No. KK: $warga[no_kk]</td>
	</tr>
	<tr>
		<td valign="top" width="5%">&nbsp;</td><td valign="top">8.</td><td valign="top">Keperluan</td><td valign="top">: $data[3]</td>
	</tr>
	<tr>
		<td valign="top" width="5%">&nbsp;</td><td valign="top">9.</td><td valign="top">Berlaku Mulai</td><td valign="top">: $data[4]</td>
	</tr>
	<tr>
		<td valign="top" width="5%">&nbsp;</td><td valign="top">10.</td><td valign="top">Keterangan Lain</td><td valign="top">: $data[5]</td>
	</tr>
	</table>	
	<br /><br />
	<p>Demikian untuk menjadikan maklum bagi yang berkepentingan.</p>
	</div>
	
	<div class='paraf-a5'>
	<table width='100%'>
	<tr>
		<th width='33%'>&nbsp;</th>
		<th width='33%'>&nbsp;</th>
		<th width='33%'>$ad[nm], $data[1]<br />Kepala $ad[dk]</th>
	</tr>
	<tr>
		<td>&nbsp;<br /><br /><br />&nbsp;</td>
		<td>&nbsp;<br /><br /><br />&nbsp;</td>
		<td>&nbsp;<br /><br /><br />Kepalane</td>
	</tr>
	</table>
	</div>
EOKet;
echo $ket;
}

function sk_pindah($ad,$kop,$data,$warga,$namakk,$pengikut){
$pnd = <<<EOPnd
$kop

	<div class="pokoksurat">
	<span class='ps1'>SURAT KETERANGAN PINDAH</span><br />
	<span class='ps2'>Nomor: $data[0]</span>
	
	</div>
	<div class="badansurat">
		<table>
		<tr>
			<td>
			<b>DATA DAERAH ASAL</b>
			<!-- TABEL DATA ASAL -->
			<table>
				<tr>
					<td width='300'>1. Nomor Kartu Keluarga</td><td>: $data[2]</td>
				</tr>
				<tr>
					<td>2. Nama Kepala Keluarga</td><td>: $namakk</td>
				</tr>
				<tr>
					<td>3. Alamat Sesuai Kartu Keluarga</td>
					<td>: $warga[dusun], $warga[rt] / $warga[rw]</td>
				</tr>
				<tr>
					<td>4. NIK Pemohon</td><td>: $data[3]</td>
				</tr>
				<tr>
					<td>5. Nama Lengkap Pemohon</td><td>: $warga[nama_lengkap]</td>
				</tr>
			</table>
			</td>
		</tr>
		<tr>
			<td>
			<b>DATA KEPINDAHAN</b>
			<table>
			<tr><td valign='top' width='300'>1. Alasan Pindah</td><td valign='top'>: $data[4] </td></tr>
			<tr><td valign='top'>2. Alamat Tujuan Pindah</td><td valign='top' id="tupin">$data[5]</td></tr>
			<tr><td valign='top'>3. Jenis Kepindahan</td><td valign='top'>: $data[6] </td></tr>
			<tr><td valign='top'>4. Status KK<br />&nbsp;&nbsp;&nbsp;Bagi yang tidak pindah</td><td valign='top'>: $data[7]</td></tr>
			<tr><td valign='top'>5. Status KK<br />&nbsp;&nbsp;&nbsp;Bagi yang pindah</td><td valign='top'>: $data[8]</td></tr>
			<tr><td valign='top'>6. Keluarga Yang Pindah</td><td valign='top'>:</td></tr>
			</table>
			<table>
			$tbl
			</table>
			<table width='100%' border="1">
				<tr>
					<th width="30">No.</th>
					<th width="150">NIK</th>
					<th width="250">NAMA</th>
					<th>Hub dgn Keluarga</th>
				</tr>
				$pengikut
			</table>
			</td>
		</tr>
		</table>
	</div>
	<br/>
	<div class='paraf'>
	<table width='100%'>
	<tr>
		<th width='33%'>&nbsp;</th>
		<th width='33%'>&nbsp;</th>
		<th width='33%'>$ad[nm], $data[1]<br />Kepala $ad[dk]</th>
	</tr>
	<tr>
		<td>&nbsp;<br /><br /><br />&nbsp;</td>
		<td>&nbsp;<br /><br /><br />&nbsp;</td>
		<td>&nbsp;<br /><br /><br />Kepalane</td>
	</tr>
	</table>
	</div>
EOPnd;
echo $pnd;
}

function sk_kurma1($ad,$kop,$data,$ortu,$anak){
$skm = <<<EOSkm
$kop
<div class="pokoksurat-a5">
	<span class='ps1'>SURAT KETERANGAN TIDAK MAMPU</span><br />
	<span class='ps2'>Nomor: $data[0]</span>
	</div>

	<br/>
	<div class="badansurat-a5">
	<p>Yang bertanda tangan di bawah ini Kepala $ad[dk] $ad[nm] Kecamatan $ad[kc] Kabupaten $ad[kb] dengan ini menyatakan bahwa:</p>

	<br/>
	<table border="0" cellspacing="0" cellpadding="4px" width="700px" class="table-a5">
	<tr>
		<td width="50" >&nbsp;</td>
		<td width="200">Nama</td>
		<td width="450">: $ortu[nama_lengkap]</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>Tempat Tanggal Lahir</td>
		<td>: $ortu[tp_lahir] / $ortu[tg_lahir]</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>Pekerjaan</td>
		<td>: $ortu[pekerjaan]</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>Alamat</td>
		<td>: $ortu[dusun], RT. $ortu[rt] / RW. $ortu[rw] $ad[dk] $ad[nm]</td>
	</tr>
	</table>
	<br/>
	<p>Adalah Orang Tua/Wali dari</p>	
	<table border="0" cellspacing="0" cellpadding="4px" width="700px"  class="table-a5">
	<tr>
		<td width="50">&nbsp;</td>
		<td width="200">Nama</td>
		<td width="450">: $anak[nama_lengkap]</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>Tempat Tanggal Lahir</td>
		<td>: $anak[tp_lahir] / $anak[tg_lahir] </td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>Alamat</td>
		<td>: $anak[dusun], RT. $anak[rt] / RW. $anak[rw] $ad[dk] $ad[nm]</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>Sekolah</td>
		<td>: $data[4]</td>
	</tr>
	</table>
	<br/>
	<br/>
	<p>Orang tua tersebut di atas di desa kami sesuai data yang ada benar-benar <b>keluarga tidak mampu</b></p>
	<p>Demikian Surat Keterangan Tidak mampu ini dibuat atas dasar yang sebenarnya dan agar dapat dipergunakan sebagaimana mestinya. Kepada yang berkepentingan untuk menjadikan periksa.</p>
	</div>
	<br/>
	<div class='paraf-a5'>
	<table width='100%'>
	<tr>
		<td width='33%'>&nbsp;</td>
		<td width='33%'>&nbsp;</td>
		<td width='33%'>$ad[nm], $data[1]<br />Kepala $ad[dk]</td>
	</tr>
	<tr>
		<td>&nbsp;<br /><br /><br />&nbsp;</td>
		<td>&nbsp;<br /><br /><br />&nbsp;</td>
		<td>&nbsp;<br /><br /><br />Kepalane</td>
	</tr>
	</table>
	</div>
EOSkm;
echo $skm;
}

function sk_kurma2($ad,$kop,$data,$warga){

$wkm = <<<EOWkm
$kop
<div class="pokoksurat-a5">
	<span class='ps1'>SURAT KETERANGAN TIDAK MAMPU</span><br />
	<span class='ps2'>Nomor: $data[0]</span>
	</div>
	<br />
	<div class="badansurat-a5">
	<p>Yang bertanda tangan di bawah ini Kepala $ad[dk] $ad[nm] Kecamatan $ad[kc] Kabupaten $ad[kb] dengan ini menyatakan bahwa:</p>
    <br/>
	<table border="0" widht="700px" cellspacing="0"  class="table-a5">
	<tr>
		<td width="50">&nbsp;</td>
		<td width="200">Nama</td>
		<td width="450">: $warga[nama_lengkap]</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>Tempat Tanggal Lahir</td><td>: $warga[tp_lahir], $warga[tg_lahir]</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>Pekerjaan</td><td>: $warga[pekerjaan]</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>Alamat</td><td>: $warga[dusun], $warga[rt] / $warga[rw]</td>
	</tr>
	</table>
	<br/>
	<br/>
	<p>Orang tersebut di atas adalah benar-benar Penduduk $ad[dk] $ad[nm] dan berasal dari <b>keluarga kurang mampu</b>, maka kepada pihak yang berkepentingan untuk memberikan prioritas / keringanan biaya untuk yang bersangkuan.</p>
	<p>Demikian Surat Keterangan Tidak mampu ini dibuat atas dasar yang sebenarnya dan agar dapat dipergunakan sebagaimana mestinya. Kepada yang berkepentingan untuk menjadikan periksa.</p>
	</div>
	<br/>
	<br/>
	
	<div class='paraf-a5'>
	<table width='100%'>
	<tr>
		<td width='33%'>&nbsp;</td>
		<td width='33%'>&nbsp;</td>
		<td width='33%'>$ad[nm], $data[1]<br />Kepala $ad[dk]</td>
	</tr>
	<tr>
		<td>&nbsp;<br /><br /><br />&nbsp;</td>
		<td>&nbsp;<br /><br /><br />&nbsp;</td>
		<td>&nbsp;<br /><br /><br />Kepalane</td>
	</tr>
	</table>
	</div>
EOWkm;
echo $wkm;
}
}
?>
