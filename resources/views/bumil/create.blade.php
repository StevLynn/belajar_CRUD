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

  <form action="{{ route('bumil.store') }}" method="POST" id="multiStepForm">
    @csrf

    <!-- Step 1 -->
    <div class="step" id="step1">
        <h4>Data Kehamilan dan Kondisi Ibu</h4>
        <!-- Tambahkan input untuk penduduk_id bayi -->
        <input type="hidden" name="penduduk_id" value="{{ $penduduk_id }}"> 
        <div class="mb-3">
            <label>Usia Kehamilan (minggu)</label>
            <input type="number" name="usia_kehamilan" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>TUF</label>
            <input type="number" name="TUF" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Jumlah Anak Kandung</label>
            <input type="number" name="jumlah_anak_kandung" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Tanggal Lahir Anak Terakhir</label>
            <input type="date" name="tgl_lahir_ank_terakhir" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Tinggi Badan (cm)</label>
            <input type="number" name="tinggi_badan" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Berat Badan Sebelum Hamil (kg)</label>
            <input type="number" name="berat_badan_sebelum_hamil" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Berat Badan Saat Ini (kg)</label>
            <input type="number" name="berat_badan_saat_ini" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Indeks Massa Tubuh (IMT)</label>
            <input type="number" name="indeks_massa_tubuh" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Kadar Hemoglobin (g/dL)</label>
            <input type="number" name="kadar_hemoglobin" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>LILA (cm)</label>
            <input type="number" name="LILA" class="form-control" required>
        </div>

        <div class="mb-3">
        <label>Menggunakan Kontrasepsi Saat Ini?</label><br>
            <input type="radio" name="menggunakan_alat_kontrasepsi" value="Ya"> Ya
            <input type="radio" name="menggunakan_alat_kontrasepsi" value="Tidak"> Tidak
        </div>

        <div class="mb-3">
            <label>Apakah Baduta Terpapar Rokok?</label><br>
            <input type="radio" name="meerokok_terpapar" value="Ya"> Ya
            <input type="radio" name="meerokok_terpapar" value="Tidak"> Tidak
        </div>

        <div class="mb-3">
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

        <div class="mb-3">
            <label>Fasilitas Buang Air Besar:</label>
                <select name="fasilitas_BAB">
                    <option value="Jamban milik sendiri">Jamban milik sendiri</option>
                    <option value="Jamban pada MCK">Jamban pada MCK</option>
                    <option value="Lainnya">Lainnya</option>
                    <option value="Tidak Ada">Tidak Ada</option>
                </select>
        </div>

        <button type="button" class="btn btn-primary" onclick="nextStep(2)">Next</button>
    </div>

    <!-- Step 2 -->
    <div class="step" id="step2" style="display:none;">
        <h4>Data Lokasi dan Bantuan</h4>

        <div class="mb-3">
            <label>Longitude</label>
            <input type="text" name="longitude" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Latitude</label>
            <input type="text" name="latitude" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Mendapatkan Tablet Tambah Darah</label>
            <input type="radio" name="mendapatkan_tablet_tambah_darah" value="Ya"> Ya
            <input type="radio" name="mendapatkan_tablet_tambah_darah" value="Tidak"> Tidak
        </div>
        
        <div class="mb-3">
            <label>Meminum Tablet Tambah Darah</label>
            <input type="radio" name="meminum_table_tambah_darah" value="Ya"> Ya
            <input type="radio" name="meminum_table_tambah_darah" value="Tidak"> Tidak
        </div>

        <div class="mb-3">
            <label>Penyuluhan KIE</label>
            <input type="text" name="penyuluhan_KIE" class="form-control">
            <input type="radio" name="penyuluhan_KIE" value="Ya, perorang"> Ya, perorang
            <input type="radio" name="penyuluhan_KIE" value="Ya, kelompok"> Ya, kelompok
            <input type="radio" name="penyuluhan_KIE" value="Tidak"> Tidak
        </div>

        <div class="mb-3">
            <label>Fasilitas Layanan Rujukan</label>
            <input type="text" name="fasilitas_layanan_rujukan" class="form-control">
        </div>

        <div class="mb-3">
            <label>Fasilitas Bantuan Sosial</label>
            <input type="radio" name="fasilitas_bantuan_sosial" value="Ya, sedang di proses"> Ya, sedang diproses
            <input type="radio" name="fasilitas_bantuan_sosial" value="Ya, sudah mendapat bantuan sosial"> Ya, sudah mendapat bantuan sosial
            <input type="radio" name="fasilitas_bantuan_sosial" value="Tidak, karena tidak memenuhi syarat"> Tidak, karena tidak memenuhi syarat
            <input type="radio" name="fasilitas_bantuan_sosial" value="Tidak, karena sudah menerima bantuan"> Tidak, karena sudah menerima bantuan
        </div>

        <button type="button" class="btn btn-secondary" onclick="nextStep(1)">Back</button>
        <button type="submit" class="btn btn-success">Simpan</button>
    </div>
</form>

<script>
function nextStep(step) {
    document.querySelectorAll('.step').forEach(function(stepDiv) {
        stepDiv.style.display = 'none';
    });
    document.getElementById('step' + step).style.display = 'block';
}
</script>

</body>
</html>
