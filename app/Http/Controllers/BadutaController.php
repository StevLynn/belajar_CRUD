<?php

namespace App\Http\Controllers;

use App\Models\Baduta;
use Illuminate\Http\Request;

class BadutaController extends Controller
{
    public function index()
    {
        $badutas = Baduta::all();
        return view('baduta.index', compact('badutas'));
    }

    public function create()
    {
        return view('baduta.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'penduduk_id' => 'required|exists:penduduk,id',
            'penduduk_ibu_id' => 'required|exists:penduduk,id',
            'usia_kehamilan' => 'required|integer',
            'jumlah_anak_kandung' => 'required|integer',
            'tanggal_lahir_anak_terakhir' => 'required|date',
            'berat_badan' => 'required|integer',
            'tinggi_badan' => 'required|integer',
        ]);

        Baduta::create($request->all());

        return redirect()->route('baduta.index')->with('success', 'Data Baduta berhasil disimpan');
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
        $request->validate([
            'penduduk_id' => 'required|exists:penduduk,id',
            'penduduk_ibu_id' => 'required|exists:penduduk,id',
            'usia_kehamilan' => 'required|integer',
            'jumlah_anak_kandung' => 'required|integer',
            'tanggal_lahir_anak_terakhir' => 'required|date',
            'berat_badan' => 'required|integer',
            'tinggi_badan' => 'required|integer',
        ]);

        $baduta = Baduta::findOrFail($id);
        $baduta->update($request->all());

        return redirect()->route('baduta.index')->with('success', 'Data Baduta berhasil diperbarui');
    }

    public function destroy($id)
    {
        $baduta = Baduta::findOrFail($id);
        $baduta->delete();

        return redirect()->route('baduta.index')->with('success', 'Data Baduta berhasil dihapus');
    }
}
