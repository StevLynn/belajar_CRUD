<?php

namespace App\Http\Controllers;

use App\Models\PascaPersalinan;
use Illuminate\Http\Request;

class PascaPersalinanController extends Controller
{
    public function index()
    {
        $pascaPersalinans = PascaPersalinan::all();
        return view('pasca_persalinan.index', compact('pascaPersalinans'));
    }

    public function create()
    {
        return view('pasca_persalinan.create');
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
        ]);

        PascaPersalinan::create($request->all());

        return redirect()->route('pasca_persalinan.index')->with('success', 'Data Pasca Persalinan berhasil disimpan');
    }

    public function show($id)
    {
        $pascaPersalinan = PascaPersalinan::findOrFail($id);
        return view('pasca_persalinan.show', compact('pascaPersalinan'));
    }

    public function edit($id)
    {
        $pascaPersalinan = PascaPersalinan::findOrFail($id);
        return view('pasca_persalinan.edit', compact('pascaPersalinan'));
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
        ]);

        $pascaPersalinan = PascaPersalinan::findOrFail($id);
        $pascaPersalinan->update($request->all());

        return redirect()->route('pasca_persalinan.index')->with('success', 'Data Pasca Persalinan berhasil diperbarui');
    }

    public function destroy($id)
    {
        $pascaPersalinan = PascaPersalinan::findOrFail($id);
        $pascaPersalinan->delete();

        return redirect()->route('pasca_persalinan.index')->with('success', 'Data Pasca Persalinan berhasil dihapus');
    }
}
