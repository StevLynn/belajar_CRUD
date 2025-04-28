<?php

namespace App\Http\Controllers;

use App\Models\Bumil;
use App\Models\Penduduk;
use Illuminate\Http\Request;

class BumilController extends Controller
{
    public function index()
    {
        $bumils = Bumil::all();
        return view('bumil.index', compact('bumils'));
    }

    public function create(Request $request)
    {
        $penduduks = Penduduk::all();
        $penduduk_id = $request->penduduk_id;
        return view('bumil.create', compact('penduduks', 'penduduk_id'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'penduduk_id' => 'required|exists:penduduk,id',
            'usia_kehamilan' => 'required|integer',
            'TUF' => 'required|integer',
            'jumlah_anak_kandung' => 'required|integer',
            'tgl_lahir_ank_terakhir' => 'required|date',
            'tinggi_badan' => 'required|integer',
            'berat_badan_sebelum_hamil' => 'required|integer',
            'berat_badan_saat_ini' => 'required|integer',
            'indeks_massa_tubuh' => 'nullable|numeric',
            'kadar_hemoglobin' => 'nullable|numeric',
            'LILA' => 'nullable|numeric',
            'menggunakan_alat_kontrasepsi' => 'nullable|string',
            'meerokok_terpapar' => 'nullable|string',
            'sumber_air_minum' => 'nullable|string',
            'fasilitas_BAB' => 'nullable|string',
            'longitude' => 'nullable|numeric',
            'latitude' => 'nullable|numeric',
            'mendapatkan_tablet_tambah_darah' => 'nullable|string',
            'meminum_table_tambah_darah' => 'nullable|string',
            'penyuluhan_KIE' => 'nullable|string',
            'fasilitas_layanan_rujukan' => 'nullable|string',
            'fasilitas_bantuan_sosial' => 'nullable|string',
        ]);

        // Ambil data penduduk berdasarkan penduduk_id
        $penduduk = Penduduk::find($request->penduduk_id);

        if ($penduduk) {
            // Menyimpan data Baduta ke database
            Bumil::create($request->all());
        }


        return redirect()->route('penduduk.index')->with('success', 'Data Bumil berhasil disimpan');
    }

    public function show($id)
    {
        $bumil = Bumil::findOrFail($id);
        return view('bumil.show', compact('bumil'));
    }

    public function edit($id)
    {
        $bumil = Bumil::findOrFail($id);
        $penduduks = Penduduk::all();
        return view('bumil.edit', compact('bumil', 'penduduks'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'penduduk_id' => 'required|exists:penduduk,id',
            'usia_kehamilan' => 'required|integer',
            'TUF' => 'required|integer',
            'jumlah_anak_kandung' => 'required|integer',
            'tgl_lahir_ank_terakhir' => 'required|date',
            'tinggi_badan' => 'required|integer',
            'berat_badan_sebelum_hamil' => 'required|integer',
            'berat_badan_saat_ini' => 'required|integer',
            'indeks_massa_tubuh' => 'nullable|numeric',
            'kadar_hemoglobin' => 'nullable|numeric',
            'LILA' => 'nullable|numeric',
            'menggunakan_alat_kontrasepsi' => 'nullable|string',
            'meerokok_terpapar' => 'nullable|string',
            'sumber_air_minum' => 'nullable|string',
            'fasilitas_BAB' => 'nullable|string',
            'longitude' => 'nullable|numeric',
            'latitude' => 'nullable|numeric',
            'mendapatkan_tablet_tambah_darah' => 'nullable|string',
            'meminum_table_tambah_darah' => 'nullable|string',
            'penyuluhan_KIE' => 'nullable|string',
            'fasilitas_layanan_rujukan' => 'nullable|string',
            'fasilitas_bantuan_sosial' => 'nullable|string',
        ]);

        $bumil = Bumil::findOrFail($id);
        $bumil->update($request->all());

        return redirect()->route('bumil.index')->with('success', 'Data Bumil berhasil diperbarui');
    }

    public function destroy($id)
    {
        $bumil = Bumil::findOrFail($id);
        $bumil->delete();

        return redirect()->route('bumil.index')->with('success', 'Data Bumil berhasil dihapus');
    }
}
