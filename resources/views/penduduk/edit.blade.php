<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit Data TPK</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
  <h2 class="mb-4">Edit Data TPK</h2>

  <!-- Form Edit Data -->
  <form action="{{ route('tpk.update', $tpk->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
      <label for="NIK" class="form-label">NIK</label>
      <input type="text" name="NIK" class="form-control" id="NIK" value="{{ old('NIK', $tpk->NIK) }}" required>
    </div>

    <div class="mb-3">
      <label for="nama" class="form-label">Nama</label>
      <input type="text" name="nama" class="form-control" id="nama" value="{{ old('nama', $tpk->nama) }}" required>
    </div>

    <div class="mb-3">
      <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
      <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir" value="{{ old('tanggal_lahir', $tpk->tanggal_lahir) }}" required>
    </div>

    <div class="mb-3">
      <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
      <select name="jenis_kelamin" id="jenis_kelamin" class="form-select" required>
        <option value="">-- Pilih --</option>
        <option value="Laki-laki" {{ old('jenis_kelamin', $tpk->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
        <option value="Perempuan" {{ old('jenis_kelamin', $tpk->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
      </select>
    </div>

    <div class="mb-3">
      <label for="kecamatan" class="form-label">Kecamatan</label>
      <select name="kecamatan" id="kecamatan" class="form-select" required>
        <option value="">-- Pilih --</option>
        <option value="Ujung" {{ old('kecamatan', $tpk->kecamatan) == 'Ujung' ? 'selected' : '' }}>Ujung</option>
        <option value="Bacukiki" {{ old('kecamatan', $tpk->kecamatan) == 'Bacukiki' ? 'selected' : '' }}>Bacukiki</option>
        <option value="Bacukiki Barat" {{ old('kecamatan', $tpk->kecamatan) == 'Bacukiki Barat' ? 'selected' : '' }}>Bacukiki Barat</option>
        <option value="Soreang" {{ old('kecamatan', $tpk->kecamatan) == 'Soreang' ? 'selected' : '' }}>Soreang</option>
      </select>
    </div>

    <div class="mb-3">
      <label for="kelurahan" class="form-label">Kelurahan</label>
      <input type="text" name="kelurahan" class="form-control" id="kelurahan" value="{{ old('kelurahan', $tpk->kelurahan) }}" required>
    </div>

    <div class="mb-3">
      <label for="no_hp" class="form-label">No HP</label>
      <input type="text" name="no_hp" class="form-control" id="no_hp" value="{{ old('no_hp', $tpk->no_hp) }}" required>
    </div>

    <div class="mb-3">
      <label for="password" class="form-label">Password (Isi kalau mau ganti)</label>
      <input type="password" name="password" class="form-control" id="password">
      <small class="text-muted">Kosongkan jika tidak ingin mengubah password.</small>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('tpk.index') }}" class="btn btn-secondary">Kembali</a>
  </form>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
