<div><h4>PENGISIAN DAFTAR KK BARU</h4></div>
<div style="background:#C7E5FF; padding: 5px;">
	<b>Tata Cara Pengisian</b>
	<p>Unduh berkas form-kk-baru.xls dari website.<a href="./lib/FORM_KK_BARU.xls">Unduh</a></p>
	<p>Kemudian isi data dengan ketentuan sebagai berikut.</p>
	<ol>
		<li>Nomor KK: Isikan nomor kk yang <b>sama, di semua baris</b> pada kolom NOMOR_KK</li>
		<li>NIK: Masukkan NIK <b>masing-masing</b> anggota KK, pastikan tidak ada NIK kembar</li>
		<li>NAMA LENGKAP: Isikan Nama lengkap <b>masing-masing</b> anggota KK, pastikan tidak ada kesalahan tulis.</li>
		<li>JENIS KELAMIN: <b>Pilih</b> data yang tersedia di kolom tersebut.</li>
		<li>HUBUNGAN DALAM: <b>Pilih</b> data yang tersedia di kolom tersebut.</li>
		<li>TEMPAT LAHIR: Isikan Nama lengkap <b>masing-masing</b> anggota KK, pastikan tidak ada kesalahan tulis.</li>
		<li>TANGGAL LAHIR: Isikan tanggal lahir <b>dengan format YYYY-MM-DD</b>. YYYY = 4 digit tahun. MM = 2 digit bulan. DD = 2 digit tanggal/hari</li>
		<li>STATUS PERKAWINAN: <b>Pilih</b> data yang tersedia di kolom tersebut.</li>
		<li>AGAMA: <b>Pilih</b> data yang tersedia di kolom tersebut.</li>
		<li>KEWARGANEGARAAN: Isikan Nama lengkap <b>masing-masing</b> anggota KK, pastikan tidak ada kesalahan tulis.</li>
		<li>GOL. DARAH: <b>Pilih</b> data yang tersedia di kolom tersebut. Pilih TT jika tidak diketahui</li>
		<li>PENDIDIKAN TERAKHIR: <b>Pilih</b> data yang tersedia di kolom tersebut.</li>
		<li>PEKERJAAN: <b>Pilih</b> data yang tersedia di kolom tersebut.</li>
		<li>NIK AYAH dan NIK IBU: isikan NIK orang tua warga yang bersangkutan. Jika orang tua adalah bukan warga kelurahan setempat, lakukan hal sebgai berikut:</li>
		<ul>
			<li>Tambahkan data orang tua melalui menu NIK EXTERNAL</li>
			<li>Pastikan isikan kolom NIK sama dengan NIK AYAH atau NIK IBU dari warga yang bersankutan</li>
		</ul>
		<li>NOMOR AKTE LAHIR: Isikan nomor akte kelahiran <b>masing-masing</b> anggota KK.</li>
		<li>DUSUN, RT, dan RW : Isikan DUSUN,RT, dan RW yang <b>sama, di semua baris</b> pada kolom yang sesuai</li>
	</ol>
	Setelah terisi lengkap, unggah berkas tersebut melalui form berikut.
</div>
<div id="fukk">
  <form action="uplkk.php" method="post" enctype="multipart/form-data">
	  <div class="form-group">
		<div class="col-sm-8" >
		  <input type="file" name="fkk" id="fkk" class="form-control" accept=".xls">
		</div>
		<div class="col-sm-4" style="text-align:right; padding: 3px;">
		  <input type="submit" value="SIMPAN">
		</div>
      </div>
  </form>
</div>
