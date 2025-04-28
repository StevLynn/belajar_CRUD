<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tambah Data Persalinan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
  <h2 class="mb-4">Tambah Data Persalinan</h2>

  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('pasper.store') }}" method="POST">
    @csrf

    <input type="hidden" name="penduduk_id" value="{{ $penduduk_id }}">

    <div class="mb-3">
      <label for="tanggal_persalinan">Tanggal Persalinan</label>
      <input type="date" name="tanggal_persalinan" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="tempat_persalinan">Tempat Persalinan</label>
      <input type="text" name="tempat_persalinan" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="penolong_persalinan">Penolong Persalinan</label>
      <input type="text" name="penolong_persalinan" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="cara_persalinan">Cara Persalinan</label>
      <input type="text" name="cara_persalinan" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="keadaan_bayi">Keadaan Bayi</label>
      <input type="text" name="keadaan_bayi" class="form-control" required>
    </div>

    <div class="mb-3">
      <label>Menggunakan Alat Kontrasepsi?</label><br>
      <input type="radio" name="menggunakan_alat_kontrasepsi" value="Ya"> Ya
      <input type="radio" name="menggunakan_alat_kontrasepsi" value="Tidak"> Tidak
    </div>

    <div class="mb-3">
      <label>Terpapar Asap Rokok?</label><br>
      <input type="radio" name="meerokok_terpapar" value="Ya"> Ya
      <input type="radio" name="meerokok_terpapar" value="Tidak"> Tidak
    </div>

    <div class="mb-3">
      <label for="sumber_air_minum">Sumber Air Minum</label>
      <input type="text" name="sumber_air_minum" class="form-control">
    </div>

    <div class="mb-3">
      <label for="fasilitas_BAB">Fasilitas Buang Air Besar</label>
      <input type="text" name="fasilitas_BAB" class="form-control">
    </div>

    <div>
        <label>Longitude:</label>
        <input type="text" name="longitude" required>
    </div>
    
    <div>
        <label>Latitude:</label>
        <input type="text" name="latitude" required>
    </div>

    <div class="mb-3">
      <label>Mendapatkan Tablet Tambah Darah?</label><br>
      <input type="radio" name="mendapatkan_tablet_tambah_darah" value="Ya"> Ya
      <input type="radio" name="mendapatkan_tablet_tambah_darah" value="Tidak"> Tidak
    </div>

    <div class="mb-3">
      <label>Meminum Tablet Tambah Darah?</label><br>
      <input type="radio" name="meminum_table_tambah_darah" value="Ya"> Ya
      <input type="radio" name="meminum_table_tambah_darah" value="Tidak"> Tidak
    </div>

    <div class="mb-3">
      <label for="penyuluhan_KIE">Penyuluhan KIE</label>
      <input type="text" name="penyuluhan_KIE" class="form-control">
    </div>

    <div class="mb-3">
      <label for="fasilitas_layanan_rujukan">Fasilitas Layanan Rujukan</label>
      <input type="text" name="fasilitas_layanan_rujukan" class="form-control">
    </div>

    <button type="submit" class="btn btn-success">Simpan Data</button>

  </form>
</div>

</body>
</html>
