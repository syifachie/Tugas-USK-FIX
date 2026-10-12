<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peserta;
use App\Models\Skema;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    // Dashboard utama user
    public function index()
    {
        $user = Auth::user();
        $peserta = Peserta::where('user_id', $user->id)->orWhere('email', $user->email)->with('skema')->first();

        return view('user.dashboard', compact('peserta'));
    }

    // (BARU) User bisa melihat daftar keseluruhan skema
    public function skemaIndex()
    {
        $skemas = Skema::all();
        return view('user.skema', compact('skemas'));
    }

    // (BARU) User hanya bisa melihat data peserta miliknya sendiri
    public function pesertaIndex()
    {
        $user = Auth::user();
        // Hanya ambil data peserta yang sesuai dengan user yang login
        $peserta = Peserta::where('user_id', $user->id)->orWhere('email', $user->email)->with('skema')->first();

        return view('user.peserta', compact('peserta'));
    }

    // Form edit profil
    public function edit()
    {
        $user = Auth::user();
        $peserta = Peserta::where('user_id', $user->id)->orWhere('email', $user->email)->first();
        $skemas = Skema::all();

        return view('user.edit', compact('peserta', 'skemas'));
    }

    // Update profil
    public function update(Request $request)
    {
        $user = Auth::user();
        $peserta = Peserta::where('user_id', $user->id)->orWhere('email', $user->email)->first();

        if (!$peserta) {
            return redirect()->route('user.dashboard')->with('error', 'Data peserta tidak ditemukan.');
        }

        $request->validate([
            'nama_peserta' => ['required', 'regex:/^[a-zA-Z\s]+$/'],
            'no_hp'        => ['required', 'numeric', 'digits_between:10,15'],
            'skema_id'     => 'required|exists:skemas,id',
        ]);

        $peserta->update([
            'nama_peserta' => $request->nama_peserta,
            'no_hp'        => $request->no_hp,
            'skema_id'     => $request->skema_id,
        ]);

        return redirect()->route('user.dashboard')->with('success', 'Profil pendaftaran Anda berhasil diperbarui!');
    }
}
