<?php

namespace App\Http\Controllers;

use App\Models\Catin;
use App\Models\Penduduk;
use Illuminate\Http\Request;

class CatinController extends Controller
{
    public function index()
    {
        $catins = Catin::all();
        return view('catin.index', compact('catins'));
    }

    public function create($penduduk_id)
    {
        $penduduks = Penduduk::all();
        return view('catin.create', compact('penduduks', 'penduduk_id'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'penduduk_id' => 'required|exists:penduduk,id',
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tanggal_lahir' => 'required|date',
            'kelurahan' => 'required|string|max:255',
            'kecamatan' => 'required|in:Ujung,Bacukiki,Bacukiki Barat,Soreang',
            'RT' => 'required|string|max:10',
            'RW' => 'required|string|max:10',
            'alamat' => 'required|string',
            'tinggi_badan' => 'required|integer|min:0',
            'berat_badan' => 'required|integer|min:0',
            'indeks_massa_tubuh' => 'required|integer|min:0',
            'kadar_hemoglobin' => 'required|integer|min:0',
            'LILA' => 'required|integer|min:0',
            'menggunakan_alat_kontrasepsi' => 'nullable|string',
            'catin_wanita_meerokok_terpapar' => 'nullable|string',
            'catin_pria_meerokok_terpapar' => 'nullable|string',
            'sumber_air_minum' => 'nullable|string',
            'fasilitas_BAB' => 'nullable|string',
            'longitude' => 'required|numeric|between:-180,180',
            'latitude' => 'required|numeric|between:-90,90',
            'mendapatkan_tablet_tambah_darah' => 'nullable|string',
            'meminum_table_tambah_darah' => 'nullable|string',
            'penyuluhan_KIE' => 'nullable|string',
            'fasilitas_layanan_rujukan' => 'nullable|string',
            'fasilitas_bantuan_sosial' => 'nullable|string',
        ]);
        
        $penduduk = Penduduk::find($request->penduduk_id);
        
        if ($penduduk) {
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
        $catin = Catin::findOrFail($id);
        $penduduks = Penduduk::all();
        return view('catin.edit', compact('catin', 'penduduks'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'penduduk_id' => 'required|exists:penduduk,id',
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tanggal_lahir' => 'required|date',
            'kelurahan' => 'required|string|max:255',
            'kecamatan' => 'required|in:Ujung,Bacukiki,Bacukiki Barat,Soreang',
            'RT' => 'required|string|max:10',
            'RW' => 'required|string|max:10',
            'alamat' => 'required|string',
            'tinggi_badan' => 'required|integer|min:0',
            'berat_badan' => 'required|integer|min:0',
            'indeks_massa_tubuh' => 'required|integer|min:0',
            'kadar_hemoglobin' => 'required|integer|min:0',
            'LILA' => 'required|integer|min:0',
            'menggunakan_alat_kontrasepsi' => 'nullable|string',
            'catin_wanita_meerokok_terpapar' => 'nullable|string',
            'catin_pria_meerokok_terpapar' => 'nullable|string',
            'sumber_air_minum' => 'nullable|string',
            'fasilitas_BAB' => 'nullable|string',
            'longitude' => 'required|numeric|between:-180,180',
            'latitude' => 'required|numeric|between:-90,90',
            'mendapatkan_tablet_tambah_darah' => 'nullable|string',
            'meminum_table_tambah_darah' => 'nullable|string',
            'penyuluhan_KIE' => 'nullable|string',
            'fasilitas_layanan_rujukan' => 'nullable|string',
            'fasilitas_bantuan_sosial' => 'nullable|string',
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
