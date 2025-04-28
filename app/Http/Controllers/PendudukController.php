<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use Illuminate\Http\Request;


class PendudukController extends Controller
{
    public function index()
    {
        // Menampilkan semua data penduduk
        $penduduks = Penduduk::all();
        return view('penduduk.index', compact('penduduks'));
    }

    public function create()
    {
        // Menampilkan form untuk menambah data penduduk
        return view('penduduk.create');
    }

    public function store(Request $request)
    {
        // Validasi inputan
        $request->validate([
            'NIK' => 'required|digits:16|unique:penduduk,NIK',
            'nama' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'kecamatan' => 'required',
            'kelurahan' => 'required',
            'RT' => 'required',
            'RW' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'kategori' => 'required|in:CATIN,BUMIL,BADUTA,Pasca Persalinan',  // Validasi kategori
        ]);

        // Simpan data penduduk
        $penduduk = Penduduk::create([
            'NIK' => $request->NIK,
            'nama' => $request->nama,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'kecamatan' => $request->kecamatan,
            'kelurahan' => $request->kelurahan,
            'RT' => $request->RT,
            'RW' => $request->RW,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'kategori' => $request->kategori,
        ]);

        // Periksa kategori dan arahkan ke form yang sesuai
        if ($penduduk->kategori == 'BADUTA') {
            return redirect()->route('baduta.create', ['penduduk_id' => $penduduk->id]);
        } elseif ($penduduk->kategori == 'CATIN') {
            // Arahkan ke form CATIN
            return redirect()->route('catin.create', ['penduduk_id' => $penduduk->id]);
        } elseif ($penduduk->kategori == 'BUMIL') {
            // Arahkan ke form BUMIL
            return redirect()->route('bumil.create', ['penduduk_id' => $penduduk->id]);
        } elseif ($penduduk->kategori == 'Pasca Persalinan') {
            // Arahkan ke form Pasca Persalinan
            return redirect()->route('pasper.create', ['penduduk_id' => $penduduk->id]);
        }

        // Arahkan ke halaman utama jika kategori tidak dikenali
        return redirect()->route('penduduk.index')->with('success', 'Data Penduduk berhasil disimpan');
    }

    public function show($id)
    {
        // Menampilkan detail data penduduk
        $penduduk = Penduduk::findOrFail($id);
        return view('penduduk.show', compact('penduduk'));
    }

    public function edit($id)
    {
        // Menampilkan form edit data penduduk
        $penduduk = Penduduk::findOrFail($id);
        return view('penduduk.edit', compact('penduduk'));
    }

    public function update(Request $request, $id)
    {
        // Validasi inputan update
        $request->validate([
            'NIK' => 'required|string|max:16|unique:penduduk,NIK,' . $id,
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tanggal_lahir' => 'required|date',
            'kelurahan' => 'required|string|max:255',
            'kecamatan' => 'required|in:Ujung,Bacukiki,Bacukiki Barat,Soreang',
            'RT' => 'required|string|max:3',
            'RW' => 'required|string|max:3',
            'alamat' => 'required|string',
            'no_hp' => 'required|string|max:16',
            'kategori' => 'required|in:CATIN,BUMIL,BADUTA,Pasca Persalinan',
        ]);

        // Update data penduduk
        $penduduk = Penduduk::findOrFail($id);
        $penduduk->update($request->all());

        // Kembali ke halaman index setelah update
        return redirect()->route('penduduk.index')->with('success', 'Data Penduduk berhasil diperbarui');
    }

    public function destroy($id)
    {
        // Menghapus data penduduk
        $penduduk = Penduduk::findOrFail($id);
        $penduduk->delete();

        // Kembali ke halaman index setelah dihapus
        return redirect()->route('penduduk.index')->with('success', 'Data Penduduk berhasil dihapus');
    }
}
