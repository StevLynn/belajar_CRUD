<?php

namespace App\Http\Controllers;

use App\Models\Bumil;
use Illuminate\Http\Request;

class BumilController extends Controller
{
    public function index()
    {
        $bumils = Bumil::all();
        return view('bumil.index', compact('bumils'));
    }

    public function create()
    {
        return view('bumil.create');
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
        ]);

        Bumil::create($request->all());

        return redirect()->route('bumil.index')->with('success', 'Data Bumil berhasil disimpan');
    }

    public function show($id)
    {
        $bumil = Bumil::findOrFail($id);
        return view('bumil.show', compact('bumil'));
    }

    public function edit($id)
    {
        $bumil = Bumil::findOrFail($id);
        return view('bumil.edit', compact('bumil'));
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
