<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> Tambah Data Penduduk</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
  <h2 class="mb-4">Tambah Data Penduduk</h2>

  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('catin.store') }}" method="POST" id="catinForm">
    @csrf

    <!-- Step 1: Data Ibu -->
    <div class="step" id="step1">
        <h2>Data Ibu</h2>
        <div>
            <label>Nama Ibu:</label>
            <input type="text" name="nama_ibu" required>
        </div>
        <div>
            <label>NIK Ibu:</label>
            <input type="text" name="penduduk_ibu_id" required>
        </div>
        <div>
            <label>Jumlah Anak Kandung:</label>
            <input type="number" name="jumlah_anak_kandung" required>
        </div>
        <div>
            <label>Tanggal Lahir Anak Terakhir:</label>
            <input type="date" name="tanggal_lahir_anak_terakhir" required>
        </div>
        <div>
            <label>Menggunakan Kontrasepsi Saat Ini?</label><br>
            <input type="radio" name="menggunakan_alat_kontrasepsi" value="Ya"> Ya
            <input type="radio" name="menggunakan_alat_kontrasepsi" value="Tidak"> Tidak
        </div>
        <div>
            <label>Sumber Air Minum Utama:</label>
            <select name="sumber_air_minum">
                <option value="Air kemasan">Air kemasan</option>
                <option value="Ledeng">Ledeng</option>
                <option value="Sumur bor">Sumur bor</option>
                <option value="Sumur terlindungi">Sumur terlindungi</option>
                <option value="Sumur tak terlindungi">Sumur tak terlindungi</option>
                <option value="Mata air terlindungi">Mata air terlindungi</option>
                <option value="Mata air tak terlindungi">Mata air tak terlindungi</option>
                <option value="Air permukaan">Air permukaan</option>
                <option value="Air hujan">Air hujan</option>
                <option value="Lainnya">Lainnya</option>
            </select>
        </div>
        <div>
            <label>Fasilitas Buang Air Besar:</label>
            <select name="fasilitas_BAB">
                <option value="Jamban milik sendiri">Jamban milik sendiri</option>
                <option value="Jamban pada MCK">Jamban pada MCK</option>
                <option value="Lainnya">Lainnya</option>
                <option value="Tidak Ada">Tidak Ada</option>
            </select>
        </div>

        <button type="button" onclick="nextStep(2)">Next</button>
    </div>

    <!-- Step 2: Data catin -->
    <div class="step" id="step2" style="display:none;">
        <h2>Data catin</h2>
        <div>
            <label>Berat Badan (kg):</label>
            <input type="number" step="0.01" name="berat_badan" required>
        </div>
        <div>
            <label>Tinggi Badan (cm):</label>
            <input type="number" step="0.1" name="tinggi_badan" required>
        </div>
        <div>
            <label>Urutan Anak:</label>
            <input type="number" name="urutan_anak" required>
        </div>
        <div>
            <label>Umur Kehamilan Saat Lahir (minggu):</label>
            <input type="number" name="umur_kehamilan_saat_lahir" required>
        </div>
        <div>
            <label>Apakah diberikan ASI Eksklusif?</label><br>
            <input type="radio" name="asi_eksklusif" value="Ya"> Ya
            <input type="radio" name="asi_eksklusif" value="Tidak"> Tidak
        </div>
        <div>
            <label>Apakah sudah Imunisasi Hepatitis B?</label><br>
            <input type="radio" name="imunisasi_hepatitis_B" value="Ya"> Ya
            <input type="radio" name="imunisasi_hepatitis_B" value="Tidak"> Tidak
        </div>
        <div>
            <label>Apakah catin Terpapar Rokok?</label><br>
            <input type="radio" name="meerokok_terpapar" value="Ya"> Ya
            <input type="radio" name="meerokok_terpapar" value="Tidak"> Tidak
        </div>
        <div>
            <label>Mengisi Kartu Kembang Anak?</label><br>
            <input type="radio" name="mengisi_KKA" value="Ya"> Ya
            <input type="radio" name="mengisi_KKA" value="Tidak"> Tidak
        </div>

        <button type="button" onclick="nextStep(1)">Back</button>
        <button type="button" onclick="nextStep(3)">Next</button>
    </div>

    <!-- Step 3: Data Pendampingan Bulanan -->
    <div class="step" id="step3" style="display:none;">
        <h2>Data Pendampingan Bulanan</h2>
        <div>
            <label>Longitude:</label>
            <input type="text" name="longitude" required>
        </div>
        <div>
            <label>Latitude:</label>
            <input type="text" name="latitude" required>
        </div>
        <div>
            <label>Kehadiran di Posyandu Bulan Ini?</label><br>
            <input type="radio" name="kehadiran_posyandu" value="Ya"> Ya
            <input type="radio" name="kehadiran_posyandu" value="Tidak"> Tidak
        </div>
        <div>
            <label>Pemberian Penyuluhan/KIE:</label><br>
            <input type="radio" name="penyuluhan_KIE" value="Ya, perorang"> Ya, perorang
            <input type="radio" name="penyuluhan_KIE" value="Ya, kelompok"> Ya, kelompok
            <input type="radio" name="penyuluhan_KIE" value="Tidak"> Tidak
        </div>
        <div>
            <label>Fasilitas Bantuan Sosial:</label><br>
            <input type="radio" name="fasilitas_bantuan_sosial" value="Ya, sedang di proses"> Ya, sedang diproses
            <input type="radio" name="fasilitas_bantuan_sosial" value="Ya, sudah mendapat bantuan sosial"> Ya, sudah mendapat bantuan sosial
            <input type="radio" name="fasilitas_bantuan_sosial" value="Tidak, karena tidak memenuhi syarat"> Tidak, karena tidak memenuhi syarat
            <input type="radio" name="fasilitas_bantuan_sosial" value="Tidak, karena sudah menerima bantuan"> Tidak, karena sudah menerima bantuan
        </div>

        <button type="button" onclick="nextStep(2)">Back</button>
        <button type="submit">Simpan Data catin</button>
    </div>
</form>

<script>
    function nextStep(step) {
        // Hide all steps
        document.querySelectorAll('.step').forEach(function(stepDiv) {
            stepDiv.style.display = 'none';
        });
        // Show current step
        document.getElementById('step' + step).style.display = 'block';
    }
</script>

</body>
</html>
