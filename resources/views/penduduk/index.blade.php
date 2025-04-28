<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Belajar CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>

    <div class="container mt-5">
      <h2 class="mb-4">Data Penduduk</h2>
      @session("success")
      <div class="alert alert-success">{{ $value }}</div>
      @endsession
      <a href="{{ route('penduduk.create') }}" class="btn btn-success btn-sm mb-3">Tambah Penduduk</a>
      <table class="table table-bordered table-striped">
        <thead class="table-dark">
          <tr>
            <th>No</th>
            <th>NIK</th>
            <th>Nama</th>
            <th>Tanggal Lahir</th>
            <th>Jenis Kelamin</th>
            <th>Kecamatan</th>
            <th>Kelurahan</th>
            <th>RT</th>
            <th>RW</th>
            <th>Alamat</th>
            <th>No HP</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($penduduks as $index => $penduduk)
          <tr>
            <td>{{ $index + 1 }}</td> <!-- No urut -->
            <td>{{ $penduduk->NIK }}</td>
            <td>{{ $penduduk->nama }}</td>
            <td>{{ $penduduk->tanggal_lahir }}</td>
            <td>{{ $penduduk->jenis_kelamin }}</td>
            <td>{{ $penduduk->kecamatan }}</td>
            <td>{{ $penduduk->kelurahan }}</td>
            <td>{{ $penduduk->RT }}</td>
            <td>{{ $penduduk->RW }}</td>
            <td>{{ $penduduk->alamat }}</td>
            <td>{{ $penduduk->no_hp }}</td>
            <td>{{ $penduduk->kategori }}</td>
            <td>
              <a href="{{ route('penduduk.edit', $penduduk->id) }}" class="btn btn-primary btn-sm">Edit</a>
              <form action="{{ route('penduduk.destroy', $penduduk->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau hapus?')">Hapus</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
