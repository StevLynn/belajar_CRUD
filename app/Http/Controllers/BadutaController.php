<?php

namespace App\Http\Controllers;

use App\Models\Baduta;
use Illuminate\Http\Request;
use App\Models\Penduduk;

class BadutaController extends Controller
{
    public function index()
    {
        $badutas = Baduta::all();
        return view('baduta.index', compact('badutas'));
    }

    
    public function create(Request $request)
    {
        $penduduks = Penduduk::all(); // ambil semua penduduk
        $penduduk_id = $request->penduduk_id; // kalau ada penduduk_id bayi dikirim dari URL
        return view('baduta.create', compact('penduduks', 'penduduk_id'));
    }

    public function store(Request $request)
    {
        // Validasi data yang dikirim dari form
        $request->validate([
            'penduduk_id' => 'required|exists:penduduk,id', // ID bayi
            'penduduk_ibu_id' => 'required', // ID ibu
            'jumlah_anak_kandung' => 'required|integer',
            'tanggal_lahir_anak_terakhir' => 'required|date',
            'berat_badan' => 'required|integer',
            'tinggi_badan' => 'required|integer',
            'urutan_anak' => 'required|integer',
            'umur_kehamilan_saat_lahir' => 'required|integer',
            'menggunakan_alat_kontrasepsi' => 'nullable|string',
            'sumber_air_minum' => 'nullable|string',
            'fasilitas_BAB' => 'nullable|string',
            'asi_eksklusif' => 'nullable|string',
            'imunisasi_hepatitis_B' => 'nullable|string',
            'meerokok_terpapar' => 'nullable|string',
            'mengisi_KKA' => 'nullable|string',
            'longitude' => 'required|numeric',
            'latitude' => 'required|numeric',
            'kehadiran_posyandu' => 'nullable|string',
            'penyuluhan_KIE' => 'nullable|string',
            'fasilitas_bantuan_sosial' => 'nullable|string',
        ]);

        // Ambil data penduduk berdasarkan penduduk_id
        $penduduk = Penduduk::find($request->penduduk_id);

        if ($penduduk) {
            // Menyimpan data Baduta ke database
            Baduta::create([
                'penduduk_id' => $request->penduduk_id,
                'penduduk_ibu_id' => $request->penduduk_ibu_id,
                'jumlah_anak_kandung' => $request->jumlah_anak_kandung,
                'tanggal_lahir_anak_terakhir' => $request->tanggal_lahir_anak_terakhir,
                'berat_badan' => $request->berat_badan,
                'tinggi_badan' => $request->tinggi_badan,
                'urutan_anak' => $request->urutan_anak,
                'umur_kehamilan_saat_lahir' => $request->umur_kehamilan_saat_lahir,
                'menggunakan_alat_kontrasepsi' => $request->menggunakan_alat_kontrasepsi,
                'sumber_air_minum' => $request->sumber_air_minum,
                'fasilitas_BAB' => $request->fasilitas_BAB,
                'asi_eksklusif' => $request->asi_eksklusif,
                'imunisasi_hepatitis_B' => $request->imunisasi_hepatitis_B,
                'meerokok_terpapar' => $request->meerokok_terpapar,
                'mengisi_KKA' => $request->mengisi_KKA,
                'longitude' => $request->longitude,
                'latitude' => $request->latitude,
                'kehadiran_posyandu' => $request->kehadiran_posyandu,
                'penyuluhan_KIE' => $request->penyuluhan_KIE,
                'fasilitas_bantuan_sosial' => $request->fasilitas_bantuan_sosial,
                'nik' => $penduduk->NIK,
            ]);
        }

        return redirect()->route('penduduk.index')->with('success', 'Data Baduta berhasil disimpan');
    }

    public function show($id)
    {
        $baduta = Baduta::findOrFail($id);
        return view('baduta.show', compact('baduta'));
    }

    public function edit($id)
    {
        $baduta = Baduta::findOrFail($id);
        return view('baduta.edit', compact('baduta'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data yang dikirim dari form
        $request->validate([
            'penduduk_id' => 'required|exists:penduduk,id',
            'penduduk_ibu_id' => 'required|exists:penduduk,id',
            'usia_kehamilan' => 'required|integer',
            'jumlah_anak_kandung' => 'required|integer',
            'tanggal_lahir_anak_terakhir' => 'required|date',
            'berat_badan' => 'required|integer',
            'tinggi_badan' => 'required|integer',
            'urutan_anak' => 'required|integer',
            'umur_kehamilan_saat_lahir' => 'required|integer',
            'menggunakan_alat_kontrasepsi' => 'nullable|string',
            'sumber_air_minum' => 'nullable|string',
            'fasilitas_BAB' => 'nullable|string',
            'asi_eksklusif' => 'nullable|string',
            'imunisasi_hepatitis_B' => 'nullable|string',
            'meerokok_terpapar' => 'nullable|string',
            'mengisi_KKA' => 'nullable|string',
            'longitude' => 'required|numeric',
            'latitude' => 'required|numeric',
            'kehadiran_posyandu' => 'nullable|string',
            'penyuluhan_KIE' => 'nullable|string',
            'fasilitas_bantuan_sosial' => 'nullable|string',
        ]);

        // Cari data Baduta yang akan diperbarui
        $baduta = Baduta::findOrFail($id);
        $baduta->update([
            'penduduk_id' => $request->penduduk_id,
            'penduduk_ibu_id' => $request->penduduk_ibu_id,
            'usia_kehamilan' => $request->usia_kehamilan,
            'jumlah_anak_kandung' => $request->jumlah_anak_kandung,
            'tanggal_lahir_anak_terakhir' => $request->tanggal_lahir_anak_terakhir,
            'berat_badan' => $request->berat_badan,
            'tinggi_badan' => $request->tinggi_badan,
            'urutan_anak' => $request->urutan_anak,
            'umur_kehamilan_saat_lahir' => $request->umur_kehamilan_saat_lahir,
            'menggunakan_alat_kontrasepsi' => $request->menggunakan_alat_kontrasepsi,
            'sumber_air_minum' => $request->sumber_air_minum,
            'fasilitas_BAB' => $request->fasilitas_BAB,
            'asi_eksklusif' => $request->asi_eksklusif,
            'imunisasi_hepatitis_B' => $request->imunisasi_hepatitis_B,
            'meerokok_terpapar' => $request->meerokok_terpapar,
            'mengisi_KKA' => $request->mengisi_KKA,
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,
            'kehadiran_posyandu' => $request->kehadiran_posyandu,
            'penyuluhan_KIE' => $request->penyuluhan_KIE,
            'fasilitas_bantuan_sosial' => $request->fasilitas_bantuan_sosial,
        ]);

        return redirect()->route('baduta.index')->with('success', 'Data Baduta berhasil diperbarui');
    }

    public function destroy($id)
    {
        $baduta = Baduta::findOrFail($id);
        $baduta->delete();

        return redirect()->route('baduta.index')->with('success', 'Data Baduta berhasil dihapus');
    }
}
