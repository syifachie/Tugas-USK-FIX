<?php

namespace App\Http\Controllers;

use App\Models\Skema;
use Illuminate\Http\Request;

class SkemaController extends Controller
{
    public function index(Request $request)
    {
        // Mengambil kata kunci pencarian dari input (jika ada)
        $search = $request->input('search');

        $skemas = Skema::when($search, function ($query, $search) {
            // Mencari berdasarkan kode skema atau nama skema
            return $query->where('kd_skema', 'like', "%{$search}%")
                ->orWhere('nm_skema', 'like', "%{$search}%");
        })
            ->withCount('peserta')
            ->latest()
            ->get();

        return view('skema.index', compact('skemas'));
    }

    public function create()
    {
        // Menghitung jumlah total data skema saat ini + 1
        $jumlahSkema = Skema::count();
        $nextNumber = $jumlahSkema + 1;
        $kdSkemaOtomatis = 'SKM-' . sprintf('%03d', $nextNumber);

        return view('skema.create', compact('kdSkemaOtomatis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nm_skema' => 'required',
            'jenis'    => 'required',
            'jml_unit' => 'required|numeric',
        ]);

        $jumlahSkema = Skema::count();
        $nextNumber = $jumlahSkema + 1;
        $kdSkema = 'SKM-' . sprintf('%03d', $nextNumber);

        Skema::create([
            'kd_skema' => $kdSkema,
            'nm_skema' => $request->nm_skema,
            'jenis'    => $request->jenis,
            'jml_unit' => $request->jml_unit,
        ]);

        return redirect()->route('skema.index')->with('success', 'Skema berhasil ditambahkan!');
    }

    public function show($id)
    {
        // Mengambil data skema beserta daftar peserta yang terdaftar di skema tersebut
        $skema = Skema::with('peserta')->findOrFail($id);
        return view('skema.show', compact('skema'));
    }

    public function edit($id)
    {
        // Mencari data skema berdasarkan ID untuk ditampilkan pada form edit
        $skema = Skema::findOrFail($id);
        return view('skema.edit', compact('skema'));
    }

    public function update(Request $request, $id)
    {
        // Validasi diperbarui: kd_skema tidak perlu divalidasi lagi karena terkunci
        $request->validate([
            'nm_skema' => 'required|string|max:255',
            'jenis'    => 'required|string|max:255',
            'jml_unit' => 'required|integer|min:1',
        ]);

        $skema = Skema::findOrFail($id);

        // Memperbarui data (kd_skema tetap menggunakan data lama yang ada di database)
        $skema->update([
            'nm_skema' => $request->nm_skema,
            'jenis'    => $request->jenis,
            'jml_unit' => $request->jml_unit,
        ]);

        return redirect()->route('skema.index')->with('success', 'Data skema berhasil diperbarui!');
    }

    public function destroy($id)
    {
        // Menghapus data skema berdasarkan ID
        Skema::findOrFail($id)->delete();
        return redirect()->route('skema.index')->with('success', 'Skema berhasil dihapus!');
    }
}
