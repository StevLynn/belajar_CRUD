<?php

namespace App\Http\Controllers;

use App\Models\Catin;
use Illuminate\Http\Request;

class CatinController extends Controller
{
    public function index()
    {
        $catins = Catin::all();
        return view('catin.index', compact('catins'));
    }

    public function create()
    {
        return view('catin.create');
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

        Catin::create($request->all());

        return redirect()->route('catin.index')->with('success', 'Data Catin berhasil disimpan');
    }

    public function show($id)
    {
        $catin = Catin::findOrFail($id);
        return view('catin.show', compact('catin'));
    }

    public function edit($id)
    {
        $catin = Catin::findOrFail($id);
        return view('catin.edit', compact('catin'));
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
