<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> DTambahata Penduduk</title>
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

  <form action="{{ route('penduduk.store') }}" method="POST">
    @csrf

    <div class="mb-3">
      <label for="NIK" class="form-label">NIK</label>
      <input type="text" name="NIK" class="form-control" id="NIK" required maxlength="16" minlength="16">
    </div>

    <div class="mb-3">
      <label for="nama" class="form-label">Nama</label>
      <input type="text" name="nama" class="form-control" id="nama" required>
    </div>

    <div class="mb-3">
      <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
      <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir" required>
    </div>

    <div class="mb-3">
      <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
      <select name="jenis_kelamin" id="jenis_kelamin" class="form-select" required>
        <option value="">-- Pilih --</option>
        <option value="Laki-laki">Laki-laki</option>
        <option value="Perempuan">Perempuan</option>
      </select>
    </div>

    <div class="mb-3">
      <label for="kecamatan" class="form-label">Kecamatan</label>
      <select name="kecamatan" id="kecamatan" class="form-select" required>
        <option value="">-- Pilih --</option>
        <option value="Ujung">Ujung</option>
        <option value="Bacukiki">Bacukiki</option>
        <option value="Bacukiki Barat">Bacukiki Barat</option>
        <option value="Soreang">Soreang</option>
      </select>
    </div>

    <div class="mb-3">
      <label for="kelurahan" class="form-label">Kelurahan</label>
      <select name="kelurahan" id="kelurahan" class="form-select" required>
        <option value="">-- Pilih Kelurahan --</option>
      </select>
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="RT" class="form-label">RT</label>
            <input type="text" name="RT" id="RT" class="form-control" required>
        </div>
        <div class="col-md-6 mb-3">
            <label for="RW" class="form-label">RW</label>
            <input type="text" name="RW" id="RW" class="form-control" required>
        </div>
    </div>

    <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <textarea name="alamat" id="alamat" class="form-control" rows="3" required></textarea>
    </div>

    <div class="mb-3">
      <label for="no_hp" class="form-label">No HP</label>
      <input type="text" name="no_hp" class="form-control" id="no_hp" required>
    </div>

    <div class="mb-3">
        <label for="kategori" class="form-label">Kategori</label>
        <select name="kategori" id="kategori" class="form-select" required>
            <option value="">-- Pilih Kategori --</option>
            <option value="CATIN">CATIN</option>
            <option value="BUMIL">BUMIL</option>
            <option value="BADUTA">BADUTA</option>
            <option value="Pasca Persalinan">Pasca Persalinan</option>
        </select>
    </div>

    <button type="submit" class="btn btn-success">Selanjutnya</button>
    <a href="{{ route('penduduk.index') }}" class="btn btn-secondary">Kembali</a>
  </form>
</div>

<script>
const kelurahanOptions = {
    "Ujung": ["Kelurahan Ujung A", "Kelurahan Ujung B", "Kelurahan Ujung C"],
    "Bacukiki": ["Kelurahan Bacukiki A", "Kelurahan Bacukiki B"],
    "Bacukiki Barat": ["Kelurahan Bacukiki Barat A", "Kelurahan Bacukiki Barat B"],
    "Soreang": ["Kelurahan Soreang A", "Kelurahan Soreang B", "Kelurahan Soreang C"]
};

const kecamatanSelect = document.getElementById('kecamatan');
const kelurahanSelect = document.getElementById('kelurahan');

kecamatanSelect.addEventListener('change', function() {
    const selectedKecamatan = this.value;
    kelurahanSelect.innerHTML = '<option value="">-- Pilih Kelurahan --</option>';

    if (selectedKecamatan && kelurahanOptions[selectedKecamatan]) {
        kelurahanOptions[selectedKecamatan].forEach(function(kelurahan) {
            const option = document.createElement('option');
            option.value = kelurahan;
            option.text = kelurahan;
            kelurahanSelect.appendChild(option);
        });
    }
});
</script>

</body>
</html>
