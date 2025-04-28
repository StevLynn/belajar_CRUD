<?php

namespace App\Http\Controllers;

use App\Models\Catin;
use Illuminate\Http\Request;
use App\Models\Penduduk;

class CatinController extends Controller
{
    public function index()
    {
        $catins = Catin::all();
        return view('catin.index', compact('catins'));
    }

    public function create($penduduk_id)
    {
        $penduduks = Penduduk::all(); // Ambil semua penduduk
        return view('catin.create', compact('penduduks', 'penduduk_id'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'penduduk_id' => 'required|exists:penduduk,id',
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string',
            'no_hp' => 'required|string|max:16',
        ]);

        // Ambil data penduduk berdasarkan penduduk_id
        $penduduk = Penduduk::find($request->penduduk_id);

        if ($penduduk) {
            // Menyimpan data Baduta ke database
            Catin::create($request->all());
        }

        return redirect()->route('penduduk.index')->with('success', 'Data Catin berhasil disimpan');
    }

    public function show($id)
    {
        $catin = Catin::findOrFail($id);
        return view('catin.show', compact('catin'));
    }

    public function edit($id)
    {
        $bumil = Catin::findOrFail($id);
        $penduduks = Penduduk::all();
        return view('bumil.edit', compact('bumil', 'penduduks'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'penduduk_id' => 'required|exists:penduduk,id',
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string',
            'no_hp' => 'required|string|max:16',
        ]);

        $catin = Catin::findOrFail($id);
        $catin->update($request->all());

        return redirect()->route('catin.index')->with('success', 'Data Catin berhasil diperbarui');
    }

    public function destroy($id)
    {
        $catin = Catin::findOrFail($id);
        $catin->delete();

        return redirect()->route('catin.index')->with('success', 'Data Catin berhasil dihapus');
    }
}
