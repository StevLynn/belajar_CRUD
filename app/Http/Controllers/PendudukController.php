<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use Illuminate\Http\Request;

class PendudukController extends Controller
{
    public function index()
    {
        $penduduks = Penduduk::all();
        return view('penduduk.index', compact('penduduks'));
    }

    public function create()
    {
        return view('penduduk.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|string|max:16|unique:penduduk',
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

        Penduduk::create($request->all());

        return redirect()->route('penduduk.index')->with('success', 'Data Penduduk berhasil disimpan');
    }

    public function show($id)
    {
        $penduduk = Penduduk::findOrFail($id);
        return view('penduduk.show', compact('penduduk'));
    }

    public function edit($id)
    {
        $penduduk = Penduduk::findOrFail($id);
        return view('penduduk.edit', compact('penduduk'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nik' => 'required|string|max:16|unique:penduduk,nik,' . $id,
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

        $penduduk = Penduduk::findOrFail($id);
        $penduduk->update($request->all());

        return redirect()->route('penduduk.index')->with('success', 'Data Penduduk berhasil diperbarui');
    }

    public function destroy($id)
    {
        $penduduk = Penduduk::findOrFail($id);
        $penduduk->delete();

        return redirect()->route('penduduk.index')->with('success', 'Data Penduduk berhasil dihapus');
    }
}
