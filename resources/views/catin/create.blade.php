<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tambah Data Catin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
  <h2 class="mb-4">Tambah Data Catin</h2>

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

    <!-- Step 1: Data Catin -->
    <div class="step" id="step1">
        <h2>Data Catin</h2>
        <!-- Tambahkan input untuk penduduk_id bayi -->
        <input type="hidden" name="penduduk_id" value="{{ $penduduk_id }}">

        <div class="mb-3">
        <label class="form-label">Nama Catin</label>
        <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="mb-3">
        <label class="form-label">Jenis Kelamin</label><br>
        <select name="jenis_kelamin" class="form-control" required>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
        </select>
        </div>

        <div class="mb-3">
        <label class="form-label">Tanggal Lahir</label>
        <input type="date" name="tanggal_lahir" class="form-control" required>
        </div>

        <div class="mb-3">
        <label class="form-label">Kelurahan</label>
        <input type="text" name="kelurahan" class="form-control" required>
        </div>

        <div class="mb-3">
        <label class="form-label">Kecamatan</label>
        <select name="kecamatan" class="form-control" required>
            <option value="Ujung">Ujung</option>
            <option value="Bacukiki">Bacukiki</option>
            <option value="Bacukiki Barat">Bacukiki Barat</option>
            <option value="Soreang">Soreang</option>
        </select>
        </div>

        <div class="row">
        <div class="col-md-6 mb-3">
            <label class="form-label">RT</label>
            <input type="text" name="RT" class="form-control" required>
        </div>
        <div class="col-md-6 mb-3">
            <label class="form-label">RW</label>
            <input type="text" name="RW" class="form-control" required>
        </div>
        </div>

        <div class="mb-3">
        <label class="form-label">Alamat Lengkap</label>
        <textarea name="alamat" class="form-control" rows="2" required></textarea>
        </div>

        <button type="button" onclick="nextStep(2)">Next</button>
    </div>

    <!-- Step 2: Data Baduta -->
    <div class="step" id="step2" style="display:none;">
        <h2>Data Kesehatan Catin</h2>
        <div class="row">
        <div class="col-md-6 mb-3">
            <label class="form-label">Tinggi Badan (cm)</label>
            <input type="number" name="tinggi_badan" class="form-control" required>
        </div>
        <div class="col-md-6 mb-3">
            <label class="form-label">Berat Badan (kg)</label>
            <input type="number" name="berat_badan" class="form-control" required>
        </div>
        </div>

        <div class="row">
        <div class="col-md-6 mb-3">
            <label class="form-label">Indeks Massa Tubuh (IMT)</label>
            <input type="number" name="indeks_massa_tubuh" class="form-control" required>
        </div>
        <div class="col-md-6 mb-3">
            <label class="form-label">Kadar Hemoglobin (Hb)</label>
            <input type="number" name="kadar_hemoglobin" class="form-control" required>
        </div>
        </div>

        <div class="mb-3">
        <label class="form-label">Lingkar Lengan Atas (LILA) (cm)</label>
        <input type="number" name="LILA" class="form-control" required>
        </div>

        <div class="mb-3">
        <label class="form-label">Apakah Menggunakan Alat Kontrasepsi?</label><br>
        <select name="menggunakan_alat_kontrasepsi" class="form-control">
            <option value="">- Pilih -</option>
            <option value="Ya">Ya</option>
            <option value="Tidak">Tidak</option>
        </select>
        </div>

        <div class="row">
        <div class="col-md-6 mb-3">
            <label class="form-label">Catin Wanita Terpapar Rokok?</label>
            <select name="catin_wanita_meerokok_terpapar" class="form-control">
            <option value="">- Pilih -</option>
            <option value="Ya">Ya</option>
            <option value="Tidak">Tidak</option>
            </select>
        </div>
        <div class="col-md-6 mb-3">
            <label class="form-label">Catin Pria Terpapar Rokok?</label>
            <select name="catin_pria_meerokok_terpapar" class="form-control">
            <option value="">- Pilih -</option>
            <option value="Ya">Ya</option>
            <option value="Tidak">Tidak</option>
            </select>
        </div>
        </div>

        <div class="mb-3">
        <label class="form-label">Sumber Air Minum</label>
        <select name="sumber_air_minum" class="form-control">
            <option value="">- Pilih -</option>
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
        <label class="form-label">Fasilitas Buang Air Besar (BAB)</label>
        <select name="fasilitas_BAB" class="form-control">
            <option value="">- Pilih -</option>
            <option value="Jamban milik sendiri">Jamban milik sendiri</option>
            <option value="Jamban pada MCK">Jamban pada MCK</option>
            <option value="Lainnya">Lainnya</option>
            <option value="Tidak Ada">Tidak Ada</option>
        </select>
        </div>

        <button type="button" onclick="nextStep(1)">Back</button>
        <button type="button" onclick="nextStep(3)">Next</button>
    </div>

    <!-- Step 3: Data Pendampingan Bulanan -->
    <div class="step" id="step3" style="display:none;">
        <h2>Data Pendampingan Bulanan</h2>
        <div class="row">
        <div class="col-md-6 mb-3">
            <label class="form-label">Longitude</label>
            <input type="text" name="longitude" class="form-control" required>
        </div>
        <div class="col-md-6 mb-3">
            <label class="form-label">Latitude</label>
            <input type="text" name="latitude" class="form-control" required>
        </div>
        </div>

        <div class="mb-3">
        <label class="form-label">Mendapatkan Tablet Tambah Darah?</label>
        <select name="mendapatkan_tablet_tambah_darah" class="form-control">
            <option value="">- Pilih -</option>
            <option value="Ya">Ya</option>
            <option value="Tidak">Tidak</option>
        </select>
        </div>

        <div class="mb-3">
        <label class="form-label">Rutin Meminum Tablet Tambah Darah?</label>
        <select name="meminum_table_tambah_darah" class="form-control">
            <option value="">- Pilih -</option>
            <option value="Ya">Ya</option>
            <option value="Tidak">Tidak</option>
        </select>
        </div>

        <div class="mb-3">
        <label class="form-label">Penyuluhan/KIE (Komunikasi, Informasi, Edukasi)</label>
        <select name="penyuluhan_KIE" class="form-control">
            <option value="">- Pilih -</option>
            <option value="Ya, perorangan">Ya, perorangan</option>
            <option value="Ya, kelompok">Ya, kelompok</option>
            <option value="Tidak">Tidak</option>
        </select>
        </div>

        <div class="mb-3">
        <label class="form-label">Fasilitas Layanan Rujukan</label>
        <select name="fasilitas_layanan_rujukan" class="form-control">
            <option value="">- Pilih -</option>
            <option value="Ada">Ada</option>
            <option value="Tidak Ada">Tidak Ada</option>
        </select>
        </div>

        <div class="mb-3">
        <label class="form-label">Fasilitas Bantuan Sosial</label>
        <select name="fasilitas_bantuan_sosial" class="form-control">
            <option value="">- Pilih -</option>
            <option value="Ya, sedang diproses">Ya, sedang diproses</option>
            <option value="Ya, sudah mendapat bantuan sosial">Ya, sudah mendapat bantuan sosial</option>
            <option value="Tidak, karena tidak memenuhi syarat">Tidak, karena tidak memenuhi syarat</option>
            <option value="Tidak, karena sudah menerima bantuan">Tidak, karena sudah menerima bantuan</option>
        </select>
        </div>

        <button type="button" onclick="nextStep(2)">Back</button>
        <button type="submit" class="btn btn-primary">Simpan Data Catin</button>
    </div>
  </form>

</div>
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
