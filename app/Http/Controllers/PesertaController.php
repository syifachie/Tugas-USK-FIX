<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\Skema;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PesertaController extends Controller
{
    public function index(Request $request)
    {
        // Mengambil kata kunci pencarian dari input (jika ada)
        $search = $request->input('search');

        $pesertas = Peserta::when($search, function ($query, $search) {
            // Mencari berdasarkan nama peserta atau nomor pendaftaran
            return $query->where('nama_peserta', 'like', "%{$search}%")
                ->orWhere('no_pendaftaran', 'like', "%{$search}%");
        })
            ->with('skema')
            ->latest()
            ->get();

        $skemas = Skema::all();
        return view('peserta.index', compact('pesertas', 'skemas'));
    }

    public function create()
    {
        $skemas = Skema::all();

        // (PERBAIKAN) Menghitung jumlah total data peserta yang ada saat ini + 1
        $jumlahPeserta = Peserta::count();
        $nextNumber = $jumlahPeserta + 1;
        $noPendaftaranOtomatis = 'REG-' . sprintf('%03d', $nextNumber);

        return view('peserta.create', compact('skemas', 'noPendaftaranOtomatis'));
    }

    public function store(Request $request)
{
    // Validasi...
    $request->validate([
        'no_pendaftaran' => 'required|unique:pesertas,no_pendaftaran',
        'nama_peserta'   => ['required', 'regex:/^[a-zA-Z\s]+$/'],
        'email'          => 'required|email|unique:pesertas,email',
        'no_hp'          => ['required', 'numeric', 'digits_between:10,15'],
        'skema_id'       => 'required|exists:skemas,id',
    ]);

    // 1. Cek apakah email sudah terdaftar sebagai User, jika belum buatkan akun otomatis
    $user = User::where('email', $request->email)->first();

    if (!$user) {
        $user = User::create([
            'name'     => $request->nama_peserta,
            'email'    => $request->email,
            'password' => Hash::make('password123'), // Password default awal (bisa diubah peserta nanti)
        ]);
    }

    // 2. Simpan peserta sekaligus hubungkan dengan user_id
    Peserta::create([
        'user_id'        => $user->id, // Menghubungkan ke tabel users
        'no_pendaftaran' => $request->no_pendaftaran,
        'nama_peserta'   => $request->nama_peserta,
        'email'          => $request->email,
        'no_hp'          => $request->no_hp,
        'skema_id'       => $request->skema_id,
    ]);

    return redirect()->route('peserta.index')->with('success', 'Data peserta berhasil ditambahkan & akun login otomatis terbuat!');
}
    public function show($id)
    {
        // Mengambil data peserta beserta relasi skemanya
        $peserta = Peserta::with('skema')->findOrFail($id);
        return view('peserta.show', compact('peserta'));
    }

    public function edit($id)
    {
        $peserta = Peserta::findOrFail($id);
        $skemas = Skema::all();

        return view('peserta.edit', compact('peserta', 'skemas'));
    }

    public function update(Request $request, $id)
    {
        // Validasi diperbarui: no_hp dibatasi minimal 10 dan maksimal 15 digit
        $request->validate([
            'no_pendaftaran' => 'required|unique:pesertas,no_pendaftaran,' . $id,
            'nama_peserta'   => ['required', 'regex:/^[a-zA-Z\s]+$/'], // Nama hanya huruf & spasi
            'email'          => 'required|email',
            'no_hp'          => ['required', 'numeric', 'digits_between:10,15'], // Dibatasi 10 sampai 15 digit angka
            'skema_id'       => 'required|exists:skemas,id',
        ], [
            'nama_peserta.regex'   => 'Nama peserta tidak boleh mengandung angka atau simbol.',
            'no_hp.numeric'        => 'Nomor HP harus berupa angka.',
            'no_hp.digits_between' => 'Nomor HP harus di antara 10 sampai 15 digit.',
        ]);

        $peserta = Peserta::findOrFail($id);
        $peserta->update($request->all());

        return redirect()->route('peserta.index')->with('success', 'Data peserta berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $peserta = Peserta::findOrFail($id);
        $peserta->delete();

        return redirect()->route('peserta.index')->with('success', 'Peserta berhasil dihapus!');
    }
}
