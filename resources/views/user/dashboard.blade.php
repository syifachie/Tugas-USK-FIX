<x-app-layout>
    <div style="padding: 2.5rem 1rem; background-color: #f8fafc; min-height: 100vh;">
        <div style="max-width: 800px; margin: 0 auto;">

            <!-- Notifikasi Sukses -->
            @if(session('success'))
                <div style="background-color: #dcfce7; color: #15803d; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem; font-weight: 600;">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Kartu Sambutan Sesuai Nama User yang Login -->
            <div style="background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%); color: white; padding: 2rem; border-radius: 16px; margin-bottom: 1.5rem; box-shadow: 0 4px 12px rgba(0,0,0,0.05);">
                <h2 style="font-size: 1.5rem; font-weight: 800; margin: 0 0 0.5rem 0;">Halo, Selamat Datang, {{ Auth::user()->name }}! 👋</h2>
                <p style="color: #94a3b8; font-size: 0.95rem; margin: 0;">Ini adalah dashboard pribadi Anda untuk melihat dan mengelola data pendaftaran sertifikasi.</p>
            </div>

            <!-- Detail Data Peserta -->
            <div style="background: white; padding: 2rem; border-radius: 16px; border: 1px solid #e2e8f0; box-shadow: 0 4px 12px rgba(0,0,0,0.03);">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem; border-bottom: 2px solid #f1f5f9; padding-bottom: 1rem;">
                    <h3 style="font-size: 1.15rem; font-weight: 800; color: #0f172a; margin: 0;">Informasi Pendaftaran Saya</h3>
                    @if(isset($peserta) && $peserta)
                        <a href="{{ route('user.profile.edit') }}" style="background-color: #0284c7; color: white; padding: 0.5rem 1rem; border-radius: 8px; text-decoration: none; font-weight: 700; font-size: 0.875rem;">Edit Profil</a>
                    @endif
                </div>

                @if(isset($peserta) && $peserta)
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; font-size: 0.95rem;">
                        <div>
                            <span style="display: block; color: #64748b; font-size: 0.8rem; font-weight: 600; margin-bottom: 0.2rem;">NO. PENDAFTARAN</span>
                            <strong style="color: #4f46e5; font-family: monospace; font-size: 1.05rem;">{{ $peserta->no_pendaftaran }}</strong>
                        </div>
                        <div>
                            <span style="display: block; color: #64748b; font-size: 0.8rem; font-weight: 600; margin-bottom: 0.2rem;">NAMA LENGKAP</span>
                            <strong style="color: #0f172a;">{{ $peserta->nama_peserta }}</strong>
                        </div>
                        <div>
                            <span style="display: block; color: #64748b; font-size: 0.8rem; font-weight: 600; margin-bottom: 0.2rem;">EMAIL</span>
                            <span style="color: #334155;">{{ $peserta->email }}</span>
                        </div>
                        <div>
                            <span style="display: block; color: #64748b; font-size: 0.8rem; font-weight: 600; margin-bottom: 0.2rem;">NO. HP / WA</span>
                            <span style="color: #334155;">{{ $peserta->no_hp }}</span>
                        </div>
                        <div style="grid-column: span 2;">
                            <span style="display: block; color: #64748b; font-size: 0.8rem; font-weight: 600; margin-bottom: 0.2rem;">SKEMA SERTIFIKASI YANG DIPILIH</span>
                            <span style="background-color: #f1f5f9; color: #0f172a; padding: 0.4rem 0.8rem; border-radius: 6px; font-weight: 700; display: inline-block; margin-top: 0.2rem;">
                                {{ $peserta->skema ? $peserta->skema->kd_skema . ' - ' . $peserta->skema->nm_skema : 'Belum memilih skema' }}
                            </span>
                        </div>
                    </div>
                @else
                    <div style="text-align: center; padding: 2rem; color: #64748b;">
                        <p>Data peserta Anda belum terhubung dengan akun ini. Silakan hubungi admin.</p>
                    </div>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>
