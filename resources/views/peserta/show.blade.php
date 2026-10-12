<x-app-layout>
    <!-- Kontainer utama halaman detail peserta -->
    <div style="padding: 2.5rem 1rem; background-color: #f8fafc; min-height: 100vh;">
        <div style="max-width: 700px; margin: 0 auto; background: white; padding: 2rem; border-radius: 16px; border: 1px solid #e2e8f0;">
            <h2 style="font-size: 1.25rem; font-weight: 800; margin-bottom: 1.5rem;">Detail Data Peserta</h2>

            <!-- Informasi Detail Peserta -->
            <div style="margin-bottom: 1rem;">
                <label style="display: block; font-weight: 600; color: #64748b; font-size: 0.875rem;">No. Pendaftaran</label>
                <p style="font-size: 1rem; font-weight: 700; color: #1e293b;">{{ $peserta->no_pendaftaran }}</p>
            </div>

            <div style="margin-bottom: 1rem;">
                <label style="display: block; font-weight: 600; color: #64748b; font-size: 0.875rem;">Nama Peserta</label>
                <p style="font-size: 1rem; font-weight: 700; color: #1e293b;">{{ $peserta->nama_peserta }}</p>
            </div>

            <div style="margin-bottom: 1rem;">
                <label style="display: block; font-weight: 600; color: #64748b; font-size: 0.875rem;">Email</label>
                <p style="font-size: 1rem; color: #1e293b;">{{ $peserta->email }}</p>
            </div>

            <div style="margin-bottom: 1rem;">
                <label style="display: block; font-weight: 600; color: #64748b; font-size: 0.875rem;">No. HP / WA</label>
                <p style="font-size: 1rem; color: #1e293b;">{{ $peserta->no_hp }}</p>
            </div>

            <div style="margin-bottom: 1.5rem;">
                <label style="display: block; font-weight: 600; color: #64748b; font-size: 0.875rem;">Skema yang Dipilih</label>
                <p style="font-size: 1rem; font-weight: 600; color: #4f46e5;">
                    {{ $peserta->skema ? $peserta->skema->kd_skema . ' - ' . $peserta->skema->nm_skema : 'Tidak ada skema' }}
                </p>
            </div>

            <!-- Tombol Kembali -->
            <div style="display: flex; justify-content: flex-end;">
                <a href="{{ route('peserta.index') }}" style="background: #4f46e5; color: white; padding: 0.6rem 1.2rem; border-radius: 8px; text-decoration: none; font-weight: 600;">Kembali</a>
            </div>
        </div>
    </div>
</x-app-layout>
