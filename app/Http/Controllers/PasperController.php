<?php

namespace App\Http\Controllers;

use App\Models\Pasper;  // Menggunakan model Pasper
use Illuminate\Http\Request;
use App\Models\Penduduk;

class PasperController extends Controller
{
    public function index()
    {
        // Ambil data Pasper
        $paspers = Pasper::all();  // Ubah PascaPersalinan menjadi Pasper
        return view('pasper.index', compact('paspers'));  // Ubah view dari 'pasca-persalinan' menjadi 'pasper'
    }

    public function create($penduduk_id)
    {
        $penduduks = Penduduk::all(); // Ambil semua penduduk
        return view('pasper.create', compact('penduduks', 'penduduk_id'));
    }



    public function store(Request $request)
    {
        $request->validate([
            'penduduk_id' => 'required|exists:penduduk,id',
            'tanggal_persalinan' => 'required|date',
            'tempat_persalinan' => 'required|string',
            'penolong_persalinan' => 'required|string',
            'cara_persalinan' => 'required|string',
            'keadaan_bayi' => 'required|string',
            'menggunakan_alat_kontrasepsi' => 'nullable|string',
            'meerokok_terpapar' => 'nullable|string',
            'sumber_air_minum' => 'nullable|string',
            'fasilitas_BAB' => 'nullable|string',
            'longitude' => 'required|string',
            'latitude' => 'required|string',
            'mendapatkan_tablet_tambah_darah' => 'nullable|string',
            'meminum_table_tambah_darah' => 'nullable|string',
            'penyuluhan_KIE' => 'nullable|string',
            'fasilitas_layanan_rujukan' => 'nullable|string',
        ]);

        // Ambil data penduduk berdasarkan penduduk_id
        $penduduk = Penduduk::find($request->penduduk_id);

        if ($penduduk) {
            // Menyimpan data Pasper ke database
            Pasper::create($request->all());  // Ubah PascaPersalinan menjadi Pasper
        }

        return redirect()->route('penduduk.index')->with('success', 'Data Pasca Persalinan berhasil disimpan');
    }

    public function show($id)
    {
        $pasper = Pasper::findOrFail($id);  // Ubah PascaPersalinan menjadi Pasper
        return view('pasper.show', compact('pasper'));  // Ubah view dari 'pasca-persalinan.show' menjadi 'pasper.show'
    }

    public function edit($id)
    {
        $pasper = Pasper::findOrFail($id);  // Ubah PascaPersalinan menjadi Pasper
        return view('pasper.edit', compact('pasper'));  // Ubah view dari 'pasca-persalinan.edit' menjadi 'pasper.edit'
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'penduduk_id' => 'required|exists:penduduk,id',
            'tanggal_persalinan' => 'required|date',
            'tempat_persalinan' => 'required|string',
            'penolong_persalinan' => 'required|string',
            'cara_persalinan' => 'required|string',
            'keadaan_bayi' => 'required|string',
            'menggunakan_alat_kontrasepsi' => 'nullable|string',
            'meerokok_terpapar' => 'nullable|string',
            'sumber_air_minum' => 'nullable|string',
            'fasilitas_BAB' => 'nullable|string',
            'longitude' => 'required|decimal:10,7',
            'latitude' => 'required|decimal:10,7',
            'mendapatkan_tablet_tambah_darah' => 'nullable|string',
            'meminum_table_tambah_darah' => 'nullable|string',
            'penyuluhan_KIE' => 'nullable|string',
            'fasilitas_layanan_rujukan' => 'nullable|string',
        ]);

        // Menyimpan data Pasper yang sudah diperbarui
        $pasper = Pasper::findOrFail($id);  // Ubah PascaPersalinan menjadi Pasper
        $pasper->update($request->all());

        return redirect()->route('pasper.index')->with('success', 'Data Pasper berhasil diperbarui');
    }

    public function destroy($id)
    {
        $pasper = Pasper::findOrFail($id);  // Ubah PascaPersalinan menjadi Pasper
        $pasper->delete();

        return redirect()->route('pasper.index')->with('success', 'Data Pasper berhasil dihapus');
    }
}
