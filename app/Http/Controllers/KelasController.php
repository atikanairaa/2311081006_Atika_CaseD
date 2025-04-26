<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $kelass = Kelas::paginate(10);
        return view('pendaftaran/index', compact('kelass'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('pendaftaran.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama_peserta'=> 'required|string|max:255',
            'email'=> 'required|email|unique:kelass',
            'nama_kursus'=> 'required|string|max:255',
            'kategori_kursus'=> 'required|string|max:255',
            'tanggal_mulai'=> 'required|date',
            'tanggal_selesai'=> 'required|date',
            'status_pendaftaran' => 'required|in:terdaftar,aktif,selesai,dibatalkan'
        ]);
        Kelas::create($request->all());
        return redirect()->route('pendaftaran.index')->with('success','Data peserta berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $kelass = Kelas::findOrFail($id);
        return view('pendaftaran.edit', compact('kelass'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'nama_peserta'=> 'required|string|max:255',
            'email'=> 'required|email|unique:kelass,email,' . $id,
            'nama_kursus'=> 'required|string|max:255',
            'kategori_kursus'=> 'required|string|max:255',
            'tanggal_mulai'=> 'required|date',
            'tanggal_selesai'=> 'required|date',
            'status_pendaftaran' => 'required|in:terdaftar,aktif,selesai,dibatalkan'
        ]
        );
        $kelass = Kelas::findOrFail($id);
        $kelass -> update($request-> all());
        return redirect()->route('pendaftaran.index')->with('success','Data peserta berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $kelass = Kelas::findOrFail($id);
        $kelass->delete(); //soft delete
        return redirect()->route('pendaftaran.index')->with('success','Data peserta dihapus sementara!');
    }

    public function trash()
    {
        $kelass = Kelas::onlyTrashed()->paginate(10); // hanya ambil data yang dihapus
        return view('pendaftaran.trash', compact('kelass'));
    }

    public function restore($id)
    {
        $kelas = Kelas::onlyTrashed()->findOrFail($id);
        $kelas->restore();
        return redirect()->route('pendaftaran.trash')->with('success', 'Data berhasil dipulihkan.');
    }

    public function forceDelete($id)
    {
        $kelas = Kelas::onlyTrashed()->findOrFail($id);
        $kelas->forceDelete();
        return redirect()->route('pendaftaran.trash')->with('success', 'Data berhasil dihapus permanen.');
    }

}
