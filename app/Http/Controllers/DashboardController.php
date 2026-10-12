<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peserta;
use App\Models\Skema;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Jika user biasa mencoba masuk ke dashboard admin, arahkan ke dashboard user
        if (Auth::user()->email !== 'admin@gmail.com') {
            return redirect()->route('user.dashboard');
        }

        // Statistik total untuk admin
        $totalPeserta = Peserta::count();
        $totalSkema = Skema::count();

        // (TAMBAHAN) Mengambil data seluruh peserta beserta relasi skemanya untuk ditampilkan di tabel dashboard
        $pesertas = Peserta::with('skema')->latest()->get();

        return view('dashboard', compact('totalPeserta', 'totalSkema', 'pesertas'));
    }
}
